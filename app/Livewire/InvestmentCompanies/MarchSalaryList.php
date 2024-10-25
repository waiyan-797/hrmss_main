<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Leave;
use App\Models\Staff;
use Carbon\Carbon;
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
        $promotionDate = Carbon::parse(
            $this->staff
                ?->promotion()
                ->whereMonth('created_at', $this->month)
                ->whereYear('created_at', $this->year)
                ->first()?->promotion_date
        );


        $dayPaidSalaryBeforePromotions = Carbon::parse($this->monthsSelect)
            ->startOfMonth()
            ->diffInDays($promotionDate, false) + 1;

        // leaves

        $specificDate = Carbon::parse($promotionDate); // Example specific date to check leaves before
        $monthStart = $specificDate->copy()->startOfMonth(); // Start of the month (e.g., 2024-10-01)

        // Query leaves that overlap with the month of the specific date
        $leaves = Leave::where('staff_id', $this->staff?->id)
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



        // after the promotion 


        $monthEnd = $specificDate->copy()->endOfMonth();  // Example end: 31st October 2024

        $leaves = Leave::where('staff_id', $this->staff?->id)
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




        //leaves 

        $dayPaidSalaryAfterPromotions = $promotionDate
            ->diffInDays(Carbon::parse($this->monthsSelect)->endOfMonth(), false);

        // Ensure these values are integers
        $dayPaidSalaryBeforePromotions = (int) $dayPaidSalaryBeforePromotions;
        $dayPaidSalaryAfterPromotions = (int) $dayPaidSalaryAfterPromotions;



        $lastMonthDate = Carbon::create($this->year, $this->month, 1)->subMonth();
        $lastActualSalary = $this->staff?->salaries()
            ->whereMonth('created_at', $lastMonthDate->month)
            ->whereYear('created_at', $lastMonthDate->year)
            ->orderBy('created_at', 'desc')
            ->first()?->current_salary;
        $newSalaryAfterPromotion = $this->staff?->currentRank->payscale->min_salary;
        $totalPaidBeforePromotons = ($lastActualSalary / Carbon::parse($this->monthsSelect)->daysInMonth())  * ($dayPaidSalaryBeforePromotions - $totalLeaveDaysBeforeSpecificDate);
        $totalPaidAfterPromotion = ($newSalaryAfterPromotion /  Carbon::parse($this->monthsSelect)->daysInMonth())  * ($dayPaidSalaryAfterPromotions - $totalLeaveDaysAfterSpecificDate);



        $diffDays =  Carbon::parse($this->monthsSelect)->startOfMonth()?->diffInDays(Carbon::parse($this->staff?->promotion()->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)?->first()?->promotion_date));


        $data = [
            'staffs' => $this->staffs,
            'totalPaidBeforePromotons' => $totalPaidBeforePromotons,
            'totalPaidAfterPromotion' => $totalPaidAfterPromotion,
            'promotionDate'  => $this->staff?->promotion()->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)?->first()?->promotion_date,
            'diffDays' => $diffDays,
            'lastActualSalary' => $lastActualSalary,
            'lastDay' => Carbon::parse($this->monthsSelect)->endOfMonth()->format('Y-m-d'),

            'dayPaidSalaryBeforePromotions' => $dayPaidSalaryBeforePromotions,
            'dayPaidSalaryAfterPromotions' => $dayPaidSalaryAfterPromotions,
            'staff' => $this->staff,
            'year' => $this->year,
            'month' => $this->month,
            'monthsSelect' => $this->monthsSelect
        ];
        $pdf = PDF::loadView('pdf_reports.march_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'march_salary_list_report_pdf.pdf');
    }


    public function mount()
    {
        $this->monthsSelect = Date::now()->format('Y-m');
    }

    public function render()
    {
        $this->staffs = Staff::all()->filter(fn($staff) => $staff->isPromotionThisMonth($this->monthsSelect));


        [$this->year, $this->month] =  explode('-', $this->monthsSelect);
        if ($this->staff_id) {

            $this->staff = Staff::find($this->staff_id);
        } else {
            $this->staff = $this->staffs?->first();
        }


        $promotionDate = Carbon::parse(
            $this->staff
                ?->promotion()
                ->whereMonth('created_at', $this->month)
                ->whereYear('created_at', $this->year)
                ->first()?->promotion_date
        );


        $dayPaidSalaryBeforePromotions = Carbon::parse($this->monthsSelect)
            ->startOfMonth()
            ->diffInDays($promotionDate, false) + 1;

        // leaves

        $specificDate = Carbon::parse($promotionDate); // Example specific date to check leaves before
        $monthStart = $specificDate->copy()->startOfMonth(); // Start of the month (e.g., 2024-10-01)

        // Query leaves that overlap with the month of the specific date
        $leaves = Leave::where('staff_id', $this->staff?->id)
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



        // after the promotion 


        $monthEnd = $specificDate->copy()->endOfMonth();  // Example end: 31st October 2024

        $leaves = Leave::where('staff_id', $this->staff?->id)
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




        //leaves 

        $dayPaidSalaryAfterPromotions = $promotionDate
            ->diffInDays(Carbon::parse($this->monthsSelect)->endOfMonth(), false);

        // Ensure these values are integers
        $dayPaidSalaryBeforePromotions = (int) $dayPaidSalaryBeforePromotions;
        $dayPaidSalaryAfterPromotions = (int) $dayPaidSalaryAfterPromotions;



        $lastMonthDate = Carbon::create($this->year, $this->month, 1)->subMonth();
        $lastActualSalary = $this->staff?->salaries()
            ->whereMonth('created_at', $lastMonthDate->month)
            ->whereYear('created_at', $lastMonthDate->year)
            ->orderBy('created_at', 'desc')
            ->first()?->current_salary;
        $newSalaryAfterPromotion = $this->staff?->currentRank->payscale->min_salary;
        $totalPaidBeforePromotons = ($lastActualSalary / Carbon::now()->daysInMonth())  * ($dayPaidSalaryBeforePromotions - $totalLeaveDaysBeforeSpecificDate);
        $totalPaidAfterPromotion = ($newSalaryAfterPromotion /  Carbon::now()->daysInMonth())  * ($dayPaidSalaryAfterPromotions - $totalLeaveDaysAfterSpecificDate);



        $diffDays =  Carbon::parse($this->monthsSelect)->startOfMonth()?->diffInDays(Carbon::parse($this->staff?->promotion()->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)?->first()?->promotion_date));

        return view('livewire.investment-companies.march-salary-list', [
            'staffs' => $this->staffs,
            'totalPaidBeforePromotons' => $totalPaidBeforePromotons,
            'totalPaidAfterPromotion' => $totalPaidAfterPromotion,
            'promotionDate'  => $this->staff?->promotion()->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)?->first()?->promotion_date,
            'diffDays' => $diffDays,
            'lastActualSalary' => $lastActualSalary,
            'lastDay' => Carbon::parse($this->monthsSelect)->endOfMonth()->format('Y-m-d'),

            'dayPaidSalaryBeforePromotions' => $dayPaidSalaryBeforePromotions,
            'dayPaidSalaryAfterPromotions' => $dayPaidSalaryAfterPromotions,

        ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.march-salary-list');
    // }
}
