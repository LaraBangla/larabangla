<?php

namespace App\Providers;

use App\Models\Frontend\Technology\TechnologyDivision;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $boot_tech_division = TechnologyDivision::all();
        view()->share('boot_tech_division', $boot_tech_division);
    }
}
