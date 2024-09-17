<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\Education;
use App\Models\Ethnic;
use App\Models\Religion;
use App\Models\Spouse;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PdfStaffReport18 extends Component
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

        // return redirect(route('pdf', $staff_id));
        $pdf = PDF::loadView('pdf_reports.staff_report_18', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_18.pdf');
    }
    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report18',[
            'staff' => $staff,
        ]);
    }
}
