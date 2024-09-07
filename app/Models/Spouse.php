<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

    public function ethnic(){
        return $this->belongsTo(Ethnic::class);
    }

    public function religion(){
        return $this->belongsTo(Religion::class);
    }
}
