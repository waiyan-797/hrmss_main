<?php

namespace App\Livewire\StaffList;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffProgeny extends Component
{
    use WithPagination;
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_progeny_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_progeny_pdf.pdf');
    }
    public function go_word()
{
    $staffs = Staff::get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nဝန်ထမ်းများ၏ သားသမီးအရေအတွက် စာရင်း\n၁။ စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ",
        ['bold' => true, 'size' => 14],
        ['align' => 'center', 'spaceAfter' => 240]
    );
    $table = $section->addTable([
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80
    ]);

   
    $table->addRow();
    $table->addCell(500)->addText('စဥ်', ['bold' => true], ['align' => 'center']);
    $table->addCell(2000)->addText('အမည်', ['bold' => true], ['align' => 'left']);
    $table->addCell(2000)->addText('ရာထူး', ['bold' => true], ['align' => 'left']);
    $table->addCell(1000)->addText('ကျား', ['bold' => true], ['align' => 'center']);
    $table->addCell(1000)->addText('မ', ['bold' => true], ['align' => 'center']);
    $table->addCell(1000)->addText('စုစုပေါင်း', ['bold' => true], ['align' => 'center']);

    // Add data rows
    foreach ($staffs as $index => $staff) {
        $maleChildren = $staff->children->where('gender_id', 1)->count();
        $femaleChildren = $staff->children->where('gender_id', 2)->count();
        $totalChildren = $staff->children->count();

        $table->addRow();
        $table->addCell(500)->addText($index + 1, null, ['align' => 'center']);
        $table->addCell(2000)->addText($staff->name, null, ['align' => 'left']);
        $table->addCell(2000)->addText($staff->current_rank?->name ?? '', null, ['align' => 'left']);
        $table->addCell(1000)->addText(en2mm($maleChildren), null, ['align' => 'center']);
        $table->addCell(1000)->addText(en2mm($femaleChildren), null, ['align' => 'center']);
        $table->addCell(1000)->addText(en2mm($totalChildren), null, ['align' => 'center']);
    }

    
    $fileName = 'staff_progeny_report.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}

     public function render()
     {
        $staffs = Staff::paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $start = ($currentPage - 1) * $perPage + 1;
        return view('livewire.staff-list.staff-progeny',[
            'staffs' => $staffs,
            'start'=>$start,
        ]);
     }
}
