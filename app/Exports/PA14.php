<?php

namespace App\Exports;

use App\Models\Rank;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;

class PA14 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA14::all();
    // }
    public function view(): View
    {
        $yinn_1 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 1);
        });

        $yinn_2 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 2);
        });

        $yinn_3 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 3);
        });

        $yinn_4 = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 4);
        });

        $si_man =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 11);
        });

        $mu_warda =  Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 8);
        });

        $yinn_mhyint_tin = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 7);
        });

        $yinn_kyee_kyat = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 5);
        });

        $si_man_kaine = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 6);
        });

        $company = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 9);
        });

        $hr = Rank::whereHas('staffs', function($query){
            return $query->where('current_division_id', 10);
        });

        $total = Rank::whereHas('staffs', function($query){
            return $query->whereIn('current_division_id', [1, 2, 3, 4, 11, 8, 7, 5, 6, 9, 10]);
        });
        $ranks = Rank::get();
        $data = [
            'ranks' => $ranks,
            'si_man' => $si_man,
            'yinn_1' => $yinn_1,
            'yinn_2' => $yinn_2,
            'yinn_3' => $yinn_3,
            'yinn_4' => $yinn_4,
            'mu_warda' => $mu_warda,
            'yinn_mhyint_tin' => $yinn_mhyint_tin,
            'yinn_kyee_kyat' => $yinn_kyee_kyat,
            'si_man_kaine' => $si_man_kaine,
            'company' => $company,
            'hr' => $hr,
            'total' => $total,
        ];
        return view('excel_reports.investment_companies_report_14', $data);
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
