<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Public routes - Home page and experts view
Route::get('/', [ExpertController::class, 'publicIndex'])->name('home');
Route::get('/experts', [ExpertController::class, 'publicIndex'])->name('experts.public');

// Authentication required routes
Route::middleware(['auth'])->group(function () {

    // Authenticated user dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');  // Make sure this view exists!
    })->name('dashboard');  // This is where users are redirected after login

    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes - Accessible only by admin users
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Admin dashboard route
    Route::get('/dashboard', function () {
        return view('admin.dashboard');  // Make sure this view exists!
    })->name('admin.dashboard');  // This is for the admin dashboard

    // Admin resource routes for managing experts and skills
    Route::resource('experts', ExpertController::class)->except(['show']);
    Route::resource('skills', SkillController::class)->except(['show']);
});

// Authentication scaffolding (login, register, etc.)
require __DIR__.'/auth.php';
