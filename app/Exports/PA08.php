<?php

namespace App\Exports;

use App\Models\Rank;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA08 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA08::all();
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


        $first_ranks = Rank::where('staff_type_id', 1)
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $second_ranks = Rank::where('staff_type_id', 2)
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $third_ranks = Rank::where('staff_type_id', 3)
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $all_ranks = Rank::get();

        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
            'year' => $this->year,
            'month' => $this->month,
        ];


        return view('excel_reports.investment_companies_report_8', $data);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setLeft(0.15);
        $sheet->getPageMargins()->setRight(0.15);
        $sheet->getPageMargins()->setBottom(0.5);
        $sheet->getPageMargins()->setFooter(0.3);

    // Center on page horizontally
    $sheet->getPageSetup()->setHorizontalCentered(true);
        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // $sheet->getPageSetup()->setScale(80);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-2; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(4.85);
        $sheet->getColumnDimension('B')->setWidth(22.28);
        $sheet->getColumnDimension('C')->setWidth(8.48);
        $sheet->getColumnDimension('D')->setWidth(11.14);
        $sheet->getColumnDimension('E')->setWidth(12);
        $sheet->getColumnDimension('F')->setWidth(12);
        $sheet->getColumnDimension('G')->setWidth(12);
        $sheet->getColumnDimension('H')->setWidth(12);
        $sheet->getColumnDimension('I')->setWidth(12);
        $sheet->getColumnDimension('J')->setWidth(10);
        $sheet->getColumnDimension('K')->setWidth(7);
        $sheet->getColumnDimension('L')->setWidth(6);
        $sheet->getColumnDimension('M')->setWidth(12);
        $sheet->getColumnDimension('N')->setWidth(7);
        $sheet->getColumnDimension('O')->setWidth(6);
        $sheet->getColumnDimension('P')->setWidth(12);

        $sheet->getRowDimension(1)->setRowHeight(28);
        $sheet->getRowDimension(2)->setRowHeight(28);
        $sheet->getRowDimension(3)->setRowHeight(28);
        $sheet->getRowDimension(4)->setRowHeight(28);


        // $sheet->removeRow(5);
        for ($row = 5; $row <= $highestRow ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(28);
        }
        $sheet->getRowDimension(7)->setRowHeight(150);

        $sheet->getStyle('A1:A4')->applyFromArray([
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


        $sheet->getStyle("A7:$highestColumn$highestRow")->applyFromArray([
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

        // $sheet->getStyle("A7:$highestColumn$highestRow")->applyFromArray([
        //     'font' => [
        //         'name' => 'Pyidaungsu',
        //         'size' => 13,
        //     ],
        //     'alignment' => [
        //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Custom alignment for A and B
        //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        //     ],
        //     'borders' => [
        //         'allBorders' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //             'color' => ['argb' => 'FF000000'], // Black border
        //         ],
        //     ],
        // ]);
        $sheet->removeRow(9);
    }

}
