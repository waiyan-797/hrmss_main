<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies7 extends Component
{
    public function go_pdf(){
        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->get();
        $data = [
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'high_reduced_staffs' => $high_reduced_staffs,
            'low_reduced_staffs' => $low_reduced_staffs,
            'total_reduced_staffs' => $total_reduced_staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_7', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_7.pdf');
    }

    public function render()
    {
        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->get();
        return view('livewire.investment-companies.investment-companies7', [
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'high_reduced_staffs' => $high_reduced_staffs,
            'low_reduced_staffs' => $low_reduced_staffs,
            'total_reduced_staffs' => $total_reduced_staffs,
        ]);
    }

}
