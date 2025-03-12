<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class A04 implements FromView, WithStyles
{
    protected $selectedRankId;
    protected $age;
    protected $ageTwo;
    protected $signID;
    protected $selectedEthnicId;
    protected $selectedReligionId;
    protected $selectedGenderId;
    protected $selectedMaritalId;

    public function __construct($selectedRankId = null, $age = null, $ageTwo = null, $signID = 'all',
                              $selectedEthnicId = null, $selectedReligionId = null, 
                              $selectedGenderId = null, $selectedMaritalId = null)
    {
        $this->selectedRankId = $selectedRankId;
        $this->age = $age;
        $this->ageTwo = $ageTwo;
        $this->signID = $signID;
        $this->selectedEthnicId = $selectedEthnicId;
        $this->selectedReligionId = $selectedReligionId;
        $this->selectedGenderId = $selectedGenderId;
        $this->selectedMaritalId = $selectedMaritalId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $query = Staff::query();

        // Apply all filters together
        if ($this->selectedRankId) {
            $query->where('current_rank_id', $this->selectedRankId);
        }

        if ($this->age || $this->signID !== 'all') {
            switch ($this->signID) {
                case 'between':
                    if ($this->age && $this->ageTwo) {
                        $startDate = now()->subYears($this->ageTwo);
                        $endDate = now()->subYears($this->age);
                        $query->whereBetween('current_rank_date', [$startDate, $endDate]);
                    }
                    break;
                case '>':
                    if ($this->age) {
                        $date = now()->subYears($this->age);
                        $query->where('current_rank_date', '<', $date);
                    }
                    break;
                case '=':
                    if ($this->age) {
                        $startDate = now()->subYears($this->age)->startOfYear();
                        $endDate = now()->subYears($this->age)->endOfYear();
                        $query->whereBetween('current_rank_date', [$startDate, $endDate]);
                    }
                    break;
                case '<':
                    if ($this->age) {
                        $date = now()->subYears($this->age);
                        $query->where('current_rank_date', '>', $date);
                    }
                    break;
            }
        }

        if ($this->selectedEthnicId) {
            $query->where('ethnic_id', $this->selectedEthnicId);
        }

        if ($this->selectedReligionId) {
            $query->where('religion_id', $this->selectedReligionId);
        }

        if ($this->selectedGenderId) {
            $query->where('gender_id', $this->selectedGenderId);
        }

        if ($this->selectedMaritalId) {
            if ($this->selectedMaritalId == '1') { // ရှိ
                $query->whereNotNull('spouse_name');
            } else { // မရှိ
                $query->whereNull('spouse_name');
            }
        }

        $staffs = $query->with([
            'currentRank', 
            'ethnic', 
            'religion',
            'gender',
            'current_address_region', 
            'current_address_township_or_town',
            'permanent_address_region', 
            'permanent_address_township_or_town',
            'children'
        ])->get();

        return view('excel_reports.report_2', [
            'staffs' => $staffs
        ]);
    }
    public function styles(Worksheet $sheet)
    {

    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);
    $sheet->getPageSetup()->setScale(80);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(6.57);
    $sheet->getColumnDimension('B')->setWidth(24.28);
    $sheet->getColumnDimension('C')->setWidth(23);
    $sheet->getColumnDimension('D')->setWidth(16.57);
    $sheet->getColumnDimension('E')->setWidth(18.42);
    $sheet->getColumnDimension('F')->setWidth(11.14);
    $sheet->getColumnDimension('G')->setWidth(16.57);
    $sheet->getColumnDimension('H')->setWidth(25);
    $sheet->getColumnDimension('I')->setWidth(23.93);
    $sheet->getColumnDimension('J')->setWidth(9.14);
    $sheet->getColumnDimension('K')->setWidth(9.42);
    $sheet->getColumnDimension('L')->setWidth(8);
    $sheet->getColumnDimension('M')->setWidth(14.85);


    $sheet->getRowDimension(1)->setRowHeight(32.25);
    $sheet->getRowDimension(2)->setRowHeight(32.25);
    $sheet->getRowDimension(3)->setRowHeight(32.25);
    $sheet->getRowDimension(4)->setRowHeight(32.25);
    $sheet->getRowDimension(5)->setRowHeight(51.75);
    $sheet->getRowDimension(6)->setRowHeight(24.75);
    
    $sheet->getStyle('A1:M3')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    
    $sheet->getStyle('A4:M4')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT, // Right align for row 4
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
    ]);
    $sheet->getStyle('A5')->applyFromArray([
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
   
    $sheet->getStyle("A5:M6")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'bold'=> true,
            'size' => 13,
        ],
        'alignment' => [
            'horizontal'=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);
    $sheet->getStyle('A5')->applyFromArray([
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

    //defining margin
    $sheet->getPageMargins()->setTop(0.5);
    $sheet->getPageMargins()->setRight(right: 0.5);
    $sheet->getPageMargins()->setLeft(0.5);
    $sheet->getPageMargins()->setBottom(0.5);

    $sheet->getStyle("A5:$highestColumn$highestRow")
    ->applyFromArray([
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
    $sheet->getStyle("B7:B$highestRow")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
        'alignment' => [
            'horizontal'=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'indent'=>1
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, 
            ],
        ],
    ]);
    }
}
