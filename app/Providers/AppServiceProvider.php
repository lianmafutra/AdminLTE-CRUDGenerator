<?php

namespace App\Providers;

use App\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        // view()->composer('layouts.sidebar', function ($view) {
      
        //     $menu = Menu::first();
        //     // dd(json_decode($menu->json));
        //     // $menu = Storage::disk('local')->get('menu.json');
        //     $menu = json_decode($menu->json);
        //     $view->with('menu', $menu);
        
        // });
    }
}
