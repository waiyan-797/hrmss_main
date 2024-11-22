<?php

namespace App\Livewire\ReligionReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class ReligionReport extends Component
{
    
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.religion_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'religion_report_pdf.pdf');
    }
    public function go_word() {
        $staffs = Staff::with('current_rank')->get(); 
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addTitle('Religion Report', 1);
        $tableStyle = [
            'borderColor' => '000000',
            'borderSize' => 6,
            'cellMargin' => 80,
        ];
        $phpWord->addTableStyle('Staff Table', $tableStyle);
        $table = $section->addTable('Staff Table');
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်');
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အမည်');
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ရာထူး');
        $table->addCell(4000, ['gridSpan' => 2])->addText('ဗုဒ္ဓဘာသာ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2])->addText('ခရစ်ယာန်ဘာသာ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2])->addText('ဟိန္ဒူဘာသာ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2])->addText('အစ္စလာမ်ဘာသာ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2])->addText('အခြား', ['alignment' => 'center']);
    
      
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        for ($i = 0; $i < 5; $i++) {
            $table->addCell(2000)->addText('ကျား', ['alignment' => 'center']);
            $table->addCell(2000)->addText('မ', ['alignment' => 'center']);
        }
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1); 
            $table->addCell(2000)->addText($staff->name); 
            $table->addCell(2000)->addText($staff->current_rank->name); 
            $religions = [
                'Buddhist' => 1,
                'Christian' => 2,
                'Hindu' => 3,
                'Islam' => 4,
                'Other' => 5,
            ];
    
            foreach ($religions as $religion => $religionId) {
                if ($staff->religion_id == $religionId) {
                    if ($staff->gender_id == 1) {
                        $table->addCell(2000)->addText('✓'); 
                        $table->addCell(2000)->addText('');   
                    } else {
                        $table->addCell(2000)->addText('');   
                        $table->addCell(2000)->addText('✓'); 
                    }
                } else {
                  
                    $table->addCell(2000)->addText('');
                    $table->addCell(2000)->addText('');
                }
            }
        }
        $fileName = 'religion_report.docx';
        $filePath = storage_path($fileName);
        $phpWord->save($filePath, 'Word2007');
    
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
     public function render()
    {
        $staffs = Staff::paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $startIndex = ($currentPage - 1) * $perPage + 1;
        return view('livewire.religion-report.religion-report',[ 
        'staffs' => $staffs,
        'startIndex'=>$startIndex,
    ]);
    }
}
