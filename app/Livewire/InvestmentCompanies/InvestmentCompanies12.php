<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies12 extends Component
{
    public $filterRange;
    public $year;
    public $month;
    public $date;
    public function go_pdf()
    {
        $date_limit = $this->filterRange;
        $date_limit_query = Staff::where('join_date', '<=', $date_limit);
        $high_staff_query = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_staff_query = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));

        $high_new_appointed_staffs = $high_staff_query
            ->where('is_newly_appointed', true)
            ->count();
        $low_new_appointed_staffs = $low_staff_query
            ->where('is_newly_appointed', true)
            ->count();

        $high_transferred_staffs = $high_staff_query
            ->where('is_newly_appointed', false)
            ->count();
        $low_transferred_staffs = $low_staff_query
            ->where('is_newly_appointed', false)
            ->count();

        $high_leave_staffs = $high_staff_query->where('retire_type_id', 6)->count();
        $low_leave_staffs = $low_staff_query->where('retire_type_id', 6)->count();

        $d_limit_high_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $d_limit_low_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $data = [
            'year' => $this->year,
            'month' => $this->month,
            'date' => $this->date,
            'high_new_appointed_staffs' => $high_new_appointed_staffs,
            'low_new_appointed_staffs' => $low_new_appointed_staffs,
            'high_transferred_staffs' => $high_transferred_staffs,
            'low_transferred_staffs' => $low_transferred_staffs,
            'd_limit_high_staffs' => $d_limit_high_staffs,
            'd_limit_low_staffs' => $d_limit_low_staffs,
            'high_staff_query' => $high_staff_query,
            'low_staff_query' => $low_staff_query,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_12', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_12.pdf');
    }
    public function go_word()
{
    $date_limit = '2024-03-31';
    $date_limit_query = Staff::where('join_date', '<=', $date_limit);
    $high_staff_query = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
    $low_staff_query = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));

    $high_new_appointed_staffs = $high_staff_query->where('is_newly_appointed', true)->count();
    $low_new_appointed_staffs = $low_staff_query->where('is_newly_appointed', true)->count();
    $high_transferred_staffs = $high_staff_query->where('is_newly_appointed', false)->count();
    $low_transferred_staffs = $low_staff_query->where('is_newly_appointed', false)->count();
    $high_leave_staffs = $high_staff_query->where('retire_type_id', 6)->count();
    $low_leave_staffs = $low_staff_query->where('retire_type_id', 6)->count();

    $d_limit_high_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
    $d_limit_low_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

    
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
    $section->addText('Investment Companies Report - 12', ['bold' => true, 'size' => 16]);
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်');
    $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('မူလအင်အား');
    $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အသစ်ခန့်အပ်');
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
    $table->addCell()->addText('၁');
    $table->addCell()->addText(en2mm($high_staff_query->count()));
    $table->addCell()->addText(en2mm($low_staff_query->count()));
    $table->addCell()->addText(en2mm($high_staff_query->count() + $low_staff_query->count()));
    $table->addCell()->addText(en2mm($high_new_appointed_staffs));
    $table->addCell()->addText(en2mm($low_new_appointed_staffs) );
    $table->addCell()->addText(en2mm($high_transferred_staffs));
    $table->addCell()->addText(en2mm($low_transferred_staffs));
    $table->addCell()->addText( en2mm($high_leave_staffs));
    $table->addCell()->addText(en2mm($low_leave_staffs));
    $table->addCell()->addText(en2mm($high_staff_query->where('retire_type_id', 5)->count()));
    $table->addCell()->addText(en2mm($low_staff_query->where('retire_type_id', 5)->count()));
    $table->addCell()->addText(en2mm($high_staff_query->where('retire_type_id', 2)->count()));
    $table->addCell()->addText(en2mm($low_staff_query->where('retire_type_id', 2)->count()));
    $table->addCell()->addText(en2mm($high_staff_query->whereIn('retire_type_id', [3, 4])->count()));
    $table->addCell()->addText(en2mm($low_staff_query->whereIn('retire_type_id', [3, 4])->count()));
    $table->addCell()->addText(en2mm($high_staff_query->where('retire_type_id', 1)->count()));
    $table->addCell()->addText(en2mm($low_staff_query->where('retire_type_id', 1)->count()));
    $table->addCell()->addText(en2mm($d_limit_high_staffs));
    $table->addCell()->addText(en2mm($d_limit_low_staffs));
    $table->addCell()->addText(en2mm($d_limit_high_staffs + $d_limit_low_staffs));
    $table->addCell()->addText();
   
    $fileName = 'investment_companies_report_12.docx';
    $temp_file = tempnam(sys_get_temp_dir(), $fileName);

    $phpWord->save($temp_file, 'Word2007');

    return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
}


    public function render()
    {
        $date_limit = $this->filterRange;

        $date_limit_query = Staff::where('join_date', '<=', $date_limit);
        $high_staff_query = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_staff_query = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));


        if ($this->filterRange) {
            [$year, $month, $date] = explode('-', $this->filterRange);
            $this->year = $year;
            $this->month = $month;
            $this->date = $date;
        }
        $high_new_appointed_staffs = $high_staff_query
            ->where('is_newly_appointed', true)
            ->count();
        $low_new_appointed_staffs = $low_staff_query
            ->where('is_newly_appointed', true)
            ->count();

        $high_transferred_staffs = $high_staff_query
            ->where('is_newly_appointed', false)
            ->count();
        $low_transferred_staffs = $low_staff_query
            ->where('is_newly_appointed', false)
            ->count();

        $high_leave_staffs = $high_staff_query->where('retire_type_id', 6)->count();
        $low_leave_staffs = $low_staff_query->where('retire_type_id', 6)->count();

        $d_limit_high_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $d_limit_low_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        return view('livewire.investment-companies.investment-companies12', [
            'high_new_appointed_staffs' => $high_new_appointed_staffs,
            'low_new_appointed_staffs' => $low_new_appointed_staffs,
            'high_transferred_staffs' => $high_transferred_staffs,
            'low_transferred_staffs' => $low_transferred_staffs,
            'd_limit_high_staffs' => $d_limit_high_staffs,
            'd_limit_low_staffs' => $d_limit_low_staffs,
            'high_staff_query' => $high_staff_query,
            'low_staff_query' => $low_staff_query,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
        ]);
    }

    public function mount()
    {
        $this->filterRange = Carbon::now()->format('Y-m-d');
    }
}
