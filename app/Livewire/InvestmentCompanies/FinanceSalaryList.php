<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class FinanceSalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.finance_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'finance_salary_list_report_pdf.pdf');
    }
    
     public function render()
     {
        $staffs = Staff::get();
        return view('livewire.investment-companies.finance-salary-list',[ 
        'staffs' => $staffs,
    ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.finance-salary-list');
    // }
}
