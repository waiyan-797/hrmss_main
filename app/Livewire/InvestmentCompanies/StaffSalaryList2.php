<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class StaffSalaryList2 extends Component
{
    public function go_pdf(){
        $high_staffs = Rank::where('staff_type_id', 1)->get();
        $low_staffs = Rank::whereIn('staff_type_id', [2, 3])->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        $data = [
            'staffs' => $staffs,
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_2_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf_2.pdf');
    }


    public function render()
    {
        $high_staffs = Rank::where('staff_type_id', 1)->get();
        $low_staffs = Rank::whereIn('staff_type_id', [2, 3])->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        return view('livewire.investment-companies.staff-salary-list2',[
            'staffs' => $staffs,
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
        ]);
    }
}
