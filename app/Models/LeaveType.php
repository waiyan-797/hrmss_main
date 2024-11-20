<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;


    // public function dayOrMonth()
    // {
    //     return $this->belongsTo(DayOrMonth::class, 'day_or_month_id', 'id');
    // }

    public function dayOrMonth()
{
    return $this->belongsTo(DayOrMonth::class);
}

public function leaves()
{
    return $this->hasMany(Leave::class);
}




}
