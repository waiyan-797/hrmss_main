<?php

namespace App\Livewire\StaffList;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class StaffProgeny extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_progeny_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_progeny_pdf.pdf');
    }
     public function render()
     {
        $staffs = Staff::get();
        return view('livewire.staff-list.staff-progeny',[
            'staffs' => $staffs,
        ]);
     }
}
