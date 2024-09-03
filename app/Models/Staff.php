<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public function staff_educations()
    {
        return $this->hasMany(StaffEducation::class, 'staff_id', 'id');
    }

    public function ethnic()
    {
        return $this->belongsTo(Ethnic::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function blood_type(){
        return $this->belongsTo(BloodType::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
