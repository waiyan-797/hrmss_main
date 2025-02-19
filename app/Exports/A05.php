<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class A05 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return A05::all();
    // }
    public function view(): View
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        return view('excel_reports.report_3', $data);
    }
    public function styles(Worksheet $sheet)
    {

    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    

    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $sheet->getPageSetup()->setScale(85);

    // Enable gridlines for unbordered areas
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(25);
    $sheet->getColumnDimension('E')->setWidth(30);
    $sheet->getColumnDimension('F')->setWidth(30);
    $sheet->getColumnDimension('G')->setWidth(30);
    $sheet->getColumnDimension('H')->setWidth(30);
    $sheet->getColumnDimension('I')->setWidth(30);
    $sheet->getColumnDimension('J')->setWidth(30);
    $sheet->getColumnDimension('K')->setWidth(30);
    $sheet->getColumnDimension('L')->setWidth(30);
    $sheet->getColumnDimension('M')->setWidth(30);
  
   

    $sheet->getRowDimension(1)->setRowHeight(30);
    $sheet->getRowDimension(2)->setRowHeight(30);
    $sheet->getRowDimension(3)->setRowHeight(30);
    $sheet->getRowDimension(4)->setRowHeight(30);
    $sheet->getRowDimension(5)->setRowHeight(40);
    $sheet->getRowDimension(6)->setRowHeight(40);
    $sheet->getRowDimension(7)->setRowHeight(40);
    $sheet->getRowDimension(8)->setRowHeight(40);
    $sheet->getRowDimension(9)->setRowHeight(40);
    $sheet->getRowDimension(10)->setRowHeight(40);
    $sheet->getRowDimension(11)->setRowHeight(40);
    $sheet->getRowDimension(12)->setRowHeight(40);
    $sheet->getRowDimension(13)->setRowHeight(40);
    $sheet->getRowDimension(14)->setRowHeight(40);
   
    $sheet->getStyle('A1:V5')->applyFromArray([
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
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
            ],
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
    $sheet->getStyle("A5:$highestColumn$highestRow")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11,
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
