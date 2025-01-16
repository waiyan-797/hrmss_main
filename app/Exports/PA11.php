<?php

namespace App\Exports;

use App\Models\Staff;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA11 implements FromView ,WithStyles
{ 


    public $filterRange , $filterRangeTo;
   public $year ,$month ,$day ,$toDay ,$Tomonth ,$Toyear;


    public function __construct($filterRange , $filterRangeTo ,
    $year ,
    $month,
    $day,
    $toDay,
    $Tomonth,
    $Toyear
    )
    {
        $this->filterRange = $filterRange ;
        $this->filterRangeTo = $filterRangeTo;
        $this->year  =  $year;
         $this->month  =  $month;
         $this->day  =  $day;
         $this->toDay  =  $toDay;
         $this->Tomonth  =  $Tomonth;
         $this->Toyear = $Toyear;

    }

    public function view(): View
    {
        $date_limit = $this->filterRange;
        $_date_limit = $this->filterRangeTo;
        $ten_years_ago = Carbon::now()->subYears(10);
        //over 10 years
        $date_limit_query = Staff::where('join_date', '<=', $date_limit)->where('join_date', '<', $ten_years_ago);
        $high_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q = Staff::where('join_date', '<', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs = $date_limit_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query = Staff::where('join_date', '>', $date_limit)->where('join_date', '<=', $ten_years_ago);
        $high_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs = $new_query->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();




        $high_transfer_new_staffs = $high_q
            ->where('is_newly_appointed', false)
            ->where('join_date', '<=', $ten_years_ago)->count();
        $low_transfer_new_staffs = $low_q
            ->where('is_newly_appointed', false)
            ->where('join_date', '<=', $ten_years_ago)->count();

        $high_leave_staffs = $high_q
            ->where('retire_type_id', 6)
            ->where('join_date', '<=', $ten_years_ago)->count();
        $low_leave_staffs = $low_q
            ->where('retire_type_id', 6)
            ->where('join_date', '<=', $ten_years_ago)->count();

        $_date_limit_query = Staff::where('join_date', '<=', $_date_limit);
        $high_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs = $_date_limit_query->where('join_date', '<=', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        //below 10 years
        $date_limit_query2 = Staff::where('join_date', '<=', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1));
        $low_q2 =  Staff::where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]));
        $high_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit_staffs2 = $date_limit_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $new_query2 = Staff::where('join_date', '>', $date_limit)->where('join_date', '>', $ten_years_ago);
        $high_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_new_staffs2 = $new_query2->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();

        $high_transfer_new_staffs2 = $high_q2
            ->where('is_newly_appointed', false)
            ->where('join_date', '>', $ten_years_ago)->count();
        $low_transfer_new_staffs2 = $low_q2
            ->where('is_newly_appointed', false)
            ->where('join_date', '>', $ten_years_ago)->count();

        $high_leave_staffs2 = $high_q2
            ->where('retire_type_id', 6)
            ->where('join_date', '>', $ten_years_ago)->count();
        $low_leave_staffs2 = $low_q2
            ->where('retire_type_id', 6)
            ->where('join_date', '>', $ten_years_ago)->count();

        $high_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->count();
        $low_dlimit2_staffs2 = $_date_limit_query->where('join_date', '>', $ten_years_ago)->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))->count();
        $data = [
            'high_dlimit_staffs' => $high_dlimit_staffs,
            'low_dlimit_staffs' => $low_dlimit_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'high_transfer_new_staffs' => $high_transfer_new_staffs,
            'low_transfer_new_staffs' => $low_transfer_new_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'high_q' => $high_q,
            'low_q' => $low_q,
            'high_dlimit_staffs2' => $high_dlimit_staffs2,
            'low_dlimit_staffs2' => $low_dlimit_staffs2,
            'high_dlimit2_staffs' => $high_dlimit2_staffs,
            'low_dlimit2_staffs' => $low_dlimit2_staffs,
            'high_new_staffs2' => $high_new_staffs2,
            'low_new_staffs2' => $low_new_staffs2,
            'high_transfer_new_staffs2' => $high_transfer_new_staffs2,
            'low_transfer_new_staffs2' => $low_transfer_new_staffs2,
            'high_leave_staffs2' => $high_leave_staffs2,
            'low_leave_staffs2' => $low_leave_staffs2,
            'high_q2' => $high_q2,
            'low_q2' => $low_q2,
            'high_dlimit2_staffs2' => $high_dlimit2_staffs2,
            'low_dlimit2_staffs2' => $low_dlimit2_staffs2,
             'year' => $this->year ,
             'month' => $this->month,
             'day' => $this->day,
             'toDay' => $this->toDay,
             'Tomonth' => $this->Tomonth,
             'Toyear' => $this->Toyear
        ];


        return view('excel_reports.investment_companies_report_11', $data);
    }


    // public function styles(Worksheet $sheet)
    // {
    //     // Apply the Pyidaungsu font to the entire sheet
    //     $sheet->getStyle('A1:Z1000')->applyFromArray([
    //         'font' => [
    //             'name' => 'Pyidaungsu',
    //             'size' => 13 , 
    //         ],
    //     ]);

    //     return [];
    // }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(70);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19

        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
        $row=7;

        $sheet->getPageMargins()->setTop(0.8);
        

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(23);
        $sheet->getColumnDimension('C')->setWidth(5);
        $sheet->getColumnDimension('D')->setWidth(5);
        $sheet->getColumnDimension('E')->setWidth(7);
        $sheet->getColumnDimension('F')->setWidth(4);
        $sheet->getColumnDimension('G')->setWidth(8);
        $sheet->getColumnDimension('H')->setWidth(4);
        $sheet->getColumnDimension('I')->setWidth(8);
        $sheet->getColumnDimension('J')->setWidth(4);
        $sheet->getColumnDimension('K')->setWidth(8);
        $sheet->getColumnDimension('L')->setWidth(8);
        $sheet->getColumnDimension('M')->setWidth(8);
        $sheet->getColumnDimension('N')->setWidth(5);
        $sheet->getColumnDimension('O')->setWidth(5);
        $sheet->getColumnDimension('P')->setWidth(5);
        $sheet->getColumnDimension('Q')->setWidth(8);
        $sheet->getColumnDimension('R')->setWidth(5);
        $sheet->getColumnDimension('S')->setWidth(5);
        $sheet->getColumnDimension('T')->setWidth(25);
        $sheet->getColumnDimension('U')->setWidth(25);
        $sheet->getColumnDimension('V')->setWidth(9);
        $sheet->getColumnDimension('W')->setWidth(9);

        $sheet->getRowDimension(1)->setRowHeight(28);
        $sheet->getRowDimension(2)->setRowHeight(28);
        $sheet->getRowDimension(3)->setRowHeight(0);
        $sheet->getRowDimension(4)->setRowHeight(40);
        $sheet->getRowDimension(5)->setRowHeight(40);
        $sheet->getRowDimension(6)->setRowHeight(50);
        $sheet->getRowDimension(7)->setRowHeight(40);
        $sheet->getRowDimension(8)->setRowHeight(60);
        $sheet->getRowDimension(9)->setRowHeight(80);
        $sheet->getRowDimension(10)->setRowHeight(60);
       
        
        // for ($row = 3; $row <= $highestRow ; $row++) {
        //     $sheet->getRowDimension($row)->setRowHeight(26);
        // }

        $sheet->removeRow(3);

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
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                ],
            ],
        ]);
        
        $sheet->getStyle("A3:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 11,
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

        $sheet->getStyle("A3:W3")->applyFromArray([
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
        $sheet->getStyle("A4:W4")->applyFromArray([
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

        $sheet->getStyle("A6:W6")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 10,
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

        $sheet->getStyle("B7:B8")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 10,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Custom alignment for A and B
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);

        // Apply global font style
        // $sheet->getStyle('A1:Z1000')->applyFromArray([
        //     'font' => [
        //         'name' => 'Pyidaungsu',
        //         'size' => 13,
        //     ],
        // ]);
        // $sheet->getStyle('A1:W100')->applyFromArray([
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
