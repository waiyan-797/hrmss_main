<?php

namespace App\Exports;

use App\Models\Staff;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA07 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;

    public function __construct($year , $month,
    $filterRange ,
    $previousMonthDate,
    $previousMonth,){
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

        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {
                    // Active and status hasn't changed during the previous month
                    $subQuery
                        ->where('status_changed_at', '<=', $previousMonthDate->endOfMonth()) // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=', $this->previousMonth) // To ensure they were active during the previous month
            ->count();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->where(function ($query) use ($previousMonthDate) {
                $query->where(function ($subQuery) use ($previousMonthDate) {
                    $subQuery
                        ->where('status_changed_at', '<=', $previousMonthDate->endOfMonth()) // Status was set before this month
                        ->where('previous_active_status', '1');
                });
            })
            ->whereYear('created_at', '<=', $year)
            ->whereMonth('created_at', '<=', $this->previousMonth) // To ensure they were active during the previous month
            ->count();
        $query = Staff::query();
        $high_reduced_staffs = Staff::whereNotNull('retire_type_id')
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();

        $low_reduced_staffs = Staff::whereNotNull('retire_type_id')
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();
        $total_reduced_staffs = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->get();

        $high_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where('is_newly_appointed', true)
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->count();
        $low_new_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->where('is_newly_appointed', true)
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->count();
        $total_new_staffs = $high_new_staffs + $low_new_staffs;

        $high_leave_staffs = Staff::where('retire_type_id', 6)
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();
        $low_leave_staffs = Staff::where('retire_type_id', 6)
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();
        $total_leave_staffs = $high_leave_staffs + $low_leave_staffs;

        $high_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->where('is_newly_appointed', false)
            ->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)
            ->count();
        $low_transfer_staffs = Staff::whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->where('is_newly_appointed', false)
            ->whereYear('join_date', $this->year)
            ->whereMonth('join_date', $this->month)
            ->count();
        $total_transfer_staffs = $high_transfer_staffs + $low_transfer_staffs;

        $high_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();

        $low_reduced_total = Staff::whereIn('retire_type_id', [1, 2, 4, 5])
            ->whereHas('currentRank', fn($q) => $q->whereIn('staff_type_id', [2, 3]))
            ->whereYear('retire_date', $this->year)
            ->whereMonth('retire_date', $this->month)
            ->count();

        $high_left_staffs = $high_staffs + $high_new_staffs + $high_transfer_staffs - ($high_leave_staffs + $high_reduced_total);
        $low_left_staffs = $low_staffs + $low_new_staffs + $low_transfer_staffs - ($low_leave_staffs + $low_reduced_total);
        $total_left_staffs = $high_left_staffs + $low_left_staffs;



        $data = [
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'high_reduced_staffs' => $high_reduced_staffs,
            'low_reduced_staffs' => $low_reduced_staffs,
            'total_reduced_staffs' => $total_reduced_staffs,
            'high_new_staffs' => $high_new_staffs,
            'low_new_staffs' => $low_new_staffs,
            'total_new_staffs' => $total_new_staffs,
            'high_transfer_staffs' => $high_transfer_staffs,
            'low_transfer_staffs' => $low_transfer_staffs,
            'total_transfer_staffs' => $total_transfer_staffs,
            'high_leave_staffs' => $high_leave_staffs,
            'low_leave_staffs' => $low_leave_staffs,
            'total_leave_staffs' => $total_leave_staffs,
            'high_left_staffs' => $high_left_staffs,
            'low_left_staffs' => $low_left_staffs,
            'total_left_staffs' => $total_left_staffs,
            'year' => $this->year,
            'month' => $this->month,
        ];


        return view('excel_reports.investment_companies_report_7', $data);
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
        $sheet->getPageSetup()->setHorizontalCentered(true);
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


        $sheet->getColumnDimension('A')->setWidth(4.45);
        $sheet->getColumnDimension('B')->setWidth(18);
        $sheet->getColumnDimension('C')->setWidth(7.67);
        $sheet->getColumnDimension('D')->setWidth(7.67);
        $sheet->getColumnDimension('E')->setWidth(7.67);
        $sheet->getColumnDimension('F')->setWidth(5.67);
        $sheet->getColumnDimension('G')->setWidth(5.67);
        $sheet->getColumnDimension('I')->setWidth(5.67);
        $sheet->getColumnDimension('H')->setWidth(5.67);
        $sheet->getColumnDimension('J')->setWidth(5.67);
        $sheet->getColumnDimension('K')->setWidth(5.67);
        $sheet->getColumnDimension('L')->setWidth(5.67);
        $sheet->getColumnDimension('M')->setWidth(5.67);
        $sheet->getColumnDimension('N')->setWidth(7.67);
        $sheet->getColumnDimension('O')->setWidth(7.67);
        $sheet->getColumnDimension('P')->setWidth(7.67);
        $sheet->getColumnDimension('Q')->setWidth(7.67);
        $sheet->getColumnDimension('R')->setWidth(5.67);
        $sheet->getColumnDimension('S')->setWidth(5.67);
        $sheet->getColumnDimension('T')->setWidth(5.67);
        $sheet->getColumnDimension('U')->setWidth(5.67);
        $sheet->getColumnDimension('V')->setWidth(5.67);
        $sheet->getColumnDimension('W')->setWidth(5.67);
        $sheet->getColumnDimension('X')->setWidth(7.67);
        $sheet->getColumnDimension('Y')->setWidth(7.67);
        $sheet->getColumnDimension('Z')->setWidth(7.67);

        $sheet->getRowDimension(1)->setRowHeight(21.8);
        $sheet->getRowDimension(2)->setRowHeight(21.8);
        $sheet->getRowDimension(3)->setRowHeight(21.8);
        $sheet->getRowDimension(4)->setRowHeight(33);
        $sheet->getRowDimension(5)->setRowHeight(33);
        $sheet->getRowDimension(6)->setRowHeight(33);
        $sheet->getRowDimension(7)->setRowHeight(180);
        $sheet->getRowDimension(8)->setRowHeight(21.6);

        for ($row = 4; $row <= $highestRow-1 ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(33);
        }
        $sheet->getRowDimension(8)->setRowHeight(180);


        $sheet->removeRow(4);


        $row=4;

        $sheet->getStyle('A1:A3')->applyFromArray([
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
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);
        $sheet->removeRow(9);
    }
}
