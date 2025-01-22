<?php

namespace App\Livewire;

use App\Models\LetterType;
use App\Models\Staff;
use Livewire\Component;
use App\Exports\PA18;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class StaffInNpt extends Component
{

    // public $staffs  ;
    // public $letter_type_id , $letter_types;


    // public function go_pdf()
    // {
    //     // $staffs = Staff::get();
    //     $staffs=Staff::FromNPt()->get();
    //     $data = [
    //         'staffs' => $staffs,
    //     ];
    //     $pdf = PDF::loadView('pdf_reports.staff_in_npt', $data);
    //     return response()->streamDownload(function () use ($pdf) {
    //         echo $pdf->output();
    //     }, 'staff_in_npt.pdf');
    // }
    // public function go_excel() 
    // {
    //     return Excel::download(new PA18(
    // ), 'PA18.xlsx');
    // }

    // public function  mount(){
    //     $this->letter_types = LetterType::all();
    // }
    // public function render()
    // {


    //     $this->staffs = Staff::FromNPt()->get();

    //     return view('livewire.staff-in-npt');
    // }

    // public $staffs;
    // public $letter_type_id, $letter_types;

    // public function go_pdf()
    // {
    //     $staffs = Staff::get();
    //     $data = [
    //         'staffs' => $staffs,
    //     ];
    //     $pdf = PDF::loadView('pdf_reports.staff_in_npt', $data);
    //     return response()->streamDownload(function () use ($pdf) {
    //         echo $pdf->output();
    //     }, 'staff_in_npt.pdf');
    // }

    // public function go_excel()
    // {
    //     return Excel::download(new PA18(), 'PA18.xlsx');
    // }

    // public function mount()
    // {
    //     $this->letter_types = LetterType::all();
    // }

    // public function render()
    // {
    //     $this->staffs = Staff::get();

    //     return view('livewire.staff-in-npt');
    // }



    
    public $staffs;
    public $letter_type_id, $letter_types;

    public function go_pdf()
    {
      
        // $staffs = Staff::where('current_address_region_id', 1)->get();
        $staffs = Staff::with(['currentRank', 'current_department', 'marital_statuses', 'current_address_township_or_town', 'current_address_region'])
    ->where('current_address_region_id', 1)
    ->get();

        $data = [
            'staffs' => $staffs,
        ];

        $pdf = PDF::loadView('pdf_reports.staff_in_npt', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_in_npt.pdf');
    }

    public function go_excel()
    {
        return Excel::download(new PA18(), 'PA18.xlsx');
    }

    public function mount()
    {
        $this->letter_types = LetterType::all();
    }

    public function render()
    {
        // Update query to fetch data with current_address_region_id = 1
        $this->staffs = Staff::where('current_address_region_id', 1)->get();

        return view('livewire.staff-in-npt', [
            'staffs' => $this->staffs,
        ]);
    }



}
