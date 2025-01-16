<?php

namespace App\Exports;
use App\Models\Leave;
use App\Models\Staff;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup as WorksheetPageSetup;

class L4 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return L4::all();
    // }
    public $staff_id;

    public function __construct($staff_id = 0)
    {
        $this->staff_id = $staff_id;
    }

    public function view(): View
    {
        $staff = Staff::find($this->staff_id);
        $leaves = Leave::where('staff_id', $this->staff_id)
            ->where('leave_type_id', 2)
            ->get();

        $data = [
            'staff' => $staff,
            'leaves' => $leaves,
        ];

        return view('excel_reports.leave_date_report', $data);
    }

    public function styles(Worksheet $sheet)
{
   
    $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);
    $sheet->getPageSetup()->setScale(70);

    // Set Row Heights
    $sheet->getRowDimension(1)->setRowHeight(40); 
    $sheet->getRowDimension(2)->setRowHeight(130);
    $sheet->getRowDimension(3)->setRowHeight(30);
    $sheet->getRowDimension(4)->setRowHeight(25);

    // Merge and Style Main Title
    $sheet->mergeCells('A1:AA1');
    $sheet->getStyle('A1:AA1')->applyFromArray([
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

  
    $sheet->getColumnDimension('A')->setWidth(15);
    $sheet->getColumnDimension('B')->setWidth(7);
    $sheet->getColumnDimension('C')->setWidth(7);
    $sheet->getColumnDimension('D')->setWidth(7);
    $sheet->getColumnDimension('E')->setWidth(7);
    
    $sheet->getStyle('A4:AA5')->applyFromArray([
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




   


}
