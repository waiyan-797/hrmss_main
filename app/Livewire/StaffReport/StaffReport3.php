<?php

namespace App\Livewire\StaffReport;

use App\Models\PensionYear;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class StaffReport3 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $pension_year = PensionYear::first();
        $data = [
            'staffs' => $staffs,
            'pension_year' => $pension_year,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_3', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_3.pdf');
    }
    public function render()
    {
        $staffs = Staff::get();
        $pension_year = PensionYear::first();
        return view('livewire.staff-report.staff-report3',[
            'staffs' => $staffs,
            'pension_year' => $pension_year,
        ]);
    }
}
