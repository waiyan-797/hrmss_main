<?php

namespace App\Exports;

// use App\Models\CS;

use App\Models\Promotion;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class CS implements FromView ,WithStyles
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // // public function collection()
    // // {
    // //     return CS::all();
    // // }
    public $staff_id;
    // public function mount($staff_id = 0){
    //     $this->staff_id = $staff_id;
    // }
    public function __construct($staff_id = 0)
{
    $this->staff_id = $staff_id;
}

    private function promotion_stages($rank_id){
        return Promotion::where('rank_id', $rank_id)->where('staff_id', $this->staff_id)->first();
    }
    private function calc_points($diff)
    {
        $points = $diff->y; // Start with years
    
        if ($diff->m >= 6) {
            $points++; // Add 1 if months >= 6
        } else {
            return ['points' => $points, 'remaining_months' => $diff->m, 'remaining_days' => $diff->d];
        }
    
        return ['points' => $points, 'remaining_months' => 0, 'remaining_days' => 0];
    }
    public function view(): View
    {
       
        $today = \Carbon\Carbon::now();
        $staff = Staff::where('id', $this->staff_id)->first();
        $promotions = Promotion::where('staff_id', $this->staff_id)->get();
        $first_promotion = $this->promotion_stages($staff->current_rank_id);
        $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
        $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
        $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;
        $first_result = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
        $first_promotion_points = $first_result['points'];
        $remaining_months = $first_result['remaining_months'];
        $remaining_days = $first_result['remaining_days'];
        $second_result = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : ['points' => 0, 'remaining_months' => 0, 'remaining_days' => 0];
        $second_promotion_points = $second_result['points'] + floor($remaining_months / 6);
        $remaining_months = ($remaining_months % 6) + $second_result['remaining_months'];
        $remaining_days += $second_result['remaining_days'];
        $third_result = $third_promotion ? $this->calc_points(dateDiff        ($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : ['points' => 0, 'remaining_months' => 0, 'remaining_days' => 0];
        $third_promotion_points = $third_result['points'] + floor($remaining_months / 6);
        $remaining_months = ($remaining_months % 6) + $third_result['remaining_months'];
        $remaining_days += $third_result['remaining_days'];

        $fourth_result = $fourth_promotion ? $this->calc_points(dateDiff           ($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : ['points' => 0, 'remaining_months' => 0, 'remaining_days' => 0];
        $fourth_promotion_points = $fourth_result['points'] + floor($remaining_months / 6);
        $remaining_months = ($remaining_months % 6) + $fourth_result['remaining_months'];
        $remaining_days += $fourth_result['remaining_days'];
        $total_points = $first_promotion_points + $second_promotion_points +         $third_promotion_points + $fourth_promotion_points;
        return view('excel_reports.calculation_system',[
            'staff' => $staff,
            'promotions' => $promotions,
            'today' => $today,
            'first_promotion' => $first_promotion,
            'second_promotion' => $second_promotion,
            'third_promotion' => $third_promotion,
            'fourth_promotion' => $fourth_promotion,
            'first_promotion_points' => $first_promotion_points,
            'second_promotion_points' => $second_promotion_points,
            'third_promotion_points' => $third_promotion_points,
            'fourth_promotion_points' => $fourth_promotion_points,
            'total_points' => $total_points,

        ]);
    }
    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetUp::ORIENTATION_LANDSCAPE); // Set orientation to Landscape
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setBottom(0.75);
        $sheet->getPageMargins()->setFooter(0.3);


        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageSetup()->setScale(60);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow() - 1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(30);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getRowDimension(1)->setRowHeight(27);
        $sheet->getRowDimension(2)->setRowHeight(27);
        $sheet->getRowDimension(3)->setRowHeight(30);
        $sheet->getRowDimension(4)->setRowHeight(30);
        $sheet->getRowDimension(5)->setRowHeight(30);
        $sheet->getRowDimension(6)->setRowHeight(30);
        $sheet->getRowDimension(7)->setRowHeight(30);
        $sheet->getRowDimension(8)->setRowHeight(30);

        for ($row = 9; $row <= $highestRow + 1; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(25.5);


        }
        // $sheet->removeRow(4);

        $sheet->getStyle('A1:A12')->applyFromArray([
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

        $sheet->getStyle('A5')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                ],
            ],
        ]);
        $sheet->getStyle("A5:$highestColumn$highestRow")->applyFromArray([
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
