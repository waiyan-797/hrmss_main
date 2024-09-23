<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies4 extends Component
{
    public function go_pdf(){
        $data = [
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_4', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_4.pdf');
    }
    public function render()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        return view('livewire.investment-companies.investment-companies4',[
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
        ]);
    }
}
