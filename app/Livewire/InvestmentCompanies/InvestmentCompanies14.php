<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Division;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies14 extends Component
{
    public function go_pdf(){
        $data = [

        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_14', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_14.pdf');
    }

    public function render()
    {
        $yinn_1 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 1);
        })->count();

        $yinn_2 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 2);
        })->count();

        $yinn_3 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 3);
        })->count();

        $yinn_4 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 4);
        })->count();

        $ranks = Rank::get();

        return view('livewire.investment-companies.investment-companies14',[
            'ranks' => $ranks,
            'yinn_1' => $yinn_1,
            'yinn_2' => $yinn_2,
            'yinn_3' => $yinn_3,
            'yinn_4' => $yinn_4,
        ]);
    }
}
