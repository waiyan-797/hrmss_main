<?php

namespace App\Livewire\PlanningAccounting;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class PlanningAccounting extends Component
{
    use WithPagination;
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
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
    $section->addTitle('စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲဝန်ထမ်းအင်အားစာရင်း', 1);
    $table = $section->addTable([
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80,
    ]);
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်');
    $table->addCell(4000)->addText('အမည်');
    $table->addCell(4000)->addText('ရာထူး');
    $table->addCell(4000)->addText('မှတ်ချက်');
    foreach ($staffs as $index=> $staff) {
        $table->addRow();
        $table->addCell(2000)->addText($index + 1);
        $table->addCell(4000)->addText($staff->name);
        $table->addCell(4000)->addText($staff->current_rank->name);
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
    
}
