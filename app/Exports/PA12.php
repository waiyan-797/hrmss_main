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
    $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $margins = $sheet->getPageMargins();
    $margins->setTop(0.75);
    $margins->setHeader(0.3);
    $margins->setLeft(0.7);
    $margins->setRight(0.7);
    $margins->setBottom(0.75);
    $margins->setFooter(0.3);
    $sheet->getPageSetup()->setScale(80);

   
    $sheet->getColumnDimension('A')->setWidth(8.91);
    $sheet->getColumnDimension('B')->setWidth(4.64);
    $sheet->getColumnDimension('C')->setWidth(4.91);
    $sheet->getColumnDimension('D')->setWidth(5.55);
    $sheet->getColumnDimension('E')->setWidth(6.20);
    $sheet->getColumnDimension('F')->setWidth(6.20);
    $sheet->getColumnDimension('G')->setWidth(5.82);
    $sheet->getColumnDimension('H')->setWidth(5.82);
    $sheet->getColumnDimension('I')->setWidth(5.82);
    $sheet->getColumnDimension('J')->setWidth(8.91);
    $sheet->getColumnDimension('K')->setWidth(7.18);
    $sheet->getColumnDimension('L')->setWidth(7.18);
    $sheet->getColumnDimension('M')->setWidth(7.09);
    $sheet->getColumnDimension('N')->setWidth(7.09);
    $sheet->getColumnDimension('O')->setWidth(7.18);
    $sheet->getColumnDimension('P')->setWidth(9.18);
    $sheet->getColumnDimension('Q')->setWidth(7.55);
    $sheet->getColumnDimension('R')->setWidth(6.91);
    $sheet->getColumnDimension('S')->setWidth(6.82);
    $sheet->getColumnDimension('T')->setWidth(6.09);
    $sheet->getColumnDimension('U')->setWidth(8.82);
    $sheet->getColumnDimension('V')->setWidth(8.64);





    $sheet->getRowDimension(1)->setRowHeight(25.5); 
    $sheet->getRowDimension(2)->setRowHeight(30);
    $sheet->getRowDimension(3)->setRowHeight(50.2);
    $sheet->getRowDimension(4)->setRowHeight(50.2);
    $sheet->getRowDimension(5)->setRowHeight(50.2);
    $sheet->getRowDimension(6)->setRowHeight(50.2);
    $sheet->getRowDimension(7)->setRowHeight(50.2);


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

    $sheet->getStyle("A3:$highestColumn$highestRow")->applyFromArray([
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
}
