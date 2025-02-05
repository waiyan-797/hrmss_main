<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
class Report4 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.report_4', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'report_4.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::with(['current_rank', 'trainings', 'abroads'])->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(29.7), // A4 width in cm (Landscape)
            'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(21.0), // A4 height in cm (Landscape)
            'orientation' => 'landscape',
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0.3),
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0.7),
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(1),
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(0.9),
        ]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('ပြည်ပသို့ သွားရောက်ခဲ့မှုမှတ်တမ်း', 1);
        //  $section->addTextBreak();
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 4,
        ]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 350, 'spaceBefore' => 350];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        // $table->addRow();
         $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(1000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true],$pStyle_1);
        $table->addCell(3000,['vMerge' => 'restart'])->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(3000,['vMerge' => 'restart'])->addText('ရာထူး', ['bold' => true],$pStyle_1);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သွားရောက်သည့်ကာလ',['bold'=>true],$pStyle_3);
        $table->addCell(3000,['vMerge' => 'restart'])->addText("သွားရောက်သည့်\nနိုင်ငံ", ['bold' => true],$pStyle_2);
        $table->addCell(4000,['vMerge' => 'restart'])->addText("ပြည်ပသို့\nသွားရောက်ခဲ့သော\nအကြောင်းအရာ", ['bold' => true],$pStyle_2);
        $table->addCell(3000,['vMerge' => 'restart'])->addText("ထောက်ပံ့သည့်\nအဖွဲ့အစည်း", ['bold' => true],$pStyle_2);
        // $table->addRow();
         $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(1000, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('မှ',['bold'=>true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('ထိ',['bold'=>true], ['alignment' => 'center']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        foreach ($staffs as $index => $staff) {
            $maxRows = max($staff->trainings->count(), $staff->abroads->count());
            for ($i = 0; $i < $maxRows; $i++) {
                $table->addRow();
                if ($i == 0) {
                    $table->addCell(1000, ['vMerge' => 'restart'])->addText(en2mm($index + 1),null,$pStyle_1);
                    $table->addCell(3000, ['vMerge' => 'restart'])->addText($staff->name,null,$pStyle_1);
                    $table->addCell(3000, ['vMerge' => 'restart'])->addText($staff->currentRank->name ?? '',null,$pStyle_1);
                } else {
                    $table->addCell(1000, ['vMerge' => 'continue']);
                    $table->addCell(3000, ['vMerge' => 'continue']);
                    $table->addCell(3000, ['vMerge' => 'continue']);
                }
        
                if (isset($staff->abroads[$i])) {
                    $table->addCell(2000)->addText(formatDMYmm($staff->abroads[$i]->from_date),null,$pStyle_2);
                    $table->addCell(2000)->addText(formatDMYmm($staff->abroads[$i]->to_date),null,$pStyle_2);
                    $table->addCell(3000)->addText($staff->abroads[$i]->countries->pluck('name')->join(', '),null,$pStyle_2);
                    $table->addCell(4000)->addText($staff->abroads[$i]->particular,null,$pStyle_2);
                    $table->addCell(3000)->addText($staff->abroads[$i]->sponser,null,$pStyle_2);
                } else {
                    $table->addCell(2000);
                    $table->addCell(2000);
                    $table->addCell(3000);
                    $table->addCell(4000);
                    $table->addCell(3000);
                }
            }
        }
        $fileName = 'A06.docx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($temp_file, 'Word2007');
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
     public function render()
     {
        $staffs = Staff::get();
        return view('livewire.reports.report4',[ 
            'staffs' => $staffs,
        ]);
     }
  
}


