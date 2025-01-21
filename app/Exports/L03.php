<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class L03 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return L03::all();
    // }


    public $year, $month;
    public $leave_types;
    
    public $HeadOfficeLeaves , $DivisionLeaves ;
    public $divisionTypes; 
    public $dateRange;

    public function __construct($year , $month ,$leave_types ,$HeadOfficeLeaves,$DivisionLeaves,$divisionTypes,$dateRange
    )
    {
        $this->year = $year ;
        $this->month = $month;
        $this->leave_types  =  $leave_types;
         $this->HeadOfficeLeaves  =  $HeadOfficeLeaves;
         $this->DivisionLeaves  =  $DivisionLeaves;
         $this->divisionTypes  =  $divisionTypes;
         $this->dateRange = $dateRange;

    }
    public function view(): View
    {
        [$this->year, $this->month] = explode('-', $this->dateRange);
      
        $data = [
            'year' => $this->year,
            'month' => $this->month,
            'leave_types' => $this->leave_types,
            'divisionTypes' => $this->divisionTypes,
            'dateRange' => $this->dateRange,
            
        ];
        return view('excel_reports.leave_summary_report', $data);
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

       
        // $sheet->getStyle('A1:Z1000')->applyFromArray([
        //     'font' => [
        //         'name' => 'Pyidaungsu',
        //         'size' => 13,
        //     ],
        // ]);
        // $sheet->getStyle('A1:L100')->applyFromArray([
        //     'borders' => [
        //         'allBorders' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //             'color' => ['argb' => '000000'], // Black border
        //         ],
        //     ],
        // ]);
    
        // // Auto-size columns for the table
        // foreach (range('A', 'W') as $column) {
        //     $sheet->getColumnDimension($column)->setAutoSize(true);
        // }
    
        // return [];
    }
}
