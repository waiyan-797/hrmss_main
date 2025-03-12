<?php

namespace App\Exports;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class A05 implements FromView, WithStyles
{
    protected $staffs;

    public function __construct($staffs)
    {
        $this->staffs = $staffs;
    }
   
    public function view(): View
    {
        return view('excel_reports.report_3', [
            'staffs' => $this->staffs,
        ]);
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
        // $sheet->setShowGridlines(true);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->getColumnDimension('A')->setWidth(5.42);
        $sheet->getColumnDimension('B')->setWidth(18);
        $sheet->getColumnDimension('C')->setWidth(11.85);
        $sheet->getColumnDimension('D')->setWidth(19);
        $sheet->getColumnDimension('E')->setWidth(13.5);
        $sheet->getColumnDimension('F')->setWidth(13.71);
        $sheet->getColumnDimension('G')->setWidth(13.28);
        $sheet->getColumnDimension('H')->setWidth(17);
        $sheet->getColumnDimension('I')->setWidth(8);
        $sheet->getColumnDimension('J')->setWidth(8.71);
        $sheet->getColumnDimension('K')->setWidth(10.85);
        $sheet->getColumnDimension('L')->setWidth(22);
        $sheet->getColumnDimension('M')->setWidth(20.85);
        $sheet->getColumnDimension('N')->setWidth(6.85);
        $sheet->getColumnDimension('O')->setWidth(6.85);
        $sheet->getColumnDimension('P')->setWidth(6.14);
        $sheet->getColumnDimension('Q')->setWidth(5.28);
        $sheet->getColumnDimension('R')->setWidth(11.71);
        $sheet->getColumnDimension('S')->setWidth(9.14);
        $sheet->getColumnDimension('T')->setWidth(8.42);
        $sheet->getColumnDimension('U')->setWidth(12);
        $sheet->getColumnDimension('V')->setWidth(10.42);
  
        $sheet->getRowDimension(1)->setRowHeight(32.5);
        $sheet->getRowDimension(2)->setRowHeight(21);
        $sheet->getRowDimension(3)->setRowHeight(21);
        $sheet->getRowDimension(4)->setRowHeight(21);
        $sheet->getRowDimension(5)->setRowHeight(56.25);
        $sheet->getRowDimension(6)->setRowHeight(48.75);
  

        $sheet->getStyle('A1:M3')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11.5,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);
        
        $sheet->getStyle('A4:M4')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11.5,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A5:V5')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11.5,
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle("A5:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11.5,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle("B7:B$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11.5,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,

            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
    }
}
