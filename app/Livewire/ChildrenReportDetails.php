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
    public $dep_category;
    public function mount()
    {
        $this->dep_category = 1;
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
    $divisions = Division::where('division_type_id', $this->dep_category)->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection([
        'orientation' => 'portrait', // Portrait orientation
        'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.27), // Width of A4 in inches
        'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11.69), // Height of A4 in inches
        'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1.0),  // Top margin 1 inch
        'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1.0), // Bottom margin 1 inch
        'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1.0), // Left margin 1 inch
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.58), // Right margin 0.58 inch
    ]);
    $phpWord->setDefaultFontSize(12); 
    $section->addText(
        "ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန",
        ['bold' => true, 'size' => 12],
        ['alignment' => Jc::CENTER, 'spaceAfter' => 240]
    );
    $section->addText(
        "ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန " . 
        ($this->dep_category == 1 ? 'ရုံးချုပ်' : 'တိုင်းဒေသကြီး/ပြည်နယ်')."ဌာနခွဲများရှိ သား/သမီးများ၏ အရေအတွက်စာရင်း",
        ['bold' => true, 'size' => 12],
        ['alignment' => Jc::CENTER, 'spaceAfter' => 240]
    );
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
    // $section->addTextBreak();
    $tableStyle = [
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80,
    ];
    $phpWord->addTableStyle('staffTable', $tableStyle);
    // Add table
    $table = $section->addTable('staffTable');
    // $table->addRow();
    $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်',['bold' => true],$pStyle_2);
        $table->addCell(8000, ['vMerge' => 'restart'])->addText('ရုံး/ဌာန',['bold' => true],$pStyle_2);
        $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText("သား/သမီး\nအရေအတွက်",['bold' => true],$pStyle_2);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စုစုပေါင်း',['bold' => true],$pStyle_2);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('မှတ်ချက်',['bold' => true],$pStyle_2);
       

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(1500)->addText('ကျား',['bold'=>true], ['alignment' => 'center']);
        $table->addCell(1500)->addText('မ',['bold'=>true], ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
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
        $table->addCell(2000)->addText(en2mm($key + 1), null, $pStyle_6);
        $table->addCell(8000)->addText($division->name, null, $pStyle_6);
        $table->addCell(1500)->addText(en2mm($maleCount), null, $pStyle_6);
        $table->addCell(1500)->addText(en2mm($femaleCount), null, $pStyle_6);
        $table->addCell(2000)->addText(en2mm($totalCount), null, $pStyle_6);
        $table->addCell(2000)->addText('');
    }

    // Add total row
    $table->addRow();
    $table->addCell(2000)->addText('');
    $table->addCell(8000)->addText('ပေါင်း',['bold' => true],['alignment' => 'center']);
    $table->addCell(1500)->addText(en2mm($totalMale), ['bold' => true], ['alignment' => 'center']);
    $table->addCell(1500)->addText(en2mm($totalFemale), ['bold' => true], ['alignment' => 'center']);
    $table->addCell(2000)->addText(en2mm($totalChildren), ['bold' => true], ['alignment' => 'center']);
    $table->addCell(2000)->addText('');

    $fileName = 'SSL12.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
    public function render()
    {
        // $divisions =
        //  Division::query();

        //  if($this->selsectedDivisionTypeId){
        //     $divisions->where('division_type_id', $this->selsectedDivisionTypeId
         
        //  );
        //  }
        //       $divisions =     $divisions->get();

        // $divisions = Division::when($this->dep_category, function ($query) {
        //     $query->where('id', $this->dep_category);
        // })->get();
        $divisions = Division::where('division_type_id', $this->dep_category)->get();


        return view('livewire.children-report-details'
             , [
                'divisions' => $divisions
             ]
    );
    }
}
