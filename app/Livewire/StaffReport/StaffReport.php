<?php

namespace App\Livewire\StaffReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class StaffReport extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf.pdf');
    } //staff_report need pdf blade
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.staff-report.staff-report', [
            'staffs' => $staffs,
        ]);
    }

}
