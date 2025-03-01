<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA20 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $staffs;

    public function __construct($staffs)
    {
        $this->staffs = $staffs;
    }

    public function view(): View
    {
        return view('excel_reports.about_to_increment', [
            'staffs' => $this->staffs,
        ]);
    }
    public function styles(Worksheet $sheet)
    {

    // Set paper size and orientation
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
    $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $sheet->getPageSetup()->setScale(80);

    // Enable gridlines for unbordered areas
    $sheet->setShowGridlines(true);
    // $sheet->setPrintGridlines(true);

    // Dynamically calculate the highest row and column
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(30);
    $sheet->getColumnDimension('D')->setWidth(50);
    $sheet->getColumnDimension('E')->setWidth(30);
    $sheet->getColumnDimension('F')->setWidth(20);
    $sheet->getColumnDimension('G')->setWidth(25);
    $sheet->getColumnDimension('H')->setWidth(25);
   
  
   

    $sheet->getRowDimension(1)->setRowHeight(30);
    // $sheet->getRowDimension(2)->setRowHeight(60);
    $sheet->getRowDimension(3)->setRowHeight(50);
    $sheet->getRowDimension(4)->setRowHeight(50);
    $sheet->getRowDimension(5)->setRowHeight(40);
    $sheet->getRowDimension(7)->setRowHeight(40);
    $sheet->getRowDimension(8)->setRowHeight(40);
    $sheet->getRowDimension(9)->setRowHeight(40);
    $sheet->getRowDimension(10)->setRowHeight(40);


    $sheet->removeRow(2);
    // $sheet->removeRow(9);

    $row=4;

    $sheet->getStyle('A1:H1')->applyFromArray([
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
    $sheet->getStyle('A2')->applyFromArray([
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
    $sheet->getStyle("A2:$highestColumn$highestRow")->applyFromArray([
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
