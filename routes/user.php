<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doc\DocController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Contact\ContactController;
use App\Http\Controllers\Frontend\ComingSoon\ComingSoonController;
use App\Http\Controllers\SocialLogin\SocialLoginController;

Route::controller(HomeController::class)->group(function ()
{
    Route::get('/', 'index')->name('/');
    Route::get('/about', 'about_us')->name('about.us');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/tutorials', 'tutorials')->name('tutorials');
});




Route::controller(ContactController::class)->group(function ()
{
    Route::get('/contact', 'index')->name('contact');
    Route::put('/contact', 'store')->name('contact.store');
});


// coming soon pages
Route::controller(ComingSoonController::class)->group(function ()
{
    Route::get('/public', 'public')->name('public');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/forum', 'forum')->name('forum');
    Route::get('/question', 'question')->name('question');
    Route::get('/help', 'help')->name('help');
    Route::get('/sitemap', 'sitemap')->name('sitemap');
    Route::get('/livewire', 'livewire')->name('livewire');
    Route::get('/community', 'community')->name('community');
    Route::get('/online-course', 'onlineCourse')->name('online.course');
    Route::get('/web-design-and-development', 'webDesignAndDevelopment')->name('web.design.and.development');
    Route::get('/apps-development', 'appsDevelopment')->name('apps.development');
    Route::get('/software-development', 'softwareDevelopment')->name('software.development');
});


Route::controller(SocialLoginController::class)->group(function ()
{
    Route::get('/auth/{provider}', 'redirect')->name('socialLogin.redirect');
    Route::get('auth/{provider}/callback', 'callback')->name('socialLogin.callback');
});

// those route should always be at bottom || tutorials routes
Route::controller(DocController::class)->group(function ()
{
    Route::get('/{technology_slug}', 'sendToDocs')->name('send.to.docs');
    Route::get('/{technology_slug}/{version_slug}', 'sendToDocsVersion')->name('send.to.docs.version');
    Route::get('/{technology_slug}/{version_slug}/{chapter_slug}/{lesson_slug}', 'index')->name('docs');
});

