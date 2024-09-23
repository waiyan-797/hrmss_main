<?php

namespace App\Livewire\PlanningAccounting;

use App\Models\Staff;
use Livewire\Component;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PlanningAccounting extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.planning_accounting_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'planning_accounting_report_pdf.pdf');
    }
   
     public function render()
    {
        $staffs = Staff::get();
        return view('livewire.planning-accounting.planning-accounting',[ 
        'staffs' => $staffs,
    ]);
    }
    
}
