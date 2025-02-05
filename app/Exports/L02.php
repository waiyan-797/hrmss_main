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

    protected $startYr, $startMonth, $endYr, $endMonth, $fromDateRange, $toDateRange, $dep_category, $months,$divisions, $monthly_leaves;

    public function __construct($startYr, $startMonth, $endYr, $endMonth, $fromDateRange, $toDateRange, $dep_category, $months,$divisions, $monthly_leaves)
    {
        $this->startYr = $startYr;
        $this->startMonth = $startMonth;
        $this->endYr = $endYr;
        $this->endMonth = $endMonth;
        $this->fromDateRange = $fromDateRange;
        $this->toDateRange = $toDateRange;
        $this->dep_category = $dep_category;
        $this->months = $months;
        $this->divisions =$divisions;
        $this->monthly_leaves = $monthly_leaves;
    }
    public function view(): View
    {
        return view('excel_reports.leave_nuber_percent_report2', [
            'startYr' => $this->startYr,
            'startMonth' => $this->startMonth,
            'endYr' => $this->endYr,
            'endMonth' => $this->endMonth,
            'months' => $this->months,
            'divisions' => $this->divisions,
            'monthly_leaves' => $this->monthly_leaves
        ]);
    }
    public function styles(Worksheet $sheet)
    {

    // Set paper size and orientation
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
    $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $sheet->getPageSetup()->setScale(85);

    // Enable gridlines for unbordered areas
    $sheet->setShowGridlines(true);
    // $sheet->setPrintGridlines(true);

    // Dynamically calculate the highest row and column
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(50);
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->getColumnDimension('D')->setWidth(10);
    $sheet->getColumnDimension('E')->setWidth(10);
    $sheet->getColumnDimension('F')->setWidth(10);
    $sheet->getColumnDimension('G')->setWidth(10);
    $sheet->getColumnDimension('H')->setWidth(10);
    $sheet->getColumnDimension('I')->setWidth(10);
    $sheet->getColumnDimension('J')->setWidth(10);
    $sheet->getColumnDimension('K')->setWidth(10);
    $sheet->getColumnDimension('L')->setWidth(10);
    

    $sheet->getRowDimension(1)->setRowHeight(40);
    // $sheet->getRowDimension(2)->setRowHeight(24);
    $sheet->getRowDimension(3)->setRowHeight(100);
    $sheet->getRowDimension(5)->setRowHeight(30);
    $sheet->getRowDimension(6)->setRowHeight(30);
    $sheet->getRowDimension(7)->setRowHeight(30);
    $sheet->getRowDimension(8)->setRowHeight(30);
    $sheet->getRowDimension(9)->setRowHeight(30);
    $sheet->getRowDimension(10)->setRowHeight(30);
    $sheet->getRowDimension(11)->setRowHeight(30);
    $sheet->getRowDimension(12)->setRowHeight(30);
    $sheet->getRowDimension(13)->setRowHeight(30);
    $sheet->getRowDimension(14)->setRowHeight(30);
    // $sheet->getRowDimension(8)->setRowHeight(110);


    $sheet->removeRow(4);
    // $sheet->removeRow(9);

    $row=4;

    $sheet->getStyle('A1:L2')->applyFromArray([
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
    $sheet->getStyle("A3:$highestColumn$highestRow")->applyFromArray([
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
