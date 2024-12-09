<?php

namespace App\Exports;

use App\Models\Payscale;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;

class PA05 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA05::all();
    // }

    public function view(): View
    {
        
     

        $data = [
           'payscales' => Payscale::get(),
        ];


        return view('excel_reports.investment_companies_report_5', $data);
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
    // Apply styles to the header row
    $sheet->getStyle('A1:E1')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);

    // Apply styles to the body rows
    $sheet->getStyle('A2:E1000')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);

    return [];
}

}
