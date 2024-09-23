<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

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
