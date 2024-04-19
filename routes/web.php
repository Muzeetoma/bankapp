<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;

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
Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboard')->middleware('auth');
Route::get('/transactions', [TransactionController::class, 'view'])->middleware('auth');
Route::get('/profile', [ProfileController::class, 'view'])->middleware('auth');

Route::get('/payments', [PaymentController::class, 'view'])->middleware('auth');
Route::post('/payments', [PaymentController::class, 'pay'])->middleware('auth');

Route::get('/', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/logout', [LogoutController::class, 'logout'])->middleware('auth');

Route::get('/verify', [VerifyController::class, 'view'])->middleware('guest');
Route::post('/verify', [VerifyController::class, 'verify'])->middleware('guest');

Route::get('/admin/create-user', [AdminController::class, 'view'])->middleware('auth');
Route::get('/admin/users', [AdminController::class, 'users'])->middleware('auth');
Route::post('/admin/create-user', [AdminController::class, 'createUser'])->middleware('auth');