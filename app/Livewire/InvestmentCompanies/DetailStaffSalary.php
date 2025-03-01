<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class DetailStaffSalary extends Component
{
    public $monthSelect, $year, $month;
    public
        $staffs, $staff, $staff_id;
    public function go_pdf()
    {

        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.detail_staff_salary_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'detail_staff_salary_report_pdf.pdf');
    }


    public function mount()
    {

        $this->monthSelect = Carbon::now();
        $this->staffs = Staff::all();
        $this->staff_id = Staff::all()->first()->id;
    }
    public function render()
    {

        $this->staff = Staff::find($this->staff_id)->first();

        return view('livewire.investment-companies.detail-staff-salary', [
            'staffs' => $this->staffs,
        ]);
    }
}
