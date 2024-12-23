<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abroad extends Model
{
    use HasFactory;

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'abroad_countries');
    }
}
