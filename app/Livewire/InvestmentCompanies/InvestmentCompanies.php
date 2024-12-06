<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies extends Component
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
        $pdf = PDF::loadView('pdf_reports.investment_companies_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf.pdf');
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
        $head_staffs = Staff::whereHas('current_division', fn($query) => $query->where('division_type_id', 1))->get();
        $mag_staffs = Staff::where('current_division_id', 19)->get();
        $pagu_staffs = Staff::where('current_division_id', 18)->get();
        $tnty_staffs = Staff::where('current_division_id', 17)->get();
        $aya_staffs = Staff::where('current_division_id', 25)->get();
        $total_staffs = Staff::whereIn('current_division_id', [1, 2, 12, 13, 14, 15, 21, 22, 24, 16, 20, 26, 23, 19, 18, 17, 25])->get();
    
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
    
     
       
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(1000)->addText('အမှတ်စဥ်');
        $table->addCell(1500)->addText('လစာနှုန်း (ကျပ်)');
        $table->addCell(1500)->addText('ခွင့်ပြုအင်အား');
        $table->addCell(1000)->addText('ကချင်');
        $table->addCell(1000)->addText('ကယား');
        $table->addCell(1000)->addText('ကရင်');
        $table->addCell(1000)->addText('ချင်း');
        $table->addCell(1000)->addText('မွန်');
        $table->addCell(1000)->addText('ရခိုင်');
        $table->addCell(1000)->addText('ရှမ်း');
        $table->addCell(1000)->addText('စစ်ကိုင်း');
        $table->addCell(1000)->addText('မန္တလေး');
        $table->addCell(1000)->addText('နေပြည်တော်');
        $table->addCell(1000)->addText('ရန်ကုန်');
        $table->addCell(1000)->addText('ရန်ကုန်ရုံးချုပ်');
        $table->addCell(1000)->addText('မကွေး');
        $table->addCell(1000)->addText('ပဲခူး');
        $table->addCell(1000)->addText('တနင်သာရီ');
        $table->addCell(1000)->addText('ဧရာဝတီ');
        $table->addCell(1000)->addText('စုစုပေါင်း');
    
    
    
        
        foreach ($first_payscales as $index=> $payscale) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(4000)->addText($payscale->name);
            $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
            $table->addCell(2000)->addText(en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($chin_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($mon_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($shan_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($npt_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($head_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($mag_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($aya_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($total_staffs->where('payscale_id', $payscale->id)->count()));
        }
        $table->addRow();
   
            $table->addCell(2000, ['gridSpan' => 2])->addText($first_payscales[0]->staff_type->name.'စုစုပေါင်း');
            $table->addCell(2000)->addText(en2mm($first_payscales->sum('allowed_qty')) );
            $table->addCell(2000)->addText(en2mm($kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($chin_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addTexten2mm($sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count());
            $table->addCell(2000)->addText(en2mm($mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($total_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()));


            foreach ($second_payscales as $index=> $payscale) {
                $table->addRow();
                $table->addCell(2000)->addText($index + 1);
                $table->addCell(4000)->addText($payscale->name);
                $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
                $table->addCell(2000)->addText(en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($chin_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($mon_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($shan_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($npt_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($head_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($mag_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($aya_staffs->where('payscale_id', $payscale->id)->count()));
                $table->addCell(2000)->addText(en2mm($total_staffs->where('payscale_id', $payscale->id)->count()));
            }
            $table->addRow();
            $table->addCell(2000,['gridSpan' => 2])->addText($second_payscales[0]->staff_type->name.'စုစုပေါင်း');
            $table->addCell(2000)->addText(en2mm($second_payscales->sum('allowed_qty')) );
            $table->addCell(2000)->addText(en2mm($kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($chin_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count()));
            $table->addCell(2000)->addText(en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
            $table->addCell(2000)->addText(en2mm($total_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()));
    
    
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $phpWord->save($tempFile, 'Word2007');
    
        return response()->download($tempFile, 'investment_companies_report.docx')->deleteFileAfterSend(true);
    }
    
   

    public function render()
    {
        
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
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
        return view('livewire.investment-companies.investment-companies',[
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
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
        ]
    );
    }
}





