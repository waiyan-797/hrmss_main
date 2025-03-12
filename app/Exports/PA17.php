<?php

namespace App\Exports;

use App\Models\Staff;
use App\Models\PensionYear;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA17 implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA17::all();
    // }
    public $staffs;
    public $pension_year;
    public $rankId;
    public $deptId;
    public $startDate;
    public $age;
    public $ageTwo;
    public $signID;

    public function __construct($rankId, $deptId, $startDate, $age, $ageTwo, $signID)
    {
        $this->rankId = $rankId;
        $this->deptId = $deptId;
        $this->startDate = $startDate;
        $this->age = $age;
        $this->ageTwo = $ageTwo;
        $this->signID = $signID;
    }

    public function view(): View
    {
        $staffQuery = Staff::query();

        // Apply rank filter
        if ($this->rankId) {
            $staffQuery->whereHas('currentRank', function ($query) {
                $query->where('id', $this->rankId);
            });
        }

        // Apply department filter
        if ($this->deptId) {
            $staffQuery->where('current_division_id', $this->deptId);
        }

        // Apply service years (လုပ်သက်) filter
        if (!empty($this->age) && is_numeric($this->age)) {
            $now = now();
            if ($this->signID === '>') {
                // More than X years of service
                $dateLimit = $now->copy()->subYears($this->age);
                $staffQuery->where('government_staff_started_date', '<=', $dateLimit);
            } elseif ($this->signID === '<') {
                // Less than X years of service
                $dateLimit = $now->copy()->subYears($this->age);
                $staffQuery->where('government_staff_started_date', '>', $dateLimit);
            } elseif ($this->signID === '=') {
                // Exactly X years of service
                $startYear = $now->copy()->subYears($this->age + 1);
                $endYear = $now->copy()->subYears($this->age);
                $staffQuery->whereBetween('government_staff_started_date', [$endYear, $startYear]);
            } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                // Between X and Y years of service
                $maxDate = $now->copy()->subYears(min($this->age, $this->ageTwo));
                $minDate = $now->copy()->subYears(max($this->age, $this->ageTwo));
                $staffQuery->whereBetween('government_staff_started_date', [$minDate, $maxDate]);
            }
        }

        $pension_year = PensionYear::where('id', 1)->value('year');
        $this->staffs = $staffQuery->get();
        $this->pension_year = $pension_year;

        return view('excel_reports.staff_report_2', [
            'staffs' => $this->staffs,
            'pension' => $this->pension_year,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // $sheet->getPageSetup()->setScale(80);

        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.18);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet ->getPageMargins()->setBottom(0.67);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setFooter(0.67);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(6.34);
        $sheet->getColumnDimension('B')->setWidth(26.45);
        $sheet->getColumnDimension('C')->setWidth(30.66);
        $sheet->getColumnDimension('D')->setWidth(27.44);
        $sheet->getColumnDimension('E')->setWidth(15.33);
        $sheet->getColumnDimension('F')->setWidth(16.66);
        $sheet->getColumnDimension('G')->setWidth(14.44);
        $sheet->getColumnDimension('H')->setWidth(28.33);
        $sheet->getColumnDimension('I')->setWidth(36.88);
        $sheet->getColumnDimension('J')->setWidth(14.99);
        $sheet->getColumnDimension('K')->setWidth(17.);
        $sheet->getColumnDimension('L')->setWidth(10.77);

        $sheet->getRowDimension(1)->setRowHeight(27);
        $sheet->getRowDimension(2)->setRowHeight(27);

        $sheet->getRowDimension(4)->setRowHeight(75);
        




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
                'bold' =>true,
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
        $sheet->getStyle("A4:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'bold' =>false,
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
