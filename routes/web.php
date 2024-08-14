<?php

use App\Livewire\AwardType\AwardType;
use App\Livewire\BloodType\BloodType;
use App\Livewire\Country\Country;
use App\Livewire\Education\Education;
use App\Livewire\EducationGroup\EducationGroup;
use App\Livewire\EducationType\EducationType;
use App\Livewire\Ethnic\Ethnic;
use App\Livewire\Gender\Gender;
use App\Livewire\Nationality\Nationality;
use App\Livewire\PenaltyType\PenaltyType;
use App\Livewire\PensionType\PensionType;
use App\Livewire\Post\Post;
use App\Livewire\Religion\Religion;
use App\Livewire\Staff;
use App\Livewire\StaffType\StaffType;
use App\Livewire\TrainingLocation\TrainingLocation;
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

Route::get('/staff', Staff::class);
Route::get('/staff_type', StaffType::class)->name('staff_type');
Route::get('/award_type', AwardType::class)->name('award_type');
Route::get('/blood_type', BloodType::class)->name('blood_type');
Route::get('/post', Post::class)->name('post');
Route::get('/nationality', Nationality::class)->name('nationality');
Route::get('/country', Country::class)->name('country');
Route::get('/education_group', EducationGroup::class)->name('education_group');
Route::get('/education_type', EducationType::class)->name('education_type');
Route::get('/education', Education::class)->name('education');
Route::get('/penalty_type', PenaltyType::class)->name('penalty_type');
Route::get('/pension_type', PensionType::class)->name('pension_type');
Route::get('/training_location', TrainingLocation::class)->name('training_location');
Route::get('/ethnic', Ethnic::class)->name('ethnic');
Route::get('/religion', Religion::class)->name('religion');
Route::get('/gender', Gender::class)->name('gender');

require __DIR__.'/auth.php';
