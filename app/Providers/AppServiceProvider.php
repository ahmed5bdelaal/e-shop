<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\setting;
use App\Models\Notice;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
         $settings=setting::first();
        $categorys=Category::all();
        $notices=Notice::where('read_at',null)->get();
        View::share('notices', $notices);
        View::share('categorys', $categorys);
       View::share('settings', $settings);
        Schema::defaultStringLength(191);
    }
}
