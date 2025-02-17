<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class AwardReport extends Component
{
    use WithPagination;
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.award_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'award_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::with('awardings.award', 'currentRank')->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5), // Letter width
            'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11),  // Letter height
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
        ]);
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('Award Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow();
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(1000)->addText('စဥ်', ['bold' => true],$pStyle_2);
        $table->addCell(3500)->addText('အမည်', ['bold' => true],$pStyle_2);
        $table->addCell(5000)->addText('ရာထူး', ['bold' => true],$pStyle_2);
        $table->addCell(5000)->addText('ဆုတံဆိပ်အမျိုးအစား', ['bold' => true],$pStyle_2);
        $table->addCell(2000)->addText("အမိန့်ကြော်ငြာစာ/\nရရှိသည့်ခုနှစ်", ['bold' => true],$pStyle_2);
        foreach ($staffs as $index => $staff) {
            $isFirstAwardings= true; 
            foreach ($staff->awardings as $awardingIndex => $awarding) {
                $table->addRow();
                if ($isFirstAwardings) {
                    $table->addCell(1000, ['vMerge' => 'restart'])->addText(en2mm($awardingIndex + 1), null, ['indentation' => ['left' => 100]]);
                    $table->addCell(3500, ['vMerge' => 'restart'])->addText($staff->name, null, ['indentation' => ['left' => 100]]);
                    $table->addCell(5000, ['vMerge' => 'restart'])->addText($staff->current_rank->name, null, ['indentation' => ['left' => 100]]);
                    $isFirstAwardings = false; // Set the flag to false after the first iteration
                } else {
                    $table->addCell(1000, ['vMerge' => 'continue']);
                    $table->addCell(3500, ['vMerge' => 'continue']);
                    $table->addCell(5000, ['vMerge' => 'continue']);
                }
                $table->addCell(5000)->addText($awarding->award->name, null, ['indentation' => ['left' => 100]]);
                $table->addCell(2000)->addText($awarding->order_no, null, ['indentation' => ['left' => 100]]);
                }
              
            }
        $fileName = 'A05.docx';
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

        $staffs = Staff::whereHas('awardings')->paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $startIndex = ($currentPage - 1) * $perPage + 1;
        return view('livewire.reports.award-report',[ 
        'staffs' => $staffs,
        'startIndex'=>$startIndex,
    ]);
    }
}
