<?php

namespace App\Providers;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserRoleRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\CourseGroupRepositoryInterface;
use App\Interfaces\CurriculumRepositoryInterface;
use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\ClassRepositoryInterface;
use App\Interfaces\ClassCourseGroupRepositoryInterface;
use App\Repositories\UserRoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\CourseRepository;
use App\Repositories\CourseGroupRepository;
use App\Repositories\CurriculumRepository;
use App\Repositories\EventRepository;
use App\Repositories\ClassRepository;
use App\Repositories\ClassCourseGroupRepository;
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
        $this->app->bind(CurriculumRepositoryInterface::class, CurriculumRepository::class);
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(ClassRepositoryInterface::class, ClassRepository::class);
        $this->app->bind(ClassCourseGroupRepositoryInterface::class, ClassCourseGroupRepository::class);
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
