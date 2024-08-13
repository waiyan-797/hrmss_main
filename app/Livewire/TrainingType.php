<?php

namespace App\Livewire;

use App\Models\TrainingType as ModelsTrainingType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TrainingType extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $training_type_search, $training_type_name, $training_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //validation
    protected $rules = [
        'training_type_name' => 'required',
    ];

     //add new
    public function add_new(){
        $this->resetValidation();
        $this->reset('training_type_name');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

     //submit form
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
        ModelsTrainingType::create([
            'name' => $this->training_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('training_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->training_type_id = $id;
        $training_type = ModelsTrainingType::findOrFail($id);
        $this->training_type_name = $training_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsTrainingType::findOrFail($this->training_type_id)->update([
            'name' => $this->training_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->training_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsTrainingType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_training_type')]
    public function render_training_type(){
        $this->render();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add Training Type' : 'Edit Training Type';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $trainingTypeSearch = '%' . $this->training_type_search . '%';
        $trainingTypeQuery = ModelsTrainingType::query();
        if ($this->training_type_search) {
            $this->resetPage();
            $trainingTypeQuery->where('name', 'LIKE', $trainingTypeSearch);
            $training_types = $trainingTypeQuery->paginate($trainingTypeQuery->count() > 10 ? $trainingTypeQuery->count() : 10);
        } else {
            $training_types = $trainingTypeQuery->paginate(10);
        }

        return view('livewire.training-type', [
            'training_types' => $training_types,
        ]);
    }
}
