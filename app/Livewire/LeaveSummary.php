<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\DivisionType;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;

class LeaveSummary extends Component
{

    public $year, $month;
    public $leave_types;
    
    public $HeadOfficeLeaves , $DivisionLeaves ;
    public $divisionTypes; 
public $dateRange;
    public function mount()
    {

        $this->dateRange = Carbon::now()->format('Y-m');
       
$this->leave_types = LeaveType::all();
$this->divisionTypes = DivisionType::all();
        
    }

  
    public function render()
    {
        [$this->year , $this->month] = explode('-', $this->dateRange);
        $leave_types = LeaveType::all();

       
        // $totalLeaveTypeCounts = [];
        foreach($this->divisionTypes as $divisionType){
            foreach ($divisionType->divisions as $division) {
             
    
                // foreach ($leave_types as $leave_type) {
                //     $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);
    
                //     $totalLeaveTypeCounts[$leave_type->id] = ($totalLeaveTypeCounts[$leave_type->id] ?? 0) + $leaveTypeCount;
                // }
            }
        }
      
        return view('livewire.leave-summary' ,
 
    );
    }

    public function leaveCount($division)
    {
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        
        foreach ($staffs as $staff) {
            
            $leave = Leave::whereYear('created_at', $this->year)
                ->whereMonth('created_at', $this->month)
                ->where('staff_id', $staff->id)
                ->distinct('staff_id')
                ->count('staff_id');
                // if($staff->id == 3 ){
                //     dd($leave);
                // }
            $totalLeaveCount += $leave;

        }
        return $totalLeaveCount;
    }

    public function leaveType($division, $leave_type_id)
    {
        $totalCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();

        foreach ($staffs as $staff) {
            $leaveCount = Leave::where('staff_id', $staff->id)
                ->where('leave_type_id', $leave_type_id)
                ->whereYear('created_at', $this->year)
                ->whereMonth('created_at', $this->month)

                ->count();
            $totalCount += $leaveCount;
        }

        return $totalCount;
    }

}
