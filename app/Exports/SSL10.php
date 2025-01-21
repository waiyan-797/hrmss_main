<?php

namespace App\Exports;

use App\Models\DivisionType;
use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SSL10 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return SSL10::all();
    // }


    // public  $staff_type_id ;
    // public $divisionTypes ; 
    // public $selectedDivisionTypeId  = 3 ;
    // public $title ; 
    // public function view(): View
    // {
    //     if($this->selectedDivisionTypeId != 3 ){
    //         $this->title = DivisionType::find($this->selectedDivisionTypeId)->id == 2 ? 'တိုင်းဒေသကြီး၊ ပြည်နယ်ဦးစီးမှုးရုံး' : 'ရုံးချုပ်';

    //     }

    //     $staffs = Staff::Labour() 
        
    //     ->whereHas('current_division', function ($query) {
    //         $query->whereHas('divisionType', 
    //     function($subQuery){
    //         $subQuery->where('id' , $this->selectedDivisionTypeId == 3 ? [ 1, 2 ]  : $this->selectedDivisionTypeId );
    //     }
    //     ); 
        
    //     });
    //     return view('excel_reports.labour_staff_report',compact('staffs' ));
    // }

    public $staff_type_id;
    public $divisionTypes;
    public $selectedDivisionTypeId = 3;
    public $title = 'ရုံးချုပ်'; // Default title

    public function __construct($selectedDivisionTypeId = 3)
    {
        $this->selectedDivisionTypeId = $selectedDivisionTypeId;
        $this->setTitle();
    }

    private function setTitle()
    {
        if ($this->selectedDivisionTypeId != 3) {
            $divisionType = DivisionType::find($this->selectedDivisionTypeId);
            $this->title = $divisionType && $divisionType->id == 2
                ? 'တိုင်းဒေသကြီး၊ ပြည်နယ်ဦးစီးမှုးရုံး'
                : 'ရုံးချုပ်';
        }
    }

    public function view(): View
    {
        $staffs = Staff::Labour()
            ->whereHas('current_division', function ($query) {
                $query->whereHas('divisionType', function ($subQuery) {
                    $subQuery->whereIn('id', $this->selectedDivisionTypeId == 3 ? [1, 2] : [$this->selectedDivisionTypeId]);
                });
            })
            ->get();

        return view('excel_reports.labour_staff_report', [
            'staffs' => $staffs,
            'title' => $this->title,
        ]);
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

// public function styles(Worksheet $sheet)
// {
//     // Apply global font style
//     $sheet->getStyle('A1:Z1000')->applyFromArray([
//         'font' => [
//             'name' => 'Pyidaungsu',
//             'size' => 13,
//         ],
//     ]);
//     $sheet->getStyle('A1:T100')->applyFromArray([
//         'borders' => [
//             'allBorders' => [
//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
//                 'color' => ['argb' => '000000'], // Black border
//             ],
//         ],
//     ]);

//     // Auto-size columns for the table
//     foreach (range('A', 'F') as $column) {
//         $sheet->getColumnDimension($column)->setAutoSize(true);
//     }

//     return [];
// }
}
