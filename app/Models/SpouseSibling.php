<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpouseSibling extends Model
{
    use HasFactory;
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function ethnic()
    {
        return $this->belongsTo(Ethnic::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function relation()
    {
        return $this->belongsTo(Relation::class);
    }
}
