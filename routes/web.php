<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// Route::resource('student', StudentController::class)->middleware('auth');
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index')->middleware('auth');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create')->middleware('auth');
Route::post('/student', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store')->middleware('auth');
Route::get('/student/edit/{student}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit')->middleware('auth');
Route::post('/student/update/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update')->middleware('auth');
