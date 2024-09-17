<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\Staff;
use App\Models\Training;
use App\Models\TrainingType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LocalTrainingReport extends Component
{

    public $training_id;
    public function mount($training_id = 0){
        $this->training_id = $training_id;
    }

    public function go_pdf($training_id){
        $trainings = Training::find($training_id);
        $data = [
            'trainings' => $trainings,
        ];
        $pdf = PDF::loadView('pdf_reports.local_training_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'local_training_pdf.pdf');
    }

    public function render()
    {
        $trainings = Training::get()->first();
        return view('livewire.local-training-report.local-training-report',[
            'trainings' => $trainings,
        ]);
    }
}
