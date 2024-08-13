<?php

use App\Livewire\TrainingType;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::get('/training_type', TrainingType::class)->name('training_type');
});

require __DIR__.'/auth.php';
