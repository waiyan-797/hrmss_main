<?php

namespace App\Livewire\InvestmentCompanies;

use App\Livewire\Leave;
use App\Models\Leave as ModelsLeave;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class OctoberSalaryList extends Component
{

    public $staffs, $staff, $staff_id;
    public $monthSelect;
    public $year, $month;

    public function go_pdf()
    {
        $this->staffs = Staff::all()->filter(fn($staff) => $staff->isPromotionThisMonth($this->monthSelect));


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
        $this->monthSelect = Carbon::now();
    }
    public function render()
    {


        [$this->year, $this->month]  =  explode('-', $this->monthSelect);
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
        $startDateOfMonth = Carbon::parse($this->monthSelect)->startOfMonth()->toDateString();
        $endtDateOfMonth = Carbon::parse($this->monthSelect)->endOfMonth()->toDateString();
        $incrementedDate = $this->staff->increments->first()->increment_date;


        //diff days 
        $diffDaysFromStart = Carbon::parse($startDateOfMonth)->diffInDays(Carbon::parse($incrementedDate));

        //diff days 


        //salaryBeforeIncrement 
        $lastMonthDate = Carbon::create($this->year, $this->month, 1)->subMonth();

        $lastActualSalary = $this->staff?->salaries()
            ->whereMonth('created_at', $lastMonthDate->month)
            ->whereYear('created_at', $lastMonthDate->year)
            ->orderBy('created_at', 'desc')
            ->first()?->current_salary;

        $specificDate = Carbon::parse($incrementedDate); // Example specific date to check leaves before
        $monthStart = $specificDate->copy()->startOfMonth(); // Start 
        //salaryBeforeIncrement 
        // Query leaves that overlap with the month of the specific date
        $leaves = ModelsLeave::where('staff_id', $this->staff?->id)
            ->where(function ($query) use ($monthStart, $specificDate) {
                // Leave started before the specific date's month and ends after the month's start
                $query->where(function ($q) use ($monthStart) {
                    $q->where('from_date', '<=', $monthStart)
                        ->where('to_date', '>=', $monthStart);
                })
                    // Leave started within the same month and ends after a specific date
                    ->orWhere(function ($q) use ($specificDate) {
                        $q->where('from_date', '<=', $specificDate)
                            ->where('to_date', '>=', $specificDate);
                    });
            })
            ->get();
        $totalLeaveDaysBeforeSpecificDate = 0;

        foreach ($leaves as $leave) {
            $fromDate = Carbon::parse($leave->from_date);
            $toDate = Carbon::parse($leave->to_date);

            // Calculate the actual end date for the leave period before the specific date
            $leaveEndDateForCalc = $toDate->greaterThan($specificDate) ? $specificDate->copy()->subDay() : $toDate;

            // Calculate the actual start date for the leave
            $leaveStartDateForCalc = $fromDate->lessThan($monthStart) ? $monthStart : $fromDate;

            // If the leave overlaps with the days before the specific date
            if ($leaveStartDateForCalc->lessThan($specificDate)) {
                $daysOfLeaveBeforeSpecificDate = $leaveStartDateForCalc->diffInDays($leaveEndDateForCalc) + 1; // Inclusive
                $totalLeaveDaysBeforeSpecificDate += $daysOfLeaveBeforeSpecificDate + 1;
            }
        }


        $monthEnd = $specificDate->copy()->endOfMonth();  // Example end: 31st October 2024

        $leaves = ModelsLeave::where('staff_id', $this->staff?->id)
            ->where(function ($query) use ($specificDate) {
                // Leave that overlaps with the period after the specific date
                $query->where(function ($q) use ($specificDate) {
                    $q->where('from_date', '>=', $specificDate)
                        ->where('to_date', '>=', $specificDate);
                })
                    ->orWhere(function ($q) use ($specificDate) {
                        $q->where('from_date', '<=', $specificDate)
                            ->where('to_date', '>=', $specificDate);
                    });
            })
            ->get();

        $totalLeaveDaysAfterSpecificDate = 0;

        foreach ($leaves as $leave) {
            $fromDate = Carbon::parse($leave->from_date);
            $toDate = Carbon::parse($leave->to_date);

            // Calculate the actual start date for the leave period after the specific date
            $leaveStartDateForCalc = $fromDate->greaterThan($specificDate) ? $fromDate : $specificDate->copy()->addDay();

            // Calculate the actual end date for the leave period
            $leaveEndDateForCalc = $toDate->lessThan($monthEnd) ? $toDate : $monthEnd;

            // If the leave overlaps with the days after the specific date
            if ($leaveStartDateForCalc->lessThanOrEqualTo($leaveEndDateForCalc)) {
                $daysOfLeaveAfterSpecificDate = $leaveStartDateForCalc->diffInDays($leaveEndDateForCalc) + 1; // Inclusive

                $totalLeaveDaysAfterSpecificDate += $daysOfLeaveAfterSpecificDate;
            }
        }




        $salaryRatePerDayBeforeIncrement = ($lastActualSalary / Carbon::parse($this->monthSelect)->daysInMonth())  * ($diffDaysFromStart - $totalLeaveDaysBeforeSpecificDate);
        //after increment 
        $dayPaidSalaryAfterIncrement = Carbon::parse($incrementedDate)
            ->diffInDays(Carbon::parse($this->monthSelect)->endOfMonth(), false);
        $newSalaryAfterIncrement = $this->staff?->currentRank->payscale->min_salary;
        $totalPaidAfterIncrement = ($newSalaryAfterIncrement /  Carbon::now()->daysInMonth())  * ($dayPaidSalaryAfterIncrement - $totalLeaveDaysAfterSpecificDate);


        // dd($this->staff->increments->first());
        return view('livewire.investment-companies.october-salary-list', [
            'staffs' => $this->staffs,
            'staff' => $this->staff,
            'daysCountBeforeIncrement' => $daysCountBeforeIncrement,
            'daysCountAfterIncrement' => $daysCountAfterIncrement,
            'startDateOfMonth' => $startDateOfMonth,
            'endtDateOfMonth' => $endtDateOfMonth,
            'diffDaysFromStart' => $diffDaysFromStart,
            'salaryRatePerDayBeforeIncrement' => $salaryRatePerDayBeforeIncrement,
            'lastActualSalary' => $lastActualSalary,
            'incrementedDate' => Carbon::parse($incrementedDate),
            'monthEnd' => $monthEnd,
            'totalPaidAfterIncrement' => $totalPaidAfterIncrement

            //diff days 


        ]);
    }
}
