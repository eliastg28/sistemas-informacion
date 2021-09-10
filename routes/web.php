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

Route::get('/mail/{student}', [\App\Http\Controllers\MailController::class, 'sendMail'])->name('mail')->middleware('auth');
Route::get('/birthday', [\App\Http\Controllers\ControlController::class, 'birthdayStudents'])->name('birthday')->middleware('auth');

Route::get('/analytics', [\App\Http\Controllers\ControlController::class, 'analytics'])->name('analytics')->middleware('auth');
Route::get('/history', [\App\Http\Controllers\ControlController::class, 'history'])->name('history')->middleware('auth');
Route::get('/history/detail/{user}', [\App\Http\Controllers\ControlController::class, 'detail'])->name('history.detail')->middleware('auth');
Route::get('/history/audit/detail/{audit}', [\App\Http\Controllers\ControlController::class, 'methods'])->name('history.history')->middleware('auth');
