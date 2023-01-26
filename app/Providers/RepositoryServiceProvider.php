<?php

namespace App\Providers;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserRoleRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\CourseGroupRepositoryInterface;
use App\Repositories\UserRoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\CourseRepository;
use App\Repositories\CourseGroupRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserRoleRepositoryInterface::class, UserRoleRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(CourseGroupRepositoryInterface::class, CourseGroupRepository::class);
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
