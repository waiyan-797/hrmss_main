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
    $section = $phpWord->addSection([
        'orientation' => 'portrait',
        'pageSizeW'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.27), 
        'pageSizeH'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11.69),
        'marginTop'    => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginLeft'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginRight'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.58),
    ]);
    $phpWord->setDefaultFontSize(12); 

    // Add title
    $section->addText(
        "ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန",
        ['bold' => true, 'size' => 12],
        ['alignment' => Jc::CENTER, 'spaceAfter' => 240]
    );
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nဝန်ထမ်းများ၏ သားသမီးအရေအတွက် စာရင်း",
        ['bold' => true, 'size' => 12],
        ['alignment' => Jc::CENTER, 'spaceAfter' => 240]
    );
    $tableStyle = [
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80,
    ];
    $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
    $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
    $pStyle_3=array('align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100);
    $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
    $phpWord->addTableStyle('childrenTable', $tableStyle);
     $table = $section->addTable('childrenTable');
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
        $table->addCell(1000)->addText(en2mm($key + 1),null,$pStyle_2);
        $table->addCell(3000)->addText($divisionType->name,null,$pStyle_2);
        $table->addCell(2000)->addText(en2mm($maleCount),null,$pStyle_2);
        $table->addCell(2000)->addText(en2mm($femaleCount),null,$pStyle_2);
        $table->addCell(2000)->addText(en2mm($totalCount),null,$pStyle_2);
        $table->addCell(3000)->addText('');
    }

    // Add total row
    $table->addRow();
    $table->addCell(1000)->addText('');
    $table->addCell(3000)->addText('ပေါင်း',null,$pStyle_2);
    $table->addCell(2000)->addText(en2mm($totalMale),null,$pStyle_2);
    $table->addCell(2000)->addText(en2mm($totalFemale),null,$pStyle_2);
    $table->addCell(2000)->addText(en2mm($totalMale + $totalFemale),null,$pStyle_2);
    $table->addCell(3000)->addText('');
    $fileName = 'SSL13.docx';
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
