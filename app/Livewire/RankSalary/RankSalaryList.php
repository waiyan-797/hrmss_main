<?php

namespace App\Livewire\RankSalary;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class RankSalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.rank_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'rank_salary_list_report_pdf.pdf');
    }
    public function go_word()
{
    $staffs = Staff::get();
    
  
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    // Add the header
    $section->addText(
        'ရာထူးအလိုက်လစာနှုန်းထားစာရင်း',
        ['name' => 'Arial', 'size' => 16, 'bold' => true],
        ['align' => 'center']
    );
    $styleTable = [
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 50,
    ];
    $phpWord->addTableStyle('StaffTable', $styleTable);
    $table = $section->addTable('StaffTable');
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်', ['bold' => true], ['align' => 'center']);
    $table->addCell(4000)->addText('ရာထူးအမည်', ['bold' => true], ['align' => 'center']);
    $table->addCell(4000)->addText('လစာနှုန်း', ['bold' => true], ['align' => 'center']);
    foreach ($staffs as $index => $staff) {
        $table->addRow();
        $table->addCell(2000)->addText($index + 1, null, ['align' => 'center']);
        $table->addCell(4000)->addText($staff->current_rank?->name ?? '', null, ['align' => 'center']);
        $table->addCell(4000)->addText($staff->payscale?->name ?? '', null, ['align' => 'center']);
    }
    $table->addRow();
    $table->addCell(2000)->addText();
    $table->addCell(4000)->addText();
    $table->addCell(4000)->addText('စုစုပေါင်း');

    $fileName = 'rank_salary_list_report.docx';
    $tempFile = storage_path($fileName);
    $phpWordWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $phpWordWriter->save($tempFile);
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}

     public function render()
     {
        $staffs = Staff::get();
      return view('livewire.rank-salary.rank-salary-list',[ 
        'staffs' => $staffs,
    ]);
    }
}
