<?php

namespace App\Exports;

use App\Models\Rank;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA15 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA15::all();
    // }
    public function view(): View
    {
        $yangon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 23);
        });

        $nay_pyi_thaw = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 26);
        });

        $mandalay = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 20);
        });

        $shan = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 24);
        });

        $mon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 21);
        });

        $aya = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 25);
        });

        $sagaing = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 16);
        });

        $tanindaryi = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 17);
        });

        $kayin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 14);
        });

        $bago = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 18);
        });

        $magway = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 19);
        });

        $kayah = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 13);
        });

        $kachin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 12);
        });

        $rakhine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 22);
        });

        $chin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 15);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [23, 26, 20, 24, 21, 25, 16, 17, 14, 18, 19, 13, 12, 22, 15]);
        });

        $ranks = Rank::whereIn('staff_type_id',[1,2])->get();

        $data = [
            'yangon' => $yangon,
            'nay_pyi_thaw' => $nay_pyi_thaw,
            'mandalay' => $mandalay,
            'shan' => $shan,
            'mon' => $mon,
            'aya' => $aya,
            'sagaing' => $sagaing,
            'tanindaryi' => $tanindaryi,
            'kayin' => $kayin,
            'bago' => $bago,
            'magway' => $magway,
            'kayah' => $kayah,
            'kachin' => $kachin,
            'rakhine' => $rakhine,
            'chin' => $chin,
            'total' => $total,
            'ranks' => $ranks,
        ];
        return view('excel_reports.investment_companies_report_15', $data);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setBottom(0.75);
        $sheet->getPageMargins()->setFooter(0.3);
        $sheet->getPageSetup()->setHorizontalCentered(true);
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(51);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(6.28);
        $sheet->getColumnDimension('B')->setWidth(24.14);
        $sheet->getColumnDimension('C')->setWidth(5.42  );
        $sheet->getColumnDimension('D')->setWidth(5.42);
        $sheet->getColumnDimension('E')->setWidth(6.42);
        $sheet->getColumnDimension('F')->setWidth(5.42);
        $sheet->getColumnDimension('G')->setWidth(5.42);
        $sheet->getColumnDimension('H')->setWidth(6.71);
        $sheet->getColumnDimension('I')->setWidth(6.14);
        $sheet->getColumnDimension('J')->setWidth(5.42);
        $sheet->getColumnDimension('K')->setWidth(6.42);
        $sheet->getColumnDimension('L')->setWidth(6.42);
        $sheet->getColumnDimension('M')->setWidth(5.42);
        $sheet->getColumnDimension('N')->setWidth(6.57);
        $sheet->getColumnDimension('O')->setWidth(5.42);
        $sheet->getColumnDimension('P')->setWidth(5.42);
        $sheet->getColumnDimension('Q')->setWidth(6.57);
        $sheet->getColumnDimension('R')->setWidth(5.42);
        $sheet->getColumnDimension('S')->setWidth(5.42);
        $sheet->getColumnDimension('T')->setWidth(6.85);
        $sheet->getColumnDimension('U')->setWidth(5.42);
        $sheet->getColumnDimension('V')->setWidth(5.42);
        $sheet->getColumnDimension('W')->setWidth(6.57);
        $sheet->getColumnDimension('X')->setWidth(5.42);
        $sheet->getColumnDimension('Y')->setWidth(5.42);
        $sheet->getColumnDimension('Z')->setWidth(6.85);
        $sheet->getColumnDimension('AA')->setWidth(5.42);
        $sheet->getColumnDimension('AB')->setWidth(5.42);
        $sheet->getColumnDimension('AC')->setWidth(6.57);
        $sheet->getColumnDimension('AD')->setWidth(5.42);
        $sheet->getColumnDimension('AE')->setWidth(5.42);
        $sheet->getColumnDimension('AF')->setWidth(7.14);
        $sheet->getColumnDimension('AG')->setWidth(5.42);
        $sheet->getColumnDimension('AH')->setWidth(5.42);
        $sheet->getColumnDimension('AI')->setWidth(7);
        $sheet->getColumnDimension('AJ')->setWidth(5.42);
        $sheet->getColumnDimension('AK')->setWidth(5.42);
        $sheet->getColumnDimension('AL')->setWidth(6.14);
        $sheet->getColumnDimension('AM')->setWidth(5.42);
        $sheet->getColumnDimension('AN')->setWidth(5.42);
        $sheet->getColumnDimension('AO')->setWidth(5.42);
        $sheet->getColumnDimension('AP')->setWidth(5.42);
        $sheet->getColumnDimension('AQ')->setWidth(5.42);
        $sheet->getColumnDimension('AR')->setWidth(6.14);
        $sheet->getColumnDimension('AS')->setWidth(5.57);
        $sheet->getColumnDimension('AT')->setWidth(5.86);
        $sheet->getColumnDimension('AU')->setWidth(6.57);
        $sheet->getColumnDimension('AV')->setWidth(6.14);
        $sheet->getColumnDimension('AW')->setWidth(6.28);
        $sheet->getColumnDimension('AX')->setWidth(8.14);

        $sheet->getRowDimension(1)->setRowHeight(28.5);
        $sheet->getRowDimension(2)->setRowHeight(24.75);
        $sheet->getRowDimension(3)->setRowHeight(24.75);
        $sheet->getRowDimension(4)->setRowHeight(21.75);
        $sheet->getRowDimension(5)->setRowHeight(21.75);

        for ($row = 6; $row <= $highestRow ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(28);
        }

        $sheet->removeRow(4);

        $sheet->getStyle('A1:A2')->applyFromArray([
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

        $sheet->getStyle('A3')->applyFromArray([
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
        $sheet->getStyle("A4:$highestColumn$highestRow")->applyFromArray([
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

        $sheet->getStyle("B6:$highestColumn$highestRow")->applyFromArray([
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

        $sheet->getStyle("C6:$highestColumn$highestRow")->applyFromArray([
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
        // $sheet->getStyle("B28")->applyFromArray([
        //     'font' => [
        //         'name' => 'Pyidaungsu',
        //         'size' => 11,
        //         'bold' => true,
        //     ],
        //     'alignment' => [
        //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        //     ],
        //     'borders' => [
        //         'allBorders' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //             'color' => ['argb' => 'FF000000'], // Black border
        //         ],
        //     ],
        // ]);

        $sheet->getStyle("B38:AX38")->applyFromArray([
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
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);
    }

    }
