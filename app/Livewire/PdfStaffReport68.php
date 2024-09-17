<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PdfStaffReport68 extends Component
{
    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
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
        $staff = Staff::with(['ethnic', 'religion', 'blood_type', 'gender'])->where('id', 3)->first();
        return view('livewire.pdf-staff-report68',[
            'staff' => $staff,
        ]);
}
}
