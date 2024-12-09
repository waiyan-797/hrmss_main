<?php

namespace App\Exports;

use App\Models\Payscale;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;

class PA04 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA04::all();
    // }
    public function view(): View
    {
        $data = [
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            
          
        ];
        return view('excel_reports.investment_companies_report_4', $data);
    }

    // public function styles(Worksheet $sheet)
    // {
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

    // Apply borders to all cells with black border
    $sheet->getStyle('A1:F100')->applyFromArray([
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
