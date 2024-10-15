<?php

namespace App\Livewire\Leave;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LeaveDate extends Component
{
    public function go_pdf(){
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
        $staffs = Staff::get();
        return view('livewire.leave.leave-date',[ 
        'staffs' => $staffs,
    ]);
     }
}
