<?php

namespace App\Livewire\PenaltyType;

use App\Models\PenaltyType as ModelsPenaltyType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PenaltyType extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $penalty_type_search, $penalty_type_name, $penalty_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'penalty_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset('penalty_type_name');
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
        ModelsPenaltyType::create([
            'name' => $this->penalty_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('penalty_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->penalty_type_id = $id;
        $penalty_type = ModelsPenaltyType::findOrFail($id);
        $this->penalty_type_name = $penalty_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsPenaltyType::findOrFail($this->penalty_type_id)->update([
            'name' => $this->penalty_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->penalty_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsPenaltyType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_penalty_type')]
    public function render_penalty_type(){
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add penalty Type' : 'Edit penalty Type';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $penaltyTypeSearch = '%' . $this->penalty_type_search . '%';
        $penaltyTypeQuery = ModelsPenaltyType::query();
        if ($this->penalty_type_search) {
            $this->resetPage();
            $penaltyTypeQuery->where('name', 'LIKE', $penaltyTypeSearch);
            $penalty_types = $penaltyTypeQuery->paginate($penaltyTypeQuery->count() > 10 ? $penaltyTypeQuery->count() : 10);
        } else {
            $penalty_types = $penaltyTypeQuery->paginate(10);
        }

        return view('livewire.penalty-type.penalty-type', [
            'penalty_types' => $penalty_types,
        ]);
    }
}
