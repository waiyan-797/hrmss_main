<?php

namespace App\Livewire;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;

class SortableStaff extends Component
{

    public $staffs ; 
    public $staff_id ; 
    public $staff ;
    public $ranks ,  $selectedRankId ;
    
    



    public function mount()
    {
        $this->ranks = Rank::all();
    }


    public function render()
    {

        $query  = Staff::query();
        if($this->selectedRankId){
            $query->where('current_rank_id' , $this->selectedRankId);
        }
        
        
        $this->staffs  = $query->get();
        return view('livewire.sortable-staff' , ['staffs' => $this->staffs ]);
    }
    public function updateOrder($order)
    {
        foreach ($order as $index => $id) {
            
            // Find the staff record by ID
            
            $currentStaff = Staff::find($id['value']);
    
            if ($currentStaff) {
                $currentStaff->update(['sort_no' => $id['order']]);
            }
        }
    
        $this->staffs = Staff::all();
    }
}
