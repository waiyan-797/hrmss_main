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
        // $leaves = Leave::where('staff_id', $this->staff_id)
        //     ->where('leave_type_id', 2)
        //     ->get();
        $leaves = Leave::where('staff_id', $this->staff_id)->whereIn('leave_type_id', [2, 4, 5])->get();

        $data = [
            'staff' => $staff,
            'leaves' => $leaves,
        ];

        return view('excel_reports.leave_date_report', $data);
    }

//     public function styles(Worksheet $sheet)
// {
   
//     $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);
//     $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
//     $sheet->getPageSetup()->setFitToWidth(1);
//     $sheet->getPageSetup()->setFitToHeight(0);
//     $sheet->getPageSetup()->setScale(70);

//     // Set Row Heights
//     $sheet->getRowDimension(1)->setRowHeight(40); 
//     $sheet->getRowDimension(2)->setRowHeight(130);
//     $sheet->getRowDimension(3)->setRowHeight(30);
//     $sheet->getRowDimension(4)->setRowHeight(25);

//     // Merge and Style Main Title
//     $sheet->mergeCells('A1:AA1');
//     $sheet->getStyle('A1:AA1')->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//             'bold' => true,
//         ],
//         'alignment' => [
//             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
//             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
//         ],
//     ]);

  
//     $sheet->getColumnDimension('A')->setWidth(15);
//     $sheet->getColumnDimension('B')->setWidth(7);
//     $sheet->getColumnDimension('C')->setWidth(7);
//     $sheet->getColumnDimension('D')->setWidth(7);
//     $sheet->getColumnDimension('E')->setWidth(7);
    
//     $sheet->getStyle('A4:AA5')->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//             'bold' => true,
//         ],
//         'alignment' => [
//             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
//             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
//             'wrapText' => true,
//         ],
//         'borders' => [
//             'allBorders' => [
//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
//                 'color' => ['argb' => 'FF000000'], // Black border
//             ],
//         ],
//     ]);

    
//     $highestRow = $sheet->getHighestRow();
//     $highestColumn = $sheet->getHighestColumn();

//     $sheet->getStyle("A2:$highestColumn$highestRow")->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//         ],
//         'alignment' => [
//             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
//             'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
//         ],
//         'borders' => [
//             'allBorders' => [
//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
//                 'color' => ['argb' => 'FF000000'], 
//             ],
//         ],
//     ]);
// }
public function styles(Worksheet $sheet)
    {
    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $sheet->getPageSetup()->setScale(95);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'
    $sheet->getColumnDimension('A')->setWidth(12);
    $sheet->getColumnDimension('B')->setWidth(12);
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->getColumnDimension('D')->setWidth(8);
    $sheet->getColumnDimension('E')->setWidth(8);
    $sheet->getColumnDimension('F')->setWidth(8);
    $sheet->getColumnDimension('G')->setWidth(8);
    $sheet->getColumnDimension('H')->setWidth(8);
    $sheet->getColumnDimension('I')->setWidth(8);
    $sheet->getColumnDimension('J')->setWidth(15);
    $sheet->getColumnDimension('K')->setWidth(15);
    $sheet->getColumnDimension('L')->setWidth(10);
    $sheet->getColumnDimension('M')->setWidth(8);
    $sheet->getColumnDimension('N')->setWidth(8);
    $sheet->getColumnDimension('O')->setWidth(8);
    $sheet->getColumnDimension('P')->setWidth(15);
    $sheet->getColumnDimension('Q')->setWidth(15);
    $sheet->getColumnDimension('R')->setWidth(8);
    $sheet->getColumnDimension('S')->setWidth(8);
    $sheet->getColumnDimension('T')->setWidth(8);
    $sheet->getColumnDimension('U')->setWidth(8);
    $sheet->getColumnDimension('V')->setWidth(8);
    $sheet->getColumnDimension('W')->setWidth(15);
    $sheet->getColumnDimension('X')->setWidth(15);
    $sheet->getColumnDimension('Y')->setWidth(10);
    $sheet->getColumnDimension('Z')->setWidth(10);
    $sheet->getColumnDimension('AA')->setWidth(12);
  

    $sheet->getRowDimension(1)->setRowHeight(30);
    $sheet->getRowDimension(2)->setRowHeight(130);
    $sheet->getRowDimension(3)->setRowHeight(30);
    $sheet->getRowDimension(4)->setRowHeight(30);
    $sheet->getRowDimension(5)->setRowHeight(30);
    $sheet->getRowDimension(6)->setRowHeight(30);
    $sheet->getRowDimension(7)->setRowHeight(30);
    $sheet->getRowDimension(8)->setRowHeight(30);
    $sheet->getRowDimension(9)->setRowHeight(30);
    $sheet->getRowDimension(10)->setRowHeight(30);
    $sheet->getRowDimension(11)->setRowHeight(30);
    $sheet->getRowDimension(12)->setRowHeight(30);
    $sheet->getRowDimension(13)->setRowHeight(30);
    $sheet->getRowDimension(14)->setRowHeight(30);
    $sheet->getRowDimension(15)->setRowHeight(30);
    $sheet->getRowDimension(16)->setRowHeight(30);
    $sheet->getRowDimension(17)->setRowHeight(30);
    $sheet->getRowDimension(18)->setRowHeight(30);
   
    $sheet->getStyle('A1:AA1')->applyFromArray([
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
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);
    $sheet->getStyle('A2')->applyFromArray([
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
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);
    $sheet->getStyle("A2:$highestColumn$highestRow")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 12,
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
