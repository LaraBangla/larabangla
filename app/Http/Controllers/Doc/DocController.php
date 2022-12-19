<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\Technology\Lesson;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Version;
use App\Models\Frontend\Technology\Technology;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendToDocs($technology_slug)
    {
        $technology = Technology::whereSlug($technology_slug)->whereStatus(1)->first();

        if (isset($technology) && $technology != null)
        {
            try
            {
                $version = Version::whereTechnology_id($technology->id)->whereStatus(1)->orderBy('id', 'desc')->select('id', 'slug')->first();

                $chapter = Chapter::whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereStatus(1)->orderBy('id', 'asc')->select('id', 'slug')->first();
                $lesson = Lesson::whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereChapter_id($chapter->id)->whereStatus(1)->orderBy('id', 'asc')->select('id', 'slug')->first();

                if ((isset($version) && $version != null) && (isset($chapter) && $chapter != null) & (isset($lesson) && $lesson != null))
                {
                    return redirect()->route('docs', ['technology_slug' => $technology->slug, 'version_slug' => $version->slug, 'chapter_slug' => $chapter->slug, 'lesson_slug' => $lesson->slug]);
                }
                else
                {
                    abort(404);
                }
            }
            catch (\Throwable $th)
            {
                abort(502);
            }
        }
        else
        {
            abort(404);
        }
    }

    // send to version documentation
    public function sendToDocsVersion($technology_slug, $version_slug)
    {
        //  dd($technology_slug . ' ' . $version_slug);
        $technology = Technology::whereSlug($technology_slug)->whereStatus(1)->first();
        if ($technology)
        {
            $version = Version::whereSlug($version_slug)->where('technology_id', $technology->id)->whereStatus(1)->first();
            if ($version)
            {
                // dd($version);
                $chapter = Chapter::whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereStatus(1)->orderBy('id', 'asc')->select('id', 'slug')->first();
                $lesson = Lesson::whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereChapter_id($chapter->id)->whereStatus(1)->orderBy('id', 'asc')->select('id', 'slug')->first();
                if ((isset($version) && $version != null) && (isset($chapter) && $chapter != null) & (isset($lesson) && $lesson != null))
                {
                    return redirect()->route('docs', ['technology_slug' => $technology->slug, 'version_slug' => $version->slug, 'chapter_slug' => $chapter->slug, 'lesson_slug' => $lesson->slug]);
                }
                else
                {
                    dd($lesson);
                    abort(404);
                }
            }
            else
            {
                notify()->error('Version  not found!', 'Not Found');
                return back();
            }
        }
        else
        {
            notify()->error('Technology  not found!', 'Not Found');
            return back();
        }
    }

    public function index($technology_slug, $version_slug, $chapter_slug, $lesson_slug)
    {

        $technology = Technology::whereSlug($technology_slug)->whereStatus(1)->first();
        $version = Version::whereSlug($version_slug)->whereTechnology_id($technology->id)->whereStatus(1)->first();
        $chapter = Chapter::whereSlug($chapter_slug)->whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereStatus(1)->first();
        $lesson = Lesson::whereSlug($lesson_slug)->whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereChapter_id($chapter->id)->whereStatus(1)->first();
        if ((isset($technology) && $technology != null) && (isset($version) && $version != null) && (isset($chapter) && $chapter != null) && (isset($lesson) && $lesson != null))
        {

            $converter = new GithubFlavoredMarkdownConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);
            $path = strtolower(Str::slug($lesson->technology->path_folder_name, '-')) . '/' . strtolower(Str::slug($lesson->version->path_folder_name, '-')) . '/' . $lesson->file;
            if (Storage::disk('docs')->exists($path))
            {
                $md = file_get_contents(storage_path('/docs/' . $path));
            }
            else
            {
                // ! Here give a default .md file if doc not found
                dd('file nai');
                $md = file_get_contents(storage_path('/docs.md'));
            }

            $data = $converter->convert($md);

            $chapters = Chapter::whereTechnology_id($technology->id)->whereVersion_id($version->id)->orderBy('order', 'asc')->get();

            return view('frontend.docs.index', compact('data', 'technology', 'lesson', 'chapters'));
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
