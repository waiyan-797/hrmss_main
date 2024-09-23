<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies13 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }

    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_13', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_13.pdf');
    }

    public function render()
    {
        $staff = Staff::get()->first();
        return view('livewire.investment-companies.investment-companies13',[
            'staff' => $staff,
        ]);
    }
    
    // public function render()
    // {
    //     return view('livewire.investment-companies.investment-companies13');
    // }
}
