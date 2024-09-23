<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PdfStaffReport71 extends Component
{

    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];

        
        $pdf = PDF::loadView('pdf_reports.staff_report_71', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_71.pdf');
    }
    public function render()
    {
        $staff = Staff::get()->first();
        return view('livewire.pdf-staff-report71', [
            'staff' => $staff,
        ]);
    }
}
