<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PA13 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA13::all();
    // }
    public function view(): View
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        return view('excel_reports.investment_companies_report_13', $data);
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
    $sheet->getStyle('A1:G100')->applyFromArray([
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
