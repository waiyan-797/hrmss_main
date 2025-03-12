<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    // A school belongs to an education type
    public function education_type()
    {
        return $this->belongsTo(EducationType::class);
    }

}
