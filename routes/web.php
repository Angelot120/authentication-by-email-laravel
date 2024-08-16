<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Auth;

Route::get('/',[ViewsController::class, 'index'])->name('login');


Route::get('/login', [ViewsController::class, 'store'])->name('login');


Route::get('/registration', [ViewsController::class, 'create'])->name('registration');


Route::get('/logout', [ViewsController::class, 'destroy'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ViewsController::class, 'show'])->name('dashboard');
});


Route::post('/login/processing', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');




// Create User
Route::get('/show/user', [AuthController::class, 'show'])->name('user.show');
Route::post('/create/user', [AuthController::class, 'create'])->name('user.create');
Route::post('/create/{id}/destroy', [AuthController::class, 'destroy'])->name('user.delete');

Route::get('/create/{id}/update', [AuthController::class, 'update'])->name('user.update');
Route::post('/create/{id}/edit', [AuthController::class, 'edit'])->name('user.edit');
