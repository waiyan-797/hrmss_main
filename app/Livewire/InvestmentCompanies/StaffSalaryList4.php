<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class StaffSalaryList4 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_4_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf_4.pdf');
    }

 
     public function render()
     {
        $staffs = Staff::get();
      return view('livewire.investment-companies.staff-salary-list4',[ 
        'staffs' => $staffs,
    ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.staff-salary-list4');
    // }
}
