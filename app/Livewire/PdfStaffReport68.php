<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PdfStaffReport68 extends Component
{
   

public $staff_id;
   public function mount($staff_id=0){
    $this->staff_id=$staff_id;
   }
    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        // dd($staff);
        $data = [
            'staff' => $staff,
           
        ];

        $pdf = PDF::loadView('pdf_reports.staff_report_68', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_68.pdf');
    }

    public function render()
    {
        $staff=Staff::where('id',$this->staff_id)->first();
        return view('livewire.pdf-staff-report68', [
            'staff' => $staff,
            
        ]);
    }
}
