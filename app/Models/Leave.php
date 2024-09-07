<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;


public function staff()
{
    return $this->belongsTo(Staff::class);
}

public function leaveType()
{
    return $this->belongsTo(LeaveType::class);
}

public function dayOrMonth()
{
    return $this->belongsTo(DayOrMonth::class);
}

}
