<?php

namespace App\Livewire\PensionFamily;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PensionFamily extends Component
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
        $pdf = PDF::loadView('pdf_reports.pension_family_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pension_family_report_pdf.pdf');
    }
   
    
    
     public function render()
     {
        $staff = Staff::get()->first();
        return view('livewire.pension-family.pension-family',[ 
            'staff' => $staff,
        ]);
     }
}
