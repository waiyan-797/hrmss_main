<?php

namespace App\Livewire\Leave;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LeaveNuberPercent4 extends Component
{

    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }

    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.leave_nuber_percent_report4', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'leave_nuber_percent_report_pdf_4.pdf');
    }
    public function render()
    {
        $staff = Staff::get()->first();
        return view('livewire.leave.leave-nuber-percent4',[ 
            'staff' => $staff,
        ]);
     }
}
