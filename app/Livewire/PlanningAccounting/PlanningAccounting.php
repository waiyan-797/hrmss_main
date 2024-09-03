<?php

namespace App\Livewire\PlanningAccounting;

use App\Models\Staff;
use Livewire\Component;

class PlanningAccounting extends Component
{
    public function render()
    {
        // $staffs = FacadesDB::table('staff')
        // ->join('ranks', 'staff.current_rank_id', '=', 'ranks.id')
        // ->select('staff.*', 'ranks.name as rank_name')
        // ->get();
        $staff = Staff::with(['rank'])->where('id', 3)->first();
        return view('livewire.planning-accounting.planning-accounting', [
            'staff' => $staff,
        ]);
    }
}
