<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class OctoberSalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.october_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'october_salary_list_report_pdf.pdf');
    }

 
     public function render()
     {
        $staffs = Staff::get();
      return view('livewire.investment-companies.october-salary-list',[ 
        'staffs' => $staffs,
    ]);
    }
   
}
