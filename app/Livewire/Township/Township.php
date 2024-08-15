<?php

namespace App\Livewire\Township;

use App\Models\District;
use App\Models\Township as ModelsTownship;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Township extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $township_search, $township_name, $district_name, $township_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'township_name' => 'required|string|max:255',
        'district_name' => 'required',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['township_name', 'district_name']);
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
        ModelsTownship::create([
            'name' => $this->township_name,
            'district_id' => $this->district_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['township_name', 'district_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->township_id = $id;
        $township = ModelsTownship::findOrFail($id);
        $this->township_name = $township->name;
        $this->district_name = $township->district_id;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $township = ModelsTownship::findOrFail($this->township_id);
        $township->update([
            'name' => $this->township_name,
            'education_group_id' => $this->district_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->township_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsTownship::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_township')]
    public function render_township()
    {
        $this->render();
    }
    public function render()
    {
        $districts = District::get();
        $this->modal_title = $this->confirm_add ? 'Add township' : 'Edit township';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $townshipSearch = '%' . $this->township_search . '%';
        $townshipQuery = ModelsTownship::query();
        if ($this->township_search) {
            $this->resetPage();
            $townshipQuery->where(fn($q) => $q->where('name', 'LIKE', $townshipSearch)->orWhereHas('district', fn($query) => $query->where('name', 'LIKE', $townshipSearch)));
            $townships = $townshipQuery->with('district')->paginate($townshipQuery->count() > 10 ? $townshipQuery->count() : 10);
        } else {
            $townships = $townshipQuery->with('district')->paginate(10);
        }

        return view('livewire.township.township', [
            'townships' => $townships,
            'districts' => $districts,
        ]);
    }
}
