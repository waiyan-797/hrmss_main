<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PdfStaffReport17 extends Component
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

        //  return redirect(route('pdf', $staff_id));
        $pdf = PDF::loadView('pdf_reports.staff_report_17', $data);
        // dd($pdf);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_17.pdf');
    }

    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report17',[
            'staff' => $staff,
        ]);
    }
}
