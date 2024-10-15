<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Salary;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class StaffSalary extends Component
{
    // public function go_pdf(){
    //     $staffs = Staff::get();
    //     $data = [
    //         'staffs' => $staffs,
    //     ];
    //     $pdf = PDF::loadView('pdf_reports.staff_salary_report', $data);
    //     return response()->streamDownload(function() use ($pdf) {
    //         echo $pdf->output();
    //     }, 'staff_salary_report_pdf.pdf');
    // }

 
    //  public function render()
    //  {
    //     $staffs = Staff::get();
    //   return view('livewire.investment-companies.staff-salary',[ 
    //     'staffs' => $staffs,
    // ]);
    // }
    public function go_pdf()
    {
        $salaries = Salary::with('staff')->get();
        $data = [
            'salaries' => $salaries,
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_report_pdf.pdf');
    }

    public function render()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $salaries = Salary::with('staff')->get();
        return view('livewire.investment-companies.staff-salary', [
            'salaries' => $salaries,
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
        ]);
    }

}
