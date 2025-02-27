<?php

namespace App\Exports;

use App\Models\Rank;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA14 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $yinn_1 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 1);
        });

        $yinn_2 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 2);
        });

        $yinn_3 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 3);
        });

        $yinn_4 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 4);
        });

        $si_man =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 11);
        });

        $mu_warda =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 8);
        });

        $yinn_mhyint_tin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 7);
        });

        $yinn_kyee_kyat = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 5);
        });

        $si_man_kaine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 6);
        });

        $company = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 9);
        });

        $hr = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 10);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
        });
        $ranks = Rank::whereIn('staff_type_id',[1,2])->get();
        $data = [
            'ranks' => $ranks,
            'si_man' => $si_man,
            'yinn_1' => $yinn_1,
            'yinn_2' => $yinn_2,
            'yinn_3' => $yinn_3,
            'yinn_4' => $yinn_4,
            'mu_warda' => $mu_warda,
            'yinn_mhyint_tin' => $yinn_mhyint_tin,
            'yinn_kyee_kyat' => $yinn_kyee_kyat,
            'si_man_kaine' => $si_man_kaine,
            'company' => $company,
            'hr' => $hr,
            'total' => $total,
        ];
        return view('excel_reports.investment_companies_report_14', $data);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape
        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setHeader(0.45);
        $sheet->getPageMargins()->setLeft(0.2);
        $sheet->getPageMargins()->setRight(0.2);
        $sheet->getPageMargins()->setBottom(0.45);
        $sheet->getPageMargins()->setFooter(0.5);
        $sheet->getPageSetup()->setHorizontalCentered(true);
        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(60);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(4);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(7);
        $sheet->getColumnDimension('D')->setWidth(7);
        $sheet->getColumnDimension('E')->setWidth(7);
        $sheet->getColumnDimension('F')->setWidth(7);
        $sheet->getColumnDimension('G')->setWidth(7);
        $sheet->getColumnDimension('H')->setWidth(7);
        $sheet->getColumnDimension('I')->setWidth(7);
        $sheet->getColumnDimension('J')->setWidth(7);
        $sheet->getColumnDimension('K')->setWidth(7);
        $sheet->getColumnDimension('L')->setWidth(7);
        $sheet->getColumnDimension('M')->setWidth(7);
        $sheet->getColumnDimension('N')->setWidth(7);
        $sheet->getColumnDimension('O')->setWidth(7);
        $sheet->getColumnDimension('P')->setWidth(7);
        $sheet->getColumnDimension('Q')->setWidth(7);
        $sheet->getColumnDimension('R')->setWidth(7);
        $sheet->getColumnDimension('S')->setWidth(7);
        $sheet->getColumnDimension('T')->setWidth(7);
        $sheet->getColumnDimension('U')->setWidth(7);
        $sheet->getColumnDimension('V')->setWidth(7);
        $sheet->getColumnDimension('W')->setWidth(7);
        $sheet->getColumnDimension('X')->setWidth(7);
        $sheet->getColumnDimension('Y')->setWidth(7);
        $sheet->getColumnDimension('Z')->setWidth(7);
        $sheet->getColumnDimension('AA')->setWidth(7);
        $sheet->getColumnDimension('AB')->setWidth(7);
        $sheet->getColumnDimension('AC')->setWidth(7);
        $sheet->getColumnDimension('AD')->setWidth(7);
        $sheet->getColumnDimension('AE')->setWidth(7);
        $sheet->getColumnDimension('AF')->setWidth(7);
        $sheet->getColumnDimension('AG')->setWidth(7);
        $sheet->getColumnDimension('AH')->setWidth(7);
        $sheet->getColumnDimension('AI')->setWidth(7);
        $sheet->getColumnDimension('AJ')->setWidth(7);
        $sheet->getColumnDimension('AK')->setWidth(7);
        $sheet->getColumnDimension('AL')->setWidth(7);

        $sheet->getRowDimension(1)->setRowHeight(27);
        $sheet->getRowDimension(2)->setRowHeight(27);
        $sheet->getRowDimension(3)->setRowHeight(21);

        for ($row = 4; $row <= $highestRow ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(25.5);
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

        $sheet->getStyle("B6:$highestColumn$highestRow")->applyFromArray([
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

        $sheet->getStyle("C6:$highestColumn$highestRow")->applyFromArray([
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
