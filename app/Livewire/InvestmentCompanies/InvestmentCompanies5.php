<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\AllowInserviceFreeExport;
use App\Exports\PA05;
use App\Exports\PA05Export;
use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Maatwebsite\Excel\Facades\Excel;

class InvestmentCompanies5 extends Component
{
    public $count=0, $index=0;
    public function go_pdf(){
        $count=0;
        $data = [
            'count'=>$count,
            'payscales' => Payscale::get(),
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_5', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_5.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new PA05(
    ), 'PA05.xlsx');
    }
  

    public function go_word()
{
    $payscales = Payscale::with('ranks', 'staff')->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 16], ['align' => 'center']);
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
    $table->addCell(4000)->addText('ရာထူး', ['bold' => true]);
    $table->addCell(2000)->addText('ခွင့်ပြုအင်အား', ['bold' => true]);
    $table->addCell(2000)->addText('ခန့်ပြီးအင်အား', ['bold' => true]);
    $table->addCell(2000)->addText('လစ်လပ်အင်အား', ['bold' => true]);
    foreach ($payscales as $index => $payscale) {
        $table->addRow();
        $table->addCell(2000)->addText($index + 1);
        $table->addCell(4000)->addText($payscale->ranks[0]->name . 'နှင့်အဆင့်တူ');
        $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
        $table->addCell(2000)->addText(en2mm($payscale->staff->count()));
        $table->addCell(2000)->addText(en2mm($payscale->allowed_qty - $payscale->staff->count()));
    }
    $table->addRow();
    $table->addCell(6000, ['gridSpan' => 2])->addText('စုစုပေါင်း', ['bold' => true],['align'=>'center']);
    $table->addCell(2000)->addText(en2mm($payscales->sum('allowed_qty')), ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($payscales->sum(fn($payscale) => $payscale->staff->count())), ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($payscales->sum('allowed_qty') - $payscales->sum(fn($payscale) => $payscale->staff->count())), ['bold' => true]);
    $fileName = 'investment_companies_word.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($tempFile);
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
    public function render()
    {
        $payscales = Payscale::get();
        return view('livewire.investment-companies.investment-companies5', [
            'payscales' => $payscales,
        ]);
    }
}
