<?php

use App\Http\Controllers\Admin\DepartmentCotroller;
use App\Http\Controllers\Admin\RequestListCotroller;
use App\Http\Controllers\Admin\UserCotroller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user', [UserCotroller::class, 'index'])->name('user');
Route::get('/assign', [UserCotroller::class, 'assign'])->name('assign');
Route::get('/department', [DepartmentCotroller::class, 'index'])->name('department');
Route::get('/leave-mission', [DepartmentCotroller::class, 'leaveMission'])->name('leave-mission');
Route::get('/leave', [DepartmentCotroller::class, 'leave'])->name('leave');
Route::get('/request-leave', [RequestListCotroller::class, 'requestLeave'])->name('request-leave');
Route::get('/mission', [DepartmentCotroller::class, 'mission'])->name('mission');
Route::get('/request-mission', [RequestListCotroller::class, 'requestMission'])->name('request-mission');

Auth::routes();
