<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class JanuarySalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.january_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'january_salary_list_report_pdf.pdf');
    }

 
    
    public function render()
     {
        $staffs = Staff::get();
        return view('livewire.investment-companies.january-salary-list',[ 
        'staffs' => $staffs,
    ]);
     }
}
