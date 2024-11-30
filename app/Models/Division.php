<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function divisionType()
    {
        return $this->belongsTo(DivisionType::class);
    }
    public function staffs()
    {
        return $this->hasMany(Staff::class, 'current_division_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultyLevel::class);
        
    }

    public function leaveCount($division, $YearMonth)
    {
        [$year, $month] = explode('-', $YearMonth);
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        foreach ($staffs as $staff) {
            $leave = Leave::Where('staff_id', $staff->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->distinct('staff_id')->count('staff_id');
            $totalLeaveCount += $leave;
        }
        return $totalLeaveCount;
    }
    public function leaveCountWithLeaveType($division, $YearMonth, $leaveTypeId)
    {
        [$year, $month] = explode('-', $YearMonth);
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        foreach ($staffs as $staff) {
            $leave = Leave::where('staff_id', $staff->id)->where('leave_type_id', $leaveTypeId)->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
            $totalLeaveCount += $leave;
        }
        return $totalLeaveCount;
    }

    public function staffCountTotal(){
        return   Staff::where("current_division_id", $this->id)->count();
    }
    public function leaves()
{
    return $this->hasMany(Leave::class, 'current_division_id');
}


    
   
}

