<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class Report3 extends Component
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
        $pdf = PDF::loadView('pdf_reports.report_3', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'report_pdf_3.pdf');
    }
   
    
     public function render()
     {
        $staff = Staff::get()->first();
        return view('livewire.reports.report3',[ 
            'staff' => $staff,
        ]);
     }
    // public function render()
    // {
    //     return view('livewire.reports.report3');
    // }
}
