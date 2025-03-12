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

    public $year, $month, $filterRange;
    public $previousMonthDate, $previousMonth, $previousYear;
    public $staffs;
    public $rankId;
    public $divId;
    public $pension_year;

    public function __construct($year, $month, $filterRange, $previousMonthDate, $previousMonth, $staffs)
{
    $this->year = $year;
    $this->month = $month;
    $this->filterRange = $filterRange;
    $this->previousMonthDate = $previousMonthDate;
    $this->previousMonth = $previousMonth;
    $this->staffs = $staffs;  // Make sure this is correctly passed and assigned
}
    // public function view(): View
    // {

    // [$year, $month] = explode('-', $this->filterRange);
    // $this->year = $year;
    // $this->month = $month;

    // // Get previous month and year
    // $previousMonthDate = Carbon::createFromDate($year, $month)->subMonth();
    // $this->previousYear = $previousMonthDate->year;
    // $this->previousMonth = $previousMonthDate->month;

    
    // $staffQuery = Staff::query()->withWhereHas('postings', function ($query) use ($year, $month) {
    //     $query->whereYear('from_date', '<=', $year)
    //           ->whereMonth('from_date', '<=', $month);

    //     if ($this->deptId) {
    //         $query->where('department_id', $this->deptId);
    //     }
    //     if($this->rankId){
    //         $query->where('rank_id', $this->rankId);
    //     }
    // });

    // if ($this->deptId) {
    //     $staffQuery->where('current_department_id', $this->deptId);
    // }
    // if ($this->rankId) {
    //     $staffQuery->where('current_rank_id', $this->rankId);
    // }
    // $pension_year = PensionYear::where('id', 1)->value('year');

    // $this->staffs = $staffQuery->get();
    // $staffs = Staff::get();
    
    // $this->pension_year=$pension_year;

    // // Prepare data for the view
    // return view('excel_reports.staff_report_1', [
    //     'staffs' => $this->staffs,
    //     'pension'=>$this->pension_year,
    //     'year' => $this->year,
    //     'month' => $this->month,
    // ]);
    // }
    public function view(): View
    {
        // Extract year and month from the filter range
        [$year, $month] = explode('-', $this->filterRange);
        $this->year = $year;
        $this->month = $month;
    
        // Get previous month and year
        $previousMonthDate = Carbon::createFromDate($year, $month)->subMonth();
        $this->previousYear = $previousMonthDate->year;
        $this->previousMonth = $previousMonthDate->month;
    
        // Use the filtered staff data passed via constructor
        $staffs = $this->staffs;
    
        // Get pension year
        $pension_year = PensionYear::where('id', 1)->value('year');
        $this->pension_year = $pension_year;
    
        // Return the view with the staff data and pension year
        return view('excel_reports.staff_report_1', [
            'staffs' => $staffs,
            'pension' => $this->pension_year,
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

        $sheet->getColumnDimension('A')->setWidth(6.45);
        $sheet->getColumnDimension('B')->setWidth(27.67);
        $sheet->getColumnDimension('C')->setWidth(21.45);
        $sheet->getColumnDimension('D')->setWidth(28.11);
        $sheet->getColumnDimension('E')->setWidth(16.56);
        $sheet->getColumnDimension('F')->setWidth(16.67);
        $sheet->getColumnDimension('G')->setWidth(15.34);
        $sheet->getColumnDimension('H')->setWidth(17.45);
        $sheet->getColumnDimension('I')->setWidth(31.67);
        $sheet->getColumnDimension('J')->setWidth(37.67);
        $sheet->getColumnDimension('K')->setWidth(17.45);

        $sheet->getRowDimension(1)->setRowHeight(27);
        $sheet->getRowDimension(2)->setRowHeight(27);
        $sheet->getRowDimension(3)->setRowHeight(75);
        $sheet->getRowDimension(4)->setRowHeight(75);
        // $sheet->getRowDimension(5)->setRowHeight(52.5);
        // $sheet->getRowDimension(6)->setRowHeight(51.8);
        // $sheet->getRowDimension(7)->setRowHeight(54.8);
        // $sheet->getRowDimension(8)->setRowHeight(59.3);
        // $sheet->getRowDimension(9)->setRowHeight(80.3);
        // $sheet->getRowDimension(10)->setRowHeight(78.8);
        // $sheet->getRowDimension(11)->setRowHeight(48.8);
        // $sheet->getRowDimension(12)->setRowHeight(48.8);
        // $sheet->getRowDimension(13)->setRowHeight(49.5);
        // $sheet->getRowDimension(14)->setRowHeight(54.8);
        // $sheet->getRowDimension(15)->setRowHeight(57);
        // $sheet->getRowDimension(16)->setRowHeight(49.5);
        // $sheet->getRowDimension(17)->setRowHeight(75.8);
        // $sheet->getRowDimension(18)->setRowHeight(81);
        // $sheet->getRowDimension(19)->setRowHeight(61.5);
        // $sheet->getRowDimension(20)->setRowHeight(102);
        // $sheet->getRowDimension(21)->setRowHeight(48.8);
        // $sheet->getRowDimension(22)->setRowHeight(48.8);
        // $sheet->getRowDimension(23)->setRowHeight(48.8);
        // $sheet->getRowDimension(24)->setRowHeight(79.5);
        // $sheet->getRowDimension(25)->setRowHeight(97.5);
        // $sheet->getRowDimension(26)->setRowHeight(54.8);
        // $sheet->getRowDimension(27)->setRowHeight(70.5);
        // $sheet->getRowDimension(28)->setRowHeight(48.8);
        // $sheet->getRowDimension(29)->setRowHeight(72);


        $sheet->removeRow(3);

        // for ($row = 4; $row <= $highestRow-1 ; $row++) {
        //     $sheet->getRowDimension($row)->setRowHeight(28);
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

        $sheet->getStyle("A3:{$highestColumn}3")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 13,
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, // Default gridline
                    'color' => ['argb' => 'FF000000'], 
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
        // foreach (range('A', $highestColumn) as $column) {
        //     $sheet->getColumnDimension($column)->setAutoSize(true);
        // }

        // Set row heights manually for dynamic rows
        // foreach (range(3, $highestRow) as $row) {
        //     $sheet->getRowDimension($row)->setRowHeight(-1); // Auto-adjust height
        // }

        // Define the print area dynamically
        $sheet->getPageSetup()->setPrintArea("A1:$highestColumn$highestRow");

        // Set a margin for better printing output
        $sheet->getPageMargins()->setTop(0.748031496062992);
        $sheet->getPageMargins()->setRight(0.1968);
        $sheet->getPageMargins()->setLeft(0.7086);
        $sheet->getPageMargins()->setBottom(0.6692);
        $sheet->getPageMargins()->setHeader(0.3149);       
        $sheet->getPageMargins()->setFooter(0.6692);
    }
}
