<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use App\Models\StaffEducation;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class EducationReport extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.education_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'education_report_pdf.pdf');
    }
public function render()
{
    $staffs = Staff::get();
    return view('livewire.reports.education-report',[ 
        'staffs' => $staffs,
    ]);
}

}
