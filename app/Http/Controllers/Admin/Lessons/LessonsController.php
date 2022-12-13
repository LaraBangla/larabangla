<?php

namespace App\Http\Controllers\Admin\Lessons;

use App\Rules\Markdown;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\Technology\Lesson;
use App\Models\Frontend\Technology\Chapter;
use League\CommonMark\GithubFlavoredMarkdownConverter;

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
            return view('backend.lessons.add', compact('chapter'));
        }
        else
        {
            notify()->error('Chapter not found!', 'Not found');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $decripted_id = Crypt::decryptString($id);

        $chapter = Chapter::whereId($decripted_id)->first();

        if ($chapter)
        {
            $validate = $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'slug' => 'required|string|unique:technologies|regex:/^[A-Za-z.-]+$/|string|max:255',
                    'doc_file' => ['required', new Markdown, 'max:10240'],
                    'description' => 'nullable|max:500',
                ],
                [
                    'doc_file.max' => 'File should not be greater than 10 MB',
                ]
            );


            // generate slug
            $get_slug = strtolower($request->slug);
            $slug = Str::slug($get_slug, '-');

            // first check into database that, is slug available?
            //
            $check_slug = Lesson::where('slug', $slug)->first();
            if (!isset($check_slug) && $check_slug == null)
            {
                $slug = $slug;
            }
            else
            {
                // if not available then
                $slug_with_tech_name = $slug . '-' . strtolower(Str::slug($chapter->technology->slug, '-'));
                // check into database that, is slug available?
                $check_slug = Lesson::where('slug', $slug_with_tech_name)->first();
                if (!isset($check_slug) && $check_slug == null)
                {
                    $slug = $slug_with_tech_name;
                }
                else
                {
                    // if not available then
                    $slug_with_version_name = $slug . '-' . strtolower(Str::slug($chapter->technology->slug, '-')) . '-' . strtolower($chapter->version->slug);
                    // check into database that, is slug available?
                    $check_slug = Lesson::where('slug', $slug_with_version_name)->first();
                    if (!isset($check_slug) && $check_slug == null)
                    {
                        $slug = $slug_with_version_name;
                    }
                    else
                    {
                        // auto generate slug
                        $number = 1;
                        while (!empty($check_slug))
                        {
                            $generate_slug = $slug . '-' . $number;
                            $check_slug = Lesson::where('slug', $generate_slug)->first();
                            $number++;
                        }
                        $slug = $generate_slug;
                    }
                }
            }

            // generate order for shorting
            $last_lesson = Lesson::orderBy('id', 'desc')->first();
            $last_lesson != null ? $lesson_id = $last_lesson->id + 1 : $lesson_id = 1;


            // doc file
            $doc_file = $request->doc_file;

            //generate file name
            $fileName  = strtolower(Str::slug($slug, '_')) . '.md';

            // check that named file already exist or not, if not exist then store it, else name that file name uniqid
            $path = strtolower(Str::slug($chapter->technology->name, '-')) . '/' . strtolower(Str::slug($chapter->version->slug, '-')) . '/' . $fileName;
            if (Storage::disk('docs')->missing($path) && empty(Lesson::wherefile($fileName)->first()))
            {
                $doc_file->storeAs(strtolower(Str::slug($chapter->technology->name, '-')) . '/' . strtolower(Str::slug($chapter->version->slug, '-')), $fileName, 'docs');
            }
            else
            {
                $fileName  = strtolower(Str::slug($slug, '_')) . uniqid() . '.md';
                $doc_file->storeAs(strtolower(Str::slug($chapter->technology->name, '-')) . '/' . strtolower(Str::slug($chapter->version->slug, '-')), $fileName, 'docs');
            }


            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'order' => $lesson_id,
                'version_id' => $chapter->version_id,
                'technology_id' => $chapter->technology_id,
                'chapter_id' => $chapter->id,
                'file' => $fileName,
                'description' => $request->description,

            ];


            $store = Lesson::create($data);
            if ($store)
            {
                notify()->success('Lesson added successfully!', 'Successful');
                return back();
            }
            else
            {
                notify()->error('Failed to store Chapter!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Chapter not found!', 'Not found');
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
        $decripted_id = Crypt::decryptString($id);
        $find = Lesson::whereId($decripted_id)->first();
        if ($find)
        {
            $converter = new GithubFlavoredMarkdownConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);

            $path = strtolower(Str::slug($find->technology->name, '-')) . '/' . strtolower(Str::slug($find->version->slug, '-')) . '/' . $find->file;
            if (Storage::disk('docs')->exists($path))
            {
                $md = file_get_contents(storage_path('/docs/' . $path));
                $data = $converter->convert($md);
                return view('backend.lessons.show', compact('data', 'find'));
            }
            {
                notify()->error('Doc file does not exists!', 'Does not exists!');
                return back();
            }
        }
        else
        {
            notify()->error('Lesson not found!', 'Not found');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decripted_id = Crypt::decryptString($id);

        $find = Lesson::whereId($decripted_id)->first();

        if ($find)
        {
            return view('backend.lessons.edit', compact('find'));
        }
        else
        {
            notify()->error('Lesson not found!', 'Not found');
            return back();
        }
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

        $decripted_id = Crypt::decryptString($id);

        $lesson = Lesson::whereId($decripted_id)->first();
        $data = array();

        if ($lesson)
        {
            $old_file = $lesson->file;
            $validate = $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'slug' => "required|string|unique:lessons,slug,$decripted_id|regex:/^[A-Za-z.-]+$/|string|max:255",
                    'doc_file' => [new Markdown, 'max:10240'],
                    'description' => 'nullable|max:500',
                ],
                [
                    'doc_file.max' => 'File should not be greater than 10 MB',
                ]
            );

            // name
            if ($request->name != $lesson->name)
            {
                $data['name'] = $request->name;
            }

            if ($request->slug != $lesson->slug)
            {
                // generate slug
                $get_slug = strtolower($request->slug);
                $slug = Str::slug($get_slug, '-');

                // first check into database that, is slug available?
                //
                $check_slug = Lesson::where('slug', $slug)->first();
                if (!isset($check_slug) && $check_slug == null)
                {
                    $slug = $slug;
                }
                else
                {
                    // if not available then
                    $slug_with_tech_name = $slug . '-' . strtolower(Str::slug($lesson->technology->name, '-'));
                    // check into database that, is slug available?
                    $check_slug = Lesson::where('slug', $slug_with_tech_name)->first();
                    if (!isset($check_slug) && $check_slug == null)
                    {
                        $slug = $slug_with_tech_name;
                    }
                    else
                    {
                        // if not available then
                        $slug_with_version_name = $slug . '-' . strtolower(Str::slug($lesson->technology->name, '-')) . '-' . strtolower($lesson->version->slug);
                        // check into database that, is slug available?
                        $check_slug = Lesson::where('slug', $slug_with_version_name)->first();
                        if (!isset($check_slug) && $check_slug == null)
                        {
                            $slug = $slug_with_version_name;
                        }
                        else
                        {
                            // auto generate slug
                            $number = 1;
                            while (!empty($check_slug))
                            {
                                $generate_slug = $slug . '-' . $number;
                                $check_slug = Lesson::where('slug', $generate_slug)->first();
                                $number++;
                            }
                            $slug = $generate_slug;
                        }
                    }
                }

                $data['slug'] = $slug;
            }

            // if old description and request description is not same then keep that data into array
            if ($request->description != $lesson->description)
            {
                $data['description'] = $request->description;
            }

            // set order
            if ($request->order != $lesson->order)
            {
                $data['order'] = $request->order;
            }

            // doc file

            if (!empty($request->doc_file))
            {
                $doc_file = $request->doc_file;

                //generate file name
                if (isset($slug) && $slug != null)
                {
                    $fileName  = strtolower(Str::slug($slug, '_')) . '.md';
                }
                else
                {
                    $slice = Str::before($lesson->file, '.md');

                    $fileName  = $slice . Str::slug(now(), '_') . '.md';
                    if (strlen($fileName) > 20)
                    {
                        $newName = substr($fileName, 0, 20) . '.md';
                        $fileName = $newName;
                    }

                    // $slice = Str::before($lesson->file, '.md');
                    // $fileNum = 1;
                    // $fileName  = $slice.'_'.$fileNum.'.md';
                    // $path = strtolower(Str::slug($lesson->technology->name, '-')) . '/' . strtolower(Str::slug($lesson->version->slug, '-')) . '/' . $fileName;
                    // while (Storage::disk('docs')->exists($path) && !empty(Lesson::wherefile($fileName)->first()))
                    // {
                    //     $fileName  = $slice.'_'.$fileNum.'.md';
                    //     $fileNum++;
                    // }

                    // dd($fileName);
                }




                // check that named file already exist or not, if not exist then store it, else name that file name uniqid
                $path = strtolower(Str::slug($lesson->technology->name, '-')) . '/' . strtolower(Str::slug($lesson->version->slug, '-')) . '/' . $fileName;
                if (Storage::disk('docs')->missing($path) && empty(Lesson::wherefile($fileName)->first()))
                {
                    $doc_file->storeAs(strtolower(Str::slug($lesson->technology->name, '-')) . '/' . strtolower(Str::slug($lesson->version->slug, '-')), $fileName, 'docs');
                }
                else
                {
                    $fileName  = strtolower(Str::before($lesson->file, '.md')) . uniqid() . '.md';
                    $doc_file->storeAs(strtolower(Str::slug($lesson->technology->name, '-')) . '/' . strtolower(Str::slug($lesson->version->slug, '-')), $fileName, 'docs');
                }
                $data['file'] = $fileName;
            }


            if (!empty($data))
            {
                $update = $lesson->update($data);
                if ($update)
                {
                    // if doc file updated then remove old doc file
                    if (!empty($request->doc_file))
                    {
                        $path = strtolower(Str::slug($lesson->technology->name, '-')) . '/' . strtolower(Str::slug($lesson->version->slug, '-')) . '/' . $old_file;
                        if (Storage::disk('docs')->exists($path))
                        {
                            Storage::disk('docs')->delete($path);
                        }
                    }

                    notify()->success('Lesson update successfully!', 'Successful');
                    return back();
                }
                else
                {
                    notify()->error('Failed to update lesson!', 'Failed');
                    return back();
                }
            }
            else
            {
                notify()->error('Nothing to update!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Chapter not found!', 'Not found');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $decripted_id = Crypt::decryptString($id);
        $find = Lesson::whereId($decripted_id)->first();
        if ($find)
        {
            $file = $find->file;
            $delete = $find->delete();
            if ($delete)
            {
                // * delete old file
                $path = strtolower(Str::slug($find->technology->name, '-')) . '/' . strtolower(Str::slug($find->version->slug, '-')) . '/' . $file;
                if (Storage::disk('docs')->exists($path))
                {
                    Storage::disk('docs')->delete($path);
                }
                notify()->success('Successfully deleted', 'Deleted');
                return back();
            }
            else
            {
                notify()->error('Failed to delete!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Chapter not found!', 'Not found');
            return back();
        }
    }
}
