<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use App\Http\Controllers\Admin\Lessons\LessonsController;
use App\Http\Controllers\Admin\Versions\VersonController;
use App\Http\Controllers\Admin\Chapters\ChapterController;
use App\Http\Controllers\Admin\Division\DivisionController;
use App\Http\Controllers\Admin\Technology\TechnologyController;
use App\Http\Controllers\Doc\DocController;

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

Route::get('/', function ()
{
    return view('frontend.index');
})->name('/');
