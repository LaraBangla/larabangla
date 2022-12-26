<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doc\DocController;
use App\Http\Controllers\Frontend\Home\HomeController;



Route::controller(HomeController::class)->group(function ()
{
    Route::get('/', 'index')->name('/');
    Route::get('/about-us', 'about')->name('about.us');
});


Route::controller(DocController::class)->group(function ()
{
    Route::get('/docs/{technology_slug}', 'sendToDocs')->name('send.to.docs');
    Route::get('/docs/{technology_slug}/{version_slug}', 'sendToDocsVersion')->name('send.to.docs.version');

    Route::get('/docs/{technology_slug}/{version_slug}/{chapter_slug}/{lesson_slug}', 'index')->name('docs');
});
