<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA04;
use App\Models\Payscale;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies4 extends Component
{
    public function go_pdf(){
        $data = [
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_4', $data, [],[
            'format'=>'A4-L',
            'orientation'=>'P'
        ]);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_4.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new PA04(
    ), 'PA04.xlsx');
    }
    public function go_word()
{
    $first_payscales = Payscale::where('staff_type_id', 1)->get();
    $second_payscales = Payscale::where('staff_type_id', 2)->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(); 
    // $section->addText(
    //     'ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 
    //     ['bold' => true, 'size' => 14],
    //     ['align' => 'center']
    // );
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('၂၀၂၄ခုနှစ်၊နိုဝင်ဘာလ ၃၀ ရက်နေ့ရှိဝန်ထမ်းအင်အားစာရင်း', 1);
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);
    $table->addRow();
    $table->addCell(1000)->addText("စဥ်" , ['bold' => true] ,['align'=>'center']);
    $table->addCell(4000)->addText("လစာနှုန်း (ကျပ်)" , ['bold' => true] ,['align'=>'center']);
    $table->addCell(3000)->addText("ခွင့်ပြုအင်အား" , ['bold' => true] ,['align'=>'center']);
    $table->addCell(3000)->addText("ခန့်ပြီးအင်အား" , ['bold' => true] ,['align'=>'center']);
    $table->addCell(3000)->addText("လစ်လပ်အင်အား" , ['bold' => true] ,['align'=>'center']);
    foreach ($first_payscales as $index => $payscale) {
        $table->addRow();
        $table->addCell(2000)->addText(en2mm($index + 1));
        $table->addCell(4000)->addText($payscale->name);
        $table->addCell(3000)->addText(en2mm($payscale->allowed_qty));
        $table->addCell(3000)->addText(en2mm($payscale->staff->count()));
        $table->addCell(3000)->addText(en2mm($payscale->allowed_qty - $payscale->staff->count()));
    }
    $table->addRow();
    $table->addCell(6000, ['gridSpan' => 2])->addText($first_payscales[0]->staff_type->name . 'စုစုပေါင်း', ['bold' => true],['align'=>'center']);
    $table->addCell(3000)->addText(en2mm($first_payscales->sum('allowed_qty')), ['bold' => true] ,['align'=>'center']);
    $table->addCell(3000)->addText(en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())), ['bold' => true] , ['align'=>'center']);
    $table->addCell(3000)->addText(en2mm($first_payscales->sum('allowed_qty') - $first_payscales->sum(fn($scale) => $scale->staff->count())), ['bold' => true]  , ['align'=>'center']);
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);
    foreach ($second_payscales as $index => $payscale) {
        $table->addRow();
        $table->addCell(2000)->addText(en2mm($index + 1));
        $table->addCell(4000)->addText($payscale->name);
        $table->addCell(3000)->addText(en2mm($payscale->allowed_qty));
        $table->addCell(3000)->addText(en2mm($payscale->staff->count()));
        $table->addCell(3000)->addText(en2mm($payscale->allowed_qty - $payscale->staff->count()));
    }
    $table->addRow();
    $table->addCell(6000, ['gridSpan' => 2])->addText($second_payscales[0]->staff_type->name . 'စုစုပေါင်း', ['bold' => true],['align'=>'center']);
    $table->addCell(3000)->addText(en2mm($second_payscales->sum('allowed_qty')), ['bold' => true]);
    $table->addCell(3000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())), ['bold' => true]);
    $table->addCell(3000)->addText(en2mm($second_payscales->sum('allowed_qty') - $second_payscales->sum(fn($scale) => $scale->staff->count())), ['bold' => true]);

    $table->addRow();
    $table->addCell(6000, ['gridSpan' => 2])->addText( 'စုစုပေါင်း', ['bold' => true],['align'=>'center']);
    $table->addCell(3000)->addText(en2mm($second_payscales->sum('allowed_qty')+$first_payscales->sum('allowed_qty')));
    $table->addCell(3000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())+$first_payscales->sum(fn($scale) => $scale->staff->count())));
    $table->addCell(3000)->addText(en2mm($second_payscales->sum('allowed_qty') - $second_payscales->sum(fn($scale) => $scale->staff->count())+$second_payscales->sum('allowed_qty') - $first_payscales->sum(fn($scale) => $scale->staff->count())));
    $fileName = 'investment_companies_report_4.docx';
    $tempFile = storage_path('app/public/' . $fileName);
    $phpWord->save($tempFile, 'Word2007');
    return response()->download($tempFile)->deleteFileAfterSend(true);
}

    public function render()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        return view('livewire.investment-companies.investment-companies4',[
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
        ]);
    }
}
