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
    // Fetch staff data
    $staffs = Staff::with(['currentRank', 'children'])->get();

    // Create a new PhpWord instance
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    
    // Add a section
    $section = $phpWord->addSection();

    // Add title
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nဝန်ထမ်းများ၏ သားသမီးအရေအတွက် စာရင်း\n၁။ စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ",
        ['bold' => true, 'size' => 14],
        ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 240]
    );

    // Define table style
    $tableStyle = [
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80
    ];
    $phpWord->addTableStyle('staffTable', $tableStyle);

    // Add table
    $table = $section->addTable('staffTable');

    // Add header row
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
    $table->addCell(4000)->addText('အမည်/ရာထူး', ['bold' => true]);
    $table->addCell(3000, ['gridSpan' => 2])->addText('သား/သမီးအရေအတွက်', ['bold' => true], ['alignment' => 'center']);
    $table->addCell(4000)->addText('သား/သမီးအမည်', ['bold' => true]);
    $table->addCell(4000)->addText('မှတ်ချက်', ['bold' => true]);

    // Add sub-header row for gender counts
    $table->addRow();
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(4000, ['vMerge' => 'continue']);
    $table->addCell(1500)->addText('ကျား', ['bold' => true]);
    $table->addCell(1500)->addText('မ', ['bold' => true]);
    $table->addCell(4000, ['vMerge' => 'continue']);
    $table->addCell(4000, ['vMerge' => 'continue']);

    // Add data rows
    $index = 1;
    foreach ($staffs as $staff) {
        $table->addRow();

        // Add columns
        $table->addCell(2000)->addText($index++);
        $table->addCell(4000)->addText(
            $staff->name . "\n" . ($staff->currentRank->name ?? ''),
            null,
            ['alignment' => 'left']
        );
        $table->addCell(1500)->addText($staff->children->where('gender_id', 1)->count());
        $table->addCell(1500)->addText($staff->children->where('gender_id', 2)->count());

        $childrenNames = $staff->children->pluck('name')->implode(', ');
        $table->addCell(4000)->addText($childrenNames);

        $table->addCell(4000)->addText(''); // Placeholder for remarks
    }

    // Save the file as a temporary file
    $fileName = 'staff_progeny_report.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');

    // Return file as download
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
