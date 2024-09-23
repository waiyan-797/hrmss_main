<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


class InvestmentCompanies extends Component
{
    public function go_pdf($staff_id){
        $data = [
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf.pdf');
    }

    public function render()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        return view('livewire.investment-companies.investment-companies',[
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
        ]);
    }
    // public function render(){
    //     return view('livewire.investment-companies.investment-companies');
    // }
}
