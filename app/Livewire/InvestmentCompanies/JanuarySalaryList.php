<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class JanuarySalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::whereIn('current_rank_id', [8, 9, 10, 11, 12, 13, 14, 16, 19])->get();
        $leaves = Leave::get();
        $data = [
            'staffs' => $staffs,
            'leaves' => $leaves,
        ];
        $pdf = PDF::loadView('pdf_reports.january_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'january_salary_list_report_pdf.pdf');
    }

    public function render()
     {
        $staffs = Staff::whereIn('current_rank_id', [8, 9, 10, 11, 12, 13, 14, 16, 19])->get();
        $leaves = Leave::get();
        return view('livewire.investment-companies.january-salary-list',[
        'staffs' => $staffs,
        'leaves' => $leaves,
    ]);
     }
}
