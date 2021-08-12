<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Livewire\CourseStatus;

Route::get('/', HomeController::class)->name('home'); //WELCOME

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class,'index'])->name('courses.index');


Route::get('category/{category}',  [CourseController::class, 'category'])->name('courses.category');


Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

//Matricular
Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

//Route::get('course-status/{course}',[CourseController::class, 'status'])->name('courses.status');

//CON ESTO TRABAJA EL LIVEWARE
Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');


