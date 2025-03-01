<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
}
