<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payscale extends Model
{
    use HasFactory;
    public function staff_type()
    {
        return $this->belongsTo(StaffType::class);
    }

    public function ranks()
    {
        return $this->hasMany(Rank::class);
    }
    public function staff(){
        return $this -> hasMany(Staff::class);
    }
}
