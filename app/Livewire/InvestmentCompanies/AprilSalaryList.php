<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Division;
use App\Models\Leave;
use App\Models\Rank;
use App\Models\Salary;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class AprilSalaryList extends Component
{
  public function go_pdf()
{
    $salaries = Salary::with('staff', 'rank')->get(); 
    $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
    $leaves = Leave::where('leave_type_id', 1)->get();
    $divisions=Division::find(23);
    $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
    $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 2))->get();
    $data = [
        'staffs' => $staffs,
        'salaries' => $salaries,
        'leaves' => $leaves,
        'divisions'=>$divisions,
        'high_staffs' => $high_staffs,
        'low_staffs' => $low_staffs,
    ];

    $pdf = PDF::loadView('pdf_reports.april_salary_list_report', $data);
    return response()->streamDownload(function() use ($pdf) {
        echo $pdf->output();
    }, 'april_salary_list_report_pdf.pdf');
}  
public function render()
{
    $leaves = Leave::where('leave_type_id', 1)->get();
    $salaries = Salary::with('staff', 'rank')->get();
    $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
    $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
    $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 2))->get();
    $divisions=Division::find(23);

    return view('livewire.investment-companies.april-salary-list',[ 
        'staffs' => $staffs,
        'high_staffs' => $high_staffs,
        'low_staffs' => $low_staffs,
        'salaries' => $salaries,
        'leaves' =>$leaves,
        'divisions'=>$divisions,
    ]);
}
}
