<?php

namespace App\Livewire\PlanningAccounting;

use App\Models\Division;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

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
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);

        
        $phpWord->addTitleStyle(2, ['bold' => false, 'size' => 13], ['alignment' => 'left']);
        
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        
        // dd($divisionTitle );
        $division = getDivisionBy($this->selectedDivisionId);
        $section->addTitle(($division ? $division->name : 'Unknown Division') , 2);

    $table = $section->addTable([
        'borderSize' => 6, 
        'borderColor' => '000000',
        'cellMargin' => 5
    ]);
       
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်',['bold'=>true],['alignment'=>'center']);
    $table->addCell(4000)->addText('အမည်',['bold'=>true],['alignment'=>'center']);
    $table->addCell(4000)->addText('ရာထူး',['bold'=>true],['alignment'=>'center']);
    $table->addCell(4000)->addText('မှတ်ချက်',['bold'=>true],['alignment'=>'center']);
    foreach ($staffs as $index=> $staff) {
        $table->addRow();
        $table->addCell(2000)->addText(en2mm($index + 1),null,['alignment'=>'center']);
        $table->addCell(4000)->addText($staff?->name);
        $table->addCell(4000)->addText($staff->current_rank?->name);
        $table->addCell(4000)->addText(''); 
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
