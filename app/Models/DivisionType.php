<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionType extends Model
{
    use HasFactory;
    
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
    public function staffCount()
    {
        return $this->divisions->map(fn($division) => $division->staffCountTotal())->sum();
    }

    public function leaveCount($yearmonth){
        return $this->divisions->map(fn($division) => $division->leaveCount($division->id , $yearmonth))->sum();

    }


    public function leaveCountWithLeaveTypeForDivisionType( $YearMonth, $leaveTypeId)
    {
    
        return $this->divisions->map(fn($division) => $division->leaveCountWithLeaveType($division->id , $YearMonth , $leaveTypeId))->sum();

        
    }

}
