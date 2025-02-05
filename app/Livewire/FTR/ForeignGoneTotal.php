<?php

namespace App\Livewire\FTR;

use App\Models\Country;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PHPUnit\Framework\Constraint\Count;

class ForeignGoneTotal extends Component
{
    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.foreign_gone_total_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'foreign_gone_total_report_pdf.pdf');
    }
    public function go_word()
{
    $staffs = Staff::whereRaw('TIMESTAMPDIFF(YEAR, dob, CURDATE()) < ?', [45])
        ->where('current_rank_id', 3)
        ->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection([
        'orientation' => 'landscape',
        'pageSizeW'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11.69), 
        'pageSizeH'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.27),
        'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),
        'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),
        'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),
    ]);
    
    $phpWord->setDefaultFontSize(11); 
    $section->addText(
        "ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန",
        ['bold' => true, 'size' => 11],
        ['align' => 'center']
    );
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန",
        ['bold' => true, 'size' => 11],
        ['align' => 'center']
    );
    $section->addText(
        "အသက် ၄၅ နှစ်အောက် ညွှန်ကြားရေးမှူးများ၏အမည်စာရင်း",
        ['bold' => true, 'size' => 11],
        ['align' => 'center']
    );
    $section->addText(
        'ရက်စွဲ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), 
        [], 
        ['alignment' => 'right']
    );
    
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 8]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 350, 'spaceBefore' => 350];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $table->addRow();
        $table->addCell(1500)->addText("စဥ်", ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText("အမည်/ရာထူး", ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText("ဌာနခွဲ", ['bold' => true],$pStyle_1);
        $table->addCell(3000)->addText("မွေးသက္ကရာဇ်", ['bold' => true],$pStyle_1);
        $table->addCell(3000)->addText("အလုပ်စတင်\nဝင်ရောက်သည့်\nရက်စွဲ", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("လက်ရှိ\nအဆင့်ရ\nရက်စွဲ", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("နောက်ဆုံး\nသွားရောက်ခဲ့\nသည့်နိုင်ငံ/မြို့", ['bold' => true],$pStyle_2);
        $table->addCell(6000)->addText("နောက်ဆုံးသွား\nရောက်ခဲ့သည့်\nအကြောင်းအရာ\nကာလ (မှ-ထိ)", ['bold' => true],$pStyle_2);
        $table->addCell(2000)->addText("အကြိမ်ရေ", ['bold' => true],$pStyle_1);
      foreach ($staffs as $index => $staff) {
        $allCountries = $staff->abroads->pluck('country_id')
            ->merge($staff->trainings->pluck('country_id'))
            ->unique();
        $totalTrainings = $staff->trainings->count();
        $totalAbroads = $staff->abroads->count();
        $totalOverall = $totalTrainings + $totalAbroads;
        $lastAbroad = $staff->abroads->sortByDesc('to_date')->first();
        $lastTraining = $staff->trainings->sortByDesc('to_date')->first();

        $table->addRow();
        $table->addCell(1500)->addText(en2mm($index + 1),null,$pStyle_1);
        $table->addCell(4000)->addText($staff->name . "\n" . ($staff->currentRank->name ?? ''),null,$pStyle_1);
        $table->addCell(4000)->addText($staff->current_division?->name ?? '',null,$pStyle_1);
        $table->addCell(3000)->addText(formatDMYmm($staff->dob),null,$pStyle_1);
        $table->addCell(3000)->addText(formatDMYmm($staff->join_date),null,$pStyle_2);
        $table->addCell(3000)->addText(formatDMYmm($staff->current_rank_date),null,$pStyle_2);
        $table->addCell(3000)->addText($lastAbroad?->country?->name ?? ($lastTraining?->country?->name ?? ''),null,$pStyle_2);
        $table->addCell(6000)->addText(($lastAbroad->particular)."\n".
            ($lastAbroad ? formatDMYmm($lastAbroad->from_date) . ' မှ ' . formatDMYmm($lastAbroad->to_date) . ' ထိ' :
                ($lastTraining ? formatDMYmm($lastTraining->from_date) . ' - ' . formatDMYmm($lastTraining->to_date) : '')),null,$pStyle_2
        );
        $table->addCell(2000)->addText(en2mm($totalOverall),null,$pStyle_1);
    }
    $fileName = 'foreign_gone_total_report_word.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($tempFile);
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
    public function render()
    {
        // $staffs = Staff::get();
        $staffs = Staff::whereRaw('TIMESTAMPDIFF(YEAR, dob, CURDATE()) < ?', [45])
               ->where('current_rank_id', 3)
               ->get();
        return view('livewire.f-t-r.foreign-gone-total', [
            'staffs' => $staffs,
        ]);
    }
}
