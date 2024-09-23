<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class Report2 extends Component
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
        $pdf = PDF::loadView('pdf_reports.report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'report_pdf_2.pdf');
    }
   
    
     public function render()
     {
        $staff = Staff::get()->first();
        return view('livewire.reports.report2',[ 
            'staff' => $staff,
        ]);
     }
}
