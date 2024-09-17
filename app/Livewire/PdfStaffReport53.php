<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PdfStaffReport53 extends Component
{
   
    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        // dd($staff);
        $data = [
            'staff' => $staff,
           
        ];

        $pdf = PDF::loadView('pdf_reports.staff_report_53', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_53.pdf');
    }

    public function render()
    {

        $staff = DB::table('staff')
        ->join('ethnics', 'staff.ethnic_id', '=', 'ethnics.id')
        ->join('religions', 'staff.religion_id', '=', 'religions.id')
        ->join('staff_education', 'staff.id', '=', 'staff_education.staff_id')
        ->join('education', 'staff_education.education_id', '=', 'education.id')
        ->select('staff.*', 'ethnics.name as ethnic_name', 'religions.name as religion_name', 'education.name as education_name')
        ->first();
        // dd($staffs);

        return view('livewire.pdf-staff-report53', [
            'staff' => $staff,
            
        ]);
    }
}
