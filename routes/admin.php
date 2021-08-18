<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('user', UserController::class)->only(['index','edit', 'update', 'destroy'])->names('users');

Route::resource('categories', CategoryController::class)->names('categories');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('courses/aprobados', [CourseController::class, 'aprobado'])->name('courses.aprobado'); //ACTIVIDADES APROBADAS

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
