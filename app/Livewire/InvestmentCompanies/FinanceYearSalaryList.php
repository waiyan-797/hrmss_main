<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class FinanceYearSalaryList extends Component
{

    public $startYr, $endYr;


    public function go_pdf()
    {

        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.finance_year_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'finance_year_salary_list_report_pdf.pdf');
    }

    public function render()
    {

        $this->endYr   = Carbon::now()->year;
        $this->startYr = $this->endYr - 1;
        $staffs = Staff::get();
        $highRanks = Rank::where('staff_type_id', 1)->get();

        return view('livewire.investment-companies.finance-year-salary-list', [
            'staffs' => $staffs,
            'highRanks' => $highRanks
        ]);
    }
}
