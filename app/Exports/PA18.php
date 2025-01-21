<?php

namespace App\Exports;

use App\Models\Staff;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;

class PA18 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA18::all();
    // }
    public function view(): ViewView
    {
        $staffs=Staff::FromNPt()->get();
        $data = [
            'staffs' => $staffs,
        ];
        return view('excel_reports.staff_in_npt_report', $data);
    }
    public function styles(Worksheet $sheet)
    {
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
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        foreach (range('A', 'F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [];
    }

}
