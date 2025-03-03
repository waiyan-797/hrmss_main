<?php

namespace App\Exports;

use App\Models\Payscale;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PA21 implements FromView ,WithStyles
{

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA21::all();
    // }

    public $count=0;
    public function view(): View
    {   
        

        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $count=0;
        $data = [
            'count'=>$count,
            'first_payscales' => $first_payscales,
             'second_payscales' => $second_payscales,
            
        ];
        return view('excel_reports.npt_three', $data);
    }
public function styles(Worksheet $sheet)
{

     // Set paper size and orientation
     $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
     $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
     $sheet->getPageMargins()->setTop(0.5);
     $sheet->getPageMargins()->setHeader(0.3);
     $sheet->getPageMargins()->setLeft(1);
     $sheet->getPageMargins()->setRight(0.5);
     $sheet->getPageMargins()->setBottom(0.5);
     $sheet->getPageMargins()->setFooter(0.3);
 
     // Center on page horizontally
     $sheet->getPageSetup()->setHorizontalCentered(true);
     // Fit to page width
     $sheet->getPageSetup()->setFitToWidth(1);
     $sheet->getPageSetup()->setFitToHeight(0);

     $sheet->getPageSetup()->setScale(85);

     // Enable gridlines for unbordered areas
     $sheet->setShowGridlines(true);
     // $sheet->setPrintGridlines(true);

     // Dynamically calculate the highest row and column
     $highestRow = $sheet->getHighestRow()-1; // e.g. 19
     $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

     $sheet->removeRow(5);

     $sheet->getRowDimension(1)->setRowHeight(24);
     $sheet->getRowDimension(2)->setRowHeight(24);
     $sheet->getRowDimension(3)->setRowHeight(24);
     $sheet->getRowDimension(4)->setRowHeight(24);

     for ($row = 5; $row <= $highestRow ; $row++) {
        if($row == $highestRow-1 || $row == $highestRow){
         $sheet->getRowDimension($row)->setRowHeight(33.75);
     } else {
        $sheet->getRowDimension($row)->setRowHeight(48);
     }
    }
     // $sheet->getHeaderFooter()->setOddHeader('&C&H&"Pyidaungsu"&10' . "အတွင်းရေး\n၃"); // Centered header text
     

    //  $sheet->getHeaderFooter()->setOddFooter('&C&H&"Pyidaungsu"&10' . 'အတွင်းရေး'); // Centered footer text

     $sheet->getPageMargins()->setTop(0.5);
     $sheet->getPageMargins()->setBottom(0.5);
     $sheet->getPageMargins()->setLeft(1);
     $sheet->getPageMargins()->setRight(0.5);
    //  $row=5;
     

     $sheet->getColumnDimension('A')->setWidth(5.42);
     $sheet->getColumnDimension('B')->setWidth(47.28);
     $sheet->getColumnDimension('C')->setWidth(17.42);
     $sheet->getColumnDimension('D')->setWidth(9);
     $sheet->getColumnDimension('E')->setWidth(9);
     $sheet->getColumnDimension('F')->setWidth(12.28);

     $sheet->getStyle('A1:A3')->applyFromArray([
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
    $sheet->getStyle('A4')->applyFromArray([
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
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
            ],
        ],
    ]);
    $sheet->getStyle("A5:$highestColumn$highestRow")->applyFromArray([
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
    $sheet->getStyle("B6:B20")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Custom alignment for A and B
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'], // Black border
            ],
        ],
    ]);
    $sheet->getStyle("B12")->applyFromArray([
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
    ]);$sheet->getStyle("B19:B20")->applyFromArray([
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

    // // Apply global font style
    // $sheet->getStyle('A1:Z1000')->applyFromArray([
    //     'font' => [
    //         'name' => 'Pyidaungsu',
    //         'size' => 13,
    //     ],
    // ]);

    // // Apply borders to all cells with black border
    // $sheet->getStyle('A1:L100')->applyFromArray([
    //     'borders' => [
    //         'allBorders' => [
    //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //             'color' => ['argb' => '000000'], // Black border
    //         ],
    //     ],
    // ]);

    // // Auto-size columns for the table
    // foreach (range('A', 'J') as $column) {
    //     $sheet->getColumnDimension($column)->setAutoSize(true);
    // }

    return [];
}
}
