<?php

namespace App\Exports;

use App\Models\Payscale;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA01 implements FromView ,WithStyles
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
        return view('excel_reports.investment_companies_report', $data);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(80);

        //margin$sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setBottom(0.75);
        $sheet->getPageMargins()->setFooter(0.3);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-2; // e.g. 19

        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
        $row=5;

       
        // $sheet->getHeaderFooter()->setOddHeader('&C&H&"Pyidaungsu"&11' . "ကန့်သတ်\n၂"); // Centered header text
        // $sheet->getHeaderFooter()->setOddFooter('&C&H&"Pyidaungsu"&11' . 'ကန့်သတ်'); // Centered footer text
       
       
        

        $sheet->getColumnDimension('A')->setWidth(5.34);
        $sheet->getColumnDimension('B')->setWidth(23.67);
        $sheet->getColumnDimension('C')->setWidth(8.45);
        $sheet->getColumnDimension('D')->setWidth(6.34);
        $sheet->getColumnDimension('E')->setWidth(6.89);
        $sheet->getColumnDimension('F')->setWidth(6.34);
        $sheet->getColumnDimension('G')->setWidth(6.34);
        $sheet->getColumnDimension('H')->setWidth(6.34);
        $sheet->getColumnDimension('I')->setWidth(6.34);
        $sheet->getColumnDimension('J')->setWidth(6.34);
        $sheet->getColumnDimension('K')->setWidth(8);
        $sheet->getColumnDimension('L')->setWidth(7.56);
        $sheet->getColumnDimension('M')->setWidth(7.89);
        $sheet->getColumnDimension('N')->setWidth(7.11);
        $sheet->getColumnDimension('O')->setWidth(9.11);
        $sheet->getColumnDimension('P')->setWidth(6.67);
        $sheet->getColumnDimension('Q')->setWidth(5.34);
        $sheet->getColumnDimension('R')->setWidth(9.34);
        $sheet->getColumnDimension('S')->setWidth(8.45);
        $sheet->getColumnDimension('T')->setWidth(9.34);

        $sheet->getRowDimension(1)->setRowHeight(41.3);
        $sheet->getRowDimension(2)->setRowHeight(21);
        $sheet->getRowDimension(3)->setRowHeight(21);
        $sheet->getRowDimension(4)->setRowHeight(21);
        $sheet->getRowDimension(6)->setRowHeight(64.5);
        $sheet->getRowDimension(7)->setRowHeight(18.8);
        // $sheet->getRowDimension(21)->setRowHeight(40);
        // $sheet->getRowDimension(21)->setRowHeight(25);

        
        $sheet->removeRow(2);
        $sheet->removeRow(4);
        // $sheet->removeRow(22);
        // $sheet->removeRow(23);
        

        for ($row = 8; $row <= $highestRow-1 ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(25.5);
        }

        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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

        $sheet->getStyle('A2:A3')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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

        

        $sheet->getStyle('k2:k3')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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

        
        $sheet->getStyle("A4:T4")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
                'bold' => true
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
        $sheet->getStyle("A$row:$highestColumn$row")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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
                'size' => 11,
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
        $sheet->getStyle("B6:B11")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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
        $sheet->getStyle("B13:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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
        

        $sheet->getStyle("C6:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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

        $sheet->getStyle("C7:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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

        $sheet->removeRow(22);
    return [];
}
}
