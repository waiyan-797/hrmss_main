<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class SocialReport extends Component
{
   
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
    
    $staffs = Staff::get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
    $section->addTitle('Social Report', 1);

    
   
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

    // Define table headers
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
    $table->addCell(4000)->addText('အမည်', ['bold' => true]);
    $table->addCell(4000)->addText('ရာထူး', ['bold' => true]);
    $table->addCell(6000)->addText('လုပ်ဆောင်မှုများ', ['bold' => true]);

   
    foreach ($staffs  as $index=> $staff) {
        $table->addRow();
        $table->addCell(2000)->addText($index + 1);
        $table->addCell(4000)->addText($staff->name);
        $table->addCell(4000)->addText($staff->current_rank->name);
        $table->addCell(6000)->addText('');
    }

    
    $fileName = 'social_report.docx';
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
        $staffs = Staff::get();
        return view('livewire.reports.social-report',[ 
        'staffs' => $staffs,
    ]);
    }
}
