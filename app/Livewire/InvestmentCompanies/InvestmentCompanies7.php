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

        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointment', true)->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointment', true)->count();
        $total_new_staffs = Staff::where('is_newly_appointment', true)->count();

        $high_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->count();
        $total_leave_staffs = Staff::where('retire_type_id', 6)->count();

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointment', false)->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointment', false)->count();
        $total_transfer_staffs = Staff::where('is_newly_appointment', false)->count();

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_left_staffs = ($high_staffs + $high_new_staffs) - ($high_transfer_staffs + $high_leave_staffs + $high_reduced_total);
        $low_left_staffs = ($low_staffs + $low_new_staffs) - ($low_transfer_staffs + $low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;
        $data = [
           'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'high_reduced_staffs' => $high_reduced_staffs,
            'low_reduced_staffs' => $low_reduced_staffs,
            'total_reduced_staffs' => $total_reduced_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'total_new_staffs' => $total_new_staffs,
            'high_transfer_staffs' => $high_transfer_staffs,
            'low_transfer_staffs' => $low_transfer_staffs,
            'total_transfer_staffs' => $total_transfer_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'total_leave_staffs' => $total_leave_staffs,
            'high_left_staffs' => $high_left_staffs,
            'low_left_staffs' => $low_left_staffs,
            'total_left_staffs' => $total_left_staffs,
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

        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointment', true)->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointment', true)->count();
        $total_new_staffs = Staff::where('is_newly_appointment', true)->count();

        $high_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->count();
        $total_leave_staffs = Staff::where('retire_type_id', 6)->count();

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointment', false)->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointment', false)->count();
        $total_transfer_staffs = Staff::where('is_newly_appointment', false)->count();

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_left_staffs = ($high_staffs + $high_new_staffs) - ($high_transfer_staffs + $high_leave_staffs + $high_reduced_total);
        $low_left_staffs = ($low_staffs + $low_new_staffs) - ($low_transfer_staffs + $low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;
        return view('livewire.investment-companies.investment-companies7', [
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'high_reduced_staffs' => $high_reduced_staffs,
            'low_reduced_staffs' => $low_reduced_staffs,
            'total_reduced_staffs' => $total_reduced_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'total_new_staffs' => $total_new_staffs,
            'high_transfer_staffs' => $high_transfer_staffs,
            'low_transfer_staffs' => $low_transfer_staffs,
            'total_transfer_staffs' => $total_transfer_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'total_leave_staffs' => $total_leave_staffs,
            'high_left_staffs' => $high_left_staffs,
            'low_left_staffs' => $low_left_staffs,
            'total_left_staffs' => $total_left_staffs,
        ]);
    }

}
