<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ethnic extends Model
{
    use HasFactory;
    public function staff(){
        return $this -> hasMany(Staff::class);
    }
}
