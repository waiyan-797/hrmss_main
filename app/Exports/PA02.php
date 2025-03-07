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

        //margin
        $sheet->getPageSetup()->setScale(60);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setLeft(0.5);
        $sheet->getPageMargins()->setRight(0.2);
        $sheet->getPageMargins()->setBottom(0.75);
        $sheet->getPageMargins()->setFooter(0.3);
        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        $highestRow = $sheet->getHighestRow()-3;
        
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
        // $row=5;


        $sheet->getHeaderFooter()->setOddFooter('&C&H&"Pyidaungsu"&12' . 'ကန့်သတ်'); 
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(32.56);
        $sheet->getColumnDimension('C')->setWidth(8.89);
        $sheet->getColumnDimension('D')->setWidth(6);
        $sheet->getColumnDimension('E')->setWidth(4.89);
        $sheet->getColumnDimension('F')->setWidth(6);
        $sheet->getColumnDimension('G')->setWidth(5.34);
        $sheet->getColumnDimension('H')->setWidth(6.34);
        $sheet->getColumnDimension('I')->setWidth(4.67);
        $sheet->getColumnDimension('J')->setWidth(5.67);
        $sheet->getColumnDimension('K')->setWidth(4.34);
        $sheet->getColumnDimension('L')->setWidth(5.89);
        $sheet->getColumnDimension('M')->setWidth(5.11);
        $sheet->getColumnDimension('N')->setWidth(5.56);
        $sheet->getColumnDimension('O')->setWidth(4.67);
        $sheet->getColumnDimension('P')->setWidth(5.89);
        $sheet->getColumnDimension('Q')->setWidth(4.67);
        $sheet->getColumnDimension('R')->setWidth(6.34);
        $sheet->getColumnDimension('S')->setWidth(5);
        $sheet->getColumnDimension('T')->setWidth(6);
        $sheet->getColumnDimension('U')->setWidth(5);
        $sheet->getColumnDimension('V')->setWidth(6);
        $sheet->getColumnDimension('W')->setWidth(5.11);
        $sheet->getColumnDimension('X')->setWidth(6.11);
        $sheet->getColumnDimension('Y')->setWidth(5.45);
        $sheet->getColumnDimension('Z')->setWidth(6);
        $sheet->getColumnDimension('AA')->setWidth(6.89);
        $sheet->getColumnDimension('AB')->setWidth(6.11);
        $sheet->getColumnDimension('AC')->setWidth(5.56);
        $sheet->getColumnDimension('AD')->setWidth(5.89);
        $sheet->getColumnDimension('AE')->setWidth(5.45);
        $sheet->getColumnDimension('AF')->setWidth(6);
        $sheet->getColumnDimension('AG')->setWidth(5.45);
        $sheet->getColumnDimension('AH')->setWidth(6.11);
        $sheet->getColumnDimension('AI')->setWidth(5.56);
        $sheet->getColumnDimension('AJ')->setWidth(7.89);

        $sheet->getRowDimension(1)->setRowHeight(55.5);
        $sheet->getRowDimension(2)->setRowHeight(26.3);
        $sheet->getRowDimension(3)->setRowHeight(26.3);
        $sheet->getRowDimension(4)->setRowHeight(25);
        $sheet->getRowDimension(5)->setRowHeight(45);
        $sheet->getRowDimension(6)->setRowHeight(33.8);
        $sheet->getRowDimension(7)->setRowHeight(24.8);
        $sheet->getRowDimension(8)->setRowHeight(22.5);   

        $sheet->removeRow(2);
        $sheet->removeRow(4);
        // $sheet->removeRow($highestRow+1);
        

        for ($row = 6; $row <= $highestRow; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(33.8);
        }

        $sheet->getRowDimension(22)->setRowHeight(33.8);

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
        $sheet->getStyle('A2:A3')->applyFromArray([
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
        $sheet->getStyle('A4:C5')->applyFromArray([
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
        $sheet->getStyle('AJ4:AJ5')->applyFromArray([
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
        $sheet->getStyle('D4:AI4')->applyFromArray([
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
        $sheet->getStyle('S2:S3')->applyFromArray([
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

        $sheet->getStyle("B20:$highestColumn$highestRow")->applyFromArray([
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
        $sheet->getStyle("B8:B12")->applyFromArray([
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

        $sheet->getStyle("B14:B19")->applyFromArray([
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
        $sheet->getStyle("C7:$highestColumn$highestRow")->applyFromArray([
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
                    'color' => ['argb' => 'FF000000'],
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
        $sheet->getStyle('C22:AJ22')->applyFromArray([
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
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
    return [];
}
}
