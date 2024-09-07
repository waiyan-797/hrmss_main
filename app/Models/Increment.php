<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Increment extends Model
{
    use HasFactory;

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'increment_rank_id');
    }

}
