<?php

namespace App\Providers;

use App\Helpers\BreadcrumbHelper;
use Illuminate\Pagination\Paginator;
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
        view()->composer('*', function ($view) {
            $view->with('breadcrumbs', BreadcrumbHelper::generate());
        });
        Paginator::useBootstrap();
    }
}
