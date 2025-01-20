<?php

namespace App\Exports;

use App\Models\Division;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use App\Exports\Facades\Log;
use Illuminate\Support\Facades\Log as FacadesLog;

class L01 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return L01::all();
    // }

    public $year, $month;
    public $dep_category;
    public $divisions;
    public $dateRange;
    public  $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;
     public $count=0;
     public function mount()
    {

        // $this->dateRange = Carbon::now()->format('Y-m');

        $this->dep_category = 1;
    }

    public function __construct($year , $month, $dateRange)
    {
       
        
        $this->year  =  $year;
         $this->month  =  $month;
         $this->dateRange = $dateRange;



    }
   

    public function view(): View
    {
        $leave_types = LeaveType::all();
       
    if (!($this->dep_category == 3)) {
        $divisions = Division::where('division_type_id', $this->dep_category)->get();
    }
    $totalStaffCount = 0;
    $totalLeaveCount = 0;
    $totalLeaveTypeCounts = [];
        $divisions = Division::get();
        [$year, $month] = explode('-', $this->dateRange);
        $this->year = $year;
        $this->month = $month;

        if (!($this->dep_category == 3)) {
            $divisions = Division::where('division_type_id', $this->dep_category)->get();
        }
        $totalStaffCount = 0;
        $totalLeaveCount = 0;
        $totalLeaveTypeCounts = [];


        FacadesLog::info('Divisions Retrieved:', $divisions->toArray());

        foreach ($divisions as $division) {
            $division->staffCount = $this->staffCount($division->id);
            $division->leaveCount = $this->leaveCount($division->id);
            $totalStaffCount += $division->staffCount;
            $totalLeaveCount += $division->leaveCount;

            foreach ($leave_types as $leave_type) {
                $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);

                $totalLeaveTypeCounts[$leave_type->id] = ($totalLeaveTypeCounts[$leave_type->id] ?? 0) + $leaveTypeCount;
            }
        }
        $this->divisions = $divisions;

        $data = [
            'leave_types' => $leave_types,
            'divisions' => $divisions,
            'year' => $this->year,
            'month' => $this->month,
            'totalStaffCount' => $totalStaffCount,
            'totalLeaveCount' => $totalLeaveCount,
            'totalLeaveTypeCounts' => $totalLeaveTypeCounts,
            'YearMonth' => $this->dateRange,
        ];
        
        return view('excel_reports.leave_number_percent_report', $data);
    }
    
    public function staffCount($division)
    {
        return Staff::where("current_division_id", $division)->count();
    }
    public function leaveCount($division)
    {
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        
        foreach ($staffs as $staff) {
            
            $leave = Leave::whereYear('created_at', $this->year)
                ->whereMonth('created_at', $this->month)
                ->where('staff_id', $staff->id)
                ->distinct('staff_id')
                ->count('staff_id');
                // if($staff->id == 3 ){
                //     dd($leave);
                // }
            $totalLeaveCount += $leave;

        }
        return $totalLeaveCount;
    }

    public function leaveType($division, $leave_type_id)
    {
        $totalCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();

        foreach ($staffs as $staff) {
            $leaveCount = Leave::where('staff_id', $staff->id)
                ->where('leave_type_id', $leave_type_id)
                ->whereYear('created_at', $this->year)
                ->whereMonth('created_at', $this->month)

                ->count();
            $totalCount += $leaveCount;
        }

        return $totalCount;
    }

    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(80);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(25);
        $sheet->getRowDimension(3)->setRowHeight(25);
        $sheet->getRowDimension(4)->setRowHeight(25);
        $sheet->getRowDimension(5)->setRowHeight(25);
        $sheet->getRowDimension(7)->setRowHeight(80);
        // $row=6;

       
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(18);
        $sheet->getColumnDimension('C')->setWidth(9);
        $sheet->getColumnDimension('D')->setWidth(12);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(14);
        $sheet->getColumnDimension('G')->setWidth(14);
        $sheet->getColumnDimension('H')->setWidth(12);
        $sheet->getColumnDimension('I')->setWidth(10);
        $sheet->getColumnDimension('J')->setWidth(12);
        $sheet->getColumnDimension('K')->setWidth(14);
        $sheet->getColumnDimension('L')->setWidth(12);

        $sheet->removeRow(6);

        // for ($row =8; $row <= $highestRow ; $row++) {
        //     $sheet->getRowDimension($row)->setRowHeight(24);
        // }

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

        $sheet->getStyle('A3:A4')->applyFromArray([
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

        $sheet->getStyle('A5')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                ],
            ],
        ]);

        $sheet->getStyle("A6:$highestColumn$highestRow")->applyFromArray([
            'font' => ['name' => 'Pyidaungsu', 'size' => 13],
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
