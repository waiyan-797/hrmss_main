<?php

namespace App\Exports;

use App\Models\Staff;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PA19 implements FromView ,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA19::all();
    // }
    public $age, $ageTwo;
    public $divisions, $division_id = 11 ;
    public $genders, $gender_id;
    public $staffs;
    public $signID;

    public function __construct($age , $ageTwo ,
    $divisions ,$division_id=11,$genders,$gender_id,$staffs,$signID

    )
    {
        $this->age = $age ;
        $this->ageTwo = $ageTwo;
        $this->divisions  =  $divisions;
         $this->division_id  =  $division_id;
         $this->genders  =  $genders;
         $this->gender_id  =  $gender_id;
         $this->staffs = $staffs;
         $this->signID=$signID;

    }
    public function view(): View
    {
        $now = Carbon::now();
        $query = Staff::query();
    
        if (!empty($this->age) && is_numeric($this->age)) {
            $birthDate = $now->copy()->subYears($this->age);
            
            if ($this->signID) {
                if ($this->signID == '>') {
                    $query->whereYear('dob', '<=', $birthDate->year);
                } elseif ($this->signID == '<') {
                    $query->whereYear('dob', '>', $birthDate->year);
                } elseif ($this->signID == '=') {
                    $query->whereYear('dob', '=', $birthDate->year);
                } elseif ($this->signID == 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                    $birthDateFrom = $now->copy()->subYears($this->age);
                    $birthDateTo = $now->copy()->subYears($this->ageTwo);
                    $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
                }
            }
        }
    
        if ($this->division_id) {
            $query->where('current_division_id', $this->division_id);
        }
    
        if ($this->gender_id) {
            $query->where('gender_id', $this->gender_id);
        }
    
        $staffs = $query->with('currentRank', 'gender')->get();
       
      
        $data = [
            'staffs' => $staffs,
            'filters' => [
                'age' => $this->age,
                'ageTwo' => $this->ageTwo,
                'signID' => $this->signID,
                'division_id' => $this->division_id,
                'gender_id' => $this->gender_id,
            ],
            
            
        ];
        return view('excel_reports.staff_report_2', $data);
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
    $sheet->getStyle('A1:L100')->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '000000'], // Black border
            ],
        ],
    ]);

    // Auto-size columns for the table
    foreach (range('A', 'J') as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    return [];
}
}
