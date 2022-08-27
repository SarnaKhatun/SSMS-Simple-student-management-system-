<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Front\HomeController;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\CourseController;

use App\Http\Controllers\EnrollController;

use App\Http\Controllers\Admin\AdminController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::middleware('is_admin')->group(function (){
        Route::resource('users', UserController::class);
        Route::get('/users-change-status/{id}', [UserController::class , 'UsersChangeStatus'])->name('users.change-status');
        Route::get('/manage-enroll', [AdminController::class, 'manage'])->name('manage.enroll');
        Route::get('/enroll-change-status/{id}', [AdminController::class, 'changeStatus'])->name('enroll.change-status');
        Route::get('/delete-enroll/{id}', [AdminController::class, 'delete'])->name('delete.enroll');
    });

    Route::middleware('is_admin_teacher')->group(function (){
        Route::resource('courses', CourseController::class);
        Route::get('/courses-change-status/{id}', [CourseController::class, 'changeStatus'])->name('courses.change-status');

    });

    Route::middleware('is_teacher_student')->group(function (){
        Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('edit.profile');
        Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update.profile');
    });
});
