<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA11;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use Maatwebsite\Excel\Facades\Excel;



class InvestmentCompanies11 extends Component
{

    public $filterRange;
    public $year;
    public $month;
    public $day;
    public $toDay;
    public $filterRangeTo;
    public $Tomonth;
    public $Toyear;


    public function go_excel() 
    {
        return Excel::download(new PA11($this->filterRange ,
        $this->filterRangeTo  , 
    
    $this->year , $this->month , $this->day , $this->toDay , $this->Tomonth , $this->Toyear
    ), 'PA11.xlsx');
    }

    
    public function go_pdf()
    {


        $date_limit = $this->filterRange;
        $_date_limit = $this->filterRangeTo;
        $ten_years_ago = Carbon::now()->subYears(10);
        //over 10 years
        $date_limit_query = Staff::where('join_date', '<=', $date_limit)->where('join_date', '<', $ten_years_ago);
        $high_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query = Staff::where('join_date', '>', $date_limit)->where('join_date', '<=', $ten_years_ago);
        $high_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();




        $high_transfer_new_staffs = $high_q
            ->where('is_newly_appointed', false)
            ->where('join_date', '<=', $ten_years_ago)->count();
        $low_transfer_new_staffs = $low_q
            ->where('is_newly_appointed', false)
            ->where('join_date', '<=', $ten_years_ago)->count();

        $high_leave_staffs = $high_q
            ->where('retire_type_id', 6)
            ->where('join_date', '<=', $ten_years_ago)->count();
        $low_leave_staffs = $low_q
            ->where('retire_type_id', 6)
            ->where('join_date', '<=', $ten_years_ago)->count();

        $_date_limit_query = Staff::where('join_date', '<=', $_date_limit);
        $high_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        //below 10 years
        $date_limit_query2 = Staff::where('join_date', '<=', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query2 = Staff::where('join_date', '>', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs2 = $high_q2
            ->where('is_newly_appointed', false)
            ->where('join_date', '>', $ten_years_ago)->count();
        $low_transfer_new_staffs2 = $low_q2
            ->where('is_newly_appointed', false)
            ->where('join_date', '>', $ten_years_ago)->count();

        $high_leave_staffs2 = $high_q2
            ->where('retire_type_id', 6)
            ->where('join_date', '>', $ten_years_ago)->count();
        $low_leave_staffs2 = $low_q2
            ->where('retire_type_id', 6)
            ->where('join_date', '>', $ten_years_ago)->count();

        $high_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();
        $data = [
            'high_dlimit_staffs' => $high_dlimit_staffs,
            'low_dlimit_staffs' => $low_dlimit_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'high_transfer_new_staffs' => $high_transfer_new_staffs,
            'low_transfer_new_staffs' => $low_transfer_new_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'high_q' => $high_q,
            'low_q' => $low_q,
            'high_dlimit_staffs2' => $high_dlimit_staffs2,
            'low_dlimit_staffs2' => $low_dlimit_staffs2,
            'high_dlimit2_staffs' => $high_dlimit2_staffs,
            'low_dlimit2_staffs' => $low_dlimit2_staffs,
            'high_new_staffs2' => $high_new_staffs2,
            'low_new_staffs2' => $low_new_staffs2,
            'high_transfer_new_staffs2' => $high_transfer_new_staffs2,
            'low_transfer_new_staffs2' => $low_transfer_new_staffs2,
            'high_leave_staffs2' => $high_leave_staffs2,
            'low_leave_staffs2' => $low_leave_staffs2,
            'high_q2' => $high_q2,
            'low_q2' => $low_q2,
            'high_dlimit2_staffs2' => $high_dlimit2_staffs2,
            'low_dlimit2_staffs2' => $low_dlimit2_staffs2,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_11', $data , [] , [
            // 'format' => 'A4-L', //a4 
            'format' => 'Legal',//legal 
            // 'orientation' => 'L' //lanscade
            'orientation' => 'P' //lanscade

        ]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_11.pdf');
    }
    public function go_word()
{
   
    $date_limit = '2023-12-31';
    $_date_limit = '2024-03-31';
    $ten_years_ago = Carbon::now()->subYears(10);

    $date_limit_query = Staff::where('join_date', '<=', $date_limit)->where('join_date', '<', $ten_years_ago);
    $high_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
    $low_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
    $high_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
    $low_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

    $new_query = Staff::where('join_date', '>', $date_limit)->where('join_date', '<=', $ten_years_ago);
    $high_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
    $low_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

    $high_transfer_new_staffs = $high_q
    ->where('is_newly_appointed', false)
    ->where('join_date', '<=', $ten_years_ago)->count();
    $low_transfer_new_staffs = $low_q
    ->where('is_newly_appointed', false)
    ->where('join_date', '<=', $ten_years_ago)->count();

    $high_leave_staffs = $high_q
    ->where('retire_type_id', 6)
    ->where('join_date', '<=', $ten_years_ago)->count();
    $low_leave_staffs = $low_q
    ->where('retire_type_id', 6)
    ->where('join_date', '<=', $ten_years_ago)->count();

    $_date_limit_query = Staff::where('join_date', '<=', $_date_limit);
    $high_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
    $low_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

    //below 10 years
    $date_limit_query2 = Staff::where('join_date', '<=', $date_limit)->where('join_date', '>', $ten_years_ago);
    $high_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
    $low_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
    $high_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
    $low_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

    $new_query2 = Staff::where('join_date', '>', $date_limit)->where('join_date', '>', $ten_years_ago);
    $high_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
    $low_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

    $high_transfer_new_staffs2 = $high_q2
    ->where('is_newly_appointed', false)
    ->where('join_date', '>', $ten_years_ago)->count();
    $low_transfer_new_staffs2 = $low_q2
    ->where('is_newly_appointed', false)
    ->where('join_date', '>', $ten_years_ago)->count();

    $high_leave_staffs2 = $high_q2
    ->where('retire_type_id', 6)
    ->where('join_date', '>', $ten_years_ago)->count();
    $low_leave_staffs2 = $low_q2
    ->where('retire_type_id', 6)
    ->where('join_date', '>', $ten_years_ago)->count();

    $high_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
    $low_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

    
    
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
   
    $table->addRow();
    $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်');
    $table->addCell(4000,['vMerge' => 'restart'])->addText('အကြောင်းအရာ');
    $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('၃၁-၁၂-၂၀၂၃ထိအင်အား');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အသစ်');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အခြားဌာနမှရောက်ရှိ');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အခြားဌာနသို့ပြောင်းရွေ့ခြင်း');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပင်စင်ခံစားခြင်း');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('နုတ်ထွက်ခြင်း');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ထုတ်ပယ်ခြင်း/ထုတ်ပစ်ခြင်း');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကွယ်လွန်ခြင်း');
    $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('၃၁-၃-၂၀၂၄ထိအင်အားစုစုပေါင်း');
    $table->addCell(2000,['vMerge' => 'restart'])->addText('မှတ်ချက်');

$table->addRow();
$table->addCell(2000, ['vMerge' => 'continue']);
$table->addCell(4000, ['vMerge' => 'continue']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပေါင်း', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာ', ['alignment' => 'center']);
$table->addCell(1000)->addText('မှု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပေါင်း', ['alignment' => 'center']);
$table->addCell(2000, ['vMerge' => 'continue']);

    

    
    $table->addRow();
    $table->addCell(2000)->addText('၁');
    $table->addCell(4000)->addText('လုပ်သက်၁၀နှစ်အထက်');
    $table->addCell(1000)->addText( en2mm($high_dlimit_staffs));
    $table->addCell(1000)->addText(en2mm($low_dlimit_staffs));
    $table->addCell(1000)->addText(en2mm($high_dlimit_staffs2 + $low_dlimit_staffs2));
    $table->addCell(1000)->addText(en2mm($high_new_staffs));
    $table->addCell(1000)->addText(en2mm($low_new_staffs));
    $table->addCell(1000)->addText(en2mm($high_transfer_new_staffs2));
    $table->addCell(1000)->addText(en2mm($low_transfer_new_staffs2));
    $table->addCell(1000)->addText(en2mm($high_leave_staffs) );
    $table->addCell(1000)->addText(en2mm($low_leave_staffs) );
    $table->addCell(1000)->addText(en2mm($high_q->where('retire_type_id', 5)->count()));
    $table->addCell(1000)->addText(en2mm($low_q->where('retire_type_id', 5)->count()));
    $table->addCell(1000)->addText(en2mm($high_q->where('retire_type_id', 2)->count()));
    $table->addCell(1000)->addText(en2mm($low_q->where('retire_type_id', 2)->count()));
    $table->addCell(1000)->addText( en2mm($high_q->whereIn('retire_type_id', [3, 4])->count()) );
    $table->addCell(1000)->addText(en2mm($low_q->where('retire_type_id', [3, 4])->count()));
    $table->addCell(1000)->addText(en2mm($high_q->where('retire_type_id', 1)->count()));
    $table->addCell(1000)->addText(en2mm($low_q->where('retire_type_id', 1)->count()));
    $table->addCell(1000)->addText(en2mm($high_dlimit2_staffs));
    $table->addCell(1000)->addText(en2mm($low_dlimit2_staffs));
    $table->addCell(1000)->addText(en2mm($high_dlimit2_staffs + $low_dlimit2_staffs));
    $table->addCell(1000)->addText();
   
    $table->addRow();
    $table->addCell(2000)->addText();
    $table->addCell(4000)->addText('လုပ်သက်၁၀နှစ်အောက်');
    $table->addCell(1000)->addText(en2mm($high_dlimit_staffs2));
    $table->addCell(1000)->addText(en2mm($low_dlimit_staffs2) );
    $table->addCell(1000)->addText(en2mm($high_dlimit_staffs2 + $low_dlimit_staffs2));
    $table->addCell(1000)->addText(en2mm($high_new_staffs2));
    $table->addCell(1000)->addText(en2mm($low_new_staffs2));
    $table->addCell(1000)->addText(en2mm($high_transfer_new_staffs2));
    $table->addCell(1000)->addText(en2mm($low_transfer_new_staffs2));
    $table->addCell(1000)->addText(en2mm($high_leave_staffs2));
    $table->addCell(1000)->addText(en2mm($low_leave_staffs2) );
    $table->addCell(1000)->addText(en2mm($high_q2->where('retire_type_id', 5)->count()));
    $table->addCell(1000)->addText(en2mm($low_q2->where('retire_type_id', 5)->count()));
    $table->addCell(1000)->addText(en2mm($high_q2->where('retire_type_id', 2)->count()));
    $table->addCell(1000)->addText(en2mm($low_q2->where('retire_type_id', 2)->count()));
    $table->addCell(1000)->addText(en2mm($high_q2->whereIn('retire_type_id', [3, 4])->count()));
    $table->addCell(1000)->addText(en2mm($low_q2->where('retire_type_id', [3, 4])->count()));
    $table->addCell(1000)->addText(en2mm($high_q2->where('retire_type_id', 1)->count()));
    $table->addCell(1000)->addText(en2mm($low_q2->where('retire_type_id', 1)->count()));
    $table->addCell(1000)->addText(en2mm($high_dlimit2_staffs));
    $table->addCell(1000)->addText(en2mm($low_dlimit2_staffs));
    $table->addCell(1000)->addText(en2mm($high_dlimit2_staffs + $low_dlimit2_staffs));
    $table->addCell(1000)->addText();
    $table->addRow();
    $table->addCell(2000)->addText();
    $table->addCell(4000)->addText('စုစုပေါင်း');
    $table->addCell(1000)->addText(en2mm($high_dlimit_staffs + $high_dlimit_staffs2));
    $table->addCell(1000)->addText(en2mm($low_dlimit_staffs + $low_dlimit_staffs2));
    $table->addCell(1000)->addText(en2mm(($high_dlimit_staffs + $low_dlimit_staffs) + ($high_dlimit_staffs2 + $low_dlimit_staffs2)));
    $table->addCell(1000)->addText(en2mm($high_new_staffs + $high_new_staffs2) );
    $table->addCell(1000)->addText(en2mm($low_new_staffs + $low_new_staffs2));
    $table->addCell(1000)->addText(en2mm($high_transfer_new_staffs + $high_transfer_new_staffs2) );
    $table->addCell(1000)->addText(en2mm($low_transfer_new_staffs + $low_transfer_new_staffs2));
    $table->addCell(1000)->addText(en2mm($high_leave_staffs + $high_leave_staffs2));
    $table->addCell(1000)->addText(en2mm($low_leave_staffs + $low_leave_staffs2));
    $table->addCell(1000)->addText(en2mm(($high_q->where('retire_type_id', 5)->count()) + ($high_q2->where('retire_type_id', 5)->count())));
    $table->addCell(1000)->addText(en2mm(($low_q->where('retire_type_id', 5)->count()) + ($low_q2->where('retire_type_id', 5)->count())));
    $table->addCell(1000)->addText(en2mm($high_q->where('retire_type_id', 2)->count() + $high_q2->where('retire_type_id', 2)->count()));
    $table->addCell(1000)->addText( en2mm($low_q->where('retire_type_id', 2)->count() + $low_q2->where('retire_type_id', 2)->count()));
    $table->addCell(1000)->addText( en2mm($high_q->whereIn('retire_type_id', [3, 4])->count() + $high_q2->whereIn('retire_type_id', [3, 4])->count()));
    $table->addCell(1000)->addText(en2mm($low_q->where('retire_type_id', [3, 4])->count() + $low_q2->where('retire_type_id', [3, 4])->count()));
    $table->addCell(1000)->addText(en2mm($high_q->where('retire_type_id', 1)->count() + $high_q2->where('retire_type_id', 1)->count()));
    $table->addCell(1000)->addText(en2mm($low_q->where('retire_type_id', 1)->count() + $low_q2->where('retire_type_id', 1)->count()));
    $table->addCell(1000)->addText(en2mm($high_dlimit2_staffs + $high_dlimit2_staffs2));
    $table->addCell(1000)->addText(en2mm($low_dlimit2_staffs + $low_dlimit2_staffs2));
    $table->addCell(1000)->addText(en2mm(($high_dlimit2_staffs + $low_dlimit2_staffs) + ($high_dlimit2_staffs2 + $low_dlimit2_staffs2)));
    $table->addCell(1000)->addText();

    // $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 10], ['alignment' => 'left']);
    // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
    // $phpWord->addTitleStyle(3, ['bold' => true, 'size' => 10], ['alignment' => 'right']);
    // $section->addTitle('ရှင်းလင်းချက်။', 1);
    // $section->addTitle('လက်ထောက်ညွှန်ကြားရေးမှူး ဒေါ်ဧဧသန့်သည် လုပ်သက် ၁၀နှစ်အထက်သို့ရောက်ရှိ
    // လက်ထောက်ညွှန်ကြားရေးမှူး ‌ဒေါ်မေသူဇာဝင့်သည် လုပ်သက် ၁၀နှစ်အထက်သို့ရောက်ရှိ', 2);
    // $section->addTitle('(လက်မှတ်)<br>တာဝန်ခံအရာရှိ', 3);
    
    $fileName = 'investment_companies_report_11.docx';
    $filePath = storage_path($fileName);
    $phpWord->save($filePath, 'Word2007');
    return response()->download($filePath, $fileName)->deleteFileAfterSend(true);
}



    public function mount()
    {
        $this->filterRange = Carbon::now()->subMonth()->format('Y-m-d'); 

        [$year, $month, $day] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;



        $this->filterRangeTo = Carbon::now()->format('Y-m-d');

        [$Toyear, $Tomonth, $day] = explode('-', $this->filterRangeTo);


        $this->Toyear = $Toyear;
        $this->Tomonth = $Tomonth;
        $this->toDay = $day;
    }


    public function render()
    {





        [$year, $month, $day] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;





        [$Toyear, $Tomonth, $day] = explode('-', $this->filterRangeTo);


        $this->Toyear = $Toyear;
        $this->Tomonth = $Tomonth;
        $this->toDay = $day;



        $date_limit = $this->filterRange;
        $_date_limit = $this->filterRangeTo;

        $ten_years_ago = Carbon::now()->subYears(10);

        $date_limit_carbon = Carbon::parse($date_limit);
        $_date_limit_carbon = Carbon::parse($_date_limit);

        // Get the date 10 years ago from both dates
        $date_limit_ten_years_ago = $date_limit_carbon->subYears(10);
        $_date_limit_ten_years_ago = $_date_limit_carbon->subYears(10);

        //over 10 years
        $date_limit_query = Staff::where('join_date', '<=', $date_limit)->where('join_date', '<', $ten_years_ago);
        $high_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query = Staff::where('join_date', '>', $date_limit)->where('join_date', '<=', $ten_years_ago);
        $high_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs = $high_q
            ->where('is_newly_appointed', false)
            ->where('join_date', '<=', $ten_years_ago)->count();
        $low_transfer_new_staffs = $low_q
            ->where('is_newly_appointed', false)
            ->where('join_date', '<=', $ten_years_ago)->count();

        $high_leave_staffs = $high_q
            ->where('retire_type_id', 6)
            ->where('join_date', '<=', $ten_years_ago)->count();
        $low_leave_staffs = $low_q
            ->where('retire_type_id', 6)
            ->where('join_date', '<=', $ten_years_ago)->count();

        $_date_limit_query = Staff::where('join_date', '<=', $_date_limit);
        $high_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        //below 10 years
        $date_limit_query2 = Staff::where('join_date', '<=', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query2 = Staff::where('join_date', '>', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs2 = $high_q2
            ->where('is_newly_appointed', false)
            ->where('join_date', '>', $ten_years_ago)->count();
        $low_transfer_new_staffs2 = $low_q2
            ->where('is_newly_appointed', false)
            ->where('join_date', '>', $ten_years_ago)->count();

        $high_leave_staffs2 = $high_q2
            ->where('retire_type_id', 6)
            ->where('join_date', '>', $ten_years_ago)->count();
        $low_leave_staffs2 = $low_q2
            ->where('retire_type_id', 6)
            ->where('join_date', '>', $ten_years_ago)->count();

        $high_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        return view('livewire.investment-companies.investment-companies11', [
            'high_dlimit_staffs' => $high_dlimit_staffs,
            'low_dlimit_staffs' => $low_dlimit_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'high_transfer_new_staffs' => $high_transfer_new_staffs,
            'low_transfer_new_staffs' => $low_transfer_new_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'high_q' => $high_q,
            'low_q' => $low_q,
            'high_dlimit_staffs2' => $high_dlimit_staffs2,
            'low_dlimit_staffs2' => $low_dlimit_staffs2,
            'high_dlimit2_staffs' => $high_dlimit2_staffs,
            'low_dlimit2_staffs' => $low_dlimit2_staffs,
            'high_new_staffs2' => $high_new_staffs2,
            'low_new_staffs2' => $low_new_staffs2,
            'high_transfer_new_staffs2' => $high_transfer_new_staffs2,
            'low_transfer_new_staffs2' => $low_transfer_new_staffs2,
            'high_leave_staffs2' => $high_leave_staffs2,
            'low_leave_staffs2' => $low_leave_staffs2,
            'high_q2' => $high_q2,
            'low_q2' => $low_q2,
            'high_dlimit2_staffs2' => $high_dlimit2_staffs2,
            'low_dlimit2_staffs2' => $low_dlimit2_staffs2,

        ]);
    }
}
