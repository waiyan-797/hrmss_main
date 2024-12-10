<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\DivisionType;
use Livewire\Component;

class ChildrenReportDetails extends Component
{


    public $selsectedDivisionTypeId = null  ;    
public $divisionTypes ;



public function mount(){
    $this->divisionTypes = DivisionType::all();
}
    public function render()
    {
        $divisions =
         Division::query();

         if($this->selsectedDivisionTypeId){
            $divisions->where('division_type_id', $this->selsectedDivisionTypeId
         
         );
         }

         

       
              $divisions =     $divisions->get();
              


        return view('livewire.children-report-details'
             , [
                'divisions' => $divisions
             ]
    );
    }
}
