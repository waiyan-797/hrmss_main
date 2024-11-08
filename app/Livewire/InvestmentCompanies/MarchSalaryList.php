<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Leave;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class MarchSalaryList extends Component
{

    public $staff_id, $monthsSelect;
    public $staffs, $staff;
    public $year, $month;
    public $totalPaidBeforePromotons;

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
        $monthEnd = $specificDate->copy()->endOfMonth();  // Example end: 31st October 2024

        $leaves = Leave::where('staff_id', $this->staff?->id)
            ->where(function ($query) use ($specificDate) {
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

            $leaveStartDateForCalc = $fromDate->greaterThan($specificDate) ? $fromDate : $specificDate->copy()->addDay();
            $leaveEndDateForCalc = $toDate->lessThan($monthEnd) ? $toDate : $monthEnd;
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
        $newSalaryAfterPromotion = $this->staff?->currentRank->payscale?->min_salary;
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
    public function go_word()
{
    // Retrieve staff data
    $staffs = Staff::get();
    $promotionDate = Carbon::parse(
        $this->staff
            ?->promotion()
            ->whereMonth('created_at', $this->month)
            ->whereYear('created_at', $this->year)
            ->first()?->promotion_date
    );

    // Calculate salary details before and after promotion
    $dayPaidSalaryBeforePromotions = Carbon::parse($this->monthsSelect)
        ->startOfMonth()
        ->diffInDays($promotionDate, false) + 1;

    $specificDate = Carbon::parse($promotionDate);
    $monthStart = $specificDate->copy()->startOfMonth();

    // Calculate total leave days before specific date
    $totalLeaveDaysBeforeSpecificDate = $this->calculateLeaveDays($this->staff?->id, $monthStart, $specificDate);

    // Calculate leave days after specific date
    $monthEnd = $specificDate->copy()->endOfMonth();
    $totalLeaveDaysAfterSpecificDate = $this->calculateLeaveDays($this->staff?->id, $specificDate, $monthEnd, true);

    // Salary calculation
    $dayPaidSalaryAfterPromotions = $promotionDate
        ->diffInDays(Carbon::parse($this->monthsSelect)->endOfMonth(), false);

    $lastMonthDate = Carbon::create($this->year, $this->month, 1)->subMonth();
    $lastActualSalary = $this->staff?->salaries()
        ->whereMonth('created_at', $lastMonthDate->month)
        ->whereYear('created_at', $lastMonthDate->year)
        ->orderBy('created_at', 'desc')
        ->first()?->current_salary;
    $newSalaryAfterPromotion = $this->staff?->currentRank->payscale->min_salary;

    $totalPaidBeforePromotons = ($lastActualSalary / Carbon::parse($this->monthsSelect)->daysInMonth()) * 
        ($dayPaidSalaryBeforePromotions - $totalLeaveDaysBeforeSpecificDate);

    $totalPaidAfterPromotion = ($newSalaryAfterPromotion / Carbon::parse($this->monthsSelect)->daysInMonth()) *
        ($dayPaidSalaryAfterPromotions - $totalLeaveDaysAfterSpecificDate);

    $totalPaid = $totalPaidBeforePromotons + $totalPaidAfterPromotion;

    // Generate Word file
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
    $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန ဒေါ် ( ) ၏', 1);
    $section->addTitle('၂၀၂၄ အောက်တိုဘာ လစာစာရင်းညှိနှုင်းခြင်း။', 1);
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

    // Add table header and data
    $this->addTableHeader($table);
    $this->addTableData($table, $lastActualSalary, $totalPaidBeforePromotons, $totalPaidAfterPromotion, $totalPaid);

    // Save and download file
    $fileName = 'staff_salary.docx';
    $filePath = storage_path('app/' . $fileName);
    $phpWord->save($filePath);

    return response()->download($filePath)->deleteFileAfterSend(true);
}

private function calculateLeaveDays($staffId, $startDate, $endDate, $isAfter = false)
{
    $leaves = Leave::where('staff_id', $staffId)
        ->where(function ($query) use ($startDate, $endDate, $isAfter) {
            if ($isAfter) {
                $query->where('from_date', '>=', $endDate)
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('from_date', '<=', $startDate)
                            ->where('to_date', '>=', $endDate);
                    });
            } else {
                $query->where('from_date', '<=', $startDate)
                    ->where('to_date', '>=', $endDate);
            }
        })
        ->get();

    $totalDays = 0;
    foreach ($leaves as $leave) {
        $fromDate = Carbon::parse($leave->from_date);
        $toDate = Carbon::parse($leave->to_date);

        $calcStartDate = $isAfter ? ($fromDate->greaterThan($startDate) ? $fromDate : $startDate->copy()->addDay()) : $startDate;
        $calcEndDate = $isAfter ? ($toDate->lessThan($endDate) ? $toDate : $endDate) : $endDate;

        if ($calcStartDate->lessThanOrEqualTo($calcEndDate)) {
            $days = $calcStartDate->diffInDays($calcEndDate) + 1;
            $totalDays += $days;
        }
    }
    return $totalDays;
}

private function addTableHeader($table)
{
    $table->addRow();
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('လစာထုတ်ယူသည့် လ/နှစ်', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('ထုတ်ယူရမည့်လစာနှုန်း', ['bold' => true]);
    $table->addCell(4000, ['gridSpan' => 2])->addText('ထုတ်ပေးရမည့်လစာနှုန်း', ['alignment' => 'center']);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('ထုတ်ယူခဲ့ပြီးလစာ', ['alignment' => 'center']);
    $table->addCell(4000, ['gridSpan' => 2])->addText('ထုတ်ယူပြီးလစာငွေ', ['alignment' => 'center']);
    $table->addCell(4000, ['gridSpan' => 2])->addText('ခြားနားလစာငွေ', ['alignment' => 'center']);
}

private function addTableData($table, $lastSalary, $beforePromotion, $afterPromotion, $totalPaid)
{
    $integerPart = floor($totalPaid);
    $decimalPart = $totalPaid - $integerPart;

    $table->addRow();
    $table->addCell(2000)->addText('1');
    $table->addCell(2000)->addText('၁-'. en2mm($this->month) .'-'. en2mm($this->year));
    $table->addCell(2000)->addText(number_format($lastSalary, 2));
    $table->addCell(2000)->addText(floor($beforePromotion));
    $table->addCell(2000)->addText(number_format($beforePromotion - floor($beforePromotion), 2));
    $table->addCell(2000)->addText(floor($afterPromotion));
    $table->addCell(2000)->addText(number_format($afterPromotion - floor($afterPromotion), 2));
    $table->addCell(2000)->addText(floor($totalPaid));
    $table->addCell(2000)->addText(number_format($decimalPart, 2));
    $table->addCell(2000)->addText(floor($totalPaid));

    $table->addRow();
    $table->addCell(2000)->addText('2');
    $table->addCell(2000)->addText();
    $table->addCell(2000)->addText();
    $table->addCell(2000)->addText($this?->staff?->current_salary);
    $table->addCell(2000)->addText();
    $table->addCell(2000)->addText();
    $table->addCell(2000)->addText();
    $table->addCell(2000)->addText();
    $table->addCell(2000)->addText();
    $table->addCell(2000)->addText();
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
            $leaveStartDateForCalc = $fromDate->greaterThan($specificDate) ? $fromDate : $specificDate->copy()->addDay();
            $leaveEndDateForCalc = $toDate->lessThan($monthEnd) ? $toDate : $monthEnd;
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
        $newSalaryAfterPromotion = $this->staff?->currentRank?->payscale->min_salary;
        $totalPaidBeforePromotons = ($lastActualSalary / Carbon::now()->daysInMonth())  * ($dayPaidSalaryBeforePromotions - $totalLeaveDaysBeforeSpecificDate);
        $totalPaidAfterPromotion = ($newSalaryAfterPromotion /  Carbon::now()->daysInMonth())  * ($dayPaidSalaryAfterPromotions - $totalLeaveDaysAfterSpecificDate);



        $diffDays =  Carbon::parse($this->monthsSelect)->startOfMonth()?->diffInDays(Carbon::parse($this->staff?->promotion()->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)?->first()?->promotion_date));

        return view('livewire.investment-companies.march-salary-list', [
            'staffs' => $this->staffs,
            'totalPaidBeforePromotions' => $totalPaidBeforePromotons,
            'totalPaidAfterPromotion' => $totalPaidAfterPromotion,
            'promotionDate'  => $this->staff?->promotion()->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)?->first()?->promotion_date,
            'diffDays' => $diffDays,
            'lastActualSalary' => $lastActualSalary,
            'lastDay' => Carbon::parse($this->monthsSelect)->endOfMonth()->format('Y-m-d'),

            'dayPaidSalaryBeforePromotions' => $dayPaidSalaryBeforePromotions,
            'dayPaidSalaryAfterPromotions' => $dayPaidSalaryAfterPromotions,

        ]);
    }
}
