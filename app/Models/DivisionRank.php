<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class DivisionRank extends Model
{
    use HasFactory;

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }
}
