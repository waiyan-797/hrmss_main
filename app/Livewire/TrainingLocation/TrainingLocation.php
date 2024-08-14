<?php

namespace App\Livewire\TrainingLocation;

use App\Models\TrainingLocation as ModelsTrainingLocation;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TrainingLocation extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $training_location_search, $training_location_name, $training_location_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'training_location_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('training_location_name');
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
        ModelsTrainingLocation::create([
            'name' => $this->training_location_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('training_location_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->training_location_id = $id;
        $training_location = ModelsTrainingLocation::findOrFail($id);
        $this->training_location_name = $training_location->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsTrainingLocation::findOrFail($this->training_location_id)->update([
            'name' => $this->training_location_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->training_location_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsTrainingLocation::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_training_location')]
    public function render_training_location()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add education Group' : 'Edit education Group';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $trainingLocationSearch = '%' . $this->training_location_search . '%';
        $trainingLocationQuery = ModelsTrainingLocation::query();
        if ($this->training_location_search) {
            $this->resetPage();
            $trainingLocationQuery->where('name', 'LIKE', $trainingLocationSearch);
            $training_locations = $trainingLocationQuery->paginate($trainingLocationQuery->count() > 10 ? $trainingLocationQuery->count() : 10);
        } else {
            $training_locations = $trainingLocationQuery->paginate(10);
        }

        return view('livewire.training-location.training-location', [
            'training_locations' => $training_locations,
        ]);
    }
}
