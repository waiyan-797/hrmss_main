<?php

namespace App\Livewire;

use App\Models\PensionType;
use App\Models\Rank;
use App\Models\RetireType;
use App\Models\Staff;
use Livewire\Component;

class AllRetire extends Component
{

    public $staffs ;
    public $ranks ,  $selectedRankid, $retire_types , $selectedRetireId  ;
    public $pensions , $selectedPensionId;
    public $query ;

    public function mount(){
        $this->ranks  = Rank::all();
        $this->retire_types = RetireType::all();
        $this->pensions = PensionType::all();

    }

    public function render()
    {
        $this->staffs = Staff::query()
            ->whereNotNull('retire_type_id')
            ->whereNotNull('retire_date')
            ->when($this->selectedRankid, fn($q) => $q->where('current_rank_id', $this->selectedRankid))
            ->when($this->selectedRetireId, fn($q) => $q->where('retire_type_id', $this->selectedRetireId))
            ->when($this->selectedRetireId == 5 && $this->selectedPensionId,
                   fn($q) => $q->where('pension_type_id', $this->selectedPensionId))
            ->get();

        return view('livewire.all-retire');
    }

}
