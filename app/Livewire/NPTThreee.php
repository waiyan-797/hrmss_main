<?php

namespace App\Livewire;

use App\Exports\PA21;
use App\Livewire\Payscale\Payscale;
use App\Models\Payscale as ModelsPayscale;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class NPTThreee extends Component
{
    public $payscales  ,$letter_types;
    public $count=0;
    public function go_pdf()
    {
        $first_payscales = ModelsPayscale::where('staff_type_id', 1)->get();
        $second_payscales = ModelsPayscale::where('staff_type_id', 2)->get();
        $data = [
            'first_payscales' => $first_payscales,
             'second_payscales' => $second_payscales,
           
        ];
        
      
       

        $pdf = PDF::loadView('pdf_reports.npt_three', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'npt_three.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new PA21(), 'PA21.xlsx');
    }
    public function render()
    {
        $first_payscales = ModelsPayscale::where('staff_type_id', 1)->get();
        $second_payscales = ModelsPayscale::where('staff_type_id', 2)->get();

        

        return view('livewire.n-p-t-threee' , [
             'first_payscales' => $first_payscales,
             'second_payscales' => $second_payscales,
        ]);
    }
}
