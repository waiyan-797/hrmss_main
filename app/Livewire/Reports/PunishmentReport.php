<?php

namespace App\Livewire\Reports;

use App\Models\Punishment;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class PunishmentReport extends Component
{
    use WithPagination;
    public $search = ''; 
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.punishment_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'punishment_report_pdf.pdf');
    }
    public function go_word()
    {
        // $staffs = Staff::get();
        $staffs = Staff::where('name', 'like', '%' . $this->search . '%')->get();

        
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('Punishment Report', 1);
        // $section->addTitle(mmDateFormat($this->year, $this->month). 'အတွင်း တာဝန်ပျက်ကွက်သူဝန်ထမ်းများအား အရေးယူဆောင်ရွက်ပြီးစီးမှုနှင့် ဆောင်ရွက်ဆဲစာရင်း', 2);

        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);

       
        $table->addRow();
        $table->addCell(1000)->addText('စဥ်',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        $table->addCell(4000)->addText('အမည်',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        $table->addCell(4000)->addText('ရာထူး',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        $table->addCell(5000)->addText('txtpenalty',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);

        // Add table data
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(1000)->addText(en2mm($index + 1),null,['alignment'=>'center','spaceBefore'=>100]);
            $table->addCell(4000)->addText($staff->name,null,['indentation' => ['left' => 100],'spaceBefore'=>100]);
            $table->addCell(4000)->addText($staff->current_rank?->name,null,['indentation' => ['left' => 100],'spaceBefore'=>100]);
            $table->addCell(5000)->addText(implode(', ', $staff->punishments->pluck('penalty_type.name')->toArray()),null,['indentation' => ['left' => 100],'spaceBefore'=>100]);
        }

        // Save the file
        $filePath = 'punishment_report.docx';
        $phpWord->save($filePath, 'Word2007');

        // Return the file as a download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

public function render()
{
    $staffs = Staff::where('name', 'like', '%' . $this->search . '%')->paginate(20);

        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $startIndex = ($currentPage - 1) * $perPage + 1;


    return view('livewire.reports.punishment-report',[ 
        'staffs' => $staffs,
        'startIndex' => $startIndex,
    ]);
}
    
   

}
