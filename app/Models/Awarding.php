<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awarding extends Model
{
    use HasFactory;

    public function award_type(){
        return $this->belongsTo(AwardType::class);
    }

    public function award(){
        return $this->belongsTo(Award::class);
    }
}
