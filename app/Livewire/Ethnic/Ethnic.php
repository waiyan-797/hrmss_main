<?php

namespace App\Livewire\Ethnic;

use App\Models\Ethnic as ModelsEthnic;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Ethnic extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $ethnic_type_search, $ethnic_type_name, $ethnic_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'ethnic_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('ethnic_type_name');
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
        ModelsEthnic::create([
            'name' => $this->ethnic_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('ethnic_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->ethnic_type_id = $id;
        $ethnic_type = ModelsEthnic::findOrFail($id);
        $this->ethnic_type_name = $ethnic_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsEthnic::findOrFail($this->ethnic_type_id)->update([
            'name' => $this->ethnic_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->ethnic_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsEthnic::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_ethnic_type')]
    public function render_ethnic_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'လူမျိုးအသစ်ထည့်ရန်' : 'လူမျိုးပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $ethnicTypeSearch = '%' . $this->ethnic_type_search . '%';
        $ethnicTypeQuery = ModelsEthnic::query();
        if ($this->ethnic_type_search) {
            $this->resetPage();
            $ethnicTypeQuery->where('name', 'LIKE', $ethnicTypeSearch);
            $ethnic_types = $ethnicTypeQuery->paginate($ethnicTypeQuery->count() > 10 ? $ethnicTypeQuery->count() : 10);
        } else {
            $ethnic_types = $ethnicTypeQuery->paginate(10);
        }

        return view('livewire.ethnic.ethnic', [
            'ethnic_types' => $ethnic_types,
        ]);
    }
}
