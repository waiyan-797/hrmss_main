<?php

namespace App\Livewire\EEN;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class EnglishEffectiveNegotiations extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.english_effective_negotiations_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf.pdf');
    }
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.e-e-n.english-effective-negotiations', [
            'staffs' => $staffs,
        ]);
    }
}
