<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA02;
use App\Models\Payscale;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies2 extends Component
{
    public function go_pdf(){
        $kachin_staffs = Staff::where('current_division_id', 12)->get();
        $kayah_staffs = Staff::where('current_division_id', 13)->get();
        $kayin_staffs = Staff::where('current_division_id', 14)->get();
        $chin_staffs = Staff::where('current_division_id', 15)->get();
        $mon_staffs = Staff::where('current_division_id', 21)->get();
        $rakhine_staffs = Staff::where('current_division_id', 22)->get();
        $shan_staffs = Staff::where('current_division_id', 24)->get();
        $sagaing_staffs = Staff::where('current_division_id', 16)->get();
        $mdy_staffs = Staff::where('current_division_id', 20)->get();
        $npt_staffs = Staff::where('current_division_id', 26)->get();
        $ygn_staffs = Staff::where('current_division_id', 23)->get();
        $head_staffs = Staff::whereHas('current_division', fn ($query) => $query->where('division_type_id', 1))->get();
        $mag_staffs = Staff::where('current_division_id', 19)->get();
        $pagu_staffs = Staff::where('current_division_id', 18)->get();
        $tnty_staffs = Staff::where('current_division_id', 17)->get();
        $aya_staffs = Staff::where('current_division_id', 25)->get();
        $total_staffs = Staff::whereIn('current_division_id', [1, 2, 12, 13, 14, 15, 21, 22, 24, 16, 20, 26, 23, 19, 18, 17, 25])->get();
        $data = [
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            'third_payscales'=>Payscale::where('staff_type_id',3)->get(),
            'kachin_staffs' => $kachin_staffs,
            'kayah_staffs' => $kayah_staffs,
            'kayin_staffs' => $kayin_staffs,
            'chin_staffs' => $chin_staffs,
            'mon_staffs' => $mon_staffs,
            'rakhine_staffs' => $rakhine_staffs,
            'shan_staffs' => $shan_staffs,
            'sagaing_staffs' => $sagaing_staffs,
            'mdy_staffs' => $mdy_staffs,
            'npt_staffs' => $npt_staffs,
            'ygn_staffs' => $ygn_staffs,
            'head_staffs' => $head_staffs,
            'mag_staffs' => $mag_staffs,
            'pagu_staffs' => $pagu_staffs,
            'tnty_staffs' => $tnty_staffs,
            'aya_staffs' => $aya_staffs,
            'total_staffs' => $total_staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_2', $data,[],['format' => 'A4-L',
          'orientation' => 'L'
]);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_2.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new PA02(
    ), 'PA02.xlsx');
    }
  
    public function go_word()
{
    $kachin_staffs = Staff::where('current_division_id', 12)->get();
        $kayah_staffs = Staff::where('current_division_id', 13)->get();
        $kayin_staffs = Staff::where('current_division_id', 14)->get();
        $chin_staffs = Staff::where('current_division_id', 15)->get();
        $mon_staffs = Staff::where('current_division_id', 21)->get();
        $rakhine_staffs = Staff::where('current_division_id', 22)->get();
        $shan_staffs = Staff::where('current_division_id', 24)->get();
        $sagaing_staffs = Staff::where('current_division_id', 16)->get();
        $mdy_staffs = Staff::where('current_division_id', 20)->get();
        $npt_staffs = Staff::where('current_division_id', 26)->get();
        $ygn_staffs = Staff::where('current_division_id', 23)->get();
        $head_staffs = Staff::whereHas('current_division', fn ($query) => $query->where('division_type_id', 1))->get();
        $mag_staffs = Staff::where('current_division_id', 19)->get();
        $pagu_staffs = Staff::where('current_division_id', 18)->get();
        $tnty_staffs = Staff::where('current_division_id', 17)->get();
        $aya_staffs = Staff::where('current_division_id', 25)->get();
        $total_staffs = Staff::whereIn('current_division_id', [1, 2, 12, 13, 14, 15, 21, 22, 24, 16, 20, 26, 23, 19, 18, 17, 25])->get();
   
    
    $first_payscales = Payscale::where('staff_type_id', 1)->get();
    $second_payscales =Payscale::where('staff_type_id', 2)->get();
    $third_payscales=Payscale::where('staff_type_id',3)->get();
   

    
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 800]); 
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
    $section->addTitle('ဝန်ကြီးဌာန၊ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
    $section->addTitle('ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်');
    $table->addCell(2000,['vMerge' => 'restart'])->addText('လစာနှုန်း (ကျပ်)');
    $table->addCell(2000,['vMerge' => 'restart'])->addText('ခန့်ပြီး');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကချင်');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကယား');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကရင်');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ချင်း');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('မွန်');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ရခိုင်');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ရှမ်း');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('စစ်ကိုင်း');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('မန္တလေး');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('နေပြည်တော်	');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ရန်ကုန်');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ရန်ကုန်ရုံးချုပ်');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('မကွေး');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပဲခူး');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('တနင်သာရီ');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ဧရာဝတီ');
    $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText('စုစုပေါင်း
');
   

    $table->addRow();
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    $table->addCell(1500)->addText('ကျား', ['alignment' => 'center']);
    $table->addCell(1500)->addText('မ', ['alignment' => 'center']);
    foreach ($first_payscales as $index=> $payscale) {
        $table->addRow();
        $table->addCell(2000)->addText(en2mm($index + 1));
        $table->addCell(2000)->addText($payscale->name);
        $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
        $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
        $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
       
    }
            $table->addRow();
            $table->addCell(2000,['gridSpan' => 2])->addText($first_payscales[0]->staff_type->name.'စုစုပေါင်း');
            $table->addCell(2000)->addText( en2mm($first_payscales->sum('allowed_qty')) );
            $table->addCell(2000)->addText(en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) );
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) );
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            foreach ($second_payscales as $index=> $payscale) {
                $table->addRow();
                $table->addCell(2000)->addText(en2mm($index + 1));
                $table->addCell(2000)->addText($payscale->name);
                $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
                $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count()));
                $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count()));
               
            }
            $table->addRow();
            $table->addCell(2000,['gridSpan' => 2])->addText(en2mm($second_payscales[0]->staff_type->name).'စုစုပေါင်း');
            $table->addCell(2000)->addText( en2mm($second_payscales->sum('allowed_qty')) );
            $table->addCell(2000)->addText(en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) );
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) );
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
          


         
            $table->addRow();
            $table->addCell(2000,['gridSpan' => 2])->addText('ပေါင်း');
            $table->addCell(2000)->addText( en2mm($second_payscales->sum('allowed_qty')+$first_payscales->sum('allowed_qty')) );
            $table->addCell(2000)->addText(en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) );
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) );
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$head_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$head_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText( en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$total_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()+$total_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));


            $table->addRow();
            $table->addCell(2000,['gridSpan' => 2])->addText('နေ့စား');
            $table->addCell(2000)->addText(en2mm($third_payscales->sum('allowed_qty')) );
            $table->addCell(2000)->addText(en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) );
            $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $table->addCell(1500)->addText(en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()));
            $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
    $section->addTitle('ကန့်သတ်', 1);
  
    $filePath = storage_path('app/public/investment_companies_report.docx');
    $phpWord->save($filePath, 'Word2007');
    return response()->download($filePath)->deleteFileAfterSend(true);
}
    public function render()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $third_payscales=Payscale::where('staff_type_id',3)->get();
        $kachin_staffs = Staff::where('current_division_id', 12)->get();
        $kayah_staffs = Staff::where('current_division_id', 13)->get();
        $kayin_staffs = Staff::where('current_division_id', 14)->get();
        $chin_staffs = Staff::where('current_division_id', 15)->get();
        $mon_staffs = Staff::where('current_division_id', 21)->get();
        $rakhine_staffs = Staff::where('current_division_id', 22)->get();
        $shan_staffs = Staff::where('current_division_id', 24)->get();
        $sagaing_staffs = Staff::where('current_division_id', 16)->get();
        $mdy_staffs = Staff::where('current_division_id', 20)->get();
        $npt_staffs = Staff::where('current_division_id', 26)->get();
        $ygn_staffs = Staff::where('current_division_id', 23)->get();
        $head_staffs = Staff::whereHas('current_division', fn ($query) => $query->where('division_type_id', 1))->get();
        $mag_staffs = Staff::where('current_division_id', 19)->get();
        $pagu_staffs = Staff::where('current_division_id', 18)->get();
        $tnty_staffs = Staff::where('current_division_id', 17)->get();
        $aya_staffs = Staff::where('current_division_id', 25)->get();
        $total_staffs = Staff::whereIn('current_division_id', [1, 2, 12, 13, 14, 15, 21, 22, 24, 16, 20, 26, 23, 19, 18, 17, 25])->get();
        return view('livewire.investment-companies.investment-companies2',[
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'third_payscales'=>$third_payscales,
            'kachin_staffs' => $kachin_staffs,
            'kayah_staffs' => $kayah_staffs,
            'kayin_staffs' => $kayin_staffs,
            'chin_staffs' => $chin_staffs,
            'mon_staffs' => $mon_staffs,
            'rakhine_staffs' => $rakhine_staffs,
            'shan_staffs' => $shan_staffs,
            'sagaing_staffs' => $sagaing_staffs,
            'mdy_staffs' => $mdy_staffs,
            'npt_staffs' => $npt_staffs,
            'ygn_staffs' => $ygn_staffs,
            'head_staffs' => $head_staffs,
            'mag_staffs' => $mag_staffs,
            'pagu_staffs' => $pagu_staffs,
            'tnty_staffs' => $tnty_staffs,
            'aya_staffs' => $aya_staffs,
            'total_staffs' => $total_staffs,
        ]);
    }

    
}


