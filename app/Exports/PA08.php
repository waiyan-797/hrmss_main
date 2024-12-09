<?php

namespace App\Exports;

use App\Models\Rank;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PA08 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA08::all();
    // }
    public function view(): View
    {
        
        $first_ranks = Rank::where('staff_type_id', 1)
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $second_ranks = Rank::where('staff_type_id', 2)
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $third_ranks = Rank::where('staff_type_id', 3)
        ->withCount(['staffs' => function ($query) {
            $query->where('current_division_id', '26');
        }])
        ->get();

    $all_ranks = Rank::get();

        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ];


        return view('excel_reports.investment_companies_report_8', $data);
    }


    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Z1000')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 13 , 
                'color' => ['argb' => '000000'], 
            ],
        ]);

        return [];
    }
    
}
