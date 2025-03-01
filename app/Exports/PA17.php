<?php

namespace App\Exports;

use App\Models\Staff;
use App\Models\PensionYear;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA17 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA17::all();
    // }
    public $searchName,$staffs;
    public $pension_year;

    public function __construct($searchName)
    {
        // dd($year, $month, $filterRange, $previousMonthDate, $previousMonth,$nameSearch);
         $this->searchName=$searchName;
        //  $this->staffs=$staffs;
       

    }
    public function view(): View
    {
        $staffQuery = Staff::query();

        
        if ($this->searchName) {
            // $staffQuery->where('name', 'like', '%' . $this->searchName . '%');
            $staffQuery->whereHas('currentRank', function ($query) {
                $query->where('name', 'like', '%' . $this->searchName. '%');
            });
        }
        $pension_year = PensionYear::where('id', 1)->value('year');

        $this->staffs = $staffQuery->get();
        $this->pension_year=$pension_year;

        $staffs = Staff::get();
        $data = [
            'staffs' => $this->staffs ,
            'pension'=>$this->pension_year, 
            
        ];
        return view('excel_reports.staff_report_2', $data);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // $sheet->getPageSetup()->setScale(80);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(6);
        $sheet->getColumnDimension('B')->setWidth(19);
        $sheet->getColumnDimension('C')->setWidth(19);
        $sheet->getColumnDimension('D')->setWidth(19);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(35);
        $sheet->getColumnDimension('J')->setWidth(15);
        $sheet->getColumnDimension('K')->setWidth(10);
        $sheet->getColumnDimension('L')->setWidth(10);

        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(25);

        $sheet->removeRow(3);

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
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);
        

        
    }
}
