<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies5 extends Component
{
    public function go_pdf(){
        $data = [
            'payscales' => Payscale::get(),
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_5', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_5.pdf');
    }

    public function render()
    {
        $payscales = Payscale::get();
        return view('livewire.investment-companies.investment-companies5', [
            'payscales' => $payscales,
        ]);
    }
}
