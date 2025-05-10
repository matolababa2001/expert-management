<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::get('/', [ExpertController::class, 'publicIndex'])->name('home');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('skills', SkillController::class);
    Route::resource('experts', ExpertController::class)->except(['index']);
});

// This route remains accessible for everyone (displays all experts)
Route::get('/experts', [ExpertController::class, 'index']);
Route::resource('experts', ExpertController::class);


// Profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth scaffolding
require __DIR__.'/auth.php';
