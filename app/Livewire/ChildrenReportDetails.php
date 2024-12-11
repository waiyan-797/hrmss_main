<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\DivisionType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class ChildrenReportDetails extends Component
{


public $selsectedDivisionTypeId = null  ;    
public $divisionTypes ;
public function mount(){
    $this->divisionTypes = DivisionType::all();
}
public function go_pdf(){
    $divisions =
    Division::query();

    if($this->selsectedDivisionTypeId){
       $divisions->where('division_type_id', $this->selsectedDivisionTypeId
    
    );
    }
         $divisions =     $divisions->get();
    $data = [
        'divisions' => $divisions,
    ];
    $pdf = PDF::loadView('pdf_reports.children_report_detail', $data);
    return response()->streamDownload(function() use ($pdf) {
        echo $pdf->output();
    }, 'children_report_detail_pdf.pdf');
}
// skdfjkd
public function go_word()
{
    $divisions = Division::query();

    if ($this->selsectedDivisionTypeId) {
        $divisions->where('division_type_id', $this->selsectedDivisionTypeId);
    }

    $divisions = $divisions->get();

    // Create a new PhpWord instance
    $phpWord = new PhpWord();

    // Add a section
    $section = $phpWord->addSection();

    // Add title
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nဝန်ထမ်းများ၏ သားသမီးအရေအတွက် စာရင်း",
        ['bold' => true, 'size' => 14],
        ['alignment' => Jc::CENTER, 'spaceAfter' => 240]
    );

    // Define table style
    $tableStyle = [
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80,
    ];
    $phpWord->addTableStyle('staffTable', $tableStyle);

    // Add table
    $table = $section->addTable('staffTable');
    $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ရုံး/ဌာန');
        $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သား/သမီးအရေအတွက်');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('စုစုပေါင်း');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('မှတ်ချက်');
       

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
        $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
       


    // Initialize total counters
    $totalMale = 0;
    $totalFemale = 0;
    $totalChildren = 0;

    // Populate table rows
    foreach ($divisions as $key => $division) {
        $maleCount = $division->staffs->sum(fn($staff) => $staff->children->where('gender_id', 1)->count());
        $femaleCount = $division->staffs->sum(fn($staff) => $staff->children->where('gender_id', 2)->count());
        $totalCount = $maleCount + $femaleCount;

        $totalMale += $maleCount;
        $totalFemale += $femaleCount;
        $totalChildren += $totalCount;

        $table->addRow();
        $table->addCell(2000)->addText(en2mm($key + 1));
        $table->addCell(4000)->addText($division->name);
        $table->addCell(1500)->addText(en2mm($maleCount));
        $table->addCell(1500)->addText(en2mm($femaleCount));
        $table->addCell(4000)->addText(en2mm($totalCount));
        $table->addCell(4000)->addText('');
    }

    // Add total row
    $table->addRow();
    $table->addCell(2000)->addText('');
    $table->addCell(4000)->addText('ပေါင်း', ['bold' => true]);
    $table->addCell(1500)->addText(en2mm($totalMale), ['bold' => true]);
    $table->addCell(1500)->addText(en2mm($totalFemale), ['bold' => true]);
    $table->addCell(4000)->addText(en2mm($totalChildren), ['bold' => true]);
    $table->addCell(4000)->addText('');

    $fileName = 'children_report_detail.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
    public function render()
    {
        $divisions =
         Division::query();

         if($this->selsectedDivisionTypeId){
            $divisions->where('division_type_id', $this->selsectedDivisionTypeId
         
         );
         }
              $divisions =     $divisions->get();
        return view('livewire.children-report-details'
             , [
                'divisions' => $divisions
             ]
    );
    }
}
