<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Punishment;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies6 extends Component
{
    public function go_pdf(){
        $punishments = Punishment::get();
        $data = [
            'punishments' => $punishments,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_6', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_6.pdf');
    }

     public function render()
    {
        $punishments = Punishment::get();
        return view('livewire.investment-companies.investment-companies6', [
            'punishments' => $punishments,
        ]);
    }

}
