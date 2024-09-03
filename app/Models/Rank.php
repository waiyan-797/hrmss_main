<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    public function payscale()
    {
        return $this->belongsTo(Payscale::class);
    }

    public function staff_type()
    {
        return $this->belongsTo(StaffType::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}
