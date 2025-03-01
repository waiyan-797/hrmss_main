<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }




    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }


    public function previousRank()
    {
        return $this->belongsTo(Rank::class, 'previous_rank_id');
    }
}
