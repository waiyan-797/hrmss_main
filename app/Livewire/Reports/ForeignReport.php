<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class ForeignReport extends Component
{
    
    
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.foreign_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'foreign_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addTitle('Foreign Report', 1);

       
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('သွားရောက်သည့်နိုင်ငံ', ['bold' => true]);
        $table->addCell(2000)->addText('သွားရောက်သည့်ရက်', ['bold' => true]);

        foreach ($staffs as $index=> $staff) {
            foreach ($staff->abroads as $abroad) {
                $table->addRow();
                $table->addCell(2000)->addText($index + 1);
                $table->addCell(2000)->addText($staff->name);
                $table->addCell(2000)->addText($abroad->country->name);
                $table->addCell(2000)->addText($abroad->from_date);
            }
        }

        // Save the file to a temporary location
        $fileName = 'foreign_report.docx';
        $phpWord->save($fileName, 'Word2007');

        // Download the file
        return response()->download($fileName)->deleteFileAfterSend(true);
    }


public function render()
{
    $staffs = Staff::paginate(30);
    return view('livewire.reports.foreign-report',[ 
        'staffs' => $staffs,
    ]);
}
}
