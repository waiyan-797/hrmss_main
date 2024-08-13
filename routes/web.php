<?php

use App\Livewire\Division;
use App\Livewire\TrainingType;
use App\Livewire\DivisionCrud;
use App\Livewire\PensionYear;
use App\Livewire\Region;
use App\Livewire\Relation;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::get('/training_type', TrainingType::class)->name('training_type');
    Route::get('/relation', Relation::class)->name('relation');
    Route::get('/division', Division::class)->name('division');
    Route::get('/region', Region::class)->name('region');
    Route::get('/pension_year',PensionYear ::class)->name('pension_year');

    Route::get('/divisions', DivisionCrud::class);
});

require __DIR__.'/auth.php';
