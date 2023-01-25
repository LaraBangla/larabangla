<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\MarkdownConverter;
use App\Models\Frontend\Technology\Lesson;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Version;
use App\Models\Frontend\Technology\Technology;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function DocConfig()
    {
        // Define your configuration, if needed
        $config = [];

        // Configure the Environment with all the CommonMark and GFM parsers/renderers
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        // below extension is for add heading id
        $environment->addExtension(new AttributesExtension());
        // heading id extension end
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new DisallowedRawHtmlExtension());
        $environment->addExtension(new TableExtension());
        $environment->addExtension(new TaskListExtension());
        $environment->addExtension(new ExternalLinkExtension());
        Torchlight\Commonmark\V2\TorchlightExtension::class;
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        return  $converter = new MarkdownConverter($environment, [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
    }


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
                    return to_route('docs', ['technology_slug' => $technology->slug, 'version_slug' => $version->slug, 'chapter_slug' => $chapter->slug, 'lesson_slug' => $lesson->slug]);
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
            // get doc config
            $converter = $this->DocConfig();
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
