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

    // Add title
    $section->addText(
        "ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန",
        ['bold' => true, 'size' => 12],
        ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 240]
    );
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nဝန်ထမ်းများ၏ သားသမီးများ စာရင်း",
        ['bold' => true, 'size' => 12],
        ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 240]
    );
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);

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
    // $table->addRow();
    $table->addRow(50, ['tblHeader' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်',['bold' => true],$pStyle_2);
    $table->addCell(4000, ['vMerge' => 'restart'])->addText("ဝန်ထမ်း၏\nအမည်/ရာထူး",['bold' => true],$pStyle_2);
    $table->addCell(4000, ['gridSpan' => 2])->addText('သား/သမီးအရေအတွက်', ['bold' => true],$pStyle_2);
    $table->addCell(3000, ['vMerge' => 'restart'])->addText('သား/သမီးအမည်',['bold' => true],$pStyle_2);
    $table->addCell(3000, ['vMerge' => 'restart'])->addText('မှတ်ချက်',['bold' => true],$pStyle_2);

    // Add sub-header row for gender counts
    // $table->addRow();
    $table->addRow(50, array('tblHeader' => true));
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(4000, ['vMerge' => 'continue']);
    $table->addCell(2000)->addText('ကျား', ['bold' => true],['alignment' => 'center']);
    $table->addCell(2000)->addText('မ', ['bold' => true],['alignment' => 'center']);
    $table->addCell(3000, ['vMerge' => 'continue']);
    $table->addCell(3000, ['vMerge' => 'continue']);

    // Add data rows
    $index = 1;
    foreach ($staffs as $staff) {
        $table->addRow(50);

        // Add columns
        $table->addCell(2000)->addText(en2mm($index++), null, $pStyle_6);
        $table->addCell(4000)->addText(
            $staff->name . "\n" . ($staff->currentRank->name ?? ''),
            null,$pStyle_6
        );
        $table->addCell(2000)->addText(en2mm($staff->children->where('gender_id', 1)->count()),null,$pStyle_6);
        $table->addCell(2000)->addText(en2mm($staff->children->where('gender_id', 2)->count()),null,$pStyle_6);

        $childrenNames = $staff->children->pluck('name')->implode(', ');
        $table->addCell(3000)->addText($childrenNames,null,$pStyle_6);

        $table->addCell(3000)->addText(''); // Placeholder for remarks
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
