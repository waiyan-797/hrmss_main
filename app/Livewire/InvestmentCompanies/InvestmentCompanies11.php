<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies11 extends Component
{
    public function go_pdf(){
        $date_limit = '2023-12-31';
        $_date_limit = '2024-03-31';
        $ten_years_ago = Carbon::now()->subYears(10);
        //over 10 years
        $date_limit_query = Staff::where('join_date', '<=', $date_limit)->where('join_date', '<', $ten_years_ago);
        $high_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query = Staff::where('join_date', '>', $date_limit)->where('join_date', '<=', $ten_years_ago);
        $high_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs = $high_q
        ->where('is_newly_appointed', false)
        ->where('join_date', '<=', $ten_years_ago)->count();
        $low_transfer_new_staffs = $low_q
        ->where('is_newly_appointed', false)
        ->where('join_date', '<=', $ten_years_ago)->count();

        $high_leave_staffs = $high_q
        ->where('retire_type_id', 6)
        ->where('join_date', '<=', $ten_years_ago)->count();
        $low_leave_staffs = $low_q
        ->where('retire_type_id', 6)
        ->where('join_date', '<=', $ten_years_ago)->count();

        $_date_limit_query = Staff::where('join_date', '<=', $_date_limit);
        $high_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        //below 10 years
        $date_limit_query2 = Staff::where('join_date', '<=', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query2 = Staff::where('join_date', '>', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs2 = $high_q2
        ->where('is_newly_appointed', false)
        ->where('join_date', '>', $ten_years_ago)->count();
        $low_transfer_new_staffs2 = $low_q2
        ->where('is_newly_appointed', false)
        ->where('join_date', '>', $ten_years_ago)->count();

        $high_leave_staffs2 = $high_q2
        ->where('retire_type_id', 6)
        ->where('join_date', '>', $ten_years_ago)->count();
        $low_leave_staffs2 = $low_q2
        ->where('retire_type_id', 6)
        ->where('join_date', '>', $ten_years_ago)->count();

        $high_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();
        $data = [
            'high_dlimit_staffs' => $high_dlimit_staffs,
            'low_dlimit_staffs' => $low_dlimit_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'high_transfer_new_staffs' => $high_transfer_new_staffs,
            'low_transfer_new_staffs' => $low_transfer_new_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'high_q' => $high_q,
            'low_q' => $low_q,
            'high_dlimit_staffs2' => $high_dlimit_staffs2,
            'low_dlimit_staffs2' => $low_dlimit_staffs2,
            'high_dlimit2_staffs' => $high_dlimit2_staffs,
            'low_dlimit2_staffs' => $low_dlimit2_staffs,
            'high_new_staffs2' => $high_new_staffs2,
            'low_new_staffs2' => $low_new_staffs2,
            'high_transfer_new_staffs2' => $high_transfer_new_staffs2,
            'low_transfer_new_staffs2' => $low_transfer_new_staffs2,
            'high_leave_staffs2' => $high_leave_staffs2,
            'low_leave_staffs2' => $low_leave_staffs2,
            'high_q2' => $high_q2,
            'low_q2' => $low_q2,
            'high_dlimit2_staffs2' => $high_dlimit2_staffs2,
            'low_dlimit2_staffs2' => $low_dlimit2_staffs2,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_11', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_11.pdf');
    }

    public function render()
    {
        $date_limit = '2023-12-31';
        $_date_limit = '2024-03-31';
        $ten_years_ago = Carbon::now()->subYears(10);
        //over 10 years
        $date_limit_query = Staff::where('join_date', '<=', $date_limit)->where('join_date', '<', $ten_years_ago);
        $high_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query = Staff::where('join_date', '>', $date_limit)->where('join_date', '<=', $ten_years_ago);
        $high_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs = $high_q
        ->where('is_newly_appointed', false)
        ->where('join_date', '<=', $ten_years_ago)->count();
        $low_transfer_new_staffs = $low_q
        ->where('is_newly_appointed', false)
        ->where('join_date', '<=', $ten_years_ago)->count();

        $high_leave_staffs = $high_q
        ->where('retire_type_id', 6)
        ->where('join_date', '<=', $ten_years_ago)->count();
        $low_leave_staffs = $low_q
        ->where('retire_type_id', 6)
        ->where('join_date', '<=', $ten_years_ago)->count();

        $_date_limit_query = Staff::where('join_date', '<=', $_date_limit);
        $high_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        //below 10 years
        $date_limit_query2 = Staff::where('join_date', '<=', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query2 = Staff::where('join_date', '>', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs2 = $high_q2
        ->where('is_newly_appointed', false)
        ->where('join_date', '>', $ten_years_ago)->count();
        $low_transfer_new_staffs2 = $low_q2
        ->where('is_newly_appointed', false)
        ->where('join_date', '>', $ten_years_ago)->count();

        $high_leave_staffs2 = $high_q2
        ->where('retire_type_id', 6)
        ->where('join_date', '>', $ten_years_ago)->count();
        $low_leave_staffs2 = $low_q2
        ->where('retire_type_id', 6)
        ->where('join_date', '>', $ten_years_ago)->count();

        $high_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        return view('livewire.investment-companies.investment-companies11',[
            'high_dlimit_staffs' => $high_dlimit_staffs,
            'low_dlimit_staffs' => $low_dlimit_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'high_transfer_new_staffs' => $high_transfer_new_staffs,
            'low_transfer_new_staffs' => $low_transfer_new_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'high_q' => $high_q,
            'low_q' => $low_q,
            'high_dlimit_staffs2' => $high_dlimit_staffs2,
            'low_dlimit_staffs2' => $low_dlimit_staffs2,
            'high_dlimit2_staffs' => $high_dlimit2_staffs,
            'low_dlimit2_staffs' => $low_dlimit2_staffs,
            'high_new_staffs2' => $high_new_staffs2,
            'low_new_staffs2' => $low_new_staffs2,
            'high_transfer_new_staffs2' => $high_transfer_new_staffs2,
            'low_transfer_new_staffs2' => $low_transfer_new_staffs2,
            'high_leave_staffs2' => $high_leave_staffs2,
            'low_leave_staffs2' => $low_leave_staffs2,
            'high_q2' => $high_q2,
            'low_q2' => $low_q2,
            'high_dlimit2_staffs2' => $high_dlimit2_staffs2,
            'low_dlimit2_staffs2' => $low_dlimit2_staffs2,
        ]);
    }
}
