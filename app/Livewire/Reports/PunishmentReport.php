<?php

namespace App\Livewire\Reports;

use App\Models\Punishment;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class PunishmentReport extends Component
{

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.punishment_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'punishment_report_pdf.pdf');
    }
public function render()
{
    $staffs = Staff::get();
    return view('livewire.reports.punishment-report',[ 
        'staffs' => $staffs,
    ]);
}
    
   

}
