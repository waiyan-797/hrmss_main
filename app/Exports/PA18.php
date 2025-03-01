<?php

namespace App\Exports;

use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA18 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA18::all();
    // }
    public function view(): View
    {
        // $staffs = Staff::where('current_address_region_id', 1)->get();
        $staffs = Staff::with(['currentRank', 'current_department', 'marital_statuses', 'current_address_township_or_town', 'current_address_region'])
        ->where('current_address_region_id', 1)
        ->get();
        $data = [
            'staffs' => $staffs,
        ];
        return view('excel_reports.staff_in_npt_report', $data);
    }
    public function styles(Worksheet $sheet)
    {

    // Set paper size and orientation
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
    $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape


    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $sheet->getPageSetup()->setScale(75);

    // Enable gridlines for unbordered areas
    $sheet->setShowGridlines(true);
    // $sheet->setPrintGridlines(true);

    // Dynamically calculate the highest row and column
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(25);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(80);
    $sheet->getColumnDimension('E')->setWidth(30);
   
  
   

    $sheet->getRowDimension(1)->setRowHeight(25);
    $sheet->getRowDimension(2)->setRowHeight(25);
    $sheet->getRowDimension(3)->setRowHeight(25);
    $sheet->getRowDimension(4)->setRowHeight(60);
    $sheet->getRowDimension(5)->setRowHeight(60);
    $sheet->getRowDimension(6)->setRowHeight(60);
    $sheet->getRowDimension(7)->setRowHeight(60);
    // $sheet->removeRow(5);
    // $sheet->removeRow(9);

    // $row=4;

    $sheet->getStyle('A1:E7')->applyFromArray([
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
    $sheet->getStyle('A7')->applyFromArray([
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
    $sheet->getStyle("A4:$highestColumn$highestRow")->applyFromArray([
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
