<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use App\Models\StaffEducation;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class EducationReport extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.education_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'education_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        // Add title
        $section->addTitle('Education Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        
        
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ရာထူး', ['bold' => true]);
        $table->addCell(2000)->addText('ပညာအရည်အချင်း', ['bold' => true]);

        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->current_rank->name);

            // Prepare education details
            $educationDetails = '';
            foreach ($staff->staff_educations as $edu) {
                $educationDetails .= $edu->education_group->name . ' ' . $edu->education_type->name . ' ' . $edu->education->name . "\n";
            }
            $table->addCell(2000)->addText($educationDetails);
        }

        // Save the file to a temporary location
        $fileName = 'education_report.docx';
        $phpWord->save($fileName, 'Word2007');

        // Download the file
        return response()->download($fileName)->deleteFileAfterSend(true);
    }


public function render()
{
    $staffs = Staff::get();
    return view('livewire.reports.education-report',[ 
        'staffs' => $staffs,
    ]);
}

}
