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
    public function mount()
    {
        $this->ranks = (new Rank() )->isDicaAll();
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
