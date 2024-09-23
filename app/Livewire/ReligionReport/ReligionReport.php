<?php

namespace App\Livewire\ReligionReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class ReligionReport extends Component
{
    
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.religion_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'religion_report_pdf.pdf');
    }
   
     public function render()
    {
        $staffs = Staff::get();
        return view('livewire.religion-report.religion-report',[ 
        'staffs' => $staffs,
    ]);
    }
}
