<?php

namespace App\Exports;
use App\Models\PensionYear;
use App\Models\Staff;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
class PA16 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA16::all();
    // }
    public $nameSearch, $deptId, $filterDate;
    public $staffs;
    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;
    public $pension_year;
   
    public function __construct($year , $month,
    $filterRange ,
    $previousMonthDate,
    $previousMonth,
    $nameSearch

    )
    {
         $this->filterRange = $filterRange ;
         $this->year  =  $year;
         $this->month  =  $month;
         $this->previousMonthDate  =  $previousMonthDate;
         $this->previousMonth  =  $previousMonth;
         $this->nameSearch=$nameSearch;
       

    }
    public function view(): View
    {
        
    [$year, $month] = explode('-', $this->filterRange);
    $this->year = $year;
    $this->month = $month;

    // Get previous month and year
    $previousMonthDate = Carbon::createFromDate($year, $month)->subMonth();
    $this->previousYear = $previousMonthDate->year;
    $this->previousMonth = $previousMonthDate->month;

    // Build the staff query with conditions
    $staffQuery = Staff::query()->withWhereHas('postings', function ($query) use ($year, $month) {
        $query->whereYear('from_date', '<=', $year)
              ->whereMonth('from_date', '<=', $month);

        if ($this->deptId) {
            $query->where('department_id', $this->deptId);
        }
    });
   
    // dd($this->nameSearch);
    if ($this->nameSearch) {
        $staffQuery->whereHas('currentRank', function ($query) {
            $query->where('name', 'like', '%' . $this->nameSearch . '%');
        });
    }
    $pension_year = PensionYear::where('id', 1)->value('year');

    $this->staffs = $staffQuery->get();
    $staffs = Staff::get();
    // Fetch additional data for the report
    // $pensionYear = PensionYear::first();
    $this->pension_year=$pension_year;

    // Prepare data for the view
    return view('excel_reports.staff_report_1', [
        'staffs' => $this->staffs,
        'pension'=>$this->pension_year,
        'year' => $this->year,
        'month' => $this->month,
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

        $sheet->getPageSetup()->setScale(70);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(4);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(8);
        $sheet->getColumnDimension('F')->setWidth(8);
        $sheet->getColumnDimension('G')->setWidth(8);
        $sheet->getColumnDimension('H')->setWidth(8);
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(10);
        $sheet->getColumnDimension('K')->setWidth(10);

        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(25);
        $sheet->getRowDimension(3)->setRowHeight(25);

        $sheet->removeRow(4);

        for ($row = 4; $row <= $highestRow-1 ; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(28);
        }

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
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
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
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);
        

        // Auto-size columns based on dynamic range
        foreach (range('A', $highestColumn) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Set row heights manually for dynamic rows
        foreach (range(3, $highestRow) as $row) {
            $sheet->getRowDimension($row)->setRowHeight(-1); // Auto-adjust height
        }

        // Define the print area dynamically
        $sheet->getPageSetup()->setPrintArea("A1:$highestColumn$highestRow");

        // Set a margin for better printing output
        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setRight(0.5);
        $sheet->getPageMargins()->setLeft(0.5);
        $sheet->getPageMargins()->setBottom(0.5);
    }
}
