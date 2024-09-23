<?php

namespace App\Livewire\EmployeeRecordReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class EmpoyeeRecordReport extends Component
{

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.employee_record_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'employee_record_report_pdf.pdf');
    }

 public function render()
     {
        $staffs = Staff::get();
         return view('livewire.employee-record-report.empoyee-record-report',[ 
        'staffs' => $staffs,
    ]);
     }
}
