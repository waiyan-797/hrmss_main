<?php

namespace App\Livewire\PensionReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PensionReport extends Component
{
    // public $staff_id;
    // public function mount($staff_id = 0){
    //     $this->staff_id = $staff_id;
    // }

    // public function go_pdf($staff_id){
    //     $staff = Staff::find($staff_id);
    //     $data = [
    //         'staff' => $staff,
    //     ];
    //     $pdf = PDF::loadView('pdf_reports.pension_report', $data);
    //     return response()->streamDownload(function() use ($pdf) {
    //         echo $pdf->output();
    //     }, 'pension_report_pdf.pdf');
    // }
   
    
   
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.pension_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pension_report_pdf.pdf');
    }
    
      public function render()
     {
        $staffs = Staff::get();
       return view('livewire.pension-report.pension-report',[ 
            'staffs' => $staffs,
        ]);
     }
}
