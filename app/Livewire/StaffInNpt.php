<?php

namespace App\Livewire;

use App\Models\LetterType;
use App\Models\Staff;
use Livewire\Component;

class StaffInNpt extends Component
{

    public $staffs  ;
    public $letter_type_id , $letter_types;

    public function  mount(){
        $this->letter_types = LetterType::all();
    }
    public function render()
    {


        $this->staffs =  Staff::FromNPt();
        return view('livewire.staff-in-npt');
    }
}
