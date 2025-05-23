<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = 'admin/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        // call removeIndexPHPFromURL() function for removing /index.php url
        $this->removeIndexPHPFromURL();
        $this->configureRateLimiting();


        $this->routes(function ()
        {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->group(base_path('routes/jetstream.php'));

            Route::middleware('web')
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->group(base_path('routes/user.php'));
        });
    }


    // added for remove /index.php url || that code added manually
    protected function removeIndexPHPFromURL()
    {
        if (Str::contains(request()->getRequestUri(), '/index.php/'))
        {
            $url = str_replace('index.php/', '', request()->getRequestUri());

            if (strlen($url) > 0)
            {
                header("Location: $url", true, 301);
                exit;
            }
        }
        elseif (Str::contains(request()->getRequestUri(), '/index.php'))
        {
            $url = str_replace('index.php', '', request()->getRequestUri());

            if (strlen($url) > 0)
            {
                header("Location: $url", true, 301);
                exit;
            }
        }

    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request)
        {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
