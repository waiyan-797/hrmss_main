<?php

namespace App\Livewire\Leave;

use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LeaveDate extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }

    public function go_pdf($staff_id){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.leave_date_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'leave_date_report_pdf.pdf');
    }
     public function render()
     {
        $staff = Staff::where('id', $this->staff_id)->first();
        $leaves = Leave::where('staff_id', $this->staff_id)->where('leave_type_id', 2)->get();
        return view('livewire.leave.leave-date',[
            'staff' => $staff,
            'leaves' => $leaves,
        ]);
     }
}
