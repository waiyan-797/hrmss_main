<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class LanguageReport extends Component
{
    use WithPagination;
    public $search = '';
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.language_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'language_report_pdf.pdf');
    }
public function go_word()
{
        $staffs = Staff::where('name', 'like', '%' . $this->search . '%')
        ->whereHas('staff_languages')->get();

    $phpWord = new PhpWord();
    $section = $phpWord->addSection([
        'orientation' => 'portrait',
        'pageSizeW'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5),
        'pageSizeH'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11),
        'marginTop'    => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
        'marginLeft'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
        'marginRight'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
    ]);
    $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);

    // // Report Titles
    // $section->addTitle('ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    // $section->addTitle('Language Report', 1);
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
    $section->addTitle('ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    $section->addTitle('Language Report', 1);

    // Table Header
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
    // $table->addRow();
    $table->addRow(50, array('tblHeader' => true));
    $table->addCell(1000)->addText('စဥ်', ['bold' => true],$pStyle_1);
    $table->addCell(3000)->addText('အမည်', ['bold' => true],$pStyle_1);
    $table->addCell(3000)->addText('ရာထူး', ['bold' => true],$pStyle_1);
    $table->addCell(3000)->addText("တတ်ကျွမ်းသည့်\nဘာသာစကား", ['bold' => true],$pStyle_1);
    $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);
    $start = 1;
    foreach ($staffs as $staff) {
        $languages = $staff->staff_languages
            ->pluck('language.name')
            ->filter()
            ->implode(', ');

        $table->addRow();
        $table->addCell(1000)->addText(en2mm($start++),null,$pStyle_1);
        $table->addCell(3000)->addText($staff->name ?? ' ',null,$pStyle_1);
        $table->addCell(3000)->addText($staff->currentRank?->name ?? ' ',null,$pStyle_1);
        $table->addCell(3000)->addText($languages ?: ' ',null,$pStyle_1);
        $table->addCell(2000)->addText(' ',null,$pStyle_1);
    }
    $fileName = 'language_report.docx';
    $filePath = storage_path($fileName);
    $phpWord->save($filePath, 'Word2007');
    return response()->download($filePath)->deleteFileAfterSend(true);
}
    public function getFilteredStaff()
    {
        return Staff::where('name', 'like', '%' . $this->search . '%')->get();
    }
     public function render()
    {
        
        $staffs = Staff::where('name', 'like', '%' . $this->search . '%')
        ->whereHas('staff_languages')
        ->paginate(20);
        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $start = ($currentPage - 1) * $perPage + 1;

        return view('livewire.reports.language-report',[ 
        'staffs' => $staffs,
        'start'=>$start,
    ]);
    }
}
