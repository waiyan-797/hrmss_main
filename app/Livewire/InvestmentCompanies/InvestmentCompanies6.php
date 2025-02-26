<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Punishment;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies6 extends Component
{
    public $filterRange;
    public $year, $month;
    public function go_pdf()
    {
        $punishments = Punishment::whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->month)
        ->get();
      
        if ($this->filterRange) {
            [$year, $month] = explode('-', $this->filterRange);
            $this->year = $year;
            $this->month = $month;
            $punishments = Punishment::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->get();
        } else {
            $punishments = Punishment::all();
        }

        $data = [
            'punishments' => $punishments,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_6', $data,[],[
            'format'=>'A4',
            'orientation'=>'L'
        ]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_6.pdf');
    }
    public function go_word()
    {
        $punishments = Punishment::whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->get();
        $phpWord = new PhpWord();
        // $section = $phpWord->addSection([
        //     'orientation' => 'landscape',
        //     'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
        //     'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        //     'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        //     'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        // ]);

        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.52),  // 0.52 inch
        ]);
        $header_subseq = $section->addHeader();
        $header_subseq->addText('လျှို့ဝှက်', null, [
            'align' => 'center',
            'spaceBefore' => 0,
            'spaceAfter' => 0,
            'lineHeight' => 1,
        ]);

        // $header_subseq->addPreserveText('{PAGE}', ['name' => 'Pyidaungsu Numbers', 'size' => 13], ['alignment' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0]);
        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်',null,array('align'=>'center', 'spaceBefore' => 200));

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addTitle(mmDateFormat($this->year ?? now()->year, $this->month ?? now()->month). 'အတွင်း တာဝန်ပျက်ကွက်သူဝန်ထမ်းများအား အရေးယူဆောင်ရွက်ပြီးစီးမှုနှင့် ဆောင်ရွက်ဆဲစာရင်း', 2);

        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow();
        $table->addCell(1300, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['align'=>'center', 'spaceBefore'=> 1000] );
        $table->addCell(3800, ['vMerge' => 'restart'])->addText('ဌာနအမည်', ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['align'=>'center', 'spaceBefore'=> 1000] );
        $table->addCell(7000, ['gridSpan' => 7, 'valign' => 'center'])->addText('နိုင်ငံ့ဝန်ထမ်းဥပ‌‌ဒေ နည်းဥပ‌‌ဒေအရ အရေးယူမှုပြီးစီးမှု' , ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['align'=>'center', 'spaceBefore'=> 200] );
        $table->addCell(2200, ['vMerge' => 'restart'])->addText('ပုဒ်မ  ၅၀၅ဖြင့်  အရေးယူ  ပြီးစီးမှု', ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['align'=>'center', 'spaceBefore'=> 400] );
        $table->addCell(3000, ['vMerge' => 'restart'])->addText('အရေးယူ  ဆောင်ရွက်ဆဲ အင်အား', ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['align'=>'center', 'spaceBefore'=> 400] );
        $table->addCell(1500, ['vMerge' => 'restart'])->addText('စုစု ပေါင်း', ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['align'=>'center', 'spaceBefore'=> 400] );
        $table->addCell(3000, ['vMerge' => 'restart'])->addText("CDMမှ\nပြန်လည်\nတာဝန်\nထမ်းဆောင်သူ\nဦးရေ", ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['align'=>'center', 'spaceBefore'=> 400] );

        $table->addRow();
        $table->addCell(1300, ['vMerge' => 'continue']);
        $table->addCell(3800, ['vMerge' => 'continue']);
        $table->addCell(3300)->addText('စာဖြင့် သတိပေးခြင်း', ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['alignment' => 'center', 'spaceBefore'=> 300] );
        $table->addCell(3200)->addText('နှစ်တိုးလစာ ရပ်ဆိုင်းခြင်း',  ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['alignment' => 'center', 'spaceBefore'=> 300]);
        $table->addCell(3500)->addText('ရာထူး   တိုးမြှင့်ခြင်းကို ရပ်ဆိုင်းခြင်း',  ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['alignment' => 'center', 'spaceBefore'=> 300]);
        $table->addCell(3500)->addText('လစာနှုန်း  အတွင်းလစာ လျှော့ချခြင်း',  ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['alignment' => 'center', 'spaceBefore'=> 300]);
        $table->addCell(3200)->addText('ရာထူးအဆင့် လျှော့ချခြင်း',  ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['alignment' => 'center', 'spaceBefore'=> 300]);
        $table->addCell(3200)->addText('ရာထူးမှ  ထုတ်ပယ်ခြင်း',  ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['alignment' => 'center', 'spaceBefore'=> 300]);
        $table->addCell(3200)->addText('ဝန်ထမ်း  အဖြစ်မှ  ထုတ်ပစ်ခြင်း',  ['bold' => true, 'name' => 'Pyidaungsu','size'=>12] , ['alignment' => 'center', 'spaceBefore'=> 300]);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(1500, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
       
        $rowCount = 1;
        $table->addRow();
        $table->addCell(1300)->addText( '(က)' ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>1] , ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(3800)->addText("ရင်းနှီးမြှပ်နှံမှုနှင့်  ကုမ္ပဏီများ  ညွှန်ကြားမှု  ဦးစီးဌာန", [ 'name' => 'Pyidaungsu','size'=>12],['indentation' => ['left' => 100], 'spaceBefore'=> 200]);
        $table->addCell(3300)->addText(en2mm($punishments->where('penalty_type_id', 1)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12] , ['align' => 'center', 'spaceBefore'=> 600]);
        $table->addCell(3200)->addText(en2mm($punishments->where('penalty_type_id', 2)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12] , ['align' => 'center', 'spaceBefore'=> 600]);
        $table->addCell(3500)->addText(en2mm($punishments->where('penalty_type_id', 3)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12] , ['align' => 'center', 'spaceBefore'=> 600]);
        $table->addCell(3500)->addText(en2mm($punishments->where('penalty_type_id', 4)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12] , ['align' => 'center', 'spaceBefore'=> 600]);
        $table->addCell(3200)->addText(en2mm($punishments->where('penalty_type_id', 5)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12] , ['align' => 'center', 'spaceBefore'=> 600]);
        $table->addCell(3200)->addText(en2mm($punishments->where('penalty_type_id', 8)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12] , ['align' => 'center', 'spaceBefore'=> 600]);
        $table->addCell(3200)->addText(en2mm($punishments->where('penalty_type_id', 9)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12] , ['align' => 'center', 'spaceBefore'=> 600]);
        $table->addCell(2200)->addText('');
        $table->addCell(3000)->addText('');
        $table->addCell(1500)->addText('');
        $table->addCell(3000)->addText('');
        $table->addRow();
        $table->addCell(1300)->addText('');
        $table->addCell(3800)->addText('စုစုပေါင်း',[ 'name' => 'Pyidaungsu','size'=>12],['indentation' => ['left' => 100], 'spaceBefore'=> 200]);
        $table->addCell(3200)->addText(en2mm($punishments->where('penalty_type_id', 1)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12], ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(3200)->addText(en2mm($punishments->where('penalty_type_id', 2)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12], ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(3500)->addText(en2mm($punishments->where('penalty_type_id', 3)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12], ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(3500)->addText(en2mm($punishments->where('penalty_type_id', 4)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12], ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(3200)->addText(en2mm($punishments->where('penalty_type_id', 5)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12], ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(3000)->addText(en2mm($punishments->where('penalty_type_id', 8)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12], ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(3000)->addText(en2mm($punishments->where('penalty_type_id', 9)->count()) ,['bold'=> false ,'name' => 'Pyidaungsu','size'=>12], ['align' => 'center', 'spaceBefore'=> 200]);
        $table->addCell(2200)->addText('');
        $table->addCell(3000)->addText('');
        $table->addCell(1500)->addText('');
        $table->addCell(3000)->addText('');
        $fileName = 'investment_companies_report.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $filePath = storage_path($fileName);
        $objWriter->save($filePath);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function render()
    {
        
        if ($this->filterRange) {
            [$year, $month] = explode('-', $this->filterRange);
            $this->year = $year;
            $this->month = $month;
            $results = Punishment::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->get();
        } else {
            $results = Punishment::all();
        }
        return view('livewire.investment-companies.investment-companies6', [
            'punishments' => $results,
        ]);
    }
}
