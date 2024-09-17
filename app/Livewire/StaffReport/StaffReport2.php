<?php

namespace App\Livewire\StaffReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class StaffReport2 extends Component
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
        $pdf = PDF::loadView('pdf_reports.staff_report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_2.pdf');
    }
    public function render()
    {
        $staff = Staff::get()->first();
        return view('livewire.staff-report.staff-report2',[ 
            'staff' => $staff,
    ]);
    }
    // public function render()
    // {
    //     return view('livewire.staff-report.staff-report2');
    // }
}
