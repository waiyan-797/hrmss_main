<?php

namespace App\Livewire\RankSalary;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class RankSalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.rank_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'rank_salary_list_report_pdf.pdf');
    }

 
     public function render()
     {
        $staffs = Staff::get();
      return view('livewire.rank-salary.rank-salary-list',[ 
        'staffs' => $staffs,
    ]);
    }
   
    // public function render()
    // {
    //     return view('livewire.rank-salary.rank-salary-list');
    // }
}
