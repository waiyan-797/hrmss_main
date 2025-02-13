<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public function education_type()
    {
        return $this->belongsTo(EducationType::class);
    }


    public function education_group()
    {
        return $this->hasOneThrough(
            EducationGroup::class,  // Final target model
            EducationType::class,   // Intermediate model
            'id',                   // Foreign key on EducationType table
            'id',                   // Foreign key on EducationGroup table
            'education_type_id',     // Foreign key on Education table
            'education_group_id'     // Foreign key on EducationType table
        );
    }


}
