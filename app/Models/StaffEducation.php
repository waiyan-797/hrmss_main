<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffEducation extends Model
{
    use HasFactory;

    public function education_group(){
        return $this->belongsTo(EducationGroup::class);
    }

    public function education_type(){
        return $this->belongsTo(EducationType::class);
    }

    public function education(){
        return $this->belongsTo(Education::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
    public function educationGroup()
    {
        return $this->belongsTo(EducationGroup::class);
    }

    public function educationType()
    {
        return $this->belongsTo(EducationType::class);
    }

   

}
