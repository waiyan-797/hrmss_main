<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardType extends Model
{
    use HasFactory;
    public function awards()
    {
        return $this->hasMany(Award::class);
    }
}
