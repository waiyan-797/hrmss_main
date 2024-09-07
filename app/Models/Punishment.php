<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punishment extends Model
{
    use HasFactory;

    public function penalty_type(){
        return $this->belongsTo(PenaltyType::class);
    }
}
