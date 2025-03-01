<?php

namespace App\Livewire\FinancePension;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class FinancePensionAge62 extends Component
{
    public $startDate , $endDate;
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.finance_pension_age62_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'finance_pension_age62_report_pdf.pdf');
    }
    public function go_word()
    {
        // $staffs = Staff::get();
        $staffs = collect();
        if (is_numeric($this->startDate) && is_numeric($this->endDate)) {
            $startDate = Carbon::create($this->startDate, 4); // April of the start year
            $endDate = Carbon::create($this->endDate, 3); // March of the end year
    
            $staffs = Staff::where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('dob', [
                    $startDate->copy()->subYears(62)->toDateString(),
                    $endDate->copy()->endOfMonth()->subYears(62)->toDateString()
                ]);
            })->get();
        }
            
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait', // Portrait orientation
            'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5), // Width of Letter size in inches (8.5 x 11 inches)
            'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11), // Height of Letter size in inches
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.75), // Top margin 0.75 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1.0), // Bottom margin 1 inch
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.62), // Left margin 0.62 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1.0), // Right margin 1 inch
        ]);
        
        $section->addText(
            "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန",
            ['bold' => true, 'size' => 14],
            ['align' => 'center', 'spaceAfter' => 240]
        );
        $section->addText(
            en2mm(Carbon::parse($startDate)->year) . '-' . en2mm(Carbon::parse($endDate)->year) .
            " ဘဏ္ဍာရေးနှစ်တွင် အသက် (၆၂) ပြည့်ပင်စင်ခံစားမည့် ဝန်ထမ်းများစာရင်း",
            ['bold' => true, 'size' => 14],
            ['align' => 'center', 'spaceAfter' => 240]
        );
        $pStyle_1=array('align' => 'right', 'spaceAfter' => 300, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 0, 'spaceBefore' => 300, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        $pStyle_right = ['align' => 'right'];
        $tableStyle = [
            'alignment' => Jc::END,
        ];
        $table = $section->addTable($tableStyle);
        $table->addRow();
        $table->addCell(17000)->addText('');
        $table->addCell(3000)->addText(en2mm(Carbon::now()->format('d-m-Y'),null,$pStyle_1));
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 80
        ]);
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true],$pStyle_3);
        $table->addCell(4000)->addText('အမည်/ရာထူး', ['bold' => true],$pStyle_3);
        $table->addCell(4000)->addText('မွေးသက္ကရာဇ်', ['bold' => true],$pStyle_3);
        $table->addCell(4000)->addText("အလုပ်စတင်\nဝင်ရောက်သည့်\nနေ့စွဲ", ['bold' => true],$pStyle_2);
        $table->addCell(4000)->addText("ကြိုတင်\nပြင်ဆင်ခွင့်", ['bold' => true],$pStyle_2);
        $table->addCell(4000)->addText("ပင်စင်ပြည့်\nသည့်နေ့စွဲ", ['bold' => true],$pStyle_3);
        // Add data rows
        foreach ($staffs as $index => $staff) {
            
            $staffs = Staff::get();
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1), null, ['align' => 'center']);
            $table->addCell(4000)->addText($staff->name, null."\n".$staff->currentRank?->name ?? '',null,$pStyle_6);
            
            $table->addCell(4000)->addText(formatDMYmm($staff->dob),null,$pStyle_6);
            $table->addCell(4000)->addText(formatDMYmm($staff->join_date),null,$pStyle_6);
            $table->addCell(4000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->addYears(62)->subMonths(4)->format('d-m-y')).'မှ'."\n".en2mm(\Carbon\Carbon::parse($staff->dob)->addYears(62)->subDay()->format('Y-m-d')).'ထိ',null,$pStyle_6);
            $table->addCell(4000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->addYears(62)->format('d-m-y')),null,$pStyle_6);
        }
        $fileName = 'finance_pension_age62_report.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($tempFile, 'Word2007');
    
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    
     public function render()
     {
        $staffs = collect();
    if (is_numeric($this->startDate) && is_numeric($this->endDate)) {
        $startDate = Carbon::create($this->startDate, 4); // April of the start year
        $endDate = Carbon::create($this->endDate, 3); // March of the end year

        $staffs = Staff::where(function ($query) use ($startDate, $endDate) {
            $query->whereBetween('dob', [
                $startDate->copy()->subYears(62)->toDateString(),
                $endDate->copy()->endOfMonth()->subYears(62)->toDateString()
            ]);
        })->get();
    }
        
         return view('livewire.finance-pension.finance-pension-age62',[ 
            'staffs' => $staffs,
        ]);
     }
}
