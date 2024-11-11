<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class Inbox extends Component
{

public $inbox_search;

    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $open_staff_report = false;
    public $message = null;
    public $staff_search, $staff_name, $staff_id = 0;
    public $modal_title;
    public function mount(){
        
    }
    public function render()
    {
$staffs = Staff::where('status_id' , 3 )->paginate(5);
        return view('livewire.StatusBox' , compact('staffs'));
    }
}
