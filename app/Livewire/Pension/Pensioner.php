<?php

namespace App\Livewire\Pension;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class Pensioner extends Component
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
        $pdf = PDF::loadView('pdf_reports.pensioner_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pensioner_report_pdf_1.pdf');
    }
   
    
    public function render()
     {
        $staff = Staff::get()->first();
       return view('livewire.pension.pensioner',[ 
            'staff' => $staff,
        ]);
     }
}
