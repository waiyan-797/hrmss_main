<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Salary;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class FinanceSalaryList extends Component
{
    public $startYr, $endYr;

    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.finance_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'finance_salary_list_report_pdf.pdf');
    }
    public function mount()
    {
        $this->endYr   = Carbon::now()->year;
    }

    public function render()
    {
        $this->startYr = $this->endYr - 1;
        $staffs = Staff::get();
        $salaries = Salary::query();
        return view('livewire.investment-companies.finance-salary-list', [
            'staffs' => $staffs,
            'salaries' => $salaries
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.finance-salary-list');
    // }
}
