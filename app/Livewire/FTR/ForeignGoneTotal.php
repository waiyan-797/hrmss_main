<?php

namespace App\Livewire\FTR;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ForeignGoneTotal extends Component
{
    
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.foreign_gone_total_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'foreign_gone_total_report_pdf.pdf');
    }

public function render()
    {
        $staffs = Staff::get();
        return view('livewire.f-t-r.foreign-gone-total',[ 
            'staffs' => $staffs,
        ]);
    }
}
