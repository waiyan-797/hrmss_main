<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    public function training_type()
    {
        return $this->belongsTo(TrainingType::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function training_location(){
        return $this->belongsTo(TrainingLocation::class);
    }

    public function staff_educations()
    {
        return $this->hasMany(StaffEducation::class);
    }
}
