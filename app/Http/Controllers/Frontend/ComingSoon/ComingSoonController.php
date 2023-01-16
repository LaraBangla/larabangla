<?php

namespace App\Http\Controllers\Frontend\ComingSoon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{

    // if anyone click on /public url || that's useful for production
    public function public()
    {
        abort(404);
    }

    public function blog()
    {
        return view('frontend.more.coming-soon', ['message' => 'ব্লগ']);
    }

    public function forum()
    {
        return view('frontend.more.coming-soon', ['message' => 'ফোরাম']);
    }

    public function question()
    {
        return view('frontend.more.coming-soon', ['message' => 'প্রশ্ন']);
    }

    public function help()
    {
        return view('frontend.more.coming-soon', ['message' => 'সাহায্য']);
    }

    public function sitemap()
    {
        return view('frontend.more.coming-soon', ['message' => 'সাইট ম্যাপ']);
    }

    public function splade()
    {
        return view('frontend.more.coming-soon', ['message' => 'স্প্লেড']);
    }

    public function livewire()
    {
        return view('frontend.more.coming-soon', ['message' => 'লাইভওয়্যার']);
    }

    public function community()
    {
        return view('frontend.more.coming-soon', ['message' => 'কমিউনিটি']);
    }

    public function onlineCourse()
    {
        return view('frontend.more.coming-soon', ['message' => 'অনলাইন কোর্স']);
    }

    public function webDesignAndDevelopment()
    {
        return view('frontend.more.coming-soon', ['message' => 'ওয়েব ডিজাইন এবং ডেভেলপমেন্ট']);
    }

    public function appsDevelopment()
    {
        return view('frontend.more.coming-soon', ['message' => 'অ্যাপস ডেভেলপমেন্ট']);
    }

    public function softwareDevelopment()
    {
        return view('frontend.more.coming-soon', ['message' => 'সফটওয়্যার ডেভেলপমেন্ট']);
    }
}
