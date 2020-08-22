<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(
            'App\Repositories\Contracts\StudentRepositoryInterface',
            'App\Repositories\StudentRepository'
        );


        $this->app->bind(
            'App\Repositories\Contracts\CourseRepositoryInterface',
            'App\Repositories\CourseRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\EnrolmentRepositoryInterface',
            'App\Repositories\EnrolmentRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\WaitListRepositoryInterface',
            'App\Repositories\WaitListRepository'
        );
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
