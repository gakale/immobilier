<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;

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

Route::get('/index', function () {
    return view('welcome');
});

Route::get('/showRegistrationForm', [TenantController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/register', [TenantController::class, 'register'])->name('register');
Route::get('/showLoginForm', [TenantController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [TenantController::class, 'login'])->name('login');
