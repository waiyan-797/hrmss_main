<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies10 extends Component
{
    public function go_pdf(){
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $all_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'all_ranks' => $all_ranks,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_10', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_10.pdf');
    }
    public function go_word()
    {
        // Fetch data
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $all_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();

        // Create a new PHPWord object
        $phpWord = new PhpWord();
        
        // Add a section
        $section = $phpWord->addSection();

        // Add title
        $section->addTitle('Investment Companies Report', 1);
        
        // Create table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);
        
       
        $table->addRow();
        $table->addCell(1000)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('ဦစီးဌာန', ['bold' => true]);
        
        // Add your columns here, similar to your PDF layout
        // $headers = [
        //     'အမြဲတမ်းအတွင်းဝန်/ညွှန်ကြားရေးမှူးချုပ်',
        //     'ဒုတိယအမြဲတမ်းအတွင်းဝန်/ဒုတိယညွှန်ကြားရေးမှူး',
        //     'လက်ထောက်အတွင်းဝန်/ညွှန်ကြားရေးမှူး',
        //     'ဒုတိယညွှန်ကြားရေးမှူး',
        //     'လက်ထောက်ညွှန်ကြားရေးမှူး',
        //     'ဦးစီးအရာရှိ',
        //     'အရာရှိပေါင်း',
        //     'အမှုထမ်းပေါင်း',
        //     'စုစုပေါင်း',
        // ];

        // foreach ($headers as $header) {
        //     $table->addCell(1000)->addText($header, ['bold' => true]);
        // }
    $table->addRow();
    $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
    $table->addCell(4000,['vMerge' => 'restart'])->addText('ဌာနအမည်', ['bold' => true]);
    $table->addCell(7000, ['gridSpan' => 7, 'valign' => 'center'])->addText('နိုင်ငံ့ဝန်ထမ်းဥပ‌‌ဒေနည်းပညာအရ အရေးယူမှုပြီးစီးမှု');
    $table->addCell(3000,['vMerge' => 'restart'])->addText('ပုဒ်မ၅၀၅ဖြင့်အရေးယူပြီးစီးမှု', ['bold' => true]);
    $table->addCell(3000,['vMerge' => 'restart'])->addText('အရေးယူဆောင်ရွက်ဆဲအင်အား', ['bold' => true]);
    $table->addCell(3000,['vMerge' => 'restart'])->addText('စုစုပေါင်း', ['bold' => true]);

$table->addRow();
$table->addCell(2000, ['vMerge' => 'continue']);
$table->addCell(4000, ['vMerge' => 'continue']);
$table->addCell(1000)->addText('စာဖြင့် သတိပေးခြင်း', ['alignment' => 'center']);
$table->addCell(1000)->addText('နှစ်တိုးလစာရပ်ဆိုင်းခြင်း', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာထူးတိုးမြှင့်ခြင်းကိုရပ်ဆိုင်းခြင်း', ['alignment' => 'center']);
$table->addCell(1000)->addText('လစာနှုန်းအတွင်းလစာလျှော့ချခြင်း', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာထူးအဆင့်လျှော့ချခြင်း', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာထူးမှထုတ်ပယ်ခြင်း', ['alignment' => 'center']);
$table->addCell(1000)->addText('ရာထူးအဖြစ်မှထုတ်ပစ်ခြင်း', ['alignment' => 'center']);
$table->addCell(4000, ['vMerge' => 'continue']);
$table->addCell(4000, ['vMerge' => 'continue']);
$table->addCell(4000, ['vMerge' => 'continue']);
  

        
        $table->addRow();
        $table->addCell(1000)->addText('1');
        $table->addCell(2000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
        
       
        foreach ($first_ranks as $rank) {
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));
            $table->addCell(1000)->addText(en2mm($rank->staffs->count()));
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $rank->staffs->count()));
        }

      
        $fileName = 'investment_companies_report.docx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($temp_file);
        return response()->download($temp_file)->deleteFileAfterSend(true);
    }


  

    public function render()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $all_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        return view('livewire.investment-companies.investment-companies10',[
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'all_ranks' => $all_ranks,
        ]);
    }
}


// public function go_word() {
//     $punishments = Punishment::get();
//     $phpWord = new PhpWord();
//     $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
//     $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 14], ['alignment' => 'center']);
//     $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
//     $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
//     $section->addTitle('----ခုနှစ်၊ ---လအတွင်း တာဝန်ပျက်ကွက်သူဝန်ထမ်းများအား အရေးယူဆောင်ရွက်ပြီးစီးမှုနှင့် ဆောင်ရွက်ဆဲစာရင်း', 2);
//     $table = $section->addTable([
//         'borderSize' => 6,
//         'borderColor' => '000000',
//         'cellMargin' => 80,
//     ]);

   
//     $table->addRow();
//     $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
//     $table->addCell(4000,['vMerge' => 'restart'])->addText('ဌာနအမည်', ['bold' => true]);
//     $table->addCell(7000, ['gridSpan' => 7, 'valign' => 'center'])->addText('နိုင်ငံ့ဝန်ထမ်းဥပ‌‌ဒေနည်းပညာအရ အရေးယူမှုပြီးစီးမှု');
//     $table->addCell(3000,['vMerge' => 'restart'])->addText('ပုဒ်မ၅၀၅ဖြင့်အရေးယူပြီးစီးမှု', ['bold' => true]);
//     $table->addCell(3000,['vMerge' => 'restart'])->addText('အရေးယူဆောင်ရွက်ဆဲအင်အား', ['bold' => true]);
//     $table->addCell(3000,['vMerge' => 'restart'])->addText('စုစုပေါင်း', ['bold' => true]);

// $table->addRow();
// $table->addCell(2000, ['vMerge' => 'continue']);
// $table->addCell(4000, ['vMerge' => 'continue']);
// $table->addCell(1000)->addText('စာဖြင့် သတိပေးခြင်း', ['alignment' => 'center']);
// $table->addCell(1000)->addText('နှစ်တိုးလစာရပ်ဆိုင်းခြင်း', ['alignment' => 'center']);
// $table->addCell(1000)->addText('ရာထူးတိုးမြှင့်ခြင်းကိုရပ်ဆိုင်းခြင်း', ['alignment' => 'center']);
// $table->addCell(1000)->addText('လစာနှုန်းအတွင်းလစာလျှော့ချခြင်း', ['alignment' => 'center']);
// $table->addCell(1000)->addText('ရာထူးအဆင့်လျှော့ချခြင်း', ['alignment' => 'center']);
// $table->addCell(1000)->addText('ရာထူးမှထုတ်ပယ်ခြင်း', ['alignment' => 'center']);
// $table->addCell(1000)->addText('ရာထူးအဖြစ်မှထုတ်ပစ်ခြင်း', ['alignment' => 'center']);
// $table->addCell(4000, ['vMerge' => 'continue']);
// $table->addCell(4000, ['vMerge' => 'continue']);
// $table->addCell(4000, ['vMerge' => 'continue']);
  
   
//     $rowCount = 1;
//     $table->addRow();
//     $table->addCell(2000)->addText($rowCount);
//     $table->addCell(4000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 1)->count()));
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 2)->count()) );
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 3)->count()));
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 4)->count()) );
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 5)->count()));
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 8)->count()));
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 9)->count()));
//     $table->addCell(4000)->addText();
//     $table->addCell(4000)->addText();
//     $table->addCell(4000)->addText();

//     $table->addRow();
//     $table->addCell(2000)->addText();
//     $table->addCell(4000)->addText('စုစုပေါင်း');
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 1)->count()) );
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 2)->count()) );
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 3)->count()));
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 4)->count()));
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 5)->count()) );
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 8)->count()));
//     $table->addCell(1000)->addText(en2mm($punishments->where('penalty_type_id', 9)->count()));
//     $table->addCell(4000)->addText();
//     $table->addCell(4000)->addText();
//     $table->addCell(4000)->addText();
//     $fileName = 'investment_companies_report.docx';
//     $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
//     $filePath = storage_path($fileName);
//     $objWriter->save($filePath);
//     return response()->download($filePath)->deleteFileAfterSend(true);
// }