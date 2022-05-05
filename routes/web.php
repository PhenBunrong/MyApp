<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;

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
    return view('layouts.master');
});

 Route::resource('teacher','TeacherController');
//  Route::get('teacher/delete/{id}',[TeacherController::class,'delete'])->name('teacher_destroy');

 Route::resource('class','ClassController');
 Route::get('class/delete/{id}',[ClassController::class,'delete'])->name('class_destroy');

 Route::resource('subject','SubjectController');

 Route::resource('student','StudentController');
//  Route::get('student/delete/{id}',[StudentController::class,'delete'])->name('student_delete');
