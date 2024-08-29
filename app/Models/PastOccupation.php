<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastOccupation extends Model
{
    use HasFactory;

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
