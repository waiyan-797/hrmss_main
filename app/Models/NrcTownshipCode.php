<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NrcTownshipCode extends Model
{
    use HasFactory;

    public function nrc_region_id(){
        return $this->belongsTo(NrcRegionId::class);
    }
}
