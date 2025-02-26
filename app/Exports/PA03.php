<?php

namespace App\Exports;
use Carbon\Carbon;
use App\Models\Rank;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;


class PA03 implements  FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
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
            'first_ranks' => Rank::where('staff_type_id', 1)->where('is_dica', true)->get(),
            'second_ranks' => Rank::where('staff_type_id', 2)->where('is_dica', true)->get(),
            'year' => $this->year,
            'month' => $this->month,
        ];
        return view('excel_reports.investment_companies_report_3', $data);
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
        $sheet->getPageMargins()->setTop(1);        // 1 inch
        $sheet->getPageMargins()->setHeader(0.3);   // 0.3 inch
        $sheet->getPageMargins()->setLeft(0.5);     // 0.5 inch
        $sheet->getPageMargins()->setRight(0.2);    // 0.2 inch
        $sheet->getPageMargins()->setBottom(0.75);  // 0.75 inch
        $sheet->getPageMargins()->setFooter(0.3);   // 0.3 inch

    // Center horizontally on the page
    $sheet->getPageSetup()->setHorizontalCentered(true);

        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(85);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->removeRow(4);

        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(25);
        $sheet->getRowDimension(3)->setRowHeight(25);

        for ($row = 4; $row <= $highestRow ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(24);
        }

        // $sheet->getHeaderFooter()->setOddHeader('&C&H&"Pyidaungsu"&10' . "အတွင်းရေး\n၃"); // Centered header text
        

        // $sheet->getHeaderFooter()->setOddFooter('&C&H&"Pyidaungsu"&10' . 'အတွင်းရေး'); // Centered footer text

        $sheet->getPageMargins()->setTop(1);
        $sheet->getPageMargins()->setLeft(0.5);
        $sheet->getPageMargins()->setRight(0.2);
       
        $row=5;
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(27);
        $sheet->getColumnDimension('D')->setWidth(12);
        $sheet->getColumnDimension('E')->setWidth(12);
        $sheet->getColumnDimension('F')->setWidth(12);

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
                    'size' => 13,
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
            $sheet->getStyle("B13:B28")->applyFromArray([
                'font' => [
                    'name' => 'Pyidaungsu',
                    'size' => 13,
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

            $range = "D5:F$highestRow";

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
    }
}