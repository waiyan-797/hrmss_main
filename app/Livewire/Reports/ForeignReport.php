<?php

namespace App\Livewire\Reports;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\IOFactory as PhpWordIOFactory;
use PhpOffice\PhpWord\PhpWord;
class ForeignReport extends Component
{
    use WithPagination;
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.foreign_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'foreign_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();
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

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('Foreign Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
            // $table->addRow();
            $table->addRow(50, ['tblHeader' => true]);
            $table->addCell(700)->addText('စဥ်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(3500)->addText('အမည်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(3500)->addText('သွားရောက်သည့်နိုင်ငံ',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(2500)->addText('သွားရောက်သည့်နေ့',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(2500)->addText('ပြန်ရောက်သည့်နေ့',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
           
            foreach ($staffs as $index => $staff) {
                $isFirstAbroad = true;
                foreach ($staff->abroads as $abroadIndex => $abroad) {
                    $table->addRow();
                    if ($isFirstAbroad) {
                        $table->addCell(700, ['vMerge' => 'restart'])->addText(en2mm($index + 1), null, ['indentation' => ['left' => 100]]);
                        $table->addCell(3500, ['vMerge' => 'restart'])->addText($staff->name, null, ['indentation' => ['left' => 100]]);
                        $isFirstAbroad = false;
                    } else {
                        $table->addCell(700, ['vMerge' => 'continue']);
                        $table->addCell(3500, ['vMerge' => 'continue']);
                    }
                    $countryNames = $abroad->countries ? $abroad->countries->pluck('name')->unique()->join(', ') : ' ';
                    $table->addCell(3500)->addText($countryNames, null, ['alignment' => 'center']);
                    $table->addCell(2500)->addText(formatDMYmm($abroad->from_date), null, ['indentation' => ['left' => 100]]);
                    $table->addCell(2500)->addText(formatDMYmm($abroad->to_date), null, ['indentation' => ['left' => 100]]);
                    }
                  
                }
       
            $fileName = 'E06.docx';
        $phpWord->save($fileName, 'Word2007');
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
public function render()
{
    $staffs = Staff::paginate(20);
    $currentPage = $staffs->currentPage();
    $perPage = $staffs->perPage();
    $startIndex = ($currentPage - 1) * $perPage + 1;
    return view('livewire.reports.foreign-report',[ 
        'staffs' => $staffs,
        'startIndex'=>$startIndex,
    ]);
}
}
