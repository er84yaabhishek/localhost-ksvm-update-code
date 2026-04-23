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
        //
    }
}





 
