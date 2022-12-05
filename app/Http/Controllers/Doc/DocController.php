<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Lesson;
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
        $technology = Technology::whereSlug($technology_slug)->first();
        if (isset($technology) && $technology != null)
        {
            //  return response()->json($technology->lastVersion[0]->slug);
            if ($technology->lastVersion[0] != null && $technology->firstChapter[0] != null && $technology->firstLesson[0] != null)
            {
                return redirect()->route('docs', ['technology_slug' => $technology->slug, 'version_slug' => $technology->lastVersion[0]->slug, 'chapter' => $technology->firstChapter[0]->slug, 'lesson_slug' => $technology->firstLesson[0]->slug]);
            }
            else
            {
                abort(502);
            }

            //  return response()->json($technology->firstChapter);
            // try
            // {
            //     $version = Version::whereTechnology_id($technology->id)->orderBy('id', 'desc')->first();

            //     $chapter = Chapter::whereTechnology_id($technology->id)->whereVersion_id($version->id)->orderBy('id', 'asc')->first();
            //     $lesson = Lesson::whereTechnology_id($technology->id)->whereVersion_id($version->id)->orderBy('id', 'asc')->first();
            //     return response()->json($chapter->slug);
            //     // $chapters_slug = Chapter::whereTechnology_id($technology->id)->orderBy('id', 'asc')->first();

            // }
            // catch (\Throwable $th)
            // {
            //     abort(502);
            // }
        }
        else
        {
            abort(404);
        }
    }

    public function index($technology_slug, $version_slug, $chapter, $lesson_slug)
    {
        dd('ok');
        // find technology and version
        $technology = Technology::whereSlug($technology_slug)->first();
        $version = Version::whereSlug($version_slug)->first();
        if ((isset($technology) && $technology != null) && (isset($version) && $version != null))
        {
            $converter = new GithubFlavoredMarkdownConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);

            $md = file_get_contents(storage_path('/docs.md'));
            $data = $converter->convert($md);




            $chapters = Chapter::whereTechnology_id($technology->id)->whereVersion_id($version->id)->orderBy('order', 'asc')->get();
            //  $lessons = Lesson::whereTechnology_id($technology->id)->whereVersion_id($version->id)->orderBy('order', 'asc')->get();


            return view('frontend.docs.index', compact('data', 'version', 'chapters'));
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
