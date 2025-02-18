<?php

namespace App\Livewire\Reports;

use App\Models\Education;
use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Staff;
use App\Models\StaffEducation;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class EducationReport extends Component
{
    use WithPagination;
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
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        // $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        // Add title
        $section->addTitle('Education Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);


        $table->addRow();
        $table->addCell(700)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2200)->addText('အမည်', ['bold' => true]);
        $table->addCell(3500)->addText('ရာထူး', ['bold' => true]);
        $table->addCell(2800)->addText('ပညာအရည်အချင်း', ['bold' => true]);

        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(700)->addText(en2mm($index + 1));
            $table->addCell(2200)->addText($staff->name);
            $table->addCell(3000)->addText($staff->current_rank?->name);

            $educationCell = $table->addCell(2800);
            $educationTextRun = $educationCell->addTextRun();
            // Prepare education details
            $educationDetails = '';
            foreach ($staff->staff_educations as $edu) {
                $educationTextRun->addText($educationDetails .= $edu->education?->name);
                $educationTextRun->addTextBreak(); // Add line break
            }
        }

        // Save the file to a temporary location
        $fileName = 'education_report.docx';
        $phpWord->save($fileName, 'Word2007');

        // Download the file
        return response()->download($fileName)->deleteFileAfterSend(true);
    }

public $education_id , $education_type_id , $education_group_id ;
public $education_types , $education_groups , $educations;

public function mount(){
    $this->education_types = EducationType::all();
    $this->education_groups = EducationGroup::all();
    $this->educations = Education::all();
}

public function render()
{

    $staffs = Staff::where('current_rank_id', '!=', 23)
    ->whereNull('retire_type_id')
    ->whereNull('retire_date')
    ->whereHas('staff_educations')

    // Main filters
    ->when($this->education_group_id, fn($query) =>
        $query->whereHas('staff_educations.education', fn($q) =>
            $q->where('education_group_id', $this->education_group_id)
        )
    )
    ->when($this->education_type_id, fn($query) =>
        $query->whereHas('staff_educations.education', fn($q) =>
            $q->where('education_type_id', $this->education_type_id)
        )
    )
    ->when($this->education_id, fn($query) =>
        $query->whereHas('staff_educations', fn($q) =>
            $q->where('education_id', $this->education_id)
        )
    )->with(['staff_educations' => function ($q) {
        $q->with(['education' => function ($query) {
            if ($this->education_group_id) {
                $query->where('education_group_id', $this->education_group_id);
            }
            if ($this->education_type_id) {
                $query->where('education_type_id', $this->education_type_id);
            }
            if ($this->education_id) {
                $query->where('id', $this->education_id);
            }

        }]);
    }])
    ->distinct()
    ->paginate(20);
    $currentPage = $staffs->currentPage();
    $perPage = $staffs->perPage();
    $startIndex = ($currentPage - 1) * $perPage + 1;
    return view('livewire.reports.education-report',[
        'staffs' => $staffs,
        'startIndex'=>$startIndex,
    ]);
}

}
