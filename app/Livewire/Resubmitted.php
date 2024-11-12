<?php

namespace App\Livewire;

use App\Models\Staff;


use Livewire\Component;

class Resubmitted extends Component
{
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $open_staff_report = false;
    public $message = null;
    public $staff_search, $staff_name, $staff_id = 0;

    
    public function render()
    {
        $staffs = Staff::where('status_id' ,4 )->where('current_division_id', auth()->user()->division_id)->paginate(5);
        return view('livewire.StatusBox' , compact('staffs'));

    }
}
