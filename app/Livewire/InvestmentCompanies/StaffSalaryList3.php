<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class StaffSalaryList3 extends Component
{
    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_3_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf_3.pdf');
    }


    public function render()
    {

        $payscales = Payscale
            ::select('payscales.id', 'payscales.name', 'payscales.similiar_rank', 'payscales.staff_type_id')
            ->selectRaw('SUM(CASE WHEN salaries.addition_education > 0 THEN 1 ELSE 0 END) AS staff_count_addition_education') // a twin won 
            ->selectRaw('SUM(CASE WHEN salaries.addition > 0 THEN 1 ELSE 0 END) AS staff_count_addition') // others 
            ->selectRaw('SUM(CASE WHEN salaries.addition_ration > 0 THEN 1 ELSE 0 END) AS staff_count_addition_ration') // yeik khar 
            ->selectRaw('SUM(salaries.addition_education) AS addition_education')
            ->selectRaw('SUM(salaries.addition) AS addition')
            ->selectRaw('SUM(salaries.addition_ration) AS addition_ration')
            ->leftJoin('ranks', 'ranks.payscale_id', '=', 'payscales.id') // Join ranks to get payscale_id
            ->leftJoin('salaries', 'salaries.rank_id', '=', 'ranks.id') // Join salaries with ranks using rank_id
            ->leftJoin('staff', 'salaries.staff_id', '=', 'staff.id') // Join staff table
            ->groupBy('payscales.id', 'payscales.name') // Group by payscale id and name
            ->get();

        $firstRanks = Rank::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();


        $staffs = Staff::get();
        return view('livewire.investment-companies.staff-salary-list3', [
            'staffs' => $staffs,
            'payscales' => $payscales,
            'firstRanks' => $firstRanks,
            'second_payscales' => $second_payscales,
            ''
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.staff-salary-list3');
    // }
}
