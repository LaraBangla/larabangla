<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use App\Http\Controllers\Admin\Versions\VersonController;
use App\Http\Controllers\Admin\Division\DivisionController;
use App\Http\Controllers\Admin\Technology\TechnologyController;
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

    $md = file_get_contents( storage_path('/docs.md'));
    $data = $converter->convert($md);



// <h1>Hello World!</h1>
    return view('frontend.docs.index',compact('data'));
})->name('docs');


// dashboard
Route::middleware(['auth','verified'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('backend.backend_header_footer');
    })->name('dashboard');

   // Route::get('/add/technology',[TechnologyController::class,'create'])->name('add.technology');




    /**
     * admin
     * -------------------------
     */
    // division routes
    Route::controller(DivisionController::class)->group(function () {
        Route::get('/add/division', 'create')->name('add.division');
        Route::put('/store/division', 'store')->name('store.division');
        Route::get('/all/divisions', 'show')->name('show.division');
        Route::get('/edit/division/{id}', 'edit')->name('edit.division');
        Route::patch('/update/division/{id}', 'update')->name('update.division');
        Route::get('/delete/division/{id}', 'destroy')->name('delete.division');
    });

    Route::controller(TechnologyController::class)->group(function () {
        Route::get('/add/technology', 'create')->name('add.technology');
        Route::put('/store/technology', 'store')->name('store.technology');
        Route::get('/technologies', 'index')->name('all.technologies');
        Route::get('/show/technology/{id}', 'show')->name('show.technology');
        Route::get('/edit/technology/{id}', 'edit')->name('edit.technology');
        Route::patch('/update/technology/{id}', 'update')->name('update.technology');
        Route::get('/delete/technology/{id}', 'destroy')->name('delete.technology');
    });

    // version
    Route::controller(VersonController::class)->group(function () {
        Route::get('/add/version', 'create')->name('add.version');
        Route::put('/store/version', 'store')->name('store.version');
        Route::get('/show/versions', 'index')->name('show.versions');
        Route::get('/edit/version/{id}', 'edit')->name('edit.version');
        Route::patch('/update/version/{id}', 'update')->name('update.version');
        Route::get('/delete/version/{id}', 'destroy')->name('delete.version');
    });
});


