<?php

namespace App\Exports;

use App\Models\Payscale;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA02 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $count=0;
        $kachin_staffs = Staff::where('current_division_id', 12)->get();
        $kayah_staffs = Staff::where('current_division_id', 13)->get();
        $kayin_staffs = Staff::where('current_division_id', 14)->get();
        $chin_staffs = Staff::where('current_division_id', 15)->get();
        $mon_staffs = Staff::where('current_division_id', 21)->get();
        $rakhine_staffs = Staff::where('current_division_id', 22)->get();
        $shan_staffs = Staff::where('current_division_id', 24)->get();
        $sagaing_staffs = Staff::where('current_division_id', 16)->get();
        $mdy_staffs = Staff::where('current_division_id', 20)->get();
        $npt_staffs = Staff::where('current_division_id', 26)->get();
        $ygn_staffs = Staff::where('current_division_id', 23)->get();
        $head_staffs = Staff::whereHas('current_division', fn ($query) => $query->where('division_type_id', 1))->get();
        $mag_staffs = Staff::where('current_division_id', 19)->get();
        $pagu_staffs = Staff::where('current_division_id', 18)->get();
        $tnty_staffs = Staff::where('current_division_id', 17)->get();
        $aya_staffs = Staff::where('current_division_id', 25)->get();
        $total_staffs = Staff::whereIn('current_division_id', [1, 2, 12, 13, 14, 15, 21, 22, 24, 16, 20, 26, 23, 19, 18, 17, 25])->get();
      
        $data = [
            'count'=>$count,
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            'third_payscales'=>Payscale::where('staff_type_id',3)->get(),
            'kachin_staffs' => $kachin_staffs,
            'kayah_staffs' => $kayah_staffs,
            'kayin_staffs' => $kayin_staffs,
            'chin_staffs' => $chin_staffs,
            'mon_staffs' => $mon_staffs,
            'rakhine_staffs' => $rakhine_staffs,
            'shan_staffs' => $shan_staffs,
            'sagaing_staffs' => $sagaing_staffs,
            'mdy_staffs' => $mdy_staffs,
            'npt_staffs' => $npt_staffs,
            'ygn_staffs' => $ygn_staffs,
            'head_staffs' => $head_staffs,
            'mag_staffs' => $mag_staffs,
            'pagu_staffs' => $pagu_staffs,
            'tnty_staffs' => $tnty_staffs,
            'aya_staffs' => $aya_staffs,
            'total_staffs' => $total_staffs,
            
            
          
        ];
        return view('excel_reports.investment_companies_report_2', $data);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set 
        
     
        
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(60);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-2; // e.g. 19
        
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
        $row=5;


        $sheet->getHeaderFooter()->setOddFooter('&C&H&"Pyidaungsu"&10' . 'ကန့်သတ်'); 
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(7);
        $sheet->getColumnDimension('D')->setWidth(6);
        $sheet->getColumnDimension('E')->setWidth(5);
        $sheet->getColumnDimension('F')->setWidth(6);
        $sheet->getColumnDimension('G')->setWidth(5);
        $sheet->getColumnDimension('H')->setWidth(6);
        $sheet->getColumnDimension('I')->setWidth(5);
        $sheet->getColumnDimension('J')->setWidth(6);
        $sheet->getColumnDimension('K')->setWidth(5);
        $sheet->getColumnDimension('L')->setWidth(6);
        $sheet->getColumnDimension('M')->setWidth(5);
        $sheet->getColumnDimension('N')->setWidth(6);
        $sheet->getColumnDimension('O')->setWidth(5);
        $sheet->getColumnDimension('P')->setWidth(6);
        $sheet->getColumnDimension('Q')->setWidth(5);
        $sheet->getColumnDimension('R')->setWidth(6);
        $sheet->getColumnDimension('S')->setWidth(5);
        $sheet->getColumnDimension('T')->setWidth(6);
        $sheet->getColumnDimension('U')->setWidth(5);
        $sheet->getColumnDimension('V')->setWidth(6);
        $sheet->getColumnDimension('W')->setWidth(5);
        $sheet->getColumnDimension('X')->setWidth(6);
        $sheet->getColumnDimension('Y')->setWidth(5);
        $sheet->getColumnDimension('Z')->setWidth(6);
        $sheet->getColumnDimension('AA')->setWidth(5);
        $sheet->getColumnDimension('AB')->setWidth(6);
        $sheet->getColumnDimension('AC')->setWidth(5);
        $sheet->getColumnDimension('AD')->setWidth(6);
        $sheet->getColumnDimension('AE')->setWidth(5);
        $sheet->getColumnDimension('AF')->setWidth(6);
        $sheet->getColumnDimension('AG')->setWidth(5);
        $sheet->getColumnDimension('AH')->setWidth(6);
        $sheet->getColumnDimension('AI')->setWidth(5);
        $sheet->getColumnDimension('AJ')->setWidth(11);

        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(25);
        $sheet->getRowDimension(3)->setRowHeight(25);
        $sheet->getRowDimension(4)->setRowHeight(25);

        
        

        $sheet->removeRow(3);
        $sheet->removeRow(5);
        $sheet->removeRow(25);

        for ($row = 5; $row <= $highestRow-1 ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(35);
        }

        $sheet->getPageMargins()->setTop(0.8);
        $sheet->getPageMargins()->setLeft(0.6);
        $sheet->getPageMargins()->setRight(0.3);

        $sheet->getStyle('A1:A2')->applyFromArray([
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
        $sheet->getStyle('A3:A4')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                ],
            ],
        ]);

        $sheet->getStyle('S3:S4')->applyFromArray([
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
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                ],
            ],
        ]);

        

        $sheet->getStyle("A$row:$highestColumn$row")->applyFromArray([
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

        $sheet->getStyle("A5:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 12,
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

        $sheet->getStyle("B9:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 12,
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

        $sheet->getStyle("C9:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 12,
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

        $sheet->getStyle('A25:A26:A27')->applyFromArray([
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
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                ],
            ],
        ]);
    return [];
}
}
