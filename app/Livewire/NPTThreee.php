<?php

namespace App\Livewire;

use App\Livewire\Payscale\Payscale;
use App\Models\Payscale as ModelsPayscale;
use Livewire\Component;

class NPTThreee extends Component
{


    public $payscales  ,$letter_types;


    public function mount(){
        

        // $this->payscales = ModelsPayscale::whereHas('staff', function ($subQ) {
        //     $subQ->FromNPt(); // Assuming FromNPt() is a scope or valid query method.
        // })->get();
    }
    public function render()
    {$first_payscales = ModelsPayscale::where('staff_type_id', 1)->get();
        $second_payscales = ModelsPayscale::where('staff_type_id', 2)->get();

        return view('livewire.n-p-t-threee' , [
             'first_payscales' => $first_payscales,
             'second_payscales' => $second_payscales,
        ]);
    }
}
