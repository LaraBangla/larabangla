<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\GithubFlavoredMarkdownConverter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('/');


Route::get('/docs', function () {


$converter = new GithubFlavoredMarkdownConverter([
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]);

   // $md = storage_path() . '/docs.md';
//    $md =  Storage::disk('docs');
    $data = $converter->convert('# Bismillah');



// <h1>Hello World!</h1>
    return view('frontend.docs.index',compact('data'));
})->name('docs');
