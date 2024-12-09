<?php

namespace App\Exports;

use App\Models\PensionYear;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;


class PA16 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA16::all();
    // }
    public $nameSearch, $deptId, $filterDate;
    public $staffs;
    public $year , $month ;
    public function __construct($nameSearch , $staffs ,
    $year ,
$month

    )
    {
        $this->nameSearch = $nameSearch ;
        $this->staffs=$staffs;
        $this->year  =  $year;
         $this->month  =  $month;

    }
    public function view(): View
    {
        $staffs = Staff::get();
        $pension_year = PensionYear::first();
       
        $data = [
            'staffs' => $staffs,
            'pension_year'=>$pension_year,
        ];
        return view('excel_reports.staff_report_1', $data);
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
    $sheet->getStyle('A1:L100')->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '000000'], // Black border
            ],
        ],
    ]);

    // Auto-size columns for the table
    foreach (range('A', 'L') as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    return [];
}
}
