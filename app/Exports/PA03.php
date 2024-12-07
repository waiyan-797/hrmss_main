<?php

namespace App\Exports;

use App\Models\Rank;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;



use Maatwebsite\Excel\Concerns\FromCollection;

class PA03 implements  FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA03::all();
    // }
    public $year; 
    public function view(): View
    {
        
       

        $data = [
            'first_ranks' => Rank::where('staff_type_id', 1)->get(),
            'second_ranks' => Rank::where('staff_type_id', 2)->get(),
          
        ];


        return view('excel_reports.investment_companies_report_3', $data);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Z1000')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 13 , 
            ],
        ]);

        return [];
    }
   
}
