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
        $staffs = Staff::with(['punishments.penalty_type', 'currentRank'])
        ->where('name', 'like', '%' . $this->search . '%')
        ->whereHas('punishments')
        ->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'pageSizeW'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5), // Letter width
            'pageSizeH'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11),  // Letter height
            'marginTop'    => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),   // 1 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),   // 1 inch
            'marginLeft'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9), // 0.9 inch
            'marginRight'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9), // 0.9 inch
        ]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('Punishment Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, array('tblHeader' => true));
        $table->addCell(1000)->addText('စဥ်',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        $table->addCell(4000)->addText('အမည်',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        $table->addCell(4000)->addText('ရာထူး',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        $table->addCell(5000)->addText('ပြစ်ဒဏ်',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        $table->addCell(2000)->addText('မှတ်ချက်',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);
        foreach ($staffs as  $staff) {
            $index = 1;
            $table->addRow();
            $table->addCell(1000)->addText(en2mm($index++), null, ['alignment' => 'center', 'spaceBefore' => 100]);
            $table->addCell(4000)->addText($staff->name ?? '',null,['indentation' => ['left' => 100],'spaceBefore'=>100]);
            $table->addCell(4000)->addText($staff->currentRank?->name ?? '',null,['indentation' => ['left' => 100],'spaceBefore'=>100]);
            $table->addCell(5000)->addText(  $staff->punishments->pluck('penalty_type.name')->join(', ') ?? '',null,['indentation' => ['left' => 100],'spaceBefore'=>100]);
            $table->addCell(2000)->addText('',null,['indentation' => ['left' => 100],'spaceBefore'=>100]);
        }
        $filePath = 'E08.docx';
        $phpWord->save($filePath, 'Word2007');

        // Return the file as a download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

public function render()
{
    $staffs = Staff::with(['punishments.penalty_type'])->where('name', 'like', '%' . $this->search . '%')->whereHas('punishments')->paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $startIndex = ($currentPage - 1) * $perPage + 1;


    return view('livewire.reports.punishment-report',[ 
        'staffs' => $staffs,
        'startIndex' => $startIndex,
    ]);
}
}
