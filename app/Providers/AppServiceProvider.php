<?php

namespace App\Providers;

use App\Models\Frontend\Technology\Technology;
use App\Models\Frontend\Technology\TechnologyDivision;
use Illuminate\Support\ServiceProvider;
use Rakibhstu\Banglanumber\NumberToBangla;

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
        $boot_tech = Technology::whereStatus(1)->get();

        // present year
        $numto = new NumberToBangla();
        $present_year = $numto->bnNum(date('Y'));

        view()->share('boot_tech_division', $boot_tech_division);
        view()->share('boot_tech', $boot_tech);
        view()->share('present_year', $present_year);
    }
}
