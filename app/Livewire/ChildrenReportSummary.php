<?php

namespace App\Livewire;

use App\Models\Children;
use App\Models\DivisionType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class ChildrenReportSummary extends Component
{
public $divisionTypes;
    public $children;

    public function mount()
    {
        $this->divisionTypes = DivisionType::with('divisions.staffs.children')->get();
        $this->children = Children::all();
    }

    public function go_pdf()
    {
        $data = [
            'divisionTypes' => $this->divisionTypes,
            'children' => $this->children,
        ];

        $pdf = PDF::loadView('pdf_reports.children_report_summary', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'children_report_summary.pdf');
    }
public function go_word()
{
    $phpWord = new PhpWord();
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
    $phpWord->addTableStyle('childrenTable', $tableStyle);

    // Add table
    $table = $section->addTable('childrenTable');
    $table->addRow();
    $table->addCell(1000)->addText('စဥ်', ['bold' => true]);
    $table->addCell(3000)->addText('ရုံး/ဌာန', ['bold' => true]);
    $table->addCell(2000)->addText('ကျား', ['bold' => true]);
    $table->addCell(2000)->addText('မ', ['bold' => true]);
    $table->addCell(2000)->addText('စုစုပေါင်း', ['bold' => true]);
    $table->addCell(3000)->addText('မှတ်ချက်', ['bold' => true]);

    $totalMale = 0;
    $totalFemale = 0;

    foreach ($this->divisionTypes as $key => $divisionType) {
        $maleCount = $divisionType->divisions->sum(function ($division) {
            return $division->staffs->sum(function ($staff) {
                return $staff->children->where('gender_id', 1)->count();
            });
        });

        $femaleCount = $divisionType->divisions->sum(function ($division) {
            return $division->staffs->sum(function ($staff) {
                return $staff->children->where('gender_id', 2)->count();
            });
        });

        $totalCount = $maleCount + $femaleCount;
        $totalMale += $maleCount;
        $totalFemale += $femaleCount;

        $table->addRow();
        $table->addCell(1000)->addText($key + 1);
        $table->addCell(3000)->addText($divisionType->name);
        $table->addCell(2000)->addText(en2mm($maleCount));
        $table->addCell(2000)->addText(en2mm($femaleCount));
        $table->addCell(2000)->addText(en2mm($totalCount));
        $table->addCell(3000)->addText('');
    }

    // Add total row
    $table->addRow();
    $table->addCell(1000)->addText('');
    $table->addCell(3000)->addText('ပေါင်း', ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($totalMale), ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($totalFemale), ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($totalMale + $totalFemale), ['bold' => true]);
    $table->addCell(3000)->addText('');
    $fileName = 'children_report_summary.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}

    public function render()
    {
        return view('livewire.children-report-summary', [
            'divisionTypes' => $this->divisionTypes,
            'children' => $this->children,
        ]);
    }

}
