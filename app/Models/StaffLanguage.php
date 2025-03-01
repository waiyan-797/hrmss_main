<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffLanguage extends Model
{
    use HasFactory;

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function language(){
        return $this->belongsTo(Language::class);
    }
}
