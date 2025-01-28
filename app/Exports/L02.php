<?php

namespace App\Exports;

use App\Models\Staff;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\FromCollection;

class L02 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return L02::all();
    // }
    public $startYr, $startMonth, $endYr, $endMonth;
    public $staff_id;
    public $fromDateRange, $toDateRange;
    public $dep_category;
    public $months;
    public $divisions;
    public $monthly_leaves;
   
    public function mount($staff_id = 0)
    {
        $this->staff_id = $staff_id;
        $this->fromDateRange =\Carbon\Carbon::now()->subMonth(9)->format('Y-m'); // 9 months ago
        $this->toDateRange = \Carbon\Carbon::now()->format('Y-m'); // current month
        $this->dep_category = 1;
    }
    public function __construct($startYr , $startMonth ,
    $endYr ,
    $endMonth,
    $fromDateRange,
    $toDateRange,
    $dep_category,
    $months,
    $divisions,
    $monthly_leaves,
    
    )
    {
        $this->startYr = $startYr ;
        $this->startMonth = $startMonth;
        $this->endYr  =  $endYr;
         $this->endMonth  =  $endMonth;
         $this->fromDateRange  =  $fromDateRange;
         $this->toDateRange  =  $toDateRange;
         $this->dep_category  =  $dep_category;
         $this->months=$months;
         $this->divisions=$divisions;
         $this->monthly_leaves = $monthly_leaves;
        

    }


    
    public function view(): View
    {
        $staff = Staff::find($this->staff_id);
        $data = [
           'staff' => $staff,
            'startYr' => $this->startYr,
            'startMonth' => $this->startMonth,
            'endYr' => $this->endYr,
            'endMonth' => $this->endMonth,
            'months' => $this->months,
            'divisions' => $this->divisions,
            'monthly_leaves' => $this->monthly_leaves
        ];

        return view('excel_reports.leave_nuber_percent_report2',$data);
    }
    public function styles(Worksheet $sheet)
    {

    // Set paper size and orientation
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
    $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $sheet->getPageSetup()->setScale(80);

    // Enable gridlines for unbordered areas
    $sheet->setShowGridlines(true);
    // $sheet->setPrintGridlines(true);

    // Dynamically calculate the highest row and column
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(15);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(16);
    $sheet->getColumnDimension('F')->setWidth(16);
    $sheet->getColumnDimension('G')->setWidth(15);
    $sheet->getColumnDimension('H')->setWidth(15);
    $sheet->getColumnDimension('I')->setWidth(15);
    $sheet->getColumnDimension('J')->setWidth(16);
    $sheet->getColumnDimension('K')->setWidth(16);
    $sheet->getColumnDimension('L')->setWidth(17);
    

    $sheet->getRowDimension(1)->setRowHeight(24);
    $sheet->getRowDimension(2)->setRowHeight(24);
    $sheet->getRowDimension(3)->setRowHeight(24);
    $sheet->getRowDimension(5)->setRowHeight(100);
    $sheet->getRowDimension(6)->setRowHeight(30);
    $sheet->getRowDimension(7)->setRowHeight(25);
    $sheet->getRowDimension(8)->setRowHeight(30);
    // $sheet->getRowDimension(8)->setRowHeight(120);


    $sheet->removeRow(4);
    // $sheet->removeRow(9);

    $row=4;

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
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
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
    }
}
