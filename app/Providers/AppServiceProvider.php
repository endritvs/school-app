<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        
        // @admin @endadmin
        Blade::directive('admin', function () {
            return "<?php if (Auth::user()->role_id===1): ?>";
        });
        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        // @teacher  @endteacher
        Blade::directive('teacher', function () {
            return "<?php if (Auth::user()->role_id===2): ?>";
        });
        Blade::directive('endteacher', function () {
            return "<?php endif; ?>";
        });

        // @student  @endstudent
        Blade::directive('student', function () {
            return "<?php if (Auth::user()->role_id===3): ?>";
        });
        Blade::directive('endstudent', function () {
            return "<?php endif; ?>";
        });
    }
}
