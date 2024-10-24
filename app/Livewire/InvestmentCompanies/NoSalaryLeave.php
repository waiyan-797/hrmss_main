<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class NoSalaryLeave extends Component
{
    public function go_pdf()
{
    $leaves = Leave::where('leave_type_id', 1)->with('staff')->get();
    $data = [
        
        'leaves' => $leaves, 
    ];
    $pdf = PDF::loadView('pdf_reports.no_salary_leave_report', $data);
    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->output();
    }, 'no_salary_leave_report_pdf.pdf');
}
    public function render()
{
    
    $leaves = Leave::where('leave_type_id', 1)->with('staff')->get();

    return view('livewire.investment-companies.no-salary-leave', [
        'leaves' => $leaves,
       
       
    ]);
}

}



// $salaries = Salary::with('staff', 'rank')->get(); 
//     $staffs = Staff::get();
//     $leaves = Leave::where('leave_type_id', 1)->get();
//     foreach ($leaves as $leave) {
//         if ($leave->from_date && $leave->to_date) {
//             $leave->date_difference = $leave->from_date->diffInDays($leave->to_date);
//         } else {
//             $leave->date_difference = null; 
//         }
      
//     }

//     $data = [
//         'staffs' => $staffs,
//         'salaries' => $salaries,
//         'leaves' => $leaves, 
//     ];

//     $pdf = PDF::loadView('pdf_reports.yangon_staff_april_salary_list_report', $data);
//     return response()->streamDownload(function() use ($pdf) {
//         echo $pdf->output();
//     }, 'yangon_staff_april_salary_list_report_pdf.pdf');
// }  
//     public function render()
//      {
//     $leaves = Leave::where('leave_type_id', 1)->get();
//     $first_ranks = Rank::where('staff_type_id', 1)->get();
//     $second_ranks = Rank::where('staff_type_id', 2)->get();
//     $salaries = Salary::with('staff', 'rank')->get(); 
  
//         $staffs = Staff::get();
//         return view('livewire.investment-companies.yangon-staff-april-salary-list',[ 
//         'staffs' => $staffs,
//         'salaries' => $salaries,
//         'first_ranks' => $first_ranks,
//         'second_ranks' => $second_ranks,  
//         'leaves' =>$leaves,
//     ]);
//      }
