<?php

namespace App\Livewire\EEN;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class EnglishEffectiveNegotiations extends Component
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
        $pdf = PDF::loadView('pdf_reports.english_effective_negotiations_report', $data);
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'english_effective_negotiations_report.pdf');
    }
     public function render()
    {
        $staff = Staff::get()->first();
         return view('livewire.e-e-n.english-effective-negotiations',[ 
            'staff' => $staff,
        ]);
     }
}
