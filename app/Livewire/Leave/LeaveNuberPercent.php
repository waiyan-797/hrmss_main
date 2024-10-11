<?php

namespace App\Livewire\Leave;

use App\Models\Division;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeaveNuberPercent extends Component
{
    public $staff_id;

    public $year, $month;
    public $dep_category;
    public $divisions;
    public function mount()
    {

        $this->dateRange = Carbon::now()->format('Y-m');
        [$year, $month] = explode('-', $this->dateRange);
        $this->year = $year;
        $this->month = $month;

        $this->dep_category = 1;
    }

    public function go_word() {}
    public function go_pdf()
    {




        $leave_types = LeaveType::all();
        $divisions = Division::where('division_type_id', $this->dep_category)->get();
        $totalStaffCount = 0;
        $totalLeaveCount = 0;
        $totalLeaveTypeCounts = [];

        foreach ($divisions as $division) {
            $division->staffCount = $this->staffCount($division->id);
            $division->leaveCount = $this->leaveCount($division->id);
            $totalStaffCount += $division->staffCount;
            $totalLeaveCount += $division->leaveCount;

            foreach ($leave_types as $leave_type) {
                $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);
                $totalLeaveTypeCounts[$leave_type->id] = ($totalLeaveTypeCounts[$leave_type->id] ?? 0) + $leaveTypeCount;
            }
        }

        $leave_types = LeaveType::all();
        $divisions = Division::all();
        $data = [
            'leave_types' => $leave_types,
            'divisions' => $divisions,
            'year' => $this->year,
            'month' => $this->month,
        ];
        $pdf = PDF::loadView('pdf_reports.leave_nuber_percent_report', $data);


        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'leave_nuber_precent_report_pdf.pdf');
    }
    public function staffCount($division)
    {
        return Staff::where("current_division_id", $division)->count();
    }
    public function leaveCount($division)
    {
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        foreach ($staffs as $staff) {
            $leave = Leave::where('staff_id', $staff->id)->count();
            $totalLeaveCount += $leave;
        }
        return $totalLeaveCount;
    }
    // public function leaveType($division,$leave_type_id){
    //     $totalCount=0;
    //     $staffs=Staff::where("current_division_id",$division)->get();
    //     foreach($staffs as $staff){
    //         $leave=Leave::where('staff_id',$staff->id)->where('leave_type_id',0);
    //         $totalCount+=$leave;
    //     }
    //     return $totalCount;
    // }
    public function leaveType($division, $leave_type_id)
    {
        $totalCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();

        foreach ($staffs as $staff) {

            // Get the count of leaves for the specific leave type and staff
            $leaveCount = Leave::where('staff_id', $staff->id)
                ->where('leave_type_id', $leave_type_id)
                ->whereYear('created_at', $this->year)
                ->whereMonth('created_at', $this->month)

                ->count();
            $totalCount += $leaveCount;
        }

        return $totalCount;
    }



    //  public function render()
    //  {
    //     $leave_types=LeaveType::all();
    //     $divisions=Division::all();
    //     $totalStaffCount=0;
    //     $totalLeaveCount=0;
    //     $totalLeaveTypeCounts=[];
    //     $leaveTypeCount=0;
    //     foreach($divisions as $division){
    //         $division->staffCount=$this->staffCount($division->id);
    //         $division->leaveCount=$this->leaveCount($division->id);
    //         $totalStaffCount+=$division->staffCount;
    //         $totalLeaveCount+=$division->leaveCount;
    //         foreach($leave_types  as $leave_type){
    //             $leaveTypeCount=$this->leaveType($division->id,$leave_type->id);
    //             $totalLeaveTypeCounts[$leave_type->id]=($totalLeaveTypeCounts[$leave_type->id] ?? 0)+$leaveTypeCount;
    //         }

    //     }
    //     return view('livewire.leave.leave-nuber-percent',[ 
    //        'leave_types'=>$leave_types,
    //        'divisions'=>$divisions,
    //        'totalStaffCount'=>$totalStaffCount,
    //        'totalLeaveCount'=>$totalLeaveCount,
    //        'leaveTypeCount'=>$leaveTypeCount,
    //     ]);
    //  }
    public function render()
    {
        $leave_types = LeaveType::all();
        $divisions = Division::where('division_type_id', $this->dep_category)->get();
        $totalStaffCount = 0;
        $totalLeaveCount = 0;
        $totalLeaveTypeCounts = [];

        foreach ($divisions as $division) {
            $division->staffCount = $this->staffCount($division->id);
            $division->leaveCount = $this->leaveCount($division->id);
            $totalStaffCount += $division->staffCount;
            $totalLeaveCount += $division->leaveCount;

            foreach ($leave_types as $leave_type) {
                $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);
                $totalLeaveTypeCounts[$leave_type->id] = ($totalLeaveTypeCounts[$leave_type->id] ?? 0) + $leaveTypeCount;
            }
        }

        return view('livewire.leave.leave-nuber-percent', [
            'leave_types' => $leave_types,
            'divisions' => $divisions,
            'totalStaffCount' => $totalStaffCount,
            'totalLeaveCount' => $totalLeaveCount,
            'totalLeaveTypeCounts' => $totalLeaveTypeCounts,
        ]);
    }
}
