<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\Staff;
use App\Models\Training;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LocalTrainingReport2 extends Component
{
    // public $training_id;
    // public function mount($training_id = 0){
    //     $this->training_id = $training_id;
    // }

    // public function go_pdf($training_id){
    //     $trainings = Training::find($training_id);
    //     $data = [
    //         'trainings' => $trainings,
    //     ];
    //     $pdf = PDF::loadView('pdf_reports.local_training_report_2', $data);
    //     return response()->streamDownload(function() use ($pdf) {
    //         echo $pdf->output();
    //     }, 'local_training_pdf_2.pdf');
    // }

    // public function render()
    // {
    //     $trainings = Training::get()->first();
    //     return view('livewire.local-training-report.local-training-report2',[
    //         'trainings' => $trainings,
    //     ]);
    // }
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.local_training_report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'local_training_report2_pdf.pdf');
    }
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.local-training-report.local-training-report2',[
            'staffs' => $staffs,
        ]);
    }
    
}
