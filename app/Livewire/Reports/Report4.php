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
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);

        // Add title
        $section->addTitle('Report - 4', 1);

        // Add table
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 80,
        ]);

        // Header row
        $table->addRow();
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အမည်', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ရရှိသောဒီပလိုမာ/ဘွဲ့', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲ', ['bold' => true]);
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သွားရောက်သည့်ကာလ');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ', ['bold' => true]);
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သွားရောက်သည့်ကာလ');

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('မှ', ['alignment' => 'center']);
        $table->addCell(3000)->addText('ထိ', ['alignment' => 'center']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('မှ', ['alignment' => 'center']);
        $table->addCell(3000)->addText('ထိ', ['alignment' => 'center']);
       
       
       
        foreach ($staffs as $index=> $staff) {
            foreach ($staff->trainings as $training) {
                $table->addRow();
                $table->addCell(2000)->addText($index + 1);
                $table->addCell(2000)->addText($staff->name);
                $table->addCell(2000)->addText($staff->current_rank->name);
                $table->addCell(2000)->addText($training->diploma_name);
                $table->addCell(2000)->addText($training->training_type->name);
                $table->addCell(2000)->addText($training->from_date);
                $table->addCell(2000)->addText($training->to_date);
                $table->addCell(2000)->addText('');
                $table->addCell(2000)->addText('');
            }

            foreach ($staff->abroads as $index=> $abroad) {
                $table->addRow();
                $table->addCell(2000)->addText($index + 1);
                $table->addCell(2000)->addText($staff->name);
                $table->addCell(2000)->addText($staff->current_rank->name);
                $table->addCell(2000)->addText('');
                $table->addCell(2000)->addText('');
                $table->addCell(2000)->addText($abroad->from_date);
                $table->addCell(2000)->addText($abroad->to_date);
                $table->addCell(2000)->addText($abroad->particular);
                $table->addCell(2000)->addText($abroad->from_date);
                $table->addCell(2000)->addText($abroad->to_date);

            }
        }

      
        $fileName = 'report_4.docx';
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


