<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrapFive();
        View::composer(['front.*', 'layouts.*', 'admin.*'], function ($view) {
            $setting = Setting::first() ?? new Setting();
            $bannerData = Banner::get();
            $categoriesdata = Category::with('subcategories.subcategories.products')->whereNull('parent_id')->get();

            $view->with([
                'setting' => $setting,
                'categoriesdata' => $categoriesdata,
                'bannerData' => $bannerData
            ]);
        });
    }
}
