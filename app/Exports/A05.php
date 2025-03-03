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

    $sheet->getPageMargins()->setTop(0.5);
    $sheet->getPageMargins()->setHeader(0.3);
    $sheet->getPageMargins()->setLeft(0.4);
    $sheet->getPageMargins()->setRight(0.4);
    $sheet->getPageMargins()->setBottom(0.5);
    $sheet->getPageMargins()->setFooter(0.3);

    $sheet->getPageSetup()->setScale(65);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(5.45);
    $sheet->getColumnDimension('B')->setWidth(18);
    $sheet->getColumnDimension('C')->setWidth(11.89);
    $sheet->getColumnDimension('D')->setWidth(19);
    $sheet->getColumnDimension('E')->setWidth(13.45);
    $sheet->getColumnDimension('F')->setWidth(13.67);
    $sheet->getColumnDimension('G')->setWidth(13.34);
    $sheet->getColumnDimension('H')->setWidth(17);
    $sheet->getColumnDimension('I')->setWidth(8);
    $sheet->getColumnDimension('J')->setWidth(8.67);
    $sheet->getColumnDimension('K')->setWidth(10.89);
    $sheet->getColumnDimension('L')->setWidth(22);
    $sheet->getColumnDimension('M')->setWidth(20.89);
    $sheet->getColumnDimension('N')->setWidth(6.89);
    $sheet->getColumnDimension('O')->setWidth(6.89);
    $sheet->getColumnDimension('P')->setWidth(6.11);
    $sheet->getColumnDimension('Q')->setWidth(5.34);
    $sheet->getColumnDimension('R')->setWidth(11.67);
    $sheet->getColumnDimension('S')->setWidth(9.11);
    $sheet->getColumnDimension('T')->setWidth(8.45);
    $sheet->getColumnDimension('U')->setWidth(12);
    $sheet->getColumnDimension('V')->setWidth(10.45);
  
    $sheet->getRowDimension(1)->setRowHeight(32.3);
    $sheet->getRowDimension(2)->setRowHeight(19.2);
    $sheet->getRowDimension(3)->setRowHeight(19.2);
    $sheet->getRowDimension(4)->setRowHeight(19.2);
    $sheet->getRowDimension(5)->setRowHeight(56.3);
    $sheet->getRowDimension(6)->setRowHeight(48.8);
    $sheet->getRowDimension(7)->setRowHeight(57.6);
    $sheet->getRowDimension(8)->setRowHeight(96);
    $sheet->getRowDimension(9)->setRowHeight(115.2);
    $sheet->getRowDimension(10)->setRowHeight(134.4);
    $sheet->getRowDimension(11)->setRowHeight(134.4);
    // $sheet->getRowDimension(12)->setRowHeight(40);
    // $sheet->getRowDimension(13)->setRowHeight(40);
    // $sheet->getRowDimension(14)->setRowHeight(40);
    $sheet->getStyle('A1:M3')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11.5,
            'bold' => true
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Center align for rows 1-3
            'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    
    $sheet->getStyle('A4:M4')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11.5,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT, // Right align for row 4
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->getStyle('A5:M5')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11.5,
            'bold' => true
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT, // Right align for row 4
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->getStyle('A6:M6 ')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11.5,
            'bold' => true
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT, // Right align for row 4
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    // $sheet->getStyle('A5')->applyFromArray([
    //     'font' => [
    //         'name' => 'Pyidaungsu',
    //         'size' => 11.5,
    //         'bold' => true            
    //     ],
    //     'alignment' => [
    //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    //     ],
    //     'borders' => [
    //         'outline' => [
    //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
    //         ],
    //     ],
    // ]);
    $sheet->getStyle("A5:$highestColumn$highestRow")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 11.5,
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
