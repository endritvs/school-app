<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassCourseGroupController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseGroupController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Calendar;
use App\Models\Event;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(!Auth::user()){
        return view('auth/login');
    }else if(Auth::user()->role_id===1){
        return redirect('/dashboard');
    }else if(Auth::user()->role_id===2){
        return redirect('teacher');
    }else{
        return redirect('student');
    }
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin routes
    Route::group(['middleware' => ['admin']], function () {
    Route::prefix('/dashboard')->group(function () {
        // users routes
            Route::get('/',[UserController::class,'index'])->name('all.users');
            Route::post('/add',[UserController::class,'store'])->name('store.user');
            Route::post('/{id}',[UserController::class,'update'])->name('update.user');
            Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
            // roles routes
            Route::prefix('/roles')->group(function () {
                Route::get('/',[RolesController::class,'index'])->name('all.roles');
                Route::post('/add',[RolesController::class,'store'])->name('store.role');
                Route::post('/{id}',[RolesController::class,'update'])->name('update.role');
                Route::delete('/destroy/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
            });
            //courses routes
            Route::prefix('/course')->group(function () {
                Route::get('/',[CourseController::class,'index'])->name('all.courses');
                Route::post('/add',[CourseController::class,'store'])->name('store.course');
                Route::post('/{id}',[CourseController::class,'update'])->name('update.course');
                Route::delete('/destroy/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

                //groups
                Route::prefix('/groups')->group(function () {
                    Route::get('/',[CourseGroupController::class,'index'])->name('all.courses.groups');
                    Route::post('/add',[CourseGroupController::class,'store'])->name('store.course.groups');
                    Route::post('/{id}',[CourseGroupController::class,'update'])->name('update.course.groups');
                    Route::delete('/destroy/{id}', [CourseGroupController::class, 'destroy'])->name('course.groups.destroy');
                });
            });
            Route::prefix('/curriculum')->group(function () {
                Route::get('/',[CurriculumController::class,'index'])->name('all.curriculums');
                Route::post('/add',[CurriculumController::class,'store'])->name('store.curriculum');
                Route::post('/{id}',[CurriculumController::class,'update'])->name('update.curriculum');
                Route::delete('/destroy/{id}', [CurriculumController::class, 'destroy'])->name('curriculum.destroy');
            });
        
            //event
            Route::prefix('/event')->group(function () {
                Route::get('/admin',[EventController::class,'adminIndex'])->name('all.events.admin');
                Route::get('/',[EventController::class,'index'])->name('all.events');
                Livewire::component('calendar', Calendar::class);
                Route::post('/add',[EventController::class,'store'])->name('store.event');
                Route::post('/{id}',[EventController::class,'update'])->name('update.event');
                Route::delete('/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy');
            });

             //class
            Route::prefix('/class')->group(function () {
               Route::get('/',[ClassController::class,'index'])->name('all.classes');
               Route::post('/add',[ClassController::class,'store'])->name('store.class');
               Route::post('/{id}',[ClassController::class,'update'])->name('update.class');
               Route::delete('/destroy/{id}', [ClassController::class, 'destroy'])->name('class.destroy');
            });

            // class-course-groups
            Route::prefix('/class-course-groups')->group(function () {
                Route::get('/',[ClassCourseGroupController::class,'index'])->name('all.class.course.groups');
                Route::post('/add',[ClassCourseGroupController::class,'store'])->name('store.class.course.group');
                Route::post('/{id}',[ClassCourseGroupController::class,'update'])->name('update.class.course.group');
                Route::delete('/destroy/{id}', [ClassCourseGroupController::class, 'destroy'])->name('class.course.group.destroy');
             });

        });
    });

    Route::group(['middleware' => ['teacher']], function () {
        Route::prefix('/teacher')->group(function () {
            Route::get('/',[CourseGroupController::class,'getCourseGroupForTeacher'])->name('teacher.course.groups');
            Route::get('/events',[EventController::class,'index'])->name('teacher.events');
            Livewire::component('calendar', Calendar::class);
       });
    });

    Route::group(['middleware' => ['student']], function () {
        Route::prefix('/student')->group(function () {
            Route::get('/',[CourseGroupController::class,'getCourseGroupForStudent'])->name('student.course.groups');
            Route::get('/events',[EventController::class,'index'])->name('student.events');
            Livewire::component('calendar', Calendar::class);
       });
    });
});

require __DIR__.'/auth.php';
