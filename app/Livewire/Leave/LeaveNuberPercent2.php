<?php

namespace App\Livewire\Leave;

use App\Models\Division;
use App\Models\Leave;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LeaveNuberPercent2 extends Component
{

    public $startYr, $startMonth, $endYr, $endMonth;
    public $staff_id;
    public $fromDateRange, $toDateRange;
    public $dep_category;
    public $months;
    public $divisions;
    public $monthly_leaves;
    public $divisonMontlyLeavesCollection;
    public function mount($staff_id = 0)
    {
        $this->staff_id = $staff_id;
        $this->fromDateRange = Carbon::now()->subMonth(9)->format('Y-m'); // 9 months ago
        $this->toDateRange = Carbon::now()->format('Y-m'); // current month
        $this->dep_category = 1;
    }

    public function go_pdf($staff_id)
    {
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,

            'startYr' => $this->startYr,
            'startMonth' => $this->startMonth,
            'endYr' => $this->endYr,
            'endMonth' => $this->endMonth,

            'months' => $this->months,
            'divisions' => $this->divisions,
            'monthly_leaves' => $this->monthly_leaves
        ];
        $pdf = PDF::loadView('pdf_reports.leave_nuber_percent_report2', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'leave_nuber_precent_report_pdf_2.pdf');
    }
    public function render()
    {
        $staff = Staff::get()->first();


        $fromDate = Carbon::parse($this->fromDateRange); // Start date

        $toDate = Carbon::parse($this->toDateRange);     // End date

        $this->startYr  = explode('-', $fromDate)[0];
        $this->startMonth  = explode('-', $fromDate)[1];
        $this->endYr  = explode('-', $toDate)[0];
        $this->endMonth  = explode('-', $toDate)[1];
        $this->divisions = Division::where('division_type_id', $this->dep_category)->get();


        // Debugging check



        $months = [];

        while ($fromDate->lte($toDate)) { // Loop until fromDate is less than or equal to toDate
            $months[] = $fromDate->format('Y-m'); // Add the month in 'Y-m' format
            $fromDate->addMonth(); // Move to the next month
        }
        $this->months = $months;


        return view('livewire.leave.leave-nuber-percent2', [
            'staff' => $staff,
            'months' => $this->months,
            'divisions' => $this->divisions,
            'monthly_leaves' => $this->monthly_leaves

        ]);
    }


    public function leaveCount($division, $YearMonth)
    {

        [$year, $month] = explode('-', $YearMonth);
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        foreach ($staffs as $staff) {
            $leave = Leave::where('staff_id', $staff->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->distinct('staff_id')->count('staff_id');
            $totalLeaveCount += $leave;
        }
        return $totalLeaveCount;
    }
}
