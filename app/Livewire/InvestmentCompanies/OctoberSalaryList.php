<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class OctoberSalaryList extends Component
{

    public $staffs, $staff, $staff_id;
    public $monthsSelect;
    public $year, $month;

    public function go_pdf()
    {
        $this->staffs = Staff::all()->filter(fn($staff) => $staff->isPromotionThisMonth($this->monthsSelect));


        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.october_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'october_salary_list_report_pdf.pdf');
    }



    public function mount()
    {
        $this->monthsSelect = Carbon::now();
    }
    public function render()
    {


        [$this->year, $this->month]  =  explode('-', $this->monthsSelect);
        $this->staffs = Staff::whereHas('increments', function ($q) {
            $q->whereMonth('increment_date', $this->month)
                ->whereYear('increment_date', $this->year);
        })
            ->with(['increments' => function ($q) {
                $q->whereMonth('increment_date', $this->month)
                    ->whereYear('increment_date', $this->year);
            }])
            ->get();

        if ($this->staff_id) {
            $this->staff = Staff::find($this->staff_id);
        } else {
            $this->staff = $this->staffs->first();
        }

        $daysCountBeforeIncrement = 0;
        $daysCountAfterIncrement = 0;
        $startDateOfMonth = Carbon::parse($this->monthsSelect)->startOfMonth()->toDateString();
        $endtDateOfMonth = Carbon::parse($this->monthsSelect)->endOfMonth()->toDateString();




        // dd($this->staff->increments->first());
        return view('livewire.investment-companies.october-salary-list', [
            'staffs' => $this->staffs,
            'staff' => $this->staff,
            'daysCountBeforeIncrement' => $daysCountBeforeIncrement,
            'daysCountAfterIncrement' => $daysCountAfterIncrement,
            'startDateOfMonth' => $startDateOfMonth,
            'endtDateOfMonth' => $endtDateOfMonth,
        ]);
    }
}
