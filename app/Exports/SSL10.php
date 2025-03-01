<?php

namespace App\Exports;

use App\Models\DivisionType;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;


class SSL10 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return SSL10::all();
    // }
    public $staff_type_id=3;
    public $divisionTypes;
    public $selectedDivisionTypeId = 3;
    public $title = 'ရုံးချုပ်'; 
    public function mount(){
        $this->divisionTypes =DivisionType::all();
    }
    public function __construct($selectedDivisionTypeId = 3)
    {
        $this->selectedDivisionTypeId = $selectedDivisionTypeId;
        $this->setTitle();
    }
    private function setTitle()
    {
        if ($this->selectedDivisionTypeId != 3) {
            $divisionType = DivisionType::find($this->selectedDivisionTypeId);
            $this->title = $divisionType && $divisionType->id == 2
                ? 'တိုင်းဒေသကြီး၊ ပြည်နယ်ဦးစီးမှုးရုံး'
                : 'ရုံးချုပ်';
        }
    }
    public function view(): View
    {
        $staffs = Staff::Labour()
            ->whereHas('current_division', function ($query) {
                $query->whereHas('divisionType', function ($subQuery) {
                    $subQuery->whereIn('id', $this->selectedDivisionTypeId == 3 ? [1, 2] : [$this->selectedDivisionTypeId]);
                });
            })->get();

        return view('excel_reports.labour_staff_report', [
            'staffs' => $staffs,
            'title' => $this->title,
        ]);
    }
    public function styles(Worksheet $sheet)
    {

    // Set paper size and orientation
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4); // Set paper size to A4
    $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $sheet->getPageSetup()->setScale(75);

    // Enable gridlines for unbordered areas
    $sheet->setShowGridlines(true);
    // $sheet->setPrintGridlines(true);

    // Dynamically calculate the highest row and column
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(25);
    $sheet->getColumnDimension('E')->setWidth(20);
    $sheet->getColumnDimension('F')->setWidth(20);
    $sheet->getColumnDimension('G')->setWidth(25);
    $sheet->getColumnDimension('H')->setWidth(25);
    $sheet->getColumnDimension('I')->setWidth(25);
  
   

    $sheet->getRowDimension(1)->setRowHeight(30);
    $sheet->getRowDimension(2)->setRowHeight(60);
    $sheet->getRowDimension(3)->setRowHeight(50);
    $sheet->getRowDimension(5)->setRowHeight(40);
    $sheet->getRowDimension(7)->setRowHeight(25);
    // $sheet->getRowDimension(8)->setRowHeight(20);
    // $sheet->getRowDimension(8)->setRowHeight(120);


    $sheet->removeRow(4);
    // $sheet->removeRow(9);

    $row=4;

    $sheet->getStyle('A1:I4')->applyFromArray([
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
    $sheet->getStyle('A2')->applyFromArray([
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
    $sheet->getStyle("A2:$highestColumn$highestRow")->applyFromArray([
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
