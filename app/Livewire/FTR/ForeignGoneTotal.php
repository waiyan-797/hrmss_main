<?php

namespace App\Livewire\FTR;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ForeignGoneTotal extends Component
{
    // public $staff_id;
    // public function mount($staff_id = 0){
    //     $this->staff_id = $staff_id;
    // }

    // public function go_pdf($staff_id){
    //     $staff = Staff::find($staff_id);
    //     $data = [
    //         'staff' => $staff,
    //     ];
    //     $pdf = PDF::loadView('pdf_reports.foreign_gone_total_report', $data);
    //     return response()->streamDownload(function() use ($pdf) {
    //         echo $pdf->output();
    //     }, 'foreign_gone_total_report_pdf.pdf');
    // }
   
     
    // public function render()
    // {
    //     $staff = Staff::get()->first();
    //     return view('livewire.f-t-r.foreign-gone-total',[ 
    //         'staff' => $staff,
    //     ]);
    // }
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.foreign_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'foreign_report_pdf.pdf');
    }
public function render()
{
    $staffs = Staff::get();
    return view('livewire.reports.foreign-report',[ 
        'staffs' => $staffs,
    ]);
}
}
