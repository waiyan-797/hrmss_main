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
    $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
    $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
    $all_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();

    $phpWord = new PhpWord();
    $section = $phpWord->addSection([
        'orientation' => 'landscape',
        'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(14), 
        'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5), 
        'marginLeft' => 600, 
        'marginRight' => 600, 
        'marginTop' => 600, 
        'marginBottom' => 600 
    ]);
    
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်');
    $table->addCell(4000)->addText('ဦစီးဌာန');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('အမြဲတမ်းအတွင်းဝန်/ညွှန်ကြားရေးမှူးချုပ်');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ဒုတိယအမြဲတမ်းအတွင်းဝန်/
   ဒုတိယညွှန်ကြားရေးမှူးချုပ်');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('လက်ထောက်အတွင်းဝန်/
   ညွှန်ကြားရေးမှူး');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ဒုတိယညွှန်ကြားရေးမှူး');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('လက်ထောက်ညွှန်ကြားရေးမှူး');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ဦးစီးအရာရှိ');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('အရာရှိပေါင်း');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('အမှုထမ်းပေါင်း');
   $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('စုစုပေါင်း');

$table->addRow();
$table->addCell(2000, ['vMerge' => 'continue']);
$table->addCell(4000, ['vMerge' => 'continue']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
$table->addCell(1000)->addText('ခန့်အပ်', ['alignment' => 'center']);
$table->addCell(1000)->addText('ပို/လို	', ['alignment' => 'center']);
    
        $table->addRow();
        $table->addCell(2000)->addText('၁');  
        $table->addCell(4000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->staffs->count()) );
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()) );
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) );
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm($first_ranks->sum('allowed_qty')));
        $table->addCell(1000)->addText(en2mm($first_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText( en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText( en2mm($second_ranks->sum('allowed_qty')) );
        $table->addCell(1000)->addText(en2mm($second_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText(en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText( en2mm($all_ranks->sum('allowed_qty')));
        $table->addCell(1000)->addText(en2mm($all_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText(en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')));
        $table->addRow();
        $table->addCell(2000)->addText();  
        $table->addCell(4000)->addText('စုစုပေါင်း');
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->allowed_qty) );
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->staffs->count()) );
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()) );
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) );
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->allowed_qty));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->staffs->count()));
        $table->addCell(1000)->addText(en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()) );
        $table->addCell(1000)->addText( en2mm($first_ranks->sum('allowed_qty')) );
        $table->addCell(1000)->addText(en2mm($first_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText( en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')) );
        $table->addCell(1000)->addText(en2mm($second_ranks->sum('allowed_qty')));
        $table->addCell(1000)->addText(en2mm($second_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText(en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText(en2mm($all_ranks->sum('allowed_qty')));
        $table->addCell(1000)->addText(en2mm($all_ranks->sum('staffs_count')));
        $table->addCell(1000)->addText(en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')));
    $fileName = 'investment_companies_report.docx';
    $tempFile = storage_path($fileName);
    $phpWord->save($tempFile);

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
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

