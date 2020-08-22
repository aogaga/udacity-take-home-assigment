<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GeneralServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Infrastructure\CourseServiceInterface', 'App\Service\CourseService');
        $this->app->bind('App\Infrastructure\StudentServiceInterface', 'App\Service\StudentService');
        $this->app->bind('App\Infrastructure\ResponseBuilderServiceInterface', 'App\Service\ResponseBuilderService');
        $this->app->bind('App\Infrastructure\ValidationServiceInterface', 'App\Service\ValidationService');
        $this->app->bind('App\Infrastructure\EnrolmentServiceInterface', 'App\Service\EnrolmentService');
        $this->app->bind('App/Infrastructure\WaitListServiceInterface', 'App\Service\WaitListService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
