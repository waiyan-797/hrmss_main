<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class Labour extends Component
{
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $open_staff_report = false;
    public $message = null;
    public $staff_search,
        $staff_name,
        $staff_id = 0;

    public $modal_title;

    public function mount()
    {
    }

    public function delete_confirm($id)
    {
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        Staff::find($id)->delete();
        $this->confirm_delete = false;
    }
    public function edit_modal($id)
    {
        return redirect()->route('labourDetails', ['id' => $id]);
    }

    public function add_new()
    {
        return redirect()->route('labourDetails', ['id' => '0']);
    }
    public function render()
    {
        $getLabour  = (new Staff())->Labour();

        if(auth()->user()->role_id != 2 ){
            $staffs = $getLabour->where('current_division_id' , auth()->user()->division_id)->paginate(10);
        }
        else{
        $staffs =  $getLabour->paginate(10);

        }


        return view('livewire.labour', compact('staffs'));
    }
}
