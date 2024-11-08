<?php

namespace App\Livewire\InvestmentCompanies;

use App\Livewire\Leave;
use App\Models\Leave as ModelsLeave;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class OctoberSalaryList extends Component
{

    public $staffs, $staff, $staff_id;
    public $monthSelect;
    public $year, $month;

    public function go_pdf()
    {
        $this->staffs = Staff::all()->filter(fn($staff) => $staff->isPromotionThisMonth($this->monthSelect));

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
        $diffDaysFromStart = Carbon::parse($startDateOfMonth)->diffInDays(Carbon::parse($incrementedDate));
        $lastMonthDate = Carbon::create($this->year, $this->month, 1)->subMonth();

        $lastActualSalary = $this->staff?->salaries()
            ->whereMonth('created_at', $lastMonthDate->month)
            ->whereYear('created_at', $lastMonthDate->year)
            ->orderBy('created_at', 'desc')
            ->first()?->current_salary;
        $specificDate = Carbon::parse($incrementedDate); 
        $monthStart = $specificDate->copy()->startOfMonth(); 
        $leaves = ModelsLeave::where('staff_id', $this->staff?->id)
            ->where(function ($query) use ($monthStart, $specificDate) {
                
                $query->where(function ($q) use ($monthStart) {
                    $q->where('from_date', '<=', $monthStart)
                        ->where('to_date', '>=', $monthStart);
                })
                    
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
            $leaveEndDateForCalc = $toDate->greaterThan($specificDate) ? $specificDate->copy()->subDay() : $toDate;
            $leaveStartDateForCalc = $fromDate->lessThan($monthStart) ? $monthStart : $fromDate;
            if ($leaveStartDateForCalc->lessThan($specificDate)) {
                $daysOfLeaveBeforeSpecificDate = $leaveStartDateForCalc->diffInDays($leaveEndDateForCalc) + 1; // 
                $totalLeaveDaysBeforeSpecificDate += $daysOfLeaveBeforeSpecificDate + 1;
            }
        }
        $monthEnd = $specificDate->copy()->endOfMonth();  

        $leaves = ModelsLeave::where('staff_id', $this->staff?->id)
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
                $daysOfLeaveAfterSpecificDate = $leaveStartDateForCalc->diffInDays($leaveEndDateForCalc) + 1; 
                $totalLeaveDaysAfterSpecificDate += $daysOfLeaveAfterSpecificDate;
            }
        }
        $salaryRatePerDayBeforeIncrement = ($lastActualSalary / Carbon::parse($this->monthSelect)->daysInMonth())  * ($diffDaysFromStart - $totalLeaveDaysBeforeSpecificDate);
       
        $dayPaidSalaryAfterIncrement = Carbon::parse($incrementedDate)
            ->diffInDays(Carbon::parse($this->monthSelect)->endOfMonth(), false);
        $newSalaryAfterIncrement = $this->staff?->currentRank->payscale->min_salary;
        $totalPaidAfterIncrement = ($newSalaryAfterIncrement /  Carbon::now()->daysInMonth())  * ($dayPaidSalaryAfterIncrement - $totalLeaveDaysAfterSpecificDate);
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
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
        ];
        $pdf = PDF::loadView('pdf_reports.october_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'october_salary_list_report_pdf.pdf');
    }

    
    public function go_word()
    {
        $this->staffs = Staff::all()->filter(fn($staff) => $staff->isPromotionThisMonth($this->monthSelect));

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
        $diffDaysFromStart = Carbon::parse($startDateOfMonth)->diffInDays(Carbon::parse($incrementedDate));
        $lastMonthDate = Carbon::create($this->year, $this->month, 1)->subMonth();

        $lastActualSalary = $this->staff?->salaries()
            ->whereMonth('created_at', $lastMonthDate->month)
            ->whereYear('created_at', $lastMonthDate->year)
            ->orderBy('created_at', 'desc')
            ->first()?->current_salary;
        $specificDate = Carbon::parse($incrementedDate); 
        $monthStart = $specificDate->copy()->startOfMonth(); 
        $leaves = ModelsLeave::where('staff_id', $this->staff?->id)
            ->where(function ($query) use ($monthStart, $specificDate) {
                
                $query->where(function ($q) use ($monthStart) {
                    $q->where('from_date', '<=', $monthStart)
                        ->where('to_date', '>=', $monthStart);
                })
                    
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
            $leaveEndDateForCalc = $toDate->greaterThan($specificDate) ? $specificDate->copy()->subDay() : $toDate;
            $leaveStartDateForCalc = $fromDate->lessThan($monthStart) ? $monthStart : $fromDate;
            if ($leaveStartDateForCalc->lessThan($specificDate)) {
                $daysOfLeaveBeforeSpecificDate = $leaveStartDateForCalc->diffInDays($leaveEndDateForCalc) + 1; // 
                $totalLeaveDaysBeforeSpecificDate += $daysOfLeaveBeforeSpecificDate + 1;
            }
        }
        $monthEnd = $specificDate->copy()->endOfMonth();  

        $leaves = ModelsLeave::where('staff_id', $this->staff?->id)
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
                $daysOfLeaveAfterSpecificDate = $leaveStartDateForCalc->diffInDays($leaveEndDateForCalc) + 1; 
                $totalLeaveDaysAfterSpecificDate += $daysOfLeaveAfterSpecificDate;
            }
        }
        $salaryRatePerDayBeforeIncrement = ($lastActualSalary / Carbon::parse($this->monthSelect)->daysInMonth())  * ($diffDaysFromStart - $totalLeaveDaysBeforeSpecificDate);
       
        $dayPaidSalaryAfterIncrement = Carbon::parse($incrementedDate)
            ->diffInDays(Carbon::parse($this->monthSelect)->endOfMonth(), false);
        $newSalaryAfterIncrement = $this->staff?->currentRank->payscale->min_salary;
        $totalPaidAfterIncrement = ($newSalaryAfterIncrement /  Carbon::now()->daysInMonth())  * ($dayPaidSalaryAfterIncrement - $totalLeaveDaysAfterSpecificDate);
        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 14], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန ၂၀၂၄ အောက်တိုဘာ အတွက် လစာစာရင်းညှိနှုင်းခြင်း။ ...', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လစာထုတ်ယူသည့် လ/နှစ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ထုတ်ယူရမည့်လစာနှုန်း', ['bold' => true]);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ထုတ်ပေးရမည့်လစာနှုန်း');
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ထုတ်ယူခဲ့ပြီးလစာနှုန်း', ['bold' => true]);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ထုတ်ယူပြီးလစာငွေ');
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ခြားနားလစာငွေ');
       
        
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
            $table->addRow();
            $table->addCell(2000)->addText('၁');
            $table->addCell(2000)->addText();
            $table->addCell(2000)->addText($lastActualSalary);
            $table->addCell(2000)->addText(floor($salaryRatePerDayBeforeIncrement));
            $table->addCell(2000)->addText(($salaryRatePerDayBeforeIncrement - floor($salaryRatePerDayBeforeIncrement)) * 100);
            $table->addCell(2000)->addText();
            $table->addCell(2000)->addText($lastActualSalary);
            $table->addCell(2000)->addText();
            $table->addCell(2000)->addText(floor($totalPaidAfterIncrement -  $salaryRatePerDayBeforeIncrement));
            $table->addCell(2000)->addText( ( $totalPaidAfterIncrement - floor($totalPaidAfterIncrement))  - ($salaryRatePerDayBeforeIncrement -  floor($salaryRatePerDayBeforeIncrement)));
           

        $table->addRow();
        $table->addCell(2000)->addText('၂');
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText($this?->staff?->current_salary);
        $table->addCell(2000)->addText(floor($totalPaidAfterIncrement));
        $table->addCell(2000)->addText($totalPaidAfterIncrement - floor($totalPaidAfterIncrement));
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
       
        $fileName = 'october_salary_list.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
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
        $this->staffs = Staff::all();
        $this->staff = $this->staffs->first();

        $daysCountBeforeIncrement = 0;
        $daysCountAfterIncrement = 0;
        $startDateOfMonth = Carbon::parse($this->monthSelect)->startOfMonth()->toDateString();
        $endtDateOfMonth = Carbon::parse($this->monthSelect)->endOfMonth()->toDateString();
        $incrementedDate = $this->staff?->increments->first()->increment_date;


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
