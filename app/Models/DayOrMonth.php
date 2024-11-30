<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayOrMonth extends Model
{
    use HasFactory;

    
   

        public function LeaveTypes()
{
    return $this->hasMany(LeaveType::class);
}

public function leaves()
{
    return $this->hasMany(Leave::class);
}

    

}
