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



// Route::get('/docs', function ()
// {


//     $converter = new GithubFlavoredMarkdownConverter([
//         'html_input' => 'strip',
//         'allow_unsafe_links' => false,
//     ]);

//     $md = file_get_contents(storage_path('/docs.md'));
//     $data = $converter->convert($md);



//     // <h1>Hello World!</h1>
//     return view('frontend.docs.index', compact('data'));
// })->name('test.docs');

Route::controller(DocController::class)->group(function ()
{
    Route::get('/docs/{technology_slug}', 'sendToDocs')->name('send.to.docs');
    Route::get('/docs/{technology_slug}/{version_slug}', 'sendToDocsVersion')->name('send.to.docs.version');

    Route::get('/docs/{technology_slug}/{version_slug}/{chapter_slug}/{lesson_slug}', 'index')->name('docs');
});

// dashboard
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function ()
{



    Route::get('/dashboard', function ()
    {
        return view('backend.backend_header_footer');
    })->name('dashboard');

    // Route::get('/add/technology',[TechnologyController::class,'create'])->name('add.technology');




    /**
     * admin
     * -------------------------
     */
    // division routes
    Route::controller(DivisionController::class)->group(function ()
    {
        Route::get('/add/division', 'create')->name('add.division');
        Route::put('/store/division', 'store')->name('store.division');
        Route::get('/all/divisions', 'show')->name('show.division');
        Route::get('/edit/division/{slug}', 'edit')->name('edit.division');
        Route::patch('/update/division/{slug}', 'update')->name('update.division');
        Route::get('/delete/division/{slug}', 'destroy')->name('delete.division');
    });

    Route::controller(TechnologyController::class)->group(function ()
    {
        Route::get('/add/technology', 'create')->name('add.technology');
        Route::put('/store/technology', 'store')->name('store.technology');
        Route::get('/technologies', 'index')->name('all.technologies');
        Route::get('/show/technology/{slug}', 'show')->name('show.technology');
        Route::get('/edit/technology/{slug}', 'edit')->name('edit.technology');
        Route::patch('/update/technology/{slug}', 'update')->name('update.technology');
        Route::get('/delete/technology/{slug}', 'destroy')->name('delete.technology');
    });

    // version
    Route::controller(VersonController::class)->group(function ()
    {
        Route::get('/add/version/{slug}', 'create')->name('add.version');
        Route::put('/store/version/{slug}', 'store')->name('store.version');
        Route::get('/show/versions', 'index')->name('show.versions');
        Route::get('/show/version/{technology_slug}/{version_slug}', 'show')->name('show.version'); // single
        Route::get('/edit/version/{slug}', 'edit')->name('edit.version');
        Route::patch('/update/version/{slug}', 'update')->name('update.version');
        Route::get('/delete/version/{slug}', 'destroy')->name('delete.version');
    });

    // chapter
    Route::controller(ChapterController::class)->group(function ()
    {
        Route::get('/add/chapter/{slug}', 'create')->name('add.chapter');
        Route::put('/store/chapter/{slug}', 'store')->name('store.chapter');
        //  Route::get('/show/chapters', 'index')->name('show.chapters');
        Route::get('/show/chapter/{slug}', 'show')->name('show.chapter'); // single
        Route::get('/edit/chapter/{slug}', 'edit')->name('edit.chapter');
        Route::patch('/update/chapter/{slug}', 'update')->name('update.chapter');
        Route::get('/delete/chapter/{slug}', 'destroy')->name('delete.chapter');
    });

    // chapter
    Route::controller(LessonsController::class)->group(function ()
    {
        Route::get('/add/lesson/{slug}', 'create')->name('add.lesson');
        Route::put('/store/lesson/{slug}', 'store')->name('store.lesson');
        // Route::get('/show/lessons', 'index')->name('show.lessons');
        Route::get('/show/lesson/{slug}', 'show')->name('show.lesson'); // single
        Route::get('/edit/lesson/{slug}', 'edit')->name('edit.lesson');
        Route::patch('/update/lesson/{slug}', 'update')->name('update.lesson');
        Route::get('/delete/lesson/{slug}', 'destroy')->name('delete.lesson');
    });
});
