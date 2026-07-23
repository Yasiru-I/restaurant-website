<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\MenuController;
use App\Http\Controllers\AdminAuthController;

// Admin Login Route
Route::view('/admin/login', 'auth.admin-login')->name('admin.login');

// Admin Login Logic eka process karana POST route eka
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');