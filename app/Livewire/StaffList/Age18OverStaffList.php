<?php

namespace App\Livewire\StaffList;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class Age18OverStaffList extends Component
{
    public function go_pdf($staff_id){
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $third_ranks = Rank::where('staff_type_id', 3)->get();
        $all_ranks = Rank::get();
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ];
        $pdf = PDF::loadView('pdf_reports.age18_over_staff_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'age18_over_staff_list_pdf.pdf');
    }

     public function render()
     {
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $third_ranks = Rank::where('staff_type_id', 3)->get();
        $all_ranks = Rank::get();
        return view('livewire.staff-list.age18-over-staff-list',[
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ]);
     }
}
