<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PdfStaffReport15 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }

    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);

        $htmlContent = view('livewire.pdf-staff-report15', compact('staff'))->render();
        $pdf = PDF::loadHTML($htmlContent);

        return $pdf->stream('staff-report.pdf');
    }

    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report15',[
            'staff' => $staff,
        ]);
    }
}
