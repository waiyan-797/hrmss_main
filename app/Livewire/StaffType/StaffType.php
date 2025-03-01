<?php

namespace App\Livewire\StaffType;

use App\Models\StaffType as ModelsStaffType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class StaffType extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $staff_type_search, $staff_type_name, $staff_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'staff_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset('staff_type_name');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createPosition();
        } else {
            $this->updatePosition();
        }
    }
    //create
    public function createPosition()
    {
        $this->validate();
        ModelsStaffType::create([
            'name' => $this->staff_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('staff_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->staff_type_id = $id;
        $staff_type = ModelsStaffType::findOrFail($id);
        $this->staff_type_name = $staff_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsStaffType::findOrFail($this->staff_type_id)->update([
            'name' => $this->staff_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->staff_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsStaffType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_staff_type')]
    public function render_staff_type(){
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ဝန်ထမ်းအမျိုးအစားသိမ်းရန်' : 'ဝန်ထမ်းအမျိုးအစားပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $staffTypeSearch = '%' . $this->staff_type_search . '%';
        $staffTypeQuery = ModelsStaffType::query();
        if ($this->staff_type_search) {
            $this->resetPage();
            $staffTypeQuery->where('name', 'LIKE', $staffTypeSearch);
            $staff_types = $staffTypeQuery->paginate($staffTypeQuery->count() > 10 ? $staffTypeQuery->count() : 10);
        } else {
            $staff_types = $staffTypeQuery->paginate(10);
        }

        return view('livewire.staff-type.staff-type', [
            'staff_types' => $staff_types,
        ]);
    }
}
