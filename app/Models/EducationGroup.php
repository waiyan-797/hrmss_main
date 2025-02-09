<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationGroup extends Model
{
    use HasFactory;

    public function educationType()
    {
        return $this->hasMany(EducationType::class);
    }
    public function staffEducations()
    {
        return $this->hasMany(StaffEducation::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }




}
