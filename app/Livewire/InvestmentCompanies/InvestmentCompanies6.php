<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Punishment;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies6 extends Component
{
    public $filterRange;
    public $year, $month;
    public function go_pdf()
    {
        $punishments = Punishment::whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->month)
        ->get();
      
        if ($this->filterRange) {
            [$year, $month] = explode('-', $this->filterRange);
            $this->year = $year;
            $this->month = $month;
            $punishments = Punishment::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->get();
        } else {
            $punishments = Punishment::all();
        }

        $data = [
            'punishments' => $punishments,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_6', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_6.pdf');
    }
    public function go_word()
    {
        $punishments = Punishment::whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 14], ['alignment' => 'center']);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addTitle(en2mm($this->year) . 'ခုနှစ်၊' . en2mm($this->month) . 'လအတွင်း တာဝန်ပျက်ကွက်သူဝန်ထမ်းများအား အရေးယူဆောင်ရွက်ပြီးစီးမှုနှင့် ဆောင်ရွက်ဆဲစာရင်း', 2);
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 80,
        ]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ဌာနအမည်', ['bold' => true]);
        $table->addCell(7000, ['gridSpan' => 7, 'valign' => 'center'])->addText('နိုင်ငံ့ဝန်ထမ်းဥပ‌‌ဒေနည်းပညာအရ အရေးယူမှုပြီးစီးမှု');
        $table->addCell(3000, ['vMerge' => 'restart'])->addText('ပုဒ်မ၅၀၅ဖြင့်အရေးယူပြီးစီးမှု', ['bold' => true]);
        $table->addCell(3000, ['vMerge' => 'restart'])->addText('အရေးယူဆောင်ရွက်ဆဲအင်အား', ['bold' => true]);
        $table->addCell(3000, ['vMerge' => 'restart'])->addText('စုစုပေါင်း', ['bold' => true]);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('စာဖြင့် သတိပေးခြင်း', ['alignment' => 'center']);
        $table->addCell(1000)->addText('နှစ်တိုးလစာရပ်ဆိုင်းခြင်း', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ရာထူးတိုးမြှင့်ခြင်းကိုရပ်ဆိုင်းခြင်း', ['alignment' => 'center']);
        $table->addCell(1000)->addText('လစာနှုန်းအတွင်းလစာလျှော့ချခြင်း', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ရာထူးအဆင့်လျှော့ချခြင်း', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ရာထူးမှထုတ်ပယ်ခြင်း', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ရာထူးအဖြစ်မှထုတ်ပစ်ခြင်း', ['alignment' => 'center']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $rowCount = 1;
        $table->addRow();
        $table->addCell(2000)->addText($rowCount);
        $table->addCell(4000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 1)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 2)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 3)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 4)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 5)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 8)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 9)->count()));
        $table->addCell(4000)->addText();
        $table->addCell(4000)->addText();
        $table->addCell(4000)->addText();
        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(4000)->addText('စုစုပေါင်း');
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 1)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 2)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 3)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 4)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 5)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 8)->count()));
        $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 9)->count()));
        $table->addCell(4000)->addText();
        $table->addCell(4000)->addText();
        $table->addCell(4000)->addText();
        $fileName = 'investment_companies_report.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $filePath = storage_path($fileName);
        $objWriter->save($filePath);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function render()
    {
        if ($this->filterRange) {
            [$year, $month] = explode('-', $this->filterRange);
            $this->year = $year;
            $this->month = $month;
            $results = Punishment::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->get();
        } else {
            $results = Punishment::all();
        }
        return view('livewire.investment-companies.investment-companies6', [
            'punishments' => $results,
        ]);
    }
}
