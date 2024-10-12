<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies15 extends Component
{
    public function go_pdf(){
        $yangon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 23);
        });

        $nay_pyi_thaw = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 26);
        });

        $mandalay = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 20);
        });

        $shan = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 24);
        });

        $mon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 21);
        });

        $aya = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 25);
        });

        $sagaing = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 16);
        });

        $tanindaryi = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 17);
        });

        $kayin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 14);
        });

        $bago = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 18);
        });

        $magway = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 19);
        });

        $kayah = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 13);
        });

        $kachin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 12);
        });

        $rakhine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 22);
        });

        $chin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 15);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [23, 26, 20, 24, 21, 25, 16, 17, 14, 18, 19, 13, 12, 22, 15]);
        });

        $ranks = Rank::get();
        $data = [
            'yangon' => $yangon,
            'nay_pyi_thaw' => $nay_pyi_thaw,
            'mandalay' => $mandalay,
            'shan' => $shan,
            'mon' => $mon,
            'aya' => $aya,
            'sagaing' => $sagaing,
            'tanindaryi' => $tanindaryi,
            'kayin' => $kayin,
            'bago' => $bago,
            'magway' => $magway,
            'kayah' => $kayah,
            'kachin' => $kachin,
            'rakhine' => $rakhine,
            'chin' => $chin,
            'total' => $total,
            'ranks' => $ranks,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_15', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_15.pdf');
    }

    public function go_word()
    {
        $yangon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 23);
        });

        $nay_pyi_thaw = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 26);
        });

        $mandalay = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 20);
        });

        $shan = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 24);
        });

        $mon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 21);
        });

        $aya = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 25);
        });

        $sagaing = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 16);
        });

        $tanindaryi = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 17);
        });

        $kayin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 14);
        });

        $bago = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 18);
        });

        $magway = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 19);
        });

        $kayah = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 13);
        });

        $kachin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 12);
        });

        $rakhine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 22);
        });

        $chin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 15);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [23, 26, 20, 24, 21, 25, 16, 17, 14, 18, 19, 13, 12, 22, 15]);
        });
       
        $ranks = Rank::get();
    
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
        $section->addText('Investment Companies Report', ['bold' => true, 'size' => 16]);
        $table = $section->addTable(['borderSize' => 16, 'borderColor' => '000000', 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(1000)->addText("စဥ်", ['bold' => true]);
        $table->addCell(4000)->addText("ရာထူး", ['bold' => true]);
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရန်ကုန်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('နေပြည်တော်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('မန္တလေးတိုင်း');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရှမ်းပြည်နယ်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('မွန်ပြည်နယ်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ဧရာဝတီတိုင်း');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('စစ်ကိုင်းတိုင်း');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('တနင်္သာရီတိုင်း');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ကရင်ပြည်နယ်	');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ပဲခူးတိုင်း');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('မကွေးတိုင်း');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ကယားပြည်နယ်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ကချင်ပြည်နယ်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ရခိုင်ပြည်နယ်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ချင်းပြည်နယ်');
       $table->addCell(3000, ['gridSpan' => 3, 'valign' => 'center'])->addText('စုစုပေါင်း');
    
       $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ဖွဲ့', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ခန့်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ပို/လို', ['alignment' => 'center']);
       
        foreach ($ranks as $index => $rank) {
            $count_yangon = $yangon->where('id', $rank->id)->count();
            $count_nay_pyi_thaw = $nay_pyi_thaw->where('id', $rank->id)->count();
            $count_mandalay = $mandalay->where('id', $rank->id)->count();
            $count_shan = $shan->where('id', $rank->id)->count();
            $count_mon = $mon->where('id', $rank->id)->count();
            $count_aya = $aya->where('id', $rank->id)->count();
            $count_sagaing = $sagaing->where('id', $rank->id)->count();
            $count_tanindaryi = $tanindaryi->where('id', $rank->id)->count();
            $count_kayin = $kayin->where('id', $rank->id)->count();
            $count_bago = $bago->where('id', $rank->id)->count();
            $count_magway = $magway->where('id', $rank->id)->count();
            $count_kayah = $kayah->where('id', $rank->id)->count();
            $count_kachin = $kachin->where('id', $rank->id)->count();
            $count_rakhine = $rakhine->where('id', $rank->id)->count();
            $count_chin = $chin->where('id', $rank->id)->count();
            $count_total = $total->where('id', $rank->id)->count();
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);  
            $table->addCell(4000)->addText($rank->name);  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_yangon));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_yangon)); 
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty) );  
            $table->addCell(1000)->addText(en2mm($count_nay_pyi_thaw)); 
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_nay_pyi_thaw)); 
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_mandalay));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_mandalay));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty)); 
            $table->addCell(1000)->addText(en2mm($count_shan) );  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_shan));  
            $table->addCell(1000)->addText( en2mm($rank->allowed_qty)); 
            $table->addCell(1000)->addText(en2mm($count_mon));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_mon));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_aya));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_aya));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_sagaing));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_sagaing));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_tanindaryi));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_tanindaryi));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty)); 
            $table->addCell(1000)->addText(en2mm($count_kayin)); 
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_kayin)); 
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_bago) );  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_bago));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_magway));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_magway));  
            $table->addCell(1000)->addText( en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_kayah));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_kayah));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_kachin));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_kachin));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_rakhine));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_rakhine) );  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_chin));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_chin));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty));  
            $table->addCell(1000)->addText(en2mm($count_total));  
            $table->addCell(1000)->addText(en2mm($rank->allowed_qty - $count_total));  
            
        }

        $divisions = [
            'yangon' => 1,
            'nay_pyi_thaw' => 2,
            'mandalay' => 3,
            'shan' => 4,
            'mon' => 5,
            'aya' => 6,
            'sagaing' => 7,
            'tanindaryi' => 8,
            'kayin' => 9,
            'bago' => 10,
            'magway' =>11,
            'kayah' => 12,
            'kachin' => 13,
            'rakhine' => 14,
            'chin' => 15,
            'total' => 16,
           
        ];
        
        $divisionData = [];
        
        foreach ($divisions as $key => $divisionId) {
            $divisionData[$key] = Rank::whereHas('staffs', function($query) use ($divisionId) {
                return $query->where('current_division_id', $divisionId);
            })->get();
        }
        
        $totalDivision = array_fill_keys(array_keys($divisions), ['allowed' => 0, 'count' => 0]);
    
    foreach ($ranks as $rank) {
        foreach ($divisions as $divisionName => $divisionId) {
            $totalDivision[$divisionName]['allowed'] += $rank->allowed_qty;
            $totalDivision[$divisionName]['count'] += $rank->{'count_' . $divisionName};
        }
    }
    $table->addRow();
    $table->addCell(1000)->addText();
    $table->addCell(4000)->addText('စုစုပေါင်း');
    foreach ($divisions as $divisionName => $divisionId) {
        $table->addCell(1000)->addText(en2mm($totalDivision[$divisionName]['allowed']));
        $table->addCell(1000)->addText(en2mm($totalDivision[$divisionName]['count']));
        $table->addCell(1000)->addText(en2mm($totalDivision[$divisionName]['allowed'] - $totalDivision[$divisionName]['count']));
       
    }
        
    
    
        $temp_file = storage_path('investment_companies_report.docx');
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($temp_file);
    
        return response()->download($temp_file)->deleteFileAfterSend(true);
    }
    

    public function render()
    {
        $yangon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 23);
        });

        $nay_pyi_thaw = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 26);
        });

        $mandalay = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 20);
        });

        $shan = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 24);
        });

        $mon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 21);
        });

        $aya = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 25);
        });

        $sagaing = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 16);
        });

        $tanindaryi = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 17);
        });

        $kayin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 14);
        });

        $bago = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 18);
        });

        $magway = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 19);
        });

        $kayah = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 13);
        });

        $kachin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 12);
        });

        $rakhine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 22);
        });

        $chin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 15);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [23, 26, 20, 24, 21, 25, 16, 17, 14, 18, 19, 13, 12, 22, 15]);
        });

        $ranks = Rank::get();
        return view('livewire.investment-companies.investment-companies15',[
            'yangon' => $yangon,
            'nay_pyi_thaw' => $nay_pyi_thaw,
            'mandalay' => $mandalay,
            'shan' => $shan,
            'mon' => $mon,
            'aya' => $aya,
            'sagaing' => $sagaing,
            'tanindaryi' => $tanindaryi,
            'kayin' => $kayin,
            'bago' => $bago,
            'magway' => $magway,
            'kayah' => $kayah,
            'kachin' => $kachin,
            'rakhine' => $rakhine,
            'chin' => $chin,
            'total' => $total,
            'ranks' => $ranks,
        ]);
    }
}
