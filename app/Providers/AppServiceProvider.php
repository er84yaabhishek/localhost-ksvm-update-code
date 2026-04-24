<?php

// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Http\Request;
// use Illuminate\Routing\UrlGenerator;

// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      */
//     public function register(): void
//     {
//         //
//     }

//     /**
//      * Bootstrap any application services.
//      */
//     public function boot(): void
//     {
//         //
        
//         URL::forceRootUrl(config('app.url')); // Ensures Laravel uses APP_URL

//         // Override the asset() function globally
//         app()->singleton('url', function ($app) {
//             return new class($app['router']->getRoutes(), $app['request']) extends UrlGenerator {
//                 public function asset($path, $secure = null)
//                 {
//                     return parent::asset('public/' . ltrim($path, '/'), $secure);
//                 }
//             };
//         });
//     }
// }


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;
use App\Models\NavMenuItem;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share site settings & nav menu with ALL frontend views
        View::composer('frontend.layout.*', function ($view) {
            try {
                $siteSettings = SiteSetting::getAllSettings();
                // Merge defaults so nothing is ever empty
                $siteSettings = array_merge(SiteSetting::defaults(), $siteSettings);

                $navMenuItems = NavMenuItem::active()->ordered()->get();

                $view->with('siteSettings', $siteSettings)
                     ->with('navMenuItems', $navMenuItems);
            } catch (\Exception $e) {
                // Table not yet created (first deploy) — use defaults
                $view->with('siteSettings', SiteSetting::defaults())
                     ->with('navMenuItems', collect([]));
            }
        });
    }
}





 
