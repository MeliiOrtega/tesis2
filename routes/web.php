<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\UserCourseController;
use App\Http\Livewire\CourseStatus;
use App\Http\Livewire\Register;
/*
Route::get('/', HomeController::class)->name('home'); //WELCOME
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/', HomeController::class)->name('home');

Route::get('cursos', [CourseController::class,'index'])->name('courses.index');

Route::get('/registerv',[RegisterController::class, 'index'])->name('register.voluntary');


Route::get('category/{category}',  [CourseController::class, 'category'])->name('courses.category');


Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

//Matricular
Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

//Route::get('course-status/{course}',[CourseController::class, 'status'])->name('courses.status');

//CON ESTO TRABAJA EL LIVEWARE
Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

Route::get('user/course', [UserCourseController::class, 'index'])->name('usercourse');


