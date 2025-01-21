<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PA12 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA12::all();
    // }
    public $filterRange;
    public $year;
    public $month;
    public $date;


    public function __construct($filterRange ,$year ,$month,$date)
    {
        $this->filterRange = $filterRange ;
        $this->year  =  $year;
         $this->month  =  $month;
         $this->date  =  $date;

    }
    public function view(): View
    {
        
        $date_limit = $this->filterRange;
        $date_limit_query = Staff::where('join_date', '<=', $date_limit);
        $high_staff_query = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_staff_query = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));

        $high_new_appointed_staffs = $high_staff_query
            ->where('is_newly_appointed', true)
            ->count();
        $low_new_appointed_staffs = $low_staff_query
            ->where('is_newly_appointed', true)
            ->count();

        $high_transferred_staffs = $high_staff_query
            ->where('is_newly_appointed', false)
            ->count();
        $low_transferred_staffs = $low_staff_query
            ->where('is_newly_appointed', false)
            ->count();

        $high_leave_staffs = $high_staff_query->where('retire_type_id', 6)->count();
        $low_leave_staffs = $low_staff_query->where('retire_type_id', 6)->count();

        $d_limit_high_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $d_limit_low_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();


        $data = [
           'year' => $this->year,
            'month' => $this->month,
            'date' => $this->date,
            'high_new_appointed_staffs' => $high_new_appointed_staffs,
            'low_new_appointed_staffs' => $low_new_appointed_staffs,
            'high_transferred_staffs' => $high_transferred_staffs,
            'low_transferred_staffs' => $low_transferred_staffs,
            'd_limit_high_staffs' => $d_limit_high_staffs,
            'd_limit_low_staffs' => $d_limit_low_staffs,
            'high_staff_query' => $high_staff_query,
            'low_staff_query' => $low_staff_query,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
          
        ];


        return view('excel_reports.investment_companies_report_12', $data);
    }

    public function styles(Worksheet $sheet)
{
    $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);
    $sheet->getPageSetup()->setScale(70);

   
    // $sheet->getColumnDimension('A')->setWidth(7);
    // $sheet->getColumnDimension('B')->setWidth(30);
    // $sheet->getColumnDimension('C')->setWidth(15);
    // $sheet->getColumnDimension('D')->setWidth(15);
    // $sheet->getColumnDimension('E')->setWidth(16);
    // $sheet->getColumnDimension('F')->setWidth(16);
    // $sheet->getColumnDimension('G')->setWidth(15);
    // $sheet->getColumnDimension('H')->setWidth(15);
    // $sheet->getColumnDimension('I')->setWidth(15);
    // $sheet->getColumnDimension('J')->setWidth(16);
    // $sheet->getColumnDimension('K')->setWidth(16);
    // $sheet->getColumnDimension('L')->setWidth(17);





    $sheet->getRowDimension(1)->setRowHeight(40); 
    $sheet->getRowDimension(2)->setRowHeight(40);
    $sheet->getRowDimension(3)->setRowHeight(130);
    $sheet->getRowDimension(4)->setRowHeight(50);
    $sheet->getRowDimension(5)->setRowHeight(50);
    $sheet->getRowDimension(6)->setRowHeight(50);


    // Merge and Style Main Title
    $sheet->mergeCells('A1:V1');
    $sheet->setCellValue('A1', 'ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');
    $sheet->getStyle('A1:V1')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->mergeCells('A2:V2');
    $sheet->setCellValue('A2', 'ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏ ဝန်ထမ်းအင်အားပြုန်းတီးမှုအခြေအနေနှင့်  ဝန်ထမ်းအင်အားစာရင်းချုပ်');
    $sheet->getStyle('A2:V2')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);

    // Set Column Widths
    $sheet->getColumnDimension('A')->setWidth(15);
    $sheet->getColumnDimension('B')->setWidth(7);
    $sheet->getColumnDimension('C')->setWidth(7);
    $sheet->getColumnDimension('D')->setWidth(7);
    $sheet->getColumnDimension('E')->setWidth(7);

    // Additional Style for Rows 3 to 5
    $sheet->getStyle('A3:A6')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'bold' => true,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'wrapText' => true,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'], // Black border
            ],
        ],
    ]);

    // Apply General Styling
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

    $sheet->getStyle("A2:$highestColumn$highestRow")->applyFromArray([
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
                'color' => ['argb' => 'FF000000'], 
            ],
        ],
    ]);
}

    











// public function styles(Worksheet $sheet)
// {

    
//      $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL);
//      $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); 
 
    
//      $sheet->getPageSetup()->setFitToWidth(1);
//      $sheet->getPageSetup()->setFitToHeight(0);

     

//     $sheet->getColumnDimension('A')->setWidth(7);
//     $sheet->getColumnDimension('B')->setWidth(30);
//     $sheet->getColumnDimension('C')->setWidth(15);
//     $sheet->getColumnDimension('D')->setWidth(15);
//     $sheet->getColumnDimension('E')->setWidth(16);
//     $sheet->getColumnDimension('F')->setWidth(16);
//     $sheet->getColumnDimension('G')->setWidth(15);
//     $sheet->getColumnDimension('H')->setWidth(15);
//     $sheet->getColumnDimension('I')->setWidth(15);
//     $sheet->getColumnDimension('J')->setWidth(16);
//     $sheet->getColumnDimension('K')->setWidth(16);
//     $sheet->getColumnDimension('L')->setWidth(17);
    

//     $sheet->getRowDimension(1)->setRowHeight(24);
//     $sheet->getRowDimension(2)->setRowHeight(24);
//     $sheet->getRowDimension(3)->setRowHeight(24);
//     $sheet->getRowDimension(5)->setRowHeight(100);
//     $sheet->getRowDimension(6)->setRowHeight(30);
//     $sheet->getRowDimension(7)->setRowHeight(25);
//     $sheet->getRowDimension(8)->setRowHeight(30);
   


//     // $sheet->removeRow(4);
  
//     $sheet->getStyle('A1:Z1000')->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//         ],
//     ]);

//     // Apply borders to all cells with black border
//     $sheet->getStyle('A1:V100')->applyFromArray([
//         'borders' => [
//             'allBorders' => [
//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
//                 'color' => ['argb' => '000000'], // Black border
//             ],
//         ],
//     ]);

//     // Auto-size columns for the table
//     foreach (range('A', 'V') as $column) {
//         $sheet->getColumnDimension($column)->setAutoSize(true);
//     }

//     return [];
// }








// public function styles(Worksheet $sheet)
//     {

//     // Set paper size and orientation
//     $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
//     $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

//     // Fit to page width
//     $sheet->getPageSetup()->setFitToWidth(1);
//     $sheet->getPageSetup()->setFitToHeight(0);

//     $sheet->getPageSetup()->setScale(80);

//     // Enable gridlines for unbordered areas
//     $sheet->setShowGridlines(true);
//     // $sheet->setPrintGridlines(true);

//     // Dynamically calculate the highest row and column
//     $highestRow = $sheet->getHighestRow(); // e.g. 19
//     $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

//     $sheet->getColumnDimension('A')->setWidth(7);
//     $sheet->getColumnDimension('B')->setWidth(30);
//     $sheet->getColumnDimension('C')->setWidth(15);
//     $sheet->getColumnDimension('D')->setWidth(15);
//     $sheet->getColumnDimension('E')->setWidth(16);
//     $sheet->getColumnDimension('F')->setWidth(16);
//     $sheet->getColumnDimension('G')->setWidth(15);
//     $sheet->getColumnDimension('H')->setWidth(15);
//     $sheet->getColumnDimension('I')->setWidth(15);
//     $sheet->getColumnDimension('J')->setWidth(16);
//     $sheet->getColumnDimension('K')->setWidth(16);
//     $sheet->getColumnDimension('L')->setWidth(17);
  
    

//     $sheet->getRowDimension(1)->setRowHeight(24);
//     $sheet->getRowDimension(2)->setRowHeight(24);
//     $sheet->getRowDimension(3)->setRowHeight(24);
//     $sheet->getRowDimension(5)->setRowHeight(100);
//     $sheet->getRowDimension(6)->setRowHeight(30);
//     $sheet->getRowDimension(7)->setRowHeight(25);
//     $sheet->getRowDimension(8)->setRowHeight(30);
//     // $sheet->getRowDimension(8)->setRowHeight(120);


//     $sheet->removeRow(4);
//     // $sheet->removeRow(9);

//     $row=4;

//     $sheet->getStyle('A1:A2')->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//         ],
//         'alignment' => [
//             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
//             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
//         ],
//         'borders' => [
//             'outline' => [
//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
//             ],
//         ],
//     ]);
//     $sheet->getStyle('A3')->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//         ],
//         'alignment' => [
//             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
//             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
//         ],
//         'borders' => [
//             'outline' => [
//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
//             ],
//         ],
//     ]);
//     $sheet->getStyle("A4:$highestColumn$highestRow")->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//         ],
//         'alignment' => [
//             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Custom alignment for A and B
//             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
//         ],
//         'borders' => [
//             'allBorders' => [
//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
//                 'color' => ['argb' => 'FF000000'], // Black border
//             ],
//         ],
//     ]);

       
//         // $sheet->getStyle('A1:Z1000')->applyFromArray([
//         //     'font' => [
//         //         'name' => 'Pyidaungsu',
//         //         'size' => 13,
//         //     ],
//         // ]);
//         // $sheet->getStyle('A1:L100')->applyFromArray([
//         //     'borders' => [
//         //         'allBorders' => [
//         //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
//         //             'color' => ['argb' => '000000'], // Black border
//         //         ],
//         //     ],
//         // ]);
    
//         // // Auto-size columns for the table
//         // foreach (range('A', 'W') as $column) {
//         //     $sheet->getColumnDimension($column)->setAutoSize(true);
//         // }
    
//         // return [];
//     }



}
