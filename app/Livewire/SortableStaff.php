<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;

class SortableStaff extends Component
{

    public $staffs ;
    public $staff_id ;
    public $staff ;
    public $ranks ,  $selectedRankId ;
    public $divisions , $selectDivisionId;





    public function mount()
    {
        $this->ranks = Rank::where('is_dica',true)->get();
        $this->divisions = Division::all();

        $this->selectedRankId =  $this->ranks->first()->id;
        $this->selectDivisionId =  $this->divisions->first()->id;
    }


    public function render()
    {

        $query  = Staff::query()

        ->orderBy('current_rank_date')
        // ->orderBy('join_date')

        ;
        if($this->selectedRankId){
            $query->where('current_rank_id' , $this->selectedRankId);
        }

        if($this->selectDivisionId){
            $query->where('current_division_id' , $this->selectDivisionId);
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
