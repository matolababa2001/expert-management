<?php

use App\Http\Controllers\ExpertController;
use App\Http\Controllers\SkillController;

Route::get('/', [ExpertController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('experts', ExpertController::class);
});



// web.php
Route::get('/experts', [ExpertController::class, 'index'])->name('experts.index');
Route::get('/experts/{expert}', [ExpertController::class, 'show'])->name('experts.show');
require __DIR__.'/auth.php';




