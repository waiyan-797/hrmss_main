<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffType extends Model
{
    use HasFactory;
    public function payscales()
    {
        return $this->hasMany(Payscale::class);
    }

    public function ranks()
    {
        return $this->hasMany(Rank::class);
    }
}
