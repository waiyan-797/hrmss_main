<?php

namespace App\Livewire\PensionReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class PensionReport extends Component
{
    public $searchName;
    public function go_pdf(){
        $staffs = Staff::whereHas('pension_type')
      
        ->when($this->searchName, function($q){
            $q->where('name', 'like', '%' . $this->searchName . '%');
        })
      ->get();

        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.pension_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pension_report_pdf.pdf');
    }
    public function go_word()
{
    $staffs = Staff::whereHas('pension_type')
      
        ->when($this->searchName, function($q){
            $q->where('name', 'like', '%' . $this->searchName . '%');
        })
      ->get();
    // Create a new Word document
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
    
    // Add a title
    $section->addTitle('Pension Report', 1);
    
    // Define table style
    $tableStyle = [
        'borderColor' => '000000',
        'borderSize' => 6,
        'cellMargin' => 80,
    ];
    
    $cellStyle = [
        'valign' => 'center',
        'borderColor' => '000000',
        'borderSize' => 6,
    ];

    // Create the table
    $table = $section->addTable($tableStyle);
    
    // Add table headers
    $table->addRow();
    $headers = ['စဥ်', 'အမည်', 'ရာထူး', 'ဌာန', 'txtsection', 'မွေးသက္ကရာဇ်', 'ပင်စင်ယူသည့်ရက်စွဲ', 'ပင်စင်အမျိုးအစား'];
    foreach ($headers as $header) {
        $table->addCell(2000, $cellStyle)->addText($header);
    }

    // Add data to the table
    foreach ($staffs as $index=> $staff) {
        $table->addRow();
        $table->addCell(2000, $cellStyle)->addText($index + 1);
        $table->addCell(2000, $cellStyle)->addText($staff->name);
        $table->addCell(2000, $cellStyle)->addText($staff->current_rank->name);
        $table->addCell(2000, $cellStyle)->addText($staff->current_department->name);
        $table->addCell(2000, $cellStyle)->addText('-');
        $table->addCell(2000, $cellStyle)->addText($staff->dob);
        $table->addCell(2000, $cellStyle)->addText($staff->retire_date);
        $table->addCell(2000, $cellStyle)->addText($staff->pension_type?->name);
    }
    
    // Save the document in memory
    $fileName = 'pension_report.docx';
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    
    // Output the Word file
    return response()->stream(function() use ($objWriter) {
        $objWriter->save('php://output');
    }, 200, [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'Content-Disposition' => 'attachment; filename="pension_report.docx"',
    ]);
}

    
      public function render()
     {
      $staffs = Staff::whereHas('pension_type')
      
        ->when($this->searchName, function($q){
            $q->where('name', 'like', '%' . $this->searchName . '%');
        })
      ->get();
       return view('livewire.pension-report.pension-report',[ 
            'staffs' => $staffs,
        ]);
     }
}
