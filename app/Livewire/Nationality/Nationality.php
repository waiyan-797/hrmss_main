<?php

namespace App\Livewire\Nationality;

use App\Models\Nationality as ModelsNationality;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Nationality extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $nationality_type_search, $nationality_type_name, $nationality_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'nationality_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('nationality_type_name');
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
        ModelsNationality::create([
            'name' => $this->nationality_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('nationality_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->nationality_type_id = $id;
        $nationality_type = ModelsNationality::findOrFail($id);
        $this->nationality_type_name = $nationality_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsNationality::findOrFail($this->nationality_type_id)->update([
            'name' => $this->nationality_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->nationality_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsNationality::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_nationality_type')]
    public function render_nationality_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add nationality Type' : 'Edit nationality Type';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $nationalityTypeSearch = '%' . $this->nationality_type_search . '%';
        $nationalityTypeQuery = ModelsNationality::query();
        if ($this->nationality_type_search) {
            $this->resetPage();
            $nationalityTypeQuery->where('name', 'LIKE', $nationalityTypeSearch);
            $nationality_types = $nationalityTypeQuery->paginate($nationalityTypeQuery->count() > 10 ? $nationalityTypeQuery->count() : 10);
        } else {
            $nationality_types = $nationalityTypeQuery->paginate(10);
        }

        return view('livewire.nationality.nationality', [
            'nationality_types' => $nationality_types,
        ]);
    }
}
