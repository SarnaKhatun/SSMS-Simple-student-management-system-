<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\EnrollController;

Route::get('/', [HomeController::class, 'front'])->name('/');
Route::get('/course-details/{id}', [HomeController::class, 'courseDetails'])->name('course-details');
Route::post('/enroll-course', [EnrollController::class, 'enroll'])->name('course.enroll');
