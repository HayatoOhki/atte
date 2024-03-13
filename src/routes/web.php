<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index']);
    Route::get('/attendance', [AttendanceController::class, 'attendance']);
    Route::get('/user', [UserController::class, 'user']);
    Route::get('/user/{id}', [UserController::class, 'show']);
});

Route::put('/attendance', [AttendanceController::class, 'attendance']);
Route::patch('/attendance', [AttendanceController::class, 'clock']);
Route::patch('/break', [AttendanceController::class, 'break']);
