<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class OtherQualificationReport extends Component
{
    
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.other_qualification_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'other_qualification_report_pdf.pdf');
    }
   
     public function render()
    {
        $staffs = Staff::get();
        return view('livewire.reports.other-qualification-report',[ 
        'staffs' => $staffs,
    ]);
    }
}
