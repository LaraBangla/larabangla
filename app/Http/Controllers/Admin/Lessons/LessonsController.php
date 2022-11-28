<?php

namespace App\Http\Controllers\Admin\Lessons;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Models\Frontend\Technology\Lesson;
use App\Models\Frontend\Technology\Chapter;
use App\Rules\Markdown;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $decripted_id = Crypt::decryptString($id);

        $chapter = Chapter::whereId($decripted_id)->first();
        if ($chapter)
        {
            return view('backend.lessons.add',compact('chapter'));
        }
        else
        {
            notify()->error('Chapter not found!','Not found');
            return back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

        $decripted_id = Crypt::decryptString($id);

        $chapter = Chapter::whereId($decripted_id)->first();

        if ($chapter)
        {
           $validate = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|regex:/^[A-Za-z.-]+$/|string|max:255',
                'doc_file' => ['required', new Markdown, 'max:10240'],
            ],
                [
                    'doc_file.max' => 'File should not be greater than 10 MB',
                ]);


              // generate slug
              $get_slug = strtolower($request->slug);
              $slug = Str::slug($get_slug,'-');

              // first check into database that, is slug available?
              //
              $check_slug = Lesson::where('slug',$slug)->first();
              if (!isset($check_slug) && $check_slug == null)
              {
                $slug = $slug;
              }
              else
              {
                // if not available then
                $slug_with_tech_name = $slug.'-'.strtolower($chapter->technology->name);
                 // check into database that, is slug available?
                $check_slug = Lesson::where('slug',$slug_with_tech_name)->first();
                if (!isset($check_slug) && $check_slug == null)
                {
                    $slug = $slug_with_tech_name;
                }
                else
                {
                    // auto generate slug
                    $number = 1;
                    while(!empty($check_slug))
                    {
                        $generate_slug = $slug.'-'.$number;
                        $check_slug = Lesson::where('slug',$generate_slug)->first();
                        $number ++;
                    }
                    $slug = $generate_slug;

                }
              }

              // generate chapter id
              $last_lesson = Lesson::orderBy('id','desc')->first();
              $last_lesson != null? $lesson_id = $last_lesson->id +1 : $lesson_id = 1;


              // file
              $doc_file = $request->doc_file;
              $fileName = $doc_file->hashName();
              $doc_file->storeAs(strtolower($chapter->technology->name).'/'.strtolower($chapter->version->name),$fileName, 'docs');

            $data = [
                'name' => $request->name,
                 'slug' => $slug,
                 'order' => $lesson_id,
                'version_id' => $chapter->version_id,
                'technology_id' => $chapter->technology_id,
                'chapter_id' => $chapter->id,
                'file' => $fileName,

            ];





            $store = Lesson::create($data);
            if ($store)
            {
                notify()->success('Lesson added successfully!','Successful');
                return back();
            }
            else
            {
                notify()->error('Failed to store Chapter!','Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Chapter not found!','Not found');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
