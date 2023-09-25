<?php

namespace App\Providers;

use App\View\Components\Navbar;
use App\View\Components\SideBar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('Navbar', Navbar::class);
        Blade::component("SideBar", SideBar::class);
    }
}
