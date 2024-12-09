<?php

namespace App\Exports;

use App\Models\Staff;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PA11 implements FromView ,WithStyles
{ 


    public $filterRange , $filterRangeTo;
   public $year ,$month ,$day ,$toDay ,$Tomonth ,$Toyear;


    public function __construct($filterRange , $filterRangeTo ,
    $year ,
$month,
$day,
$toDay,
$Tomonth,
$Toyear
    )
    {
        $this->filterRange = $filterRange ;
        $this->filterRangeTo = $filterRangeTo;
        $this->year  =  $year;
         $this->month  =  $month;
         $this->day  =  $day;
         $this->toDay  =  $toDay;
         $this->Tomonth  =  $Tomonth;
         $this->Toyear = $Toyear;

    }

    public function view(): View
    {
        $date_limit = $this->filterRange;
        $_date_limit = $this->filterRangeTo;
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
             'year' => $this->year ,
             'month' => $this->month,
             'day' => $this->day,
             'toDay' => $this->toDay,
             'Tomonth' => $this->Tomonth,
             'Toyear' => $this->Toyear
        ];


        return view('excel_reports.investment_companies_report_11', $data);
    }


    // public function styles(Worksheet $sheet)
    // {
    //     // Apply the Pyidaungsu font to the entire sheet
    //     $sheet->getStyle('A1:Z1000')->applyFromArray([
    //         'font' => [
    //             'name' => 'Pyidaungsu',
    //             'size' => 13 , 
    //         ],
    //     ]);

    //     return [];
    // }
    public function styles(Worksheet $sheet)
    {
        // Apply global font style
        $sheet->getStyle('A1:Z1000')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 13,
            ],
        ]);
        $sheet->getStyle('A1:W100')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'], // Black border
                ],
            ],
        ]);
    
        // Auto-size columns for the table
        foreach (range('A', 'W') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
    
        return [];
    }
}
