<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies12 extends Component
{
    public function go_pdf(){
        $date_limit = '2024-03-31';
        $date_limit_query = Staff::where('join_date', '<=', $date_limit);
        $high_staff_query = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_staff_query = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));

        $high_new_appointed_staffs = $high_staff_query
        ->where('is_newly_appointed', true)
        ->count();
        $low_new_appointed_staffs = $low_staff_query
        ->where('is_newly_appointed', true)
        ->count();

        $high_transferred_staffs = $high_staff_query
        ->where('is_newly_appointed', false)
        ->count();
        $low_transferred_staffs = $low_staff_query
        ->where('is_newly_appointed', false)
        ->count();

        $high_leave_staffs = $high_staff_query->where('retire_type_id', 6)->count();
        $low_leave_staffs = $low_staff_query->where('retire_type_id', 6)->count();

        $d_limit_high_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $d_limit_low_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $data = [
            'high_new_appointed_staffs' => $high_new_appointed_staffs,
            'low_new_appointed_staffs' => $low_new_appointed_staffs,
            'high_transferred_staffs' => $high_transferred_staffs,
            'low_transferred_staffs' => $low_transferred_staffs,
            'd_limit_high_staffs' => $d_limit_high_staffs,
            'd_limit_low_staffs' => $d_limit_low_staffs,
            'high_staff_query' => $high_staff_query,
            'low_staff_query' => $low_staff_query,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_12', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_12.pdf');
    }

    public function render()
    {
        $date_limit = '2024-03-31';
        $date_limit_query = Staff::where('join_date', '<=', $date_limit);
        $high_staff_query = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_staff_query = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));

        $high_new_appointed_staffs = $high_staff_query
        ->where('is_newly_appointed', true)
        ->count();
        $low_new_appointed_staffs = $low_staff_query
        ->where('is_newly_appointed', true)
        ->count();

        $high_transferred_staffs = $high_staff_query
        ->where('is_newly_appointed', false)
        ->count();
        $low_transferred_staffs = $low_staff_query
        ->where('is_newly_appointed', false)
        ->count();

        $high_leave_staffs = $high_staff_query->where('retire_type_id', 6)->count();
        $low_leave_staffs = $low_staff_query->where('retire_type_id', 6)->count();

        $d_limit_high_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $d_limit_low_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        return view('livewire.investment-companies.investment-companies12',[
            'high_new_appointed_staffs' => $high_new_appointed_staffs,
            'low_new_appointed_staffs' => $low_new_appointed_staffs,
            'high_transferred_staffs' => $high_transferred_staffs,
            'low_transferred_staffs' => $low_transferred_staffs,
            'd_limit_high_staffs' => $d_limit_high_staffs,
            'd_limit_low_staffs' => $d_limit_low_staffs,
            'high_staff_query' => $high_staff_query,
            'low_staff_query' => $low_staff_query,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
        ]);
    }
}
