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

    $sheet->getPageSetup()->setScale(95);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
    $sheet->getColumnDimension('A')->setWidth(12);
    $sheet->getColumnDimension('B')->setWidth(40);
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->getColumnDimension('D')->setWidth(8);
    $sheet->getColumnDimension('E')->setWidth(8);
    $sheet->getColumnDimension('F')->setWidth(8);
    $sheet->getColumnDimension('G')->setWidth(8);
    $sheet->getColumnDimension('H')->setWidth(8);
    $sheet->getColumnDimension('I')->setWidth(8);
    $sheet->getColumnDimension('J')->setWidth(10);
    $sheet->getColumnDimension('K')->setWidth(15);
    $sheet->getColumnDimension('L')->setWidth(13);
  

    $sheet->getRowDimension(1)->setRowHeight(20);
    $sheet->getRowDimension(2)->setRowHeight(20);
    $sheet->getRowDimension(3)->setRowHeight(20);
    $sheet->getRowDimension(4)->setRowHeight(20);
    $sheet->getRowDimension(5)->setRowHeight(30);
    $sheet->getRowDimension(6)->setRowHeight(30);
    $sheet->getRowDimension(7)->setRowHeight(30);
    $sheet->getRowDimension(8)->setRowHeight(30);
    $sheet->getRowDimension(9)->setRowHeight(30);
    $sheet->getRowDimension(10)->setRowHeight(30);
    $sheet->getRowDimension(11)->setRowHeight(30);
    $sheet->getRowDimension(12)->setRowHeight(30);
    $sheet->getRowDimension(13)->setRowHeight(30);
    $sheet->getRowDimension(14)->setRowHeight(30);
    $sheet->getRowDimension(15)->setRowHeight(30);
    $sheet->getRowDimension(16)->setRowHeight(30);
    $sheet->getRowDimension(17)->setRowHeight(30);
    $sheet->getRowDimension(18)->setRowHeight(30);
   
    $sheet->getStyle('A1:C5')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 12,
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
            'size' => 12,
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
    $sheet->getStyle("A3:$highestColumn$highestRow")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 12,
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
    }
}
