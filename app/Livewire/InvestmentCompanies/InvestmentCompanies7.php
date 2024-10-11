<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Promotion;
use App\Models\Staff;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvestmentCompanies7 extends Component


{

    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;

    public function go_pdf()
    {

        [$year, $month] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $previousMonthDate = Carbon::createFromDate($this->year, $this->month)->subMonth();
        $this->previousYear = $previousMonthDate->year;
        $this->previousMonth = $previousMonthDate->month;




        // $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
        //     ->where('is_active', '1')
        //     ->whereYear('created_at', $year)
        //     ->whereMonth('created_at', $this->previousMonth)

        //     ->count();

        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {


                    // Active and status hasn't changed during the previous month
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                })
                    // ->orWhere(function ($subQuery) {
                    //     // Active for users who never changed status
                    //     $subQuery->whereNull('status_changed_at')
                    //         ->where('is_active', '1');  // Never changed, still active
                    // })
                ;
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();









        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {


                    // Active and status hasn't changed during the previous month
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                })
                    // ->orWhere(function ($subQuery) {
                    //     // Active for users who never changed status
                    //     $subQuery->whereNull('status_changed_at')
                    //         ->where('is_active', '1');  // Never changed, still active
                    // })
                ;
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();






        $query = Staff::query();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();

        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();


        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $total_new_staffs =  $high_new_staffs  +  $low_new_staffs;


        $high_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $total_leave_staffs =
            $high_leave_staffs + $low_leave_staffs;

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $total_transfer_staffs = $high_transfer_staffs + $low_transfer_staffs;

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $high_left_staffs = ($high_staffs + $high_new_staffs + $high_transfer_staffs) - ($high_leave_staffs + $high_reduced_total);
        $low_left_staffs = ($low_staffs + $low_new_staffs + $low_transfer_staffs) - ($low_leave_staffs + $low_reduced_total);
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
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_pdf_7.pdf');
    }

    public function mount()
    {
        $this->filterRange = Carbon::now()->format('Y-m'); // Format: 'YYYY-MM'

    }
    public function render()
    {




        [$year, $month] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
        $previousMonthDate = Carbon::createFromDate($this->year, $this->month)->subMonth();
        $this->previousYear = $previousMonthDate->year;
        $this->previousMonth = $previousMonthDate->month;




        // $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
        //     ->where('is_active', '1')
        //     ->whereYear('created_at', $year)
        //     ->whereMonth('created_at', $this->previousMonth)

        //     ->count();

        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {


                    // Active and status hasn't changed during the previous month
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                })
                    // ->orWhere(function ($subQuery) {
                    //     // Active for users who never changed status
                    //     $subQuery->whereNull('status_changed_at')
                    //         ->where('is_active', '1');  // Never changed, still active
                    // })
                ;
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();









        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {


                    // Active and status hasn't changed during the previous month
                    $subQuery->where('status_changed_at', '<=', $previousMonthDate->endOfMonth())  // Status was set before this month
                        ->where('previous_active_status', '1');
                })
                    // ->orWhere(function ($subQuery) {
                    //     // Active for users who never changed status
                    //     $subQuery->whereNull('status_changed_at')
                    //         ->where('is_active', '1');  // Never changed, still active
                    // })
                ;
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=',  $this->previousMonth)  // To ensure they were active during the previous month
            ->count();






        $query = Staff::query();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();

        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->get();


        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', true)->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)->count();
        $total_new_staffs =  $high_new_staffs  +  $low_new_staffs;


        $high_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();
        $total_leave_staffs =
            $high_leave_staffs + $low_leave_staffs;

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->where('is_newly_appointed', false)->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)->count();
        $total_transfer_staffs = $high_transfer_staffs + $low_transfer_staffs;

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)->count();

        $high_left_staffs = ($high_staffs + $high_new_staffs + $high_transfer_staffs) - ($high_leave_staffs + $high_reduced_total);
        $low_left_staffs = ($low_staffs + $low_new_staffs + $low_transfer_staffs) - ($low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;
        return view('livewire.investment-companies.investment-companies7', [
            'query' => $query,
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
