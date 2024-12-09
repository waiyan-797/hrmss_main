<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;


use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PA12 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA12::all();
    // }
    public $filterRange;
    public $year;
    public $month;
    public $date;


    public function __construct($filterRange ,$year ,$month,$date)
    {
        $this->filterRange = $filterRange ;
        $this->year  =  $year;
         $this->month  =  $month;
         $this->date  =  $date;

    }
    public function view(): View
    {
        
        $date_limit = $this->filterRange;
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
           'year' => $this->year,
            'month' => $this->month,
            'date' => $this->date,
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


        return view('excel_reports.investment_companies_report_12', $data);
    }
public function styles(Worksheet $sheet)
{
    // Apply global font style
    $sheet->getStyle('A1:Z1000')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
    ]);

    // Apply borders to all cells with black border
    $sheet->getStyle('A1:V100')->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '000000'], // Black border
            ],
        ],
    ]);

    // Auto-size columns for the table
    foreach (range('A', 'F') as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    return [];
}

}
