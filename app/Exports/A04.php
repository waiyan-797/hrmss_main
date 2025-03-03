<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class A04 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        return view('excel_reports.report_2', $data);
    }
    public function styles(Worksheet $sheet)
    {

    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);
    $sheet->getPageSetup()->setScale(85);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(6.57);
    $sheet->getColumnDimension('B')->setWidth(22);
    $sheet->getColumnDimension('C')->setWidth(26);
    $sheet->getColumnDimension('D')->setWidth(16.6);
    $sheet->getColumnDimension('E')->setWidth(18.42);
    $sheet->getColumnDimension('F')->setWidth(11.14);
    $sheet->getColumnDimension('G')->setWidth(16.57);
    $sheet->getColumnDimension('H')->setWidth(24.85);
    $sheet->getColumnDimension('I')->setWidth(24.85);
    $sheet->getColumnDimension('J')->setWidth(9.14);
    $sheet->getColumnDimension('K')->setWidth(9.42);
    $sheet->getColumnDimension('L')->setWidth(8);
    $sheet->getColumnDimension('M')->setWidth(13.85);


    $sheet->getRowDimension(1)->setRowHeight(20);
    $sheet->getRowDimension(2)->setRowHeight(20);
    $sheet->getRowDimension(3)->setRowHeight(20);
    $sheet->getRowDimension(4)->setRowHeight(20);
    $sheet->getRowDimension(5)->setRowHeight(38.25);
    $sheet->getRowDimension(6)->setRowHeight(38.25);
    $sheet->getRowDimension(7)->setRowHeight(74.25);
    $sheet->getRowDimension(8)->setRowHeight(123.75);
    $sheet->getRowDimension(9)->setRowHeight(123.75);
    $sheet->getRowDimension(10)->setRowHeight(74.25);
    $sheet->getStyle('A1:M3')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    
    $sheet->getStyle('A4:M4')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT, // Right align for row 4
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->getStyle('A5')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);
    $sheet->getStyle('A5')->applyFromArray([
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
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);

    //defining margin
    $sheet->getPageMargins()->setTop(0.5);
    $sheet->getPageMargins()->setRight(right: 0.5);
    $sheet->getPageMargins()->setLeft(0.5);
    $sheet->getPageMargins()->setBottom(0.5);

    $sheet->getStyle("A5:$highestColumn$highestRow")
    ->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Custom alignment for A and B
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
