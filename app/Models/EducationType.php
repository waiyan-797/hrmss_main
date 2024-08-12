<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationType extends Model
{
    use HasFactory;
    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function education_group()
    {
        return $this->belongsTo(EducationGroup::class);
    }
}
