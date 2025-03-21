<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA08;
use App\Models\Rank;
use App\Models\Staff;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies8 extends Component
{
    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;
    public $count = 0;

    public function go_pdf()
    {
        $first_ranks = Rank::where('staff_type_id', 1)
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $second_ranks = Rank::where('staff_type_id', 2)
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $third_ranks = Rank::where('staff_type_id', 3)
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $all_ranks = Rank::get();
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_8', $data, [], [
            'format' => 'A4',
            'orientation' => 'L'
        ]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_8.pdf');
    }
    public function go_excel()
    {

        return Excel::download(new PA08(
            $this->year,
            $this->month,
            $this->filterRange,
            $this->previousMonthDate,
            $this->previousMonth
        ), 'PA08.xlsx');

    }
    public function go_word()
    {
        $first_ranks = Rank::where('staff_type_id', 1)
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $second_ranks = Rank::where('staff_type_id', 2)
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $third_ranks = Rank::where('staff_type_id', 3)
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26');
                }
            ])
            ->get();

        $all_ranks = Rank::get();
        $phpWord = new PhpWord();

        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'marginTop' => 600,
            'marginRight' => 600,
            'marginBottom' => 600,
            'marginLeft' => 600,
        ]);



        $section->addText(
            'ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန',
            ['bold' => true, 'size' => 13],
            ['alignment' => 'center']
        );
        $section->addText(
            'ဌာနအလိုက်နေပြည်တော်သို့ပြောင်းရွေ့ရောက်ရှိအင်အားစာရင်း',
            ['bold' => true, 'size' => 13],
            ['alignment' => 'center']
        );
        $section->addText(
            '၂၀၂၄ ခုနှစ်၊ ဇွန်လ',
            ['bold' => true, 'size' => 13],
            ['alignment' => 'center']
        );
        $tableStyle = ['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50];
        $phpWord->addTableStyle('Ranks Table', $tableStyle);
        $table = $section->addTable('Ranks Table');
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ဌာန');
        $table->addCell(8000, ['gridSpan' => 8, 'valign' => 'center'])->addText('အိမ်ထောင်သည်', ['alignment' => 'center']);
        $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အရာရှိ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အမှုထမ်းအိမ်ထောင်သည်များ');
        $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အမှုထမ်း', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စုစုပေါင်း');
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('ဝန်ကြီး', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဒု-ဝန်ကြီး', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ညွှန်ချုပ်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဒု-ညွှန်ချုပ်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ညွှန်မှူး', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဒု-ညွှန်မှူး', ['alignment' => 'center']);
        $table->addCell(1000)->addText('လ/ထ ညွှန်မှူး', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဦးစီးအရာရှိ', ['alignment' => 'center']);
        $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
        $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
        $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue']);

        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(4000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
        $table->addCell(1000)->addText();
        $table->addCell(1000)->addText();
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1500)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())));
        $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNotNull('spouse_name')->count())));
        $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())));
        $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($all_ranks->sum('staffs_count')));
        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(4000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
        $table->addCell(1000)->addText();
        $table->addCell(1000)->addText();
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->staffs->whereNotNull('spouse_name')->count()));
        $table->addCell(1500)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())));
        $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNotNull('spouse_name')->count())));
        $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())));
        $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($all_ranks->sum('staffs_count')));
        $section->addText('မှတ်ချက်။ ' . str_repeat(' ', 5) . 'လစဥ်လဆန်း(၂)ရက်နေ့အရောက်ဝန်ကြီးရုံးသို့ပေးပို့ရန်။');


        $fileName = 'investment_companies_word_report_8.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
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

        $first_ranks = Rank::where('staff_type_id', 1)->whereNotIn('id', [1, 2])
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26')->where('current_address_region_id', '1');
                }
            ])
            ->get();

        $second_ranks = Rank::where('staff_type_id', 2)->whereNotIn('id', [1, 2])
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26')->where('current_address_region_id', '1');
                }
            ])
            ->get();

        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->whereNotIn('id', [1, 2])
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26')->where('current_address_region_id', '1');
                }
            ])
            ->get();

        $third_ranks = Rank::where('staff_type_id', 3)->whereNotIn('id', [1, 2])
            ->withCount([
                'staffs' => function ($query) {
                    $query->where('current_division_id', '26')->where('current_address_region_id', '1');
                }
            ])
            ->get();

        $all_ranks = Rank::get();

        return view('livewire.investment-companies.investment-companies8', [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'all_ranks' => $all_ranks,
        ]);
    }
}
