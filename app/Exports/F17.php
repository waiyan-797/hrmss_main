<?php

namespace App\Exports;
use App\Models\Payscale;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class F17 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $staffs = Staff::get();
        $payscales = Payscale::get();
        $data = [
            'staffs' => $staffs,
            'payscales' => $payscales,
        ];
        return view('excel_reports.information_list_report', $data);
    }
    public function styles(Worksheet $sheet)
    {
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    //margins
    $sheet->getPageMargins()->setTop(0.75);
    $sheet->getPageMargins()->setHeader(0.3);
    $sheet->getPageMargins()->setLeft(0.75);
    $sheet->getPageMargins()->setRight(0.99);
    $sheet->getPageMargins()->setBottom(0.7);
    $sheet->getPageMargins()->setFooter(0.3);

    $sheet->getPageSetup()->setScale(95);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
    $sheet->getColumnDimension('A')->setWidth(6.67);
    $sheet->getColumnDimension('B')->setWidth(30.11);
    $sheet->getColumnDimension('C')->setWidth(10.67);
    $sheet->getColumnDimension('D')->setWidth(9.11);
    $sheet->getColumnDimension('E')->setWidth(8.67);
    $sheet->getColumnDimension('F')->setWidth(8.89);
    $sheet->getColumnDimension('G')->setWidth(8.56);
    $sheet->getColumnDimension('H')->setWidth(8.11);
    $sheet->getColumnDimension('I')->setWidth(9.34);
    $sheet->getColumnDimension('J')->setWidth(11.11);
    $sheet->getColumnDimension('K')->setWidth(12.34);
    $sheet->getColumnDimension('L')->setWidth(13.89);
  

    $sheet->getRowDimension(1)->setRowHeight(21.5);
    $sheet->getRowDimension(2)->setRowHeight(16.7);
    $sheet->getRowDimension(3)->setRowHeight(72.8);
    $sheet->getRowDimension(4)->setRowHeight(57);
    $sheet->getRowDimension(5)->setRowHeight(35.1);
    $sheet->getRowDimension(6)->setRowHeight(16.7);
    $sheet->getRowDimension(7)->setRowHeight(24.9);
    $sheet->getRowDimension(8)->setRowHeight(22.5);
    $sheet->getRowDimension(9)->setRowHeight(21.5);
    $sheet->getRowDimension(10)->setRowHeight(19.7);
    $sheet->getRowDimension(11)->setRowHeight(17.9);
    $sheet->getRowDimension(12)->setRowHeight(23.1);
    $sheet->getRowDimension(13)->setRowHeight(23.1);
    $sheet->getRowDimension(14)->setRowHeight(16.7);
    $sheet->getRowDimension(15)->setRowHeight(23.1);
    $sheet->getRowDimension(16)->setRowHeight(23.1);
    $sheet->getRowDimension(17)->setRowHeight(23.1);
    $sheet->getRowDimension(18)->setRowHeight(23.1);
    $sheet->getRowDimension(19)->setRowHeight(18);
    $sheet->getRowDimension(20)->setRowHeight(19.5);
    $sheet->getRowDimension(21)->setRowHeight(23.1);
   
    $sheet->getStyle('A1:C5')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);
    $sheet->setMergeCells([
        'A1:L1',
        'A2:L2',
        'A3:B4',
        'A5:B5',
        'C3:L3',
        'C4:L4',
        'C5:L5',
        'A7:A8',
        'B7:B8',
        'C7:C8',
        'D7:E7',
        'F7:J7',
        'K7:L7',
    ]);
    $sheet->getStyle('A1')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);

    $sheet->getStyle('A3')->applyFromArray([
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
    $sheet->getStyle('A5')->applyFromArray([
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
    $sheet->getStyle('A7:L8')->applyFromArray([
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
    $sheet->setCellValue('C3', '1.4.A Women holding senior positions in the Civil Service (Director Level or equivalent and '. "\n" .' Above Posts) as (a) A Percentage of Total Senior Civil Servants and, (b) Increase in Percentage'. "\n" .' points from previous year');

    $sheet->getStyle('C3')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'bold' => true,
           
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'wrapText' => true,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 
            ],
        ],
    ]);
       
    $sheet->setCellValue('C4','1.4.B Proportion of Positions by (a) Sex, (b) Age, (c)Persons with disabilities, in public institutions'. "\n" .'compared to national distribution');
    $sheet->getStyle('C4')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'bold' => true,
           
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'wrapText' => true,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);
    $sheet->getStyle("B9:B" . $highestRow)->applyFromArray([
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
    ///
    $sheet->getStyle("A9:A" . $highestRow)->applyFromArray([
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

    $sheet->getStyle("C9:L" . $highestRow)->applyFromArray([
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
