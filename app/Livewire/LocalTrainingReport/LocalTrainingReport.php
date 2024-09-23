<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\Staff;
use App\Models\Training;
use App\Models\TrainingType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LocalTrainingReport extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.local_training_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'local_training_report_pdf.pdf');
    }
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.local-training-report.local-training-report',[
            'staffs' => $staffs,
        ]);
    }
}
