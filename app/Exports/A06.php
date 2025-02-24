<?php

namespace App\Exports;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class A06 implements FromView ,WithStyles
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
        return view('excel_reports.report_4', $data);
    }
    public function styles(Worksheet $sheet)
    {
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);
    $sheet->getPageSetup()->setScale(80);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(30);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(15);
    $sheet->getColumnDimension('F')->setWidth(50);
    $sheet->getColumnDimension('G')->setWidth(160);
    $sheet->getColumnDimension('H')->setWidth(30);

    $sheet->getRowDimension(1)->setRowHeight(20);
    $sheet->getRowDimension(2)->setRowHeight(20);
    $sheet->getRowDimension(3)->setRowHeight(20);
    $sheet->getRowDimension(4)->setRowHeight(20);
    $sheet->getRowDimension(5)->setRowHeight(60);
    $sheet->getRowDimension(6)->setRowHeight(60);
    $sheet->getRowDimension(7)->setRowHeight(60);
    $sheet->getRowDimension(8)->setRowHeight(60);
    $sheet->getRowDimension(9)->setRowHeight(60);
    $sheet->getRowDimension(10)->setRowHeight(60);
    $sheet->getRowDimension(11)->setRowHeight(60);
    $sheet->getRowDimension(12)->setRowHeight(60);
    $sheet->getRowDimension(13)->setRowHeight(60);
    $sheet->getRowDimension(14)->setRowHeight(60);
    $sheet->getRowDimension(15)->setRowHeight(60);
    $sheet->getRowDimension(16)->setRowHeight(60);
    $sheet->getRowDimension(17)->setRowHeight(60);
    $sheet->getRowDimension(18)->setRowHeight(60);
    $sheet->getRowDimension(19)->setRowHeight(60);
    $sheet->getRowDimension(20)->setRowHeight(60);
    $sheet->getRowDimension(21)->setRowHeight(60);
    $sheet->getRowDimension(22)->setRowHeight(60);
    $sheet->getRowDimension(23)->setRowHeight(60);
    $sheet->getRowDimension(24)->setRowHeight(60);
    $sheet->getRowDimension(25)->setRowHeight(60);
    $sheet->getRowDimension(26)->setRowHeight(60);
    $sheet->getRowDimension(27)->setRowHeight(60);
    $sheet->getRowDimension(28)->setRowHeight(60);
    $sheet->getRowDimension(29)->setRowHeight(60);
    $sheet->getRowDimension(30)->setRowHeight(60);
    $sheet->getRowDimension(31)->setRowHeight(60);
    $sheet->getRowDimension(32)->setRowHeight(60);
    $sheet->getRowDimension(33)->setRowHeight(60);
    $sheet->getRowDimension(34)->setRowHeight(60);
    $sheet->getRowDimension(35)->setRowHeight(60);
    $sheet->getRowDimension(36)->setRowHeight(60);
    $sheet->getRowDimension(37)->setRowHeight(60);
    $sheet->getRowDimension(38)->setRowHeight(60);
    $sheet->getRowDimension(39)->setRowHeight(60);
    $sheet->getRowDimension(40)->setRowHeight(60);
    $sheet->getRowDimension(41)->setRowHeight(60);
    $sheet->getRowDimension(42)->setRowHeight(60);
    $sheet->getRowDimension(43)->setRowHeight(60);
    $sheet->getRowDimension(44)->setRowHeight(60);
    $sheet->getRowDimension(45)->setRowHeight(60);
    $sheet->getRowDimension(46)->setRowHeight(20);
    $sheet->getRowDimension(47)->setRowHeight(20);
    $sheet->getRowDimension(48)->setRowHeight(20);
    $sheet->getRowDimension(49)->setRowHeight(20);
    $sheet->getRowDimension(50)->setRowHeight(60);
    $sheet->getRowDimension(51)->setRowHeight(60);
    $sheet->getRowDimension(52)->setRowHeight(60);
    $sheet->getRowDimension(53)->setRowHeight(60);
    $sheet->getRowDimension(54)->setRowHeight(60);
    $sheet->getRowDimension(55)->setRowHeight(60);
    $sheet->getRowDimension(56)->setRowHeight(60);
    $sheet->getRowDimension(57)->setRowHeight(60);
    $sheet->getRowDimension(58)->setRowHeight(60);
    $sheet->getRowDimension(59)->setRowHeight(60);
    $sheet->getRowDimension(60)->setRowHeight(60);
    $sheet->getRowDimension(61)->setRowHeight(60);
    $sheet->getRowDimension(62)->setRowHeight(60);
    $sheet->getRowDimension(63)->setRowHeight(60);
    $sheet->getRowDimension(64)->setRowHeight(60);
    $sheet->getRowDimension(65)->setRowHeight(60);
    $sheet->getRowDimension(66)->setRowHeight(60);
    $sheet->getRowDimension(67)->setRowHeight(60);
    $sheet->getRowDimension(68)->setRowHeight(60);
    $sheet->getRowDimension(69)->setRowHeight(60);
    $sheet->getRowDimension(70)->setRowHeight(60);
    $sheet->getRowDimension(71)->setRowHeight(60);
    $sheet->getRowDimension(72)->setRowHeight(60);
    $sheet->getRowDimension(73)->setRowHeight(60);
    $sheet->getRowDimension(74)->setRowHeight(60);
    $sheet->getRowDimension(75)->setRowHeight(60);
    $sheet->getRowDimension(76)->setRowHeight(60);
    $sheet->getRowDimension(77)->setRowHeight(60);
    $sheet->getRowDimension(78)->setRowHeight(60);
    $sheet->getRowDimension(79)->setRowHeight(60);
    $sheet->getRowDimension(80)->setRowHeight(60);
    $sheet->getRowDimension(81)->setRowHeight(60);
    $sheet->getRowDimension(82)->setRowHeight(60);
    $sheet->getRowDimension(83)->setRowHeight(60);
    $sheet->getRowDimension(84)->setRowHeight(60);
    $sheet->getRowDimension(85)->setRowHeight(60);
    $sheet->getRowDimension(86)->setRowHeight(60);
    $sheet->getRowDimension(87)->setRowHeight(60);
    $sheet->getRowDimension(88)->setRowHeight(60);
    $sheet->getRowDimension(89)->setRowHeight(60);
    $sheet->getRowDimension(90)->setRowHeight(60);
    $sheet->getStyle('A1:H3')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 12,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->getStyle('A4:H4')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 12,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->getStyle('A5')->applyFromArray([
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
    $sheet->getStyle("A5:$highestColumn$highestRow")->applyFromArray([
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
