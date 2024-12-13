<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SSL03 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return SSL03::all();
    // }
    public $ranks;
    public $posting;
    public $selectedRankId= null ;
    public function view(): View
    {
        $staffs = Staff::with('postings', 'currentRank')->get();
        // $staffs = Staff::when(

        //     $this->selectedRankId  , function($q){
        //         return $q->where('current_rank_id' , $this->selectedRankId) ;
        //     }
        // );
        $data = [
          'staffs' => $staffs,
        ];
        return view('excel_reports.staff_list_report_4', $data);
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
    $sheet->getStyle('A1:T100')->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '000000'], // Black border
            ],
        ],
    ]);

    // Auto-size columns for the table
    foreach (range('A', 'F') as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    return [];
}
}
