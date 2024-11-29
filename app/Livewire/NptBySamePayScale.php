<?php

namespace App\Livewire;

use Livewire\Component;

class NptBySamePayScale extends Component
{

    public $payscales ; 
    public function render()
    {
        return view('livewire.npt-by-same-pay-scale');
    }
}
