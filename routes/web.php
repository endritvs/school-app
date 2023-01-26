<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseGroupController;
use App\Http\Controllers\StudentCourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    }else{
        return redirect('/dashboard');
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

            Route::prefix('/groups')->group(function () {
                Route::get('/',[CourseGroupController::class,'index'])->name('all.courses.groups');
                Route::post('/add',[CourseGroupController::class,'store'])->name('store.course.groups');
                Route::post('/{id}',[CourseGroupController::class,'update'])->name('update.course.groups');
                Route::delete('/destroy/{id}', [CourseGroupController::class, 'destroy'])->name('course.groups.destroy');
            });
        });

    });
});

require __DIR__.'/auth.php';
