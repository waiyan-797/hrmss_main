<?php

namespace App\Livewire;

use App\Exports\L03;
use App\Models\Division;
use App\Models\DivisionType;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

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
       
$this->leave_types = LeaveType::whereIn('id', range(1, 7))->get();

$this->divisionTypes = DivisionType::all();
        
    }

    public function go_excel() 
    {
        return Excel::download(new L03($this->year ,
        $this->month, 
    
    $this->leave_types , $this->HeadOfficeLeaves , $this->DivisionLeaves , $this->divisionTypes , $this->dateRange
    ), 'L03.xlsx');
    }

    

  

    public function go_pdf()
    {
        [$this->year, $this->month] = explode('-', $this->dateRange);
    
        $data = [
            'year' => $this->year,
            'month' => $this->month,
            'leave_types' => $this->leave_types,
            'divisionTypes' => $this->divisionTypes,
        ];
    
        $pdf = PDF::loadView('pdf_reports.leave_summary_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'leave_summary_report.pdf');
    }
   

   
  
    public function render()
    {
        [$this->year , $this->month] = explode('-', $this->dateRange);
        $leave_types = LeaveType::whereIn('id', range(1, 7))->get();

       
        // $totalLeaveTypeCounts = [];
        foreach($this->divisionTypes as $divisionType){
            foreach ($divisionType->divisions as $division) {
             
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
                ->where('current_division_id' ,  $division->id)
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
