<?php

namespace App\Http\Controllers\Admin\Chapters;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Version;

class ChapterController extends Controller
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
        $version = Version::whereId($decripted_id)->first();
        if ($version)
        {
           return view('backend.chapters.add',compact('version'));
        }
        else
        {
            notify()->error('Version not found!','Not found');
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
        $version = Version::whereId($decripted_id)->first();

        if ($version)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|regex:/^[a-zA-Z]+$/u|string|max:255',

            ]);

              // generate slug
              $get_slug = strtolower($request->slug);
              $slug = Str::slug($get_slug);

              // first check into database that, is slug available?
              //
              $check_slug = Chapter::where('slug',$slug)->first();
              if (!isset($check_slug) && $check_slug == null)
              {
                $slug = $slug;
              }
              else
              {
                // if not available then
                $slug_with_tech_name = $slug.'-'.$version->technology->name;
                 // check into database that, is slug available?
                $check_slug = Chapter::where('slug',$slug_with_tech_name)->first();
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
                        $check_slug = Chapter::where('slug',$generate_slug)->first();
                        $number ++;
                    }
                    $slug = $generate_slug;

                }
              }



            $data = [
                'name' => $request->name,
                 'slug' => $slug,
                'version_id' => $version->id,
                'technology_id' => $version->technology_id,
            ];





            $store = Chapter::create($data);
            if ($store)
            {
                notify()->success('Chapter added successfully!','Successful');
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
            notify()->error('Version not found!','Not found');
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
