<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

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
