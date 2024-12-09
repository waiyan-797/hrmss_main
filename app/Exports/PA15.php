<?php

namespace App\Exports;

use App\Models\Rank;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;

class PA15 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA15::all();
    // }
    public function view(): View
    {
        $yangon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 23);
        });

        $nay_pyi_thaw = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 26);
        });

        $mandalay = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 20);
        });

        $shan = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 24);
        });

        $mon = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 21);
        });

        $aya = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 25);
        });

        $sagaing = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 16);
        });

        $tanindaryi = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 17);
        });

        $kayin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 14);
        });

        $bago = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 18);
        });

        $magway = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 19);
        });

        $kayah = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 13);
        });

        $kachin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 12);
        });

        $rakhine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 22);
        });

        $chin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 15);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [23, 26, 20, 24, 21, 25, 16, 17, 14, 18, 19, 13, 12, 22, 15]);
        });

        $ranks = Rank::get();
       
        $data = [
            'yangon' => $yangon,
            'nay_pyi_thaw' => $nay_pyi_thaw,
            'mandalay' => $mandalay,
            'shan' => $shan,
            'mon' => $mon,
            'aya' => $aya,
            'sagaing' => $sagaing,
            'tanindaryi' => $tanindaryi,
            'kayin' => $kayin,
            'bago' => $bago,
            'magway' => $magway,
            'kayah' => $kayah,
            'kachin' => $kachin,
            'rakhine' => $rakhine,
            'chin' => $chin,
            'total' => $total,
            'ranks' => $ranks,
        ];
        return view('excel_reports.investment_companies_report_15', $data);
    }
public function styles(Worksheet $sheet)
{
    // Apply global font style
    $sheet->getStyle('A1:Z1000')->applyFromArray([
        'font' => [
            'name' => 'Pyidaungsu',
            'size' => 13,
        ],
    ]);

    // Apply borders to all cells with black border
    $sheet->getStyle('A1:AL100')->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '000000'], // Black border
            ],
        ],
    ]);

    // Auto-size columns for the table
    foreach (range('A', 'AL') as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    return [];
}
}
