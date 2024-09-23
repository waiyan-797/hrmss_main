<?php

namespace App\Livewire\Reports;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class Report1 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.report_1', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'report_2.pdf');
    }

    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.reports.report1', [
            'staffs' => $staffs,
        ]);
    }
}
