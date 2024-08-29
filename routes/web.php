<?php

use App\Livewire\Award\Award;
use App\Livewire\AwardType\AwardType;
use App\Livewire\BloodType\BloodType;
use App\Livewire\Country\Country;
use App\Livewire\District\District;
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
use App\Livewire\Payscale\Payscale;
use App\Livewire\PensionYear;
use App\Livewire\Rank\Rank;
use App\Livewire\Region;
use App\Livewire\Relation;
use App\Livewire\StaffDetail;
use App\Livewire\Section\Section;
use App\Livewire\Township\Township;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::get('/training_type', TrainingType::class)->name('training_type');
    Route::get('/relation', Relation::class)->name('relation');
    Route::get('/division', Division::class)->name('division');
    Route::get('/region', Region::class)->name('region');
    Route::get('/district', District::class)->name('district');
    Route::get('/township', Township::class)->name('township');
    Route::get('/pension_year',PensionYear ::class)->name('pension_year');
    Route::get('/staff', Staff::class)->name('staff');
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
    Route::get('/staff_detail/{confirm_add?}/{confirm_edit?}/{staff_id?}/{tab?}', StaffDetail::class)->name('staff_detail');
    Route::get('/file/{path}', function($path){
        if(File::exists(storage_path('app/upload/').$path)){
            return response()->file(storage_path('app/upload/').$path);
        } else {
            abort(404, 'File Not Found');
        }
    })->name('file')->where('path', '.*');
});


require __DIR__.'/auth.php';
