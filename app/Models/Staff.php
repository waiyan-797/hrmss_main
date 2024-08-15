<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public function staff_educations(){
        return $this->hasMany(StaffEducation::class, 'staff_id', 'id');
    }
}
