<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Salary;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class StaffSalaryList extends Component
{

    public function go_pdf()
    {
        $salaries = Salary::with('staff', 'rank')->get();
        $data = [
            'salaries' => $salaries,
            'first_ranks' => Rank::where('staff_type_id', 1)->get(),
            'second_ranks' => Rank::where('staff_type_id', 2)->get(),
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf.pdf');
    }
    public function render()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $salaries = Salary::with('staff', 'rank')->get();



        $payscales = Payscale::select('payscales.id', 'payscales.name')
            ->selectRaw('SUM(CASE WHEN salaries.addition_education > 0 THEN 1 ELSE 0 END) AS staff_count_addition_education')
            ->selectRaw('SUM(CASE WHEN salaries.addition > 0 THEN 1 ELSE 0 END) AS staff_count_addition')
            ->selectRaw('SUM(CASE WHEN salaries.addition_ration > 0 THEN 1 ELSE 0 END) AS staff_count_addition_ration')
            ->selectRaw('SUM(salaries.addition_education) AS addition_education')
            ->selectRaw('SUM(salaries.addition) AS addition')
            ->selectRaw('SUM(salaries.addition_ration) AS addition_ration')
            ->leftJoin('ranks', 'ranks.payscale_id', '=', 'payscales.id') // Join ranks to get payscale_id
            ->leftJoin('salaries', 'salaries.rank_id', '=', 'ranks.id') // Join salaries with ranks using rank_id
            ->leftJoin('staff', 'salaries.staff_id', '=', 'staff.id') // Join staff table
            ->groupBy('payscales.id', 'payscales.name') // Group by payscale id and name
            ->get();



        return view('livewire.investment-companies.staff-salary-list', [
            'salaries' => $salaries,
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'payscales' => $payscales
        ]);
    }
}
