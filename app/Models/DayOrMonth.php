<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayOrMonth extends Model
{
    use HasFactory;

    
    // public function leaveTypes()
    // {
    //     return $this->hasMany(LeaveType::class, 'day_or_month_id');
    // }

        public function leaveTypes()
{
    return $this->hasMany(LeaveType::class);
}

public function leaves()
{
    return $this->hasMany(Leave::class);
}

    

}
