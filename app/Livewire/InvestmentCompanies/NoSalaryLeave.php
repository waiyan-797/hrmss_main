<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class NoSalaryLeave extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.no_salary_leave_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'no_salary_leave_report_pdf.pdf');
    }
     public function render()
    {
        $staffs = Staff::get();
        return view('livewire.investment-companies.no-salary-leave',[ 
        'staffs' => $staffs,
    ]);
     }
}
