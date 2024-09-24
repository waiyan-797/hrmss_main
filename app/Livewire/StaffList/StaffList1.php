<?php

namespace App\Livewire\StaffList;

use App\Models\Division;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class StaffList1 extends Component
{
    public function go_pdf(){
        $divisions = Division::where('division_type_id', 2)->get();
        $data = [
            'divisions' => $divisions,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_1', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_pdf_1.pdf');
    }

     public function render()
     {
        $divisions = Division::where('division_type_id', 2)->get();
        return view('livewire.staff-list.staff-list1',[
            'divisions' => $divisions,
        ]);
     }
}
