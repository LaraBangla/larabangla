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
    public function create($slug)
    {

        $chapter = Chapter::whereSlug($slug)->first();

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
    public function store(Request $request, $slug)
    {
        $chapter = Chapter::whereSlug($slug)->first();

        if ($chapter)
        {
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'slug' => 'required|string|unique:technologies|regex:/^[A-Za-z.-]+$/|string|max:255',
                    'doc_file' => ['required', new Markdown, 'max:10240'],
                    'keywords' => 'nullable|string|max:255',
                    'title' => 'required|string|max:255',
                    'description' => 'nullable|string|max:150',
                ],
                [
                    'doc_file.max' => 'File should not be greater than 10 MB',
                ]
            );


            // generate slug for lesson slug and filename
            $get_slug = strtolower($request->slug);
            $slug = Str::slug($get_slug, '-');

            // first check into database that, is slug available?
            //
            $check_slug = Lesson::withTrashed()->where('slug', $slug)->first();
            if (!isset($check_slug) && $check_slug == null)
            {
                $slug = $slug;
            }
            else
            {
                // if not available then
                $slug_with_tech_name =  strtolower(Str::slug($chapter->technology->slug, '-')) . '-' . $slug;
                // check into database that, is slug available?
                $check_slug = Lesson::withTrashed()->where('slug', $slug_with_tech_name)->first();
                if (!isset($check_slug) && $check_slug == null)
                {
                    $slug = $slug_with_tech_name;
                }
                else
                {
                    // if not available then make slug with technology slug
                    $slug_with_version_slug =  strtolower(Str::slug($chapter->technology->slug, '-')) . '-' . $slug . '-' . strtolower($chapter->version->slug);
                    // check into database that, is slug available?
                    $check_slug = Lesson::withTrashed()->where('slug', $slug_with_version_slug)->first();
                    if (!isset($check_slug) && $check_slug == null)
                    {
                        $slug = $slug_with_version_slug;
                    }
                    else
                    {

                        // auto generate slug
                        $number = 1;
                        while (!empty($check_slug))
                        {
                            $generate_slug = $slug . '-' . $number;
                            $check_slug = Lesson::withTrashed()->where('slug', $generate_slug)->first();
                            $number++;
                        }
                        $slug = $generate_slug;
                    }
                }
            }

            // generate order for shorting
            $last_lesson = Lesson::withTrashed()->orderBy('id', 'desc')->first();
            $last_lesson != null ? $lesson_id = $last_lesson->id + 1 : $lesson_id = 1;


            // doc file
            $doc_file = $request->doc_file;

            //generate file name
            $fileName  = strtolower(Str::slug($slug, '_')) . '.md';

            // check that named file already exist or not, if not exist then store it, else name that file name uniqid
            $path = strtolower(Str::slug($chapter->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($chapter->version->path_folder_name, '-')) . '/' . $fileName;
            if (Storage::disk('docs')->missing($path) && empty(Lesson::withTrashed()->wherefile($fileName)->first()))
            {
                $doc_file->storeAs(strtolower(Str::slug($chapter->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($chapter->version->path_folder_name, '-')), $fileName, 'docs');
            }
            else
            {
                $fileName  = strtolower(Str::slug($slug, '_')) . uniqid() . '.md';
                $doc_file->storeAs(strtolower(Str::slug($chapter->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($chapter->version->path_folder_name, '-')), $fileName, 'docs');
            }


            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'order' => $lesson_id,
                'version_id' => $chapter->version_id,
                'technology_id' => $chapter->technology_id,
                'chapter_id' => $chapter->id,
                'file' => $fileName,
                'keywords' => $request->keywords,
                'title' => $request->title,
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
    public function show($slug)
    {

        $find = Lesson::whereSlug($slug)->first();
        if ($find)
        {
            $converter = new GithubFlavoredMarkdownConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);

            $path = strtolower(Str::slug($find->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($find->version->path_folder_name, '-')) . '/' . $find->file;
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
    public function edit($slug)
    {
        $find = Lesson::whereSlug($slug)->first();

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
    public function update(Request $request, $slug)
    {
        $lesson = Lesson::whereSlug($slug)->first();
        $data = array();

        if ($lesson)
        {
            $old_file = $lesson->file;
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'slug' => "required|string|unique:lessons,slug,$lesson->id|regex:/^[A-Za-z.-]+$/|string|max:255",
                    'doc_file' => [new Markdown, 'max:10240'],
                    'keywords' => 'nullable|string|max:255',
                    'title' => 'required|string|max:255',
                    'description' => 'nullable|string|max:150',
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
                // generate slug for lesson slug and filename
                $get_slug = strtolower($request->slug);
                $slug = Str::slug($get_slug, '-');

                // first check into database that, is slug available?
                //
                $check_slug = Lesson::withTrashed()->where('slug', $slug)->first();
                if (!isset($check_slug) && $check_slug == null)
                {
                    $slug = $slug;
                }
                else
                {
                    // if not available then
                    $slug_with_tech_name =  strtolower(Str::slug($lesson->technology->name, '-')) . '-' . $slug;
                    // check into database that, is slug available?
                    $check_slug = Lesson::withTrashed()->where('slug', $slug_with_tech_name)->first();
                    if (!isset($check_slug) && $check_slug == null)
                    {
                        $slug = $slug_with_tech_name;
                    }
                    else
                    {
                        // if not available then
                        $slug_with_version_name = strtolower(Str::slug($lesson->technology->name, '-')) . '-' . $slug . '-' .  strtolower($lesson->version->slug);
                        // check into database that, is slug available?
                        $check_slug = Lesson::withTrashed()->where('slug', $slug_with_version_name)->first();
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
                                $check_slug = Lesson::withTrashed()->where('slug', $generate_slug)->first();
                                $number++;
                            }
                            $slug = $generate_slug;
                        }
                    }
                }

                $data['slug'] = $slug;
            }

            if ($request->keywords != $lesson->keywords)
            {
                $data['keywords'] = $request->keywords;
            }

            if ($request->title != $lesson->title)
            {
                $data['title'] = $request->title;
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
                }


                // check that named file already exist or not, if not exist then store it, else name that file name uniqid
                $path = strtolower(Str::slug($lesson->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($lesson->version->path_folder_name, '-')) . '/' . $fileName;
                if (Storage::disk('docs')->missing($path) && empty(Lesson::withTrashed()->wherefile($fileName)->first()))
                {
                    $doc_file->storeAs(strtolower(Str::slug($lesson->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($lesson->version->path_folder_name, '-')), $fileName, 'docs');
                }
                else
                {
                    $fileName  = strtolower(Str::before($lesson->file, '.md')) . uniqid() . '.md';
                    $doc_file->storeAs(strtolower(Str::slug($lesson->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($lesson->version->path_folder_name, '-')), $fileName, 'docs');
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
                        $path = strtolower(Str::slug($lesson->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($lesson->version->path_folder_name, '-')) . '/' . $old_file;
                        if (Storage::disk('docs')->exists($path))
                        {
                            Storage::disk('docs')->delete($path);
                        }
                    }

                    notify()->success('Lesson update successfully!', 'Successful');
                    return to_route('admin.edit.lesson', ['slug' => $lesson->slug]);
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
    public function destroy($slug)
    {

        $find = Lesson::whereSlug($slug)->first();
        if ($find)
        {
            $file = $find->file;
            $delete = $find->delete();
            if ($delete)
            {
                // * delete old file
                $path = strtolower(Str::slug($find->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($find->version->path_folder_name, '-')) . '/' . $file;
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
