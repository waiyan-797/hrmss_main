<?php

namespace App\Exports;

use App\Models\Staff;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class SSL15 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
   

//     public $age, $ageTwo, $signID, $staffs, $ranks;
   
//     public function view(): View
// {
//     $now = Carbon::now();
//         $query = Staff::query();
//         if (!empty($this->age) && is_numeric($this->age)) {
//             $birthDate = $now->copy()->subYears($this->age);

//             if ($this->signID === '>') {
//                 $query->where('dob', '<=', $birthDate);
//             } elseif ($this->signID === '<') {
//                 $query->where('dob', '>', $birthDate);
//             } elseif ($this->signID === '=') {
//                 $query->whereYear('dob', '=', $birthDate->year);
//             } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
//                 $birthDateFrom = $now->copy()->subYears($this->age);
//                 $birthDateTo = $now->copy()->subYears($this->ageTwo);
//                 $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
//             }
//         }

//         $this->staffs = $query->get();

//     return view('excel_reports.staff_by_age', [
//         'staffs' => $query->get(),
//         'age' => $this->age,
//         'signID' => $this->signID,
//     ]);
// }
public $age, $ageTwo, $signID;

    public function __construct($age, $ageTwo, $signID)
    {
        $this->age = $age;
        $this->ageTwo = $ageTwo;
        $this->signID = $signID;
    }

    public function view(): View
    {
        $now = Carbon::now();
        $query = Staff::query();

        if (!empty($this->age) && is_numeric($this->age)) {
            $birthDate = $now->copy()->subYears($this->age);

            if ($this->signID === '>') {
                $query->where('dob', '<=', $birthDate);
            } elseif ($this->signID === '<') {
                $query->where('dob', '>', $birthDate);
            } elseif ($this->signID === '=') {
                $query->whereYear('dob', '=', $birthDate->year);
            } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                $birthDateFrom = $now->copy()->subYears($this->age);
                $birthDateTo = $now->copy()->subYears($this->ageTwo);
                $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
            }
        }

        return view('excel_reports.staff_by_age', [
            'staffs' => $query->get(),
            'age' => $this->age,
            'signID' => $this->signID,
        ]);
    }
    public function styles(Worksheet $sheet)
    {

    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);
    $sheet->getPageSetup()->setScale(85);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(7);
    $sheet->getColumnDimension('B')->setWidth(25);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(25);
    $sheet->getColumnDimension('F')->setWidth(25);
    $sheet->getColumnDimension('G')->setWidth(60);
    $sheet->getColumnDimension('H')->setWidth(40);
    $sheet->getColumnDimension('I')->setWidth(20);


    $sheet->getRowDimension(1)->setRowHeight(20);
    $sheet->getRowDimension(2)->setRowHeight(20);
    $sheet->getRowDimension(3)->setRowHeight(60);
    $sheet->getRowDimension(4)->setRowHeight(40);
    $sheet->getRowDimension(5)->setRowHeight(40);
    $sheet->getRowDimension(6)->setRowHeight(40);
    $sheet->getRowDimension(7)->setRowHeight(40);
    $sheet->getRowDimension(8)->setRowHeight(40);
    $sheet->getRowDimension(9)->setRowHeight(40);
    $sheet->getRowDimension(10)->setRowHeight(40);
    $sheet->getRowDimension(11)->setRowHeight(40);
    $sheet->getRowDimension(12)->setRowHeight(40);
    $sheet->getRowDimension(13)->setRowHeight(40);
    $sheet->getRowDimension(14)->setRowHeight(40);
    $sheet->getStyle('A1:I2')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->getStyle('A3')->applyFromArray([
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
    $sheet->getStyle('A3')->applyFromArray([
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
    $sheet->getStyle("A3:$highestColumn$highestRow")->applyFromArray([
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
