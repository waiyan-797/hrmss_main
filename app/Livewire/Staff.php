<?php

namespace App\Livewire;

use App\Models\Staff as ModelsStaff;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Staff extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $staff_search, $staff_name, $staff_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //add new
    public function add_new(){
        $this->confirm_add = true;
        $this->confirm_edit = false;
        $this->redirect(StaffDetail::class, navigate: true);
    }

     //submit form
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createStaff();
        } else {
            $this->updateStaff();
        }
    }

    //create
    public function createStaff()
    {
        $this->validate();
        ModelsStaff::create([
            'name' => $this->staff_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('staff_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->staff_id = $id;
        $staff = ModelsStaff::findOrFail($id);
        $this->staff_name = $staff->name;
    }

    //update
    public function updateStaff()
    {
        $this->validate();
        ModelsStaff::findOrFail($this->staff_id)->update([
            'name' => $this->staff_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->staff_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsStaff::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_staff')]
    public function render_staff(){
        $this->render();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add Staff' : 'Edit Staff';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $staffSearch = '%' . $this->staff_search . '%';
        $staffQuery = ModelsStaff::query();
        if ($this->staff_search) {
            $this->resetPage();
            $staffQuery->where('name', 'LIKE', $staffSearch);
            $staffs = $staffQuery->paginate($staffQuery->count() > 10 ? $staffQuery->count() : 10);
        } else {
            $staffs = $staffQuery->paginate(10);
        }

        return view('livewire.staff', [
            'staffs' => $staffs,
        ]);
    }
}
