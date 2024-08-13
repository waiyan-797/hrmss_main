<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Division as ModelsDivision;
use Livewire\WithPagination;

class Division extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $division_search, $division_name, $division_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //validation
    protected $rules = [
        'division_name' => 'required',
    ];

     //add new
    public function add_new(){
        $this->resetValidation();
        $this->reset('division_name');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

     //submit form
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createDivision();
        } else {
            $this->updateDivision();
        }
    }

    //create
    public function CreateDivision()
    {
        $this->validate();
        ModelsDivision::create([
            'name' => $this->division_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('division_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->division_id = $id;
        $division = ModelsDivision::findOrFail($id);
        $this->division_name = $division->name;
    }

    //update
    public function updateDivision()
    {
        $this->validate();
        ModelsDivision::findOrFail($this->division_id)->update([
            'name' => $this->division_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->division_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsDivision::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_division')]
    public function render_division(){
        $this->render();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add Division' : 'Edit Division';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $divisionSearch = '%' . $this->division_search . '%';
        $divisionQuery = ModelsDivision::query();
        if ($this->division_search) {
            $this->resetPage();
            $divisionQuery->where('name', 'LIKE', $divisionSearch);
            $divisions = $divisionQuery->paginate($divisionQuery->count() > 10 ? $divisionQuery->count() : 10);
        } else {
            $divisions = $divisionQuery->paginate(10);
        }

        return view('livewire.division', [
            'divisions' => $divisions,
        ]);
    }
}
