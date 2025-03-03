<?php

namespace App\Livewire\PlanningAccounting;

use App\Models\Division;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use Carbon\Carbon;

class PlanningAccounting extends Component
{
    use WithPagination;

    public $divisions , $selectedDivisionId;
    
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.planning_accounting_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'planning_accounting_report_pdf.pdf');
    }
    public function go_word()
{
    $staffs = Staff::get();
    $phpWord = new PhpWord();
    $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.56),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),   // 0.5 inch
        ]);

        
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'left','lineHeight' => 1]);
        $phpWord->addTitleStyle(3, ['bold' => false, 'font'=>'Pyidaungsu Number', 'size' => 13], ['alignment' => 'right', 'lineHeight' => 1]);
        
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        
        // dd($divisionTitle );
        $division = getDivisionBy($this->selectedDivisionId);
        $section->addTitle(($division ? $division->name : 'Unknown Division').'ဝန်ထမ်းအင်အားစာရင်း' , 2);
        // $section->addTitle(formatDMYmm(Carbon::now()), 3);

    $table = $section->addTable([
        'borderSize' => 6, 
        'borderColor' => '000000',
        'cellMargin' => 5
    ]);
       
    $table->addRow(50,['tblHeader' => true]);
    $table->addCell(700)->addText('စဥ်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
    $table->addCell(4500)->addText('အမည်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
    $table->addCell(4500)->addText('ရာထူး',['bold'=>true],['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
    $table->addCell(3000)->addText('မှတ်ချက်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
    foreach ($staffs as $index=> $staff) {
        $table->addRow();
        $table->addCell(700)->addText(en2mm($index + 1),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(4500)->addText($staff?->name,null,['indentation' => ['left' => 100],'alignment'=>'left','spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(4500)->addText($staff->current_rank?->name,null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>1]);
        $table->addCell(3000)->addText(''); 
    }
    $fileName = 'planning_accounting_report.docx';
    $filePath = public_path($fileName);
    $phpWord->save($filePath, 'Word2007');
    return response()->download($filePath)->deleteFileAfterSend(true);
}
     public function render()
    {
        $staffs = Staff::paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $start = ($currentPage - 1) * $perPage + 1;
        return view('livewire.planning-accounting.planning-accounting',[ 
        'staffs' => $staffs,
        'start'=>$start,
    ]);
    }


    public function mount(){
        $this->divisions = Division::all();
         $this->selectedDivisionId = getFirstOf('Division')->id;
         

    }    
}
