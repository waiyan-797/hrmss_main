<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class MarchSalaryList extends Component
{

    public $staff_id, $monthsSelect;
    public $staffs, $staff;
    public $year, $month;
    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.march_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'march_salary_list_report_pdf.pdf');
    }


    public function mount()
    {
        $this->monthsSelect = Date::now()->format('Y-m');

        $this->staffs = Staff::all()->filter(fn($staff) => $staff->isPromotionThisMonth($this->monthsSelect));
    }

    public function render()
    {
        [$this->year, $this->month] =  explode('-', $this->monthsSelect);
        if ($this->staff_id) {

            $this->staff = Staff::find($this->staff_id);
        } else {
            $this->staff = $this->staffs->first();
        }


        $staffs = Staff::get();
        return view('livewire.investment-companies.march-salary-list', [
            'staffs' => $staffs,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.march-salary-list');
    // }
}
