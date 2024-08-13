<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Relation as ModelsRelation;

class Relation extends Component
{


    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $relation_search, $relation_name, $relation_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //validation
    protected $rules = [
        'relation_name' => 'required',
    ];

     //add new
    public function add_new(){
        $this->resetValidation();
        $this->reset('relation_name');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

     //submit form
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createRelation();
        } else {
            $this->updateRelation();
        }
    }

    //create
    public function createRelation()
    {
        $this->validate();
        ModelsRelation::create([
            'name' => $this->relation_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('relation_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->relation_id = $id;
        $relation = ModelsRelation::findOrFail($id);
        $this->relation_name = $relation->name;
    }

    //update
    public function updateRelation()
    {
        $this->validate();
        ModelsRelation::findOrFail($this->relation_id)->update([
            'name' => $this->relation_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->relation_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsRelation::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_relation')]
    public function render_relation(){
        $this->render();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add Relation' : 'Edit Relation';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $relationSearch = '%' . $this->relation_search . '%';
        $relationQuery = ModelsRelation::query();
        if ($this->relation_search) {
            $this->resetPage();
            $relationQuery->where('name', 'LIKE', $relationSearch);
            $relations = $relationQuery->paginate($relationQuery->count() > 10 ? $relationQuery->count() : 10);
        } else {
            $relations = $relationQuery->paginate(10);
        }

        return view('livewire.relation', [
            'relations' => $relations,
        ]);
    }

    // public function render()
    // {
    //     return view('livewire.relation');
    // }
}
