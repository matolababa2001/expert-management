<?php

use App\Http\Controllers\ExpertController;
use App\Http\Controllers\SkillController;

Route::get('/', [ExpertController::class, 'index'])->name('experts.public');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('experts', ExpertController::class);
    Route::resource('skills', SkillController::class);
});

