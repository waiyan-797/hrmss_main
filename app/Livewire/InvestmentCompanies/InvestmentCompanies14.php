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
        $yinn_1 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 1);
        });

        $yinn_2 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 2);
        });

        $yinn_3 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 3);
        });

        $yinn_4 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 4);
        });

        $si_man =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 11);
        });

        $mu_warda =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 8);
        });

        $yinn_mhyint_tin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 7);
        });

        $yinn_kyee_kyat = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 5);
        });

        $si_man_kaine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 6);
        });

        $company = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 9);
        });

        $hr = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 10);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
        });

        $ranks = Rank::get();
        $data = [
            'ranks' => $ranks,
            'si_man' => $si_man,
            'yinn_1' => $yinn_1,
            'yinn_2' => $yinn_2,
            'yinn_3' => $yinn_3,
            'yinn_4' => $yinn_4,
            'mu_warda' => $mu_warda,
            'yinn_mhyint_tin' => $yinn_mhyint_tin,
            'yinn_kyee_kyat' => $yinn_kyee_kyat,
            'si_man_kaine' => $si_man_kaine,
            'company' => $company,
            'hr' => $hr,
            'total' => $total,
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
        });

        $yinn_2 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 2);
        });

        $yinn_3 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 3);
        });

        $yinn_4 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 4);
        });

        $si_man =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 11);
        });

        $mu_warda =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 8);
        });

        $yinn_mhyint_tin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 7);
        });

        $yinn_kyee_kyat = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 5);
        });

        $si_man_kaine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 6);
        });

        $company = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 9);
        });

        $hr = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 10);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
        });

        $ranks = Rank::get();

        return view('livewire.investment-companies.investment-companies14',[
            'ranks' => $ranks,
            'si_man' => $si_man,
            'yinn_1' => $yinn_1,
            'yinn_2' => $yinn_2,
            'yinn_3' => $yinn_3,
            'yinn_4' => $yinn_4,
            'mu_warda' => $mu_warda,
            'yinn_mhyint_tin' => $yinn_mhyint_tin,
            'yinn_kyee_kyat' => $yinn_kyee_kyat,
            'si_man_kaine' => $si_man_kaine,
            'company' => $company,
            'hr' => $hr,
            'total' => $total,
        ]);
    }
}
