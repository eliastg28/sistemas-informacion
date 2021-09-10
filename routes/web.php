<?php
use App\Http\Controllers\homeController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\MailController;
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


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route::resource('student', StudentController::class)->middleware('auth');
Route::get('/student', [StudentController::class, 'index'])->name('student.index')->middleware('auth');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create')->middleware('auth');
Route::post('/student', [StudentController::class, 'store'])->name('student.store')->middleware('auth');
Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit')->middleware('auth');
Route::post('/student/update/{student}', [StudentController::class, 'update'])->name('student.update')->middleware('auth');

Route::get('/mail/{student}', [MailController::class, 'sendMail'])->name('mail')->middleware('auth');
Route::get('/birthday', [ControlController::class, 'birthdayStudents'])->name('birthday')->middleware('auth');

Route::get('/analytics', [ControlController::class, 'analytics'])->name('analytics')->middleware('auth');
Route::get('/history', [ControlController::class, 'history'])->name('history')->middleware('auth');
Route::get('/history/detail/{user}', [ControlController::class, 'detail'])->name('history.detail')->middleware('auth');
Route::get('/history/audit/detail/{audit}', [ControlController::class, 'methods'])->name('history.history')->middleware('auth');
