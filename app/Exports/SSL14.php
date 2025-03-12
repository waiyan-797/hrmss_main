<?php

namespace App\Exports;

use App\Models\Rank;
use App\Models\Staff;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class SSL14 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return SSL14::all();
    // }
    public $age, $ageTwo, $signID, $selectedRankId, $staffs, $ranks;

    public function __construct($age = null, $ageTwo = null, $signID = null, $selectedRankId = null)
    {
        $this->age = $age;
        $this->ageTwo = $ageTwo;
        $this->signID = $signID;
        $this->selectedRankId = $selectedRankId;
        $this->ranks = (new Rank())->isDicaAll();
    }

    public function mount()
    {
        // $this->ranks = (new Rank())->isDicaAll();
    }
    public function view(): View
    {
        $now = Carbon::now();
    $query = Staff::query();
    if (!empty($this->age) && is_numeric($this->age)) {
        $currentRankDate = $now->copy()->subYears($this->age);
        if ($this->signID === '>') {
            $query->where('current_rank_date', '<=', $currentRankDate);
        } elseif ($this->signID === '<') {
            $query->where('current_rank_date', '>', $currentRankDate);
        } elseif ($this->signID === '=') {
            $query->whereYear('current_rank_date', '=', $currentRankDate->year);
        } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
            $currentRankDateFrom = $now->copy()->subYears($this->age);
            $currentRankDateTo = $now->copy()->subYears($this->ageTwo);
            $query->whereBetween('current_rank_date', [$currentRankDateTo, $currentRankDateFrom]);
        }
    }
    if (!empty($this->selectedRankId)) {
        $query->where('current_rank_id', $this->selectedRankId);
    }
    $this->staffs = $query->with('currentRank')->get();
    $selectedRankName = null;
    if (!empty($this->selectedRankId)) {
        $selectedRankName = Rank::find($this->selectedRankId)?->name ?? 'ရာထူးအားလုံး';
    }

    if (!function_exists('getSignName')) {
        function getSignName($signID)
        {
            return match ($signID) {
                'all' => 'အားလုံး',
                'between' => 'နှစ်ကြား',
                '>' => 'နှစ်အထက်',
                '=' => 'နှစ်',
                '<' => 'နှစ်အောက်',
                default => '',
            };
        }
    }

        return view('excel_reports.current_position', [
            'staffs' => $this->staffs,
            'ranks' => $this->ranks,
            'age' => $this->age,
            'signID' => $this->signID,
            'selectedRankName' => $selectedRankName, 
        ]);
    }
    public function styles(Worksheet $sheet)
    {

    $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
    $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

    //defining margin
    $sheet->getPageMargins()->setTop(0.75);
    $sheet->getPageMargins()->setRight(right: 0.18);
    $sheet->getPageMargins()->setLeft(0.7);
    $sheet->getPageMargins()->setBottom(0.67);

    // Fit to page width
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);
    $sheet->getPageSetup()->setScale(70);
    $sheet->setShowGridlines(true);
    $highestRow = $sheet->getHighestRow(); // e.g. 19
    $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

    $sheet->getColumnDimension('A')->setWidth(6.28);
    $sheet->getColumnDimension('B')->setWidth(26.42);
    $sheet->getColumnDimension('C')->setWidth(30.71);
    $sheet->getColumnDimension('D')->setWidth(15.46);
    $sheet->getColumnDimension('E')->setWidth(16.71);
    $sheet->getColumnDimension('F')->setWidth(14.42);
    $sheet->getColumnDimension('G')->setWidth(29.46);
    $sheet->getColumnDimension('H')->setWidth(36.85);
    $sheet->getColumnDimension('I')->setWidth(width: 18);


    $sheet->getRowDimension(1)->setRowHeight(27);
    $sheet->getRowDimension(2)->setRowHeight(27);
    $sheet->getRowDimension(3)->setRowHeight(75);

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
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 
            ],
        ],
    ]);
    $sheet->getStyle('A3:I3')->applyFromArray([
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
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 
            ],
        ],
    ]);
    $sheet->getStyle("A3:$highestColumn$highestRow")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'wrapText' => true,

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
    $sheet->getStyle("B4:B$highestRow")->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
            'wrapText' => true,

        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Custom alignment for A and B
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'indent' => 1
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
