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

class PA14 implements FromView, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $ranks;
    public function mount()
    {
        $this->ranks = (new Rank())->isDicaAll();
    }
    public function view(): View
    {
        $yinn_1 = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 1);
        });

        $yinn_2 = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 2);
        });

        $yinn_3 = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 3);
        });

        $yinn_4 = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 4);
        });

        $si_man = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 11);
        });

        $mu_warda = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 8);
        });

        $yinn_mhyint_tin = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 7);
        });

        $yinn_kyee_kyat = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 5);
        });

        $si_man_kaine = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 6);
        });

        $company = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 9);
        });

        $hr = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->where('current_division_id', 10);
        });

        $total = Rank::where('is_dica',1)->whereHas('staffs', function ($query) {
            return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
        });
        $ranks = Rank::where('is_dica',1)->whereIn('staff_type_id', [1, 2])->get();
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
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setBottom(0.75);
        $sheet->getPageMargins()->setFooter(0.3);


        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(60);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow() - 1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(6.28);
        $sheet->getColumnDimension('B')->setWidth(28);
        $sheet->getColumnDimension('C')->setWidth(6.14);
        $sheet->getColumnDimension('D')->setWidth(6.14);
        $sheet->getColumnDimension('E')->setWidth(6.71);
        $sheet->getColumnDimension('F')->setWidth(6.57);
        $sheet->getColumnDimension('G')->setWidth(6.57);
        $sheet->getColumnDimension('H')->setWidth(6.57);
        $sheet->getColumnDimension('I')->setWidth(6.57);
        $sheet->getColumnDimension('J')->setWidth(6.57);
        $sheet->getColumnDimension('K')->setWidth(6.57);
        $sheet->getColumnDimension('L')->setWidth(6.57);
        $sheet->getColumnDimension('M')->setWidth(6.57);
        $sheet->getColumnDimension('N')->setWidth(6.57);
        $sheet->getColumnDimension('O')->setWidth(6.57);
        $sheet->getColumnDimension('P')->setWidth(6.57);
        $sheet->getColumnDimension('Q')->setWidth(6.57);
        $sheet->getColumnDimension('R')->setWidth(6.57);
        $sheet->getColumnDimension('S')->setWidth(5.28);
        $sheet->getColumnDimension('T')->setWidth(6.57);
        $sheet->getColumnDimension('U')->setWidth(6.57);
        $sheet->getColumnDimension('V')->setWidth(6);
        $sheet->getColumnDimension('W')->setWidth(6.57);
        $sheet->getColumnDimension('X')->setWidth(6.57);
        $sheet->getColumnDimension('Y')->setWidth(5.71);
        $sheet->getColumnDimension('Z')->setWidth(6.57);
        $sheet->getColumnDimension('AA')->setWidth(6.57);
        $sheet->getColumnDimension('AB')->setWidth(6);
        $sheet->getColumnDimension('AC')->setWidth(6.57);
        $sheet->getColumnDimension('AD')->setWidth(6.57);
        $sheet->getColumnDimension('AE')->setWidth(6.57);
        $sheet->getColumnDimension('AF')->setWidth(6.57);
        $sheet->getColumnDimension('AG')->setWidth(6.57);
        $sheet->getColumnDimension('AH')->setWidth(5.71);
        $sheet->getColumnDimension('AI')->setWidth(6.57);
        $sheet->getColumnDimension('AJ')->setWidth(6.85);
        $sheet->getColumnDimension('AK')->setWidth(6.57);
        $sheet->getColumnDimension('AL')->setWidth(8.28);







        $sheet->getRowDimension(1)->setRowHeight(27);
        $sheet->getRowDimension(2)->setRowHeight(27);
        $sheet->getRowDimension(3)->setRowHeight(24.75);
        $sheet->getRowDimension(4)->setRowHeight(21.75);
        $sheet->getRowDimension(5)->setRowHeight(21.75);
        $sheet->getRowDimension(6)->setRowHeight(21.75);

        for ($row = 7; $row <= $highestRow + 1; $row++) {


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
