<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Salary;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PermanentStaff extends Component
{

    public $dateRange, $year, $month, $day;

    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.permanent_staff_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'permanent_staff_report_pdf.pdf');
    }


    public function mount()
    {
        $this->dateRange = Carbon::now()->format('Y-m-d');
    }
    public function render()
    {

        [$year, $month, $day] = explode('-', $this->dateRange);
        $this->year = $year;
        $this->month = $month;
        $this->day  = $day;

        $staffs = Staff::get();
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $salaries = Salary::with('staff')->get();
        $allPayScales = Payscale::all();
        $TotalAllowQty = Payscale::sum('allowed_qty');
        $currentStaffTotal = Staff::where('current_department_id', 1)->where('is_active', 1)->count();
        $currentMaleStaffTotal = Staff::where('current_department_id', 1)->where('gender_id', 1)->where('is_active', 1)->count();
        $currentFeMaleStaffTotal = Staff::where('current_department_id', 1)->where('gender_id', 2)->where('is_active', 1)->count();

        $totalStaffFromOthersDept = Staff::where('salary_paid_by', 1)->where('current_department_id', '!=', 1)->count();
        $totalSalaryPaidStaff = Staff::where('salary_paid_by', 1)->count();
        $maximumBudget = 0;
        foreach ($allPayScales as $payscale) {
            $budget = $payscale->min_salary  * $payscale->allowed_qty;
            $maximumBudget += $budget;
        }
        return view('livewire.investment-companies.permanent-staff', [
            'staffs' => $staffs,
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'allPayScales' => $allPayScales,
            'TotalAllowQty' => $TotalAllowQty,
            'currentMaleStaffTotal' => $currentMaleStaffTotal,
            'currentFeMaleStaffTotal' => $currentFeMaleStaffTotal,
            'maximumBudget' => $maximumBudget
        ]);
    }
}
