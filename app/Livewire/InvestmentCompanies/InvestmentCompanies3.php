<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies3 extends Component
{

    public function go_pdf(){
        $data = [
            'first_ranks' => Rank::where('staff_type_id', 1)->get(),
            'second_ranks' => Rank::where('staff_type_id', 2)->get(),
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_3', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_3.pdf');
    }

    public function render()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        return view('livewire.investment-companies.investment-companies3',[
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks
        ]);
    }
}
