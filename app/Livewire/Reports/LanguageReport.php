<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class LanguageReport extends Component
{
    public $search = '';
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.language_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'language_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        
        // Create a new PHPWord object
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        
        
        $section->addTitle('Language Report', 1);
        
        // Add table
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Add table header
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true]);
        $table->addCell(4000)->addText('ရာထူး', ['bold' => true]);
        $table->addCell(4000)->addText('ဘာသာစကား', ['bold' => true]);

        // Populate table with data
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(4000)->addText($staff->name);
            $table->addCell(4000)->addText($staff->current_rank->name);
            $table->addCell(4000)->addText(implode(', ', $staff->staff_languages->pluck('language.name')->toArray()));
        }

        // Save the file
        $fileName = 'language_report.docx';
        $filePath = storage_path($fileName);
        $phpWord->save($filePath, 'Word2007');

        // Download the file
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function getFilteredStaff()
    {
        return Staff::where('name', 'like', '%' . $this->search . '%')->get();
    }



     public function render()
    {
        // $staffs = Staff::paginate(20);
        // $currentPage = $staffs->currentPage();
        // $perPage = $staffs->perPage();
        // $startIndex = ($currentPage - 1) * $perPage + 1;
        $staffs = Staff::where('name', 'like', '%' . $this->search . '%')->paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $startIndex = ($currentPage - 1) * $perPage + 1;

        return view('livewire.reports.language-report',[ 
        'staffs' => $staffs,
        'startIndex'=>$startIndex,
    ]);
    }
}
