<?php

namespace App\Livewire\EmployeeRecordReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class EmpoyeeRecordReport extends Component
{

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.employee_record_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'employee_record_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();

       
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addTitle('Former Employee Record Report of April, 2021', 1);

       
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => 'black', 'cellMargin' => 50]);

        // Add header row
        $table->addRow();
        $headers = ['စဥ်', 'အမည်', 'ရာထူး', 'နှုတ်ထွက်သည့်ရက်စွဲ'];
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header, ['bold' => true]);
        }

        // Add data rows
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->current_rank->name);
            $table->addCell(2000)->addText($staff->retire_date);
        }

        // Save Word file to output
        $fileName = 'former_employee_record_report.docx';
        $temp_file = tempnam(sys_get_temp_dir(), 'former_employee_record_report') . '.docx';
        $phpWord->save($temp_file, 'Word2007');

        // Download the Word file
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }


 public function render()
     {
        $staffs = Staff::get();
         return view('livewire.employee-record-report.empoyee-record-report',[ 
        'staffs' => $staffs,
    ]);
     }
}
