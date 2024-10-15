<?php

namespace App\Livewire\InvestmentCompanies;

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
    return view('livewire.investment-companies.staff-salary-list', [
        'salaries' => $salaries,
        'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks
    ]);
}

}
