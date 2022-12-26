<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class HomeController extends Controller
{

    public function index()
    {
        return view('frontend.index');
    }

    public function about_us()
    {
        $converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $md = file_get_contents(storage_path('/site_content/' . 'about-us.md'));
        $data = $converter->convert($md);
        //dd($data);
        return view('frontend.more.about-us', compact('data'));
    }

    // if user hit /about then redirect to /about-us
    public function about()
    {
        return to_route('about.us');
    }
}
