<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MaritalStatus as ModelsMaritalStatus;
use App\Models\MaritalStatusType;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MaritalStatus extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $marital_status_search, $marital_status_name, $marital_status_type_name, $marital_status_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    
    protected $rules = [
        'marital_status_name' => 'required|string|max:255',
        'marital_status_type_name' => 'required',
    ];
  
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['marital_status_name', 'marital_status_type_name']);
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
   
    public function createPosition()
    {
        $this->validate();
        ModelsMaritalStatus::create([
            'name' => $this->marital_status_name,
            'marital_status_type_id' => $this->marital_status_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
   
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['marital_status_name', 'marital_status_type_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
  
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->marital_status_id = $id;
        $marital_status = ModelsMaritalStatus::findOrFail($id);
        $this->marital_status_name = $marital_status->name;
        $this->marital_status_type_name = $marital_status->marital_status_type_id;
    }

  
    public function updatePosition()
    {
        $this->validate();
        $marital_status = ModelsMaritalStatus::findOrFail($this->marital_status_id);
        $marital_status->update([
            'name' => $this->marital_status_name,
            'marital_status_type_id' => $this->marital_status_type_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

  
    public function delete_confirm($id)
    {
        $this->marital_status_id = $id;
        $this->confirm_delete = true;
    }

   
    public function delete($id)
    {
        ModelsMaritalStatus::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_marital_status')]
    public function render_marital_status()
    {
        $this->render();
    }
    public function render()
    {
        $marital_status_types = MaritalStatusType::get();
        $this->modal_title = $this->confirm_add ? 'ဌာနစိတ်သိမ်းရန်' : 'ဌာနစိတ်ပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $maritalStatusSearch = '%' . $this->marital_status_search . '%';
        $maritalStatusQuery = ModelsMaritalStatus::query();
        if ($this->marital_status_search) {
            $this->resetPage();
            $maritalStatusQuery->where(fn($q) => $q->where('name', 'LIKE', $maritalStatusSearch)->orWhereHas('marital_status_type', fn($query) => $query->where('name', 'LIKE', $maritalStatusSearch)));
            $marital_statuses = $maritalStatusQuery->with('marital_status_type')->paginate($maritalStatusQuery->count() > 10 ? $maritalStatusQuery->count() : 10);
        } else {
            $marital_statuses = $maritalStatusQuery->with('marital_status_type')->paginate(10);
        }

        return view('livewire.marital-status', [
            'marital_statuses' => $marital_statuses,
            'marital_status_types' => $marital_status_types,
        ]);
    }
}
