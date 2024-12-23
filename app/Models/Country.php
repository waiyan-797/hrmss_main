<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function abroads()
    {
        return $this->belongsToMany(Abroad::class, 'abroad_countries');
    }
}
