<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Promotion;
use App\Models\Staff;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies7 extends Component
{
    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;

    public function go_pdf()
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
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();









        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {


                    // Active and status hasn't changed during the previous month
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                })
                    // ->orWhere(function ($subQuery) {
                    //     // Active for users who never changed status
                    //     $subQuery->whereNull('status_changed_at')
                    //         ->where('is_active', '1');  // Never changed, still active
                    // })
                ;
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();






        $query = Staff::query();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();

        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();


        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $total_new_staffs =  $high_new_staffs  +  $low_new_staffs;


        $high_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $total_leave_staffs =
            $high_leave_staffs + $low_leave_staffs;

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $total_transfer_staffs = $high_transfer_staffs + $low_transfer_staffs;

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $high_left_staffs = ($high_staffs + $high_new_staffs + $high_transfer_staffs) - ($high_leave_staffs + $high_reduced_total);
        $low_left_staffs = ($low_staffs + $low_new_staffs + $low_transfer_staffs) - ($low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;
        $data = [
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
            'month' => $this->month
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_7', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_7.pdf');
    }
    public function go_word()
    {
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

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_left_staffs = ($high_staffs + $high_new_staffs) - ($high_transfer_staffs + $high_leave_staffs + $high_reduced_total);
        $low_left_staffs = ($low_staffs + $low_new_staffs) - ($low_transfer_staffs + $low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;

        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('၂၀၂၄ ခုနှစ်၊ ဇွန်လ', 2);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ဌာန');
        $table->addCell(6000, ['gridSpan' => 3, 'valign' => 'center'])->addText('မူလအင်အား');

        $table->addCell(10000, ['gridSpan' => 5, 'valign' => 'center'])->addText('ပြုန်းတီးအင်အား');
        $table->addCell(6000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ထပ်မံခန့်ထားခြင်း');
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပြောင်းရွေ့အင်အား');
        $table->addCell(6000, ['gridSpan' => 3, 'valign' => 'center'])->addText('လက်ကျန်အင်အား');

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အရာရှိ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အခြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('ပေါင်း', ['alignment' => 'center']);

        $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သေဆုံး');
        $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('နုတ်ထွက်');
        $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ထုတ်ပစ်');
        $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပင်စင်');
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('ပေါင်း', ['alignment' => 'center']);

        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အရာရှိ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အခြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('ပေါင်း', ['alignment' => 'center']);

        $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ထွက်ခွာ');
        $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရောက်ရှိ');

        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အရာရှိ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အခြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('ပေါင်း', ['alignment' => 'center']);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အရာရှိ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အခြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('ပေါင်း', ['alignment' => 'center']);

        $table->addCell(1000)->addText('ရှိ', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['alignment' => 'center']);
        $table->addCell(
            1000
        )->addText('ရှိ	', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['alignment' => 'center']);

        $table->addCell(1000)->addText('ရှိ', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['alignment' => 'center']);

        $table->addCell(1000)->addText('ရှိ	', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပေါင်း', ['alignment' => 'center']);

        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အရာရှိ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အခြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('ပေါင်း', ['alignment' => 'center']);

        $table->addCell(1000)->addText('ရှိ', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပေါင်း', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ရှိ', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခြား', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပေါင်း', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အရာရှိ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('အခြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue'])->addText('ပေါင်း', ['alignment' => 'center']);
        $table->addRow();
        $table->addCell(2000)->addText('1');
        $table->addCell(4000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
        $table->addCell(2000)->addText($high_staffs);
        $table->addCell(2000)->addText($low_staffs);
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
        $table->addCell(2000)->addText($high_staffs);
        $table->addCell(2000)->addText($low_staffs);
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
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {


                    // Active and status hasn't changed during the previous month
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();
        $query = Staff::query();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();

        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();
        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $total_new_staffs =  $high_new_staffs  +  $low_new_staffs;


        $high_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $total_leave_staffs =
            $high_leave_staffs + $low_leave_staffs;

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $total_transfer_staffs = $high_transfer_staffs + $low_transfer_staffs;

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $high_left_staffs = ($high_staffs + $high_new_staffs + $high_transfer_staffs) - ($high_leave_staffs + $high_reduced_total);
        $low_left_staffs = ($low_staffs + $low_new_staffs + $low_transfer_staffs) - ($low_leave_staffs + $low_reduced_total);
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
