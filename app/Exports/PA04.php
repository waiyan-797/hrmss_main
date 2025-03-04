<?php

namespace App\Exports;

use App\Models\Payscale;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;

class PA04 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA04::all();
    // }
    public $count=0;
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
        
        $count=0;
        $data = [
            'count'=>$count,
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            'year' => $this->year,
            'month' => $this->month,
          
        ];
        return view('excel_reports.investment_companies_report_4', $data);
    }

        public function styles(Worksheet $sheet)
    {

        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(6.71);
        $sheet->getColumnDimension('B')->setWidth(30.71);
        $sheet->getColumnDimension('C')->setWidth(19.14);
        $sheet->getColumnDimension('D')->setWidth(21.28);
        $sheet->getColumnDimension('E')->setWidth(23.28);
        

        $sheet->getRowDimension(1)->setRowHeight(30);
        $sheet->getRowDimension(2)->setRowHeight(30);
        $sheet->getRowDimension(3)->setRowHeight(30);
        for ($row = 4; $row <= $highestRow+1 ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(35);
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
        $range = "C5:E$highestRow";

            $sheet->getStyle($range)->applyFromArray([
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

        
        // // Auto-size columns based on dynamic range
        // foreach (range('A', $highestColumn) as $column) {
        //     $sheet->getColumnDimension($column)->setAutoSize(true);
        // }

        // // Set row heights manually for dynamic rows
        // foreach (range(3, $highestRow) as $row) {
        //     $sheet->getRowDimension($row)->setRowHeight(35); // Auto-adjust height
        // }

        // // Define the print area dynamically
        // $sheet->getPageSetup()->setPrintArea("A1:$highestColumn$highestRow");

        // Set a margin for better printing output
        $sheet->getPageMargins()->setTop(0.748031496062992);
        $sheet->getPageMargins()->setRight(right: 0.590551181102362);
        $sheet->getPageMargins()->setLeft(1.10236220472441);
        $sheet->getPageMargins()->setBottom(0.748031496062992);
    }
}
