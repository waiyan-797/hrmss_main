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
       $count=0;
        $data = [
            'count'=>$count,
           'payscales' => Payscale::get(),
        ];


        return view('excel_reports.investment_companies_report_5', $data);
    }
    public function styles(Worksheet $sheet)
    {

        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->removeRow(4);

       

        $sheet->getColumnDimension('A')->setWidth(7);
        $sheet->getColumnDimension('B')->setWidth(37);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);

        $sheet->getRowDimension(1)->setRowHeight(40);
        $sheet->getRowDimension(2)->setRowHeight(40);
        $sheet->getRowDimension(3)->setRowHeight(40);

        for ($row = 4; $row <= $highestRow ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(40);
        }
        
        // Set scaling to 80%
        // $sheet->getPageSetup()->setScale(80);

        $sheet->getStyle('A1:A2')->applyFromArray([
                'font' => [
                    'name' => 'Pyidaungsu',
                    'size' => 13,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                    ],
                ],
            ]);
            $sheet->getStyle('A3')->applyFromArray([
                'font' => [
                    'name' => 'Pyidaungsu',
                    'size' => 13,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                    ],
                ],
            ]);

            $sheet->getStyle("A4:$highestColumn$highestRow")->applyFromArray([
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
                        'color' => ['argb' => 'FF000000'], // Black border
                    ],
                ],
            ]);

            $range = "B5:B$highestRow";

            $sheet->getStyle($range)->applyFromArray([
                'font' => [
                    'name' => 'Pyidaungsu',
                    'size' => 13,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'], // Black border
                    ],
                ],
            ]);

            $range = "C5:E$highestRow";

            $sheet->getStyle($range)->applyFromArray([
                'font' => [
                    'name' => 'Pyidaungsu',
                    'size' => 13,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'], // Black border
                    ],
                ],
            ]);
    }

}
