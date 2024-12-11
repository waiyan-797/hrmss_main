<?php

namespace App\Livewire;

use App\Models\Children;
use App\Models\DivisionType;
use Livewire\Component;

class ChildrenReportSummary extends Component
{



public $divisionTypes ;
public $children ;
 
 

    public function mount(){
        $this->divisionTypes = DivisionType::all();
        $this->children = Children::all();
    }


 
    public function render()
    {
        return view('livewire.children-report-summary');
    }
}
