<?php

namespace App\Livewire\FinancePension;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

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
        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText(
            "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\n၂၀၂၄-၂၀၂၅ ဘဏ္ဍာရေးနှစ်တွင် အသက် (၆၂)ပြည့် ပင်စင်ခံစားမည့်စာရင်း",
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
        $table->addCell(2000)->addText('အမည်/ရာထူး', ['bold' => true], ['align' => 'left']);
        $table->addCell(1000)->addText('မွေးသက္ကရာဇ်', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('အလုပ်စတင်ဝင်ရောက်သည့်နေ့စွဲ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ကြိုတင်ပြင်ဆင်ခွင့်', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ပင်စင်ပြည့်သည့်နေ့စွဲ', ['bold' => true], ['align' => 'center']);
    
        // Add data rows
        foreach ($staffs as $index => $staff) {
            
            $staffs = Staff::get();
            $table->addRow();
            $table->addCell(500)->addText($index + 1, null, ['align' => 'center']);
            $table->addCell(2000)->addText($staff->name, null.'/'.$staff->current_rank?->name ?? '', null, ['align' => 'left']);
            
            $table->addCell(1000)->addText($staff->dob, ['align' => 'center']);
            $table->addCell(1000)->addText($staff->join_date, ['align' => 'center']);
            $table->addCell(1000)->addText(\Carbon\Carbon::parse($staff->dob)->addYears(62)->subMonths(4)->format('Y-m-d'), ['align' => 'center']);
            $table->addCell(1000)->addText(\Carbon\Carbon::parse($staff->dob)->addYears(62)->format('Y-m-d'));
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
