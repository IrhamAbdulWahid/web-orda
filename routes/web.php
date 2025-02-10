<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route umum
Route::get('/', function () {
    return view('welcome');
});

// Login Routes (Laravel 11)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Register Routes (Laravel 11)
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Role-based routes (Setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');

// Route dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route Profile (Edit, Update, Delete)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    });
});
