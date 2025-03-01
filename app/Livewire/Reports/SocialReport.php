<?php

namespace App\Livewire\Reports;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
class SocialReport extends Component
{
    use WithPagination;
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.social_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'social_report_pdf.pdf');
    }
    public function go_word()
{
    $staffs = Staff::whereHas('socialActivities')->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection([
        'orientation' => 'portrait',
        'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5),
        'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11),
        'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
    ]);
    $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
    $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
    $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    $section->addTitle('Social Report', 1);
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' =>8 ]);
    $table->addRow();
    $table->addCell(1000)->addText('စဥ်', ['bold' => true],$pStyle_1);
    $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
    $table->addCell(4000)->addText('ရာထူး', ['bold' => true],$pStyle_1);
    $table->addCell(6000)->addText('လူမှုရေးလုပ်ရှားမှု', ['bold' => true],$pStyle_1);
    $index = 1;
    foreach ($staffs as $staff) {
        $table->addRow();
        $table->addCell(1000)->addText(en2mm($index++),null,$pStyle_1);
        $table->addCell(4000)->addText($staff->name ?? '',null,$pStyle_1);
        $table->addCell(4000)->addText($staff->currentRank?->name ?? '',null,$pStyle_1);
        $cell = $table->addCell(6000);
        $text = "";
        foreach ($staff->socialActivities as $activity) {
        $text .= $activity->particular . "\n"; 
        }
        $cell->addText($text,null,$pStyle_1);  
    }
    $fileName = 'E04.docx';
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    return response()->stream(function () use ($objWriter) {
        $objWriter->save('php://output');
    }, 200, [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
    ]);
}
     public function render()
    {
        $staffs = Staff::whereHas('socialActivities')->paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $start = ($currentPage - 1) * $perPage + 1;
        return view('livewire.reports.social-report',[ 
        'staffs' => $staffs,
        'start'=>$start,
    ]);
    }
}
