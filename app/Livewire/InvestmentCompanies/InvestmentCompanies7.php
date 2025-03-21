<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA07;
use App\Models\Promotion;
use App\Models\Staff;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies7 extends Component
{
    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;
     public $count=0;

    public function go_pdf()
    {
        $count=0;
        [$year, $month] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $previousMonthDate = Carbon::createFromDate($this->year, $this->month)->subMonth();
        $this->previousYear = $previousMonthDate->year;
        $this->previousMonth = $previousMonthDate->month;

        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {
                    // Active and status hasn't changed during the previous month
                    $subQuery
                        ->where('status_changed_at', '<=', $previousMonthDate->endOfMonth()) // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=', $this->previousMonth) // To ensure they were active during the previous month
            ->count();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {
                    $subQuery
                        ->where('status_changed_at', '<=', $previousMonthDate->endOfMonth()) // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=', $this->previousMonth) // To ensure they were active during the previous month
            ->count();
        $query = Staff::query();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();

        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();

        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where('is_newly_appointed', true)
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->where('is_newly_appointed', true)
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->count();
        $total_new_staffs = $high_new_staffs + $low_new_staffs;

        $high_leave_staffs = Staff::where('retire_type_id', 6)
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();
        $total_leave_staffs = $high_leave_staffs + $low_leave_staffs;

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where('is_newly_appointed', false)
            ->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)
            ->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->where('is_newly_appointed', false)
            ->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)
            ->count();
        $total_transfer_staffs = $high_transfer_staffs + $low_transfer_staffs;

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();

        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();

        $high_left_staffs = $high_staffs + $high_new_staffs + $high_transfer_staffs - ($high_leave_staffs + $high_reduced_total);
        $low_left_staffs = $low_staffs + $low_new_staffs + $low_transfer_staffs - ($low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;
        $data = [
            'count'=>$count,
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'high_reduced_staffs' => $high_reduced_staffs,
            'low_reduced_staffs' => $low_reduced_staffs,
            'total_reduced_staffs' => $total_reduced_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'total_new_staffs' => $total_new_staffs,
            'high_transfer_staffs' => $high_transfer_staffs,
            'low_transfer_staffs' => $low_transfer_staffs,
            'total_transfer_staffs' => $total_transfer_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'total_leave_staffs' => $total_leave_staffs,
            'high_left_staffs' => $high_left_staffs,
            'low_left_staffs' => $low_left_staffs,
            'total_left_staffs' => $total_left_staffs,
            'year' => $this->year,
            'month' => $this->month,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_7', $data,[],[
            'format'=>'legal',
            'orientation'=>'L'
        ]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_7.pdf');
    }
    // public $year, $month, $filterRange;
    // public $previousYear, $previousMonthDate, $previousMonth;
    public function go_excel() 
    {
        return Excel::download(new PA07($this->year,$this->month,$this->filterRange,$this->previousMonthDate,$this->previousMonth
    ), 'PA07.xlsx');
    }
   
    public function go_word()
    {
        [$year, $month] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->get();

        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', true)->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', true)->count();
        $total_new_staffs = Staff::where('is_newly_appointed', true)->count();

        $high_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->count();
        $total_leave_staffs = Staff::where('retire_type_id', 6)->count();

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', false)->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', false)->count();
        $total_transfer_staffs = Staff::where('is_newly_appointed', false)->count();

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->count();
        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->count();

        $high_left_staffs = $high_staffs + $high_new_staffs - ($high_transfer_staffs + $high_leave_staffs + $high_reduced_total);
        $low_left_staffs = $low_staffs + $low_new_staffs - ($low_transfer_staffs + $low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;

        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'marginLeft' => 600,
            'marginRight' => 600,
            'marginTop' => 600,
            'marginBottom' => 600,
           
        ]);
        
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle(mmDateFormat($year, $month), 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true], ['align' => 'center']);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ဌာန', ['bold' => true], ['align' => 'center']);
        $table->addCell(3000, ['gridSpan' => 3])->addText('မူလအင်အား', ['bold' => true], ['align' => 'center']);
        $table->addCell(9000, ['gridSpan' => 9])->addText('ပြုန်းတီးအင်အား', ['bold' => true], ['align' => 'center']);
        $table->addCell(3000, ['gridSpan' => 3])->addText('ထပ်မံခန့်ထားခြင်း', ['bold' => true], ['align' => 'center']);
        $table->addCell(6000, ['gridSpan' => 6])->addText('ပြောင်းရွေ့အင်အား', ['bold' => true], ['align' => 'center']);
        $table->addCell(3000, ['gridSpan' => 3])->addText('လက်ကျန်အင်အား', ['bold' => true], ['align' => 'center']);

        // Second Row
        $table->addRow();
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('အရာရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('အခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('ပေါင်း', ['bold' => true], ['align' => 'center']);
        $table->addCell(2000, ['gridSpan' => 2])->addText('သေဆုံး', ['bold' => true], ['align' => 'center']);
        $table->addCell(2000, ['gridSpan' => 2])->addText('နုတ်ထွက်', ['bold' => true], ['align' => 'center']);
        $table->addCell(2000, ['gridSpan' => 2])->addText('ထုတ်ပစ်', ['bold' => true], ['align' => 'center']);
        $table->addCell(2000, ['gridSpan' => 2])->addText('ပင်စင်', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('ပေါင်း', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('အရာရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('အခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('ပေါင်း', ['bold' => true], ['align' => 'center']);
        $table->addCell(3000, ['gridSpan' => 3])->addText('ထွက်ခွာ', ['bold' => true], ['align' => 'center']);
        $table->addCell(3000, ['gridSpan' => 3])->addText('ရောက်ရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('အရာရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('အခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('ပေါင်း', ['bold' => true], ['align' => 'center']);

        // Third Row
        $table->addRow();
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('ရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('ရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ပေါင်း', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ရှိ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ပေါင်း', ['bold' => true], ['align' => 'center']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addRow();
        $table->addCell(2000)->addText('1');
        $table->addCell(4000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
        $table->addCell(2000)->addText(en2mm($high_staffs));
        $table->addCell(2000)->addText(en2mm($low_staffs));
        $table->addCell(2000)->addText(en2mm($high_staffs + $low_staffs));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 1)->count()));
        $table->addCell(1000)->addText(en2mm($low_reduced_staffs->where('retire_type_id', 1)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 2)->count()));
        $table->addCell(1000)->addText(en2mm($low_reduced_staffs->where('retire_type_id', 2)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 5)->count()));
        $table->addCell(1000)->addText(en2mm($low_reduced_staffs->where('retire_type_id', 5)->count()));
        $table->addCell(2000)->addText(en2mm($total_reduced_staffs->count()));
        $table->addCell(2000)->addText(en2mm($high_new_staffs));
        $table->addCell(2000)->addText(en2mm($low_new_staffs));
        $table->addCell(2000)->addText(en2mm($total_new_staffs));
        $table->addCell(1000)->addText(en2mm($high_leave_staffs));
        $table->addCell(1000)->addText(en2mm($low_leave_staffs));
        $table->addCell(1000)->addText(en2mm($total_leave_staffs));
        $table->addCell(1000)->addText(en2mm($high_transfer_staffs));
        $table->addCell(1000)->addText(en2mm($low_transfer_staffs));
        $table->addCell(1000)->addText(en2mm($total_transfer_staffs));
        $table->addCell(1000)->addText(en2mm($high_left_staffs));
        $table->addCell(1000)->addText(en2mm($low_left_staffs));
        $table->addCell(1000)->addText(en2mm($total_left_staffs));
        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(4000)->addText();
        $table->addCell(2000)->addText(en2mm($high_staffs));
        $table->addCell(2000)->addText(en2mm($low_staffs));
        $table->addCell(2000)->addText(en2mm($high_staffs + $low_staffs));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 1)->count()));
        $table->addCell(1000)->addText(en2mm($low_reduced_staffs->where('retire_type_id', 1)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 2)->count()));
        $table->addCell(1000)->addText(en2mm($low_reduced_staffs->where('retire_type_id', 2)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()));
        $table->addCell(1000)->addText(en2mm($high_reduced_staffs->where('retire_type_id', 5)->count()));
        $table->addCell(1000)->addText(en2mm($low_reduced_staffs->where('retire_type_id', 5)->count()));
        $table->addCell(2000)->addText(en2mm($total_reduced_staffs->count()));
        $table->addCell(2000)->addText(en2mm($high_new_staffs));
        $table->addCell(2000)->addText(en2mm($low_new_staffs));
        $table->addCell(2000)->addText(en2mm($total_new_staffs));
        $table->addCell(1000)->addText(en2mm($high_leave_staffs));
        $table->addCell(1000)->addText(en2mm($low_leave_staffs));
        $table->addCell(1000)->addText(en2mm($total_leave_staffs));
        $table->addCell(1000)->addText(en2mm($high_transfer_staffs));
        $table->addCell(1000)->addText(en2mm($low_transfer_staffs));
        $table->addCell(1000)->addText(en2mm($total_transfer_staffs));
        $table->addCell(1000)->addText(en2mm($high_left_staffs));
        $table->addCell(1000)->addText(en2mm($low_left_staffs));
        $table->addCell(1000)->addText(en2mm($total_left_staffs));
        $fileName = 'investment_companies_report_7.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $phpWord->save($filePath, 'Word2007');
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function mount()
    {
        $this->filterRange = Carbon::now()->format('Y-m'); // Format: 'YYYY-MM'
    }
    public function render()
    {
        [$year, $month] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $previousMonthDate = Carbon::createFromDate($this->year, $this->month)->subMonth();
        $this->previousYear = $previousMonthDate->year;
        $this->previousMonth = $previousMonthDate->month;
        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {
                    // Active and status hasn't changed during the previous month
                    $subQuery
                        ->where('status_changed_at', '<=', $previousMonthDate->endOfMonth()) // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=', $this->previousMonth) // To ensure they were active during the previous month
            ->count();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {
                    // Active and status hasn't changed during the previous month
                    $subQuery
                        ->where('status_changed_at', '<=', $previousMonthDate->endOfMonth()) // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=', $this->previousMonth) // To ensure they were active during the previous month
            ->count();
        $query = Staff::query();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();

        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();
        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where('is_newly_appointed', true)
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->where('is_newly_appointed', true)
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->count();
        $total_new_staffs = $high_new_staffs + $low_new_staffs;

        $high_leave_staffs = Staff::where('retire_type_id', 6)
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();
        $total_leave_staffs = $high_leave_staffs + $low_leave_staffs;

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where('is_newly_appointed', false)
            ->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)
            ->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->where('is_newly_appointed', false)
            ->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)
            ->count();
        $total_transfer_staffs = $high_transfer_staffs + $low_transfer_staffs;

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();

        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();

        $high_left_staffs = $high_staffs + $high_new_staffs + $high_transfer_staffs - ($high_leave_staffs + $high_reduced_total);
        $low_left_staffs = $low_staffs + $low_new_staffs + $low_transfer_staffs - ($low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;
        return view('livewire.investment-companies.investment-companies7', [
            'query' => $query,
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'high_reduced_staffs' => $high_reduced_staffs,
            'low_reduced_staffs' => $low_reduced_staffs,
            'total_reduced_staffs' => $total_reduced_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'total_new_staffs' => $total_new_staffs,
            'high_transfer_staffs' => $high_transfer_staffs,
            'low_transfer_staffs' => $low_transfer_staffs,
            'total_transfer_staffs' => $total_transfer_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'total_leave_staffs' => $total_leave_staffs,
            'high_left_staffs' => $high_left_staffs,
            'low_left_staffs' => $low_left_staffs,
            'total_left_staffs' => $total_left_staffs,
        ]);
    }
}
