<?php

namespace App\Exports;

use App\Models\Rank;
use Carbon\Carbon;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA10 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA10::all();
    // }

    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;

    public function __construct($year , $month,
    $filterRange ,
    $previousMonthDate,
    $previousMonth,

    )
    {
        $this->filterRange = $filterRange ;
        
        $this->year  =  $year;
         $this->month  =  $month;
         $this->previousMonthDate  =  $previousMonthDate;
         $this->previousMonth  =  $previousMonth;
       

    }
    public function view(): View
    {
        [$year, $month] = explode('-', $this->filterRange);
      
        
       
    
        $this->year = $year;
        $this->month = $month;
       
        $previousMonthDate = Carbon::createFromDate($this->year, $this->month)->subMonth();

        $this->previousYear = $previousMonthDate->year;
        $this->previousMonth = $previousMonthDate->month;

        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $all_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
      
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'all_ranks' => $all_ranks,
            'year' => $this->year,
            'month' => $this->month,
          
        ];
        return view('excel_reports.investment_companies_report_10', $data);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setLeft(0.75);
        $sheet->getPageMargins()->setRight(0.15);
        $sheet->getPageMargins()->setBottom(0.5);
        $sheet->getPageMargins()->setFooter(0.3);
    
        // Center content horizontally on page
        $sheet->getPageSetup()->setHorizontalCentered(true);
        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(90);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow();  // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(4);
        $sheet->getColumnDimension('B')->setWidth(13.57);
        $sheet->getColumnDimension('C')->setWidth(6.71);
        $sheet->getColumnDimension('D')->setWidth(6.71);
        $sheet->getColumnDimension('E')->setWidth(6.71);
        $sheet->getColumnDimension('F')->setWidth(6.71);
        $sheet->getColumnDimension('G')->setWidth(6.71);
        $sheet->getColumnDimension('H')->setWidth(6.71);
        $sheet->getColumnDimension('I')->setWidth(6.71);
        $sheet->getColumnDimension('J')->setWidth(6.71);
        $sheet->getColumnDimension('K')->setWidth(6.71);
        $sheet->getColumnDimension('L')->setWidth(5.71);
        $sheet->getColumnDimension('M')->setWidth(5.71);
        $sheet->getColumnDimension('N')->setWidth(5.71);
        $sheet->getColumnDimension('O')->setWidth(5.71);
        $sheet->getColumnDimension('P')->setWidth(5.71);
        $sheet->getColumnDimension('Q')->setWidth(5.71);
        $sheet->getColumnDimension('R')->setWidth(5.71);
        $sheet->getColumnDimension('S')->setWidth(5.71);
        $sheet->getColumnDimension('T')->setWidth(5.71);
        $sheet->getColumnDimension('U')->setWidth(5.71);
        $sheet->getColumnDimension('V')->setWidth(5.71);
        $sheet->getColumnDimension('W')->setWidth(5.71);
        $sheet->getColumnDimension('X')->setWidth(5.71);
        $sheet->getColumnDimension('Y')->setWidth(5.71);
        $sheet->getColumnDimension('Z')->setWidth(5.71);
        $sheet->getColumnDimension('AA')->setWidth(5.71);
        $sheet->getColumnDimension('AB')->setWidth(5.71);
        $sheet->getColumnDimension('AC')->setWidth(5.71);

        $sheet->getRowDimension(1)->setRowHeight(18.8);
        $sheet->getRowDimension(2)->setRowHeight(18.8);
        $sheet->getRowDimension(3)->setRowHeight(18.8);
        $sheet->getRowDimension(4)->setRowHeight(31.55);
        $sheet->getRowDimension(5)->setRowHeight(16.1);
        $sheet->getRowDimension(6)->setRowHeight(16.1);
        $sheet->getRowDimension(7)->setRowHeight(21);

        $sheet->removeRow(4);

        // for ($row = 7; $row <= $highestRow-1 ; $row++) {
        //     $sheet->getRowDimension($row)->setRowHeight(33);
        // }
        $sheet->getRowDimension(7)->setRowHeight(84.8);
        $sheet->getRowDimension(8)->setRowHeight(33);


        $sheet->getStyle('A1:A3')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 8,
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

        

        $sheet->getStyle("A4:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 8,
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

        $sheet->getStyle("A7:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 8,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Custom alignment for A and B
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);

        $sheet->getStyle("A8:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 8,
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
        $sheet->removeRow(9);

        // $sheet->getStyle('A8:A9')->applyFromArray([
        //     'font' => [
        //         'name' => 'Pyidaungsu',
        //         'size' => 13,
        //         'bold' => true,
        //     ],
        //     'alignment' => [
        //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        //     ],
        //     'borders' => [
        //         'outline' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
        //         ],
        //     ],
        // ]);
        
        // // Auto-size columns based on dynamic range
        // foreach (range('A', $highestColumn) as $column) {
        //     $sheet->getColumnDimension($column)->setAutoSize(true);
        // }

        // // Set row heights manually for dynamic rows
        // foreach (range(3, $highestRow) as $row) {
        //     $sheet->getRowDimension($row)->setRowHeight(-1); // Auto-adjust height
        // }

        // // Define the print area dynamically
        // $sheet->getPageSetup()->setPrintArea("A1:$highestColumn$highestRow");

        // Set a margin for better printing output
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.15);
        $sheet->getPageMargins()->setLeft(0.75);
        $sheet->getPageMargins()->setBottom(0.5);
    }
}
