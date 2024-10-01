<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class StaffSalaryList2 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_2_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf_2.pdf');
    }

 
     public function render()
     {
        $staffs = Staff::get();
      return view('livewire.investment-companies.staff-salary-list2',[ 
        'staffs' => $staffs,
    ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.staff-salary-list2');
    // }
}
