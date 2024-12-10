<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\LetterType;
use App\Models\Payscale;
use Livewire\Component;

class VacancyOverByDivision extends Component
{

    public $letter_types     ;
    public $count = 0 ;

    public $divisions ;
    public $selectedDivisionId ;
    public function mount( ){
        $this->letter_types  = LetterType::all();
        $this->divisions = Division::all();
        
    }
    public function render()
    {

        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        return view('livewire.vacancy-over-by-division' ,
    [
        'first_payscales' => $first_payscales,
             'second_payscales' => $second_payscales,
    ]
    );
    }
}
