<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class OtherQualificationReport extends Component
{
    use WithPagination;
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.other_qualification_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'other_qualification_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();

        $phpWord = new PhpWord();
      
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        
        // Title
        $section->addTitle('Other Qualification Report', 1);
        
        // Table setup
        $table = $section->addTable([
            'borderSize' => 6, 
            'borderColor' => '000000',
            'cellMargin' => 80
        ]);
        
        // Header
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true]);
        $table->addCell(4000)->addText('ရာထူး', ['bold' => true]);
        $table->addCell(4000)->addText('ရရှိသောဒီပလိုမာ/ဘွဲ့', ['bold' => true]);

        // Data Rows
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(4000)->addText($staff->name);
            $table->addCell(4000)->addText($staff->current_rank->name);
            $educationNames = $staff->staff_educations->pluck('education.name')->toArray();
            $educationNamesString = implode(', ', $educationNames);
            $table->addCell(4000)->addText($educationNamesString);
        }

       
        $fileName = 'other_qualification_report.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $phpWord->save($filePath, 'Word2007');
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
     public function render()
    {
        $staffs = Staff::paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $startIndex = ($currentPage - 1) * $perPage + 1;
        return view('livewire.reports.other-qualification-report',[ 
        'staffs' => $staffs,
        'startIndex'=>$startIndex,
    ]);
    }
}
