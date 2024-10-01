<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class YangonOfficeStaff2 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.yangon_office_staff_report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'yangon_office_staff_report_pdf_2.pdf');
    }

 
     public function render()
     {
        $staffs = Staff::get();
      return view('livewire.investment-companies.yangon-office-staff2',[ 
        'staffs' => $staffs,
    ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.yangon-office-staff2');
    // }
}
