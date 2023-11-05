<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/home', function () {
    return redirect('/');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); //dashboard

    // data
    Route::get('/data', [DataController::class, 'index'])->name('view-data'); //view data
    Route::get('/insert-data', [DataController::class, 'insert'])->name('insert-data'); //view form insert data
    Route::post('/post-data', [DataController::class, 'store'])->name('insert-data'); //proses insert data
    Route::get('/report', [DataController::class, 'report'])->name('report-data');

    // user
    Route::get('/user', [UserController::class, 'index'])->name('user-data');
    Route::get('/insert-user', [UserController::class, 'insert'])->name('insert-user');
    Route::post('/store-user', [UserController::class, 'store'])->name('store-user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('store-user');
    Route::put('/update-user', [UserController::class, 'update'])->name('update-user');

    // auth
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
