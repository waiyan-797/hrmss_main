<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ministry as ModelsMinistry;
use Livewire\Attributes\On;

class Ministry extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $ministry_type_search, $ministry_type_name, $ministry_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'ministry_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('ministry_type_name');
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
        ModelsMinistry::create([
            'name' => $this->ministry_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('ministry_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->ministry_type_id = $id;
        $ministry_type = ModelsMinistry::findOrFail($id);
        $this->ministry_type_name = $ministry_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsMinistry::findOrFail($this->ministry_type_id)->update([
            'name' => $this->ministry_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->ministry_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsMinistry::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_ministry_type')]
    public function render_ministry_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ဝန်ကြီးဌာနအသစ်ထည့်ရန်
' :'ဝန်ကြီးဌာနပြင်ရန်' ;

        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $ministryTypeSearch = '%' . $this->ministry_type_search . '%';
        $ministryTypeQuery = ModelsMinistry::query();
        if ($this->ministry_type_search) {
            $this->resetPage();
            $ministryTypeQuery->where('name', 'LIKE', $ministryTypeSearch);
            $ministry_types = $ministryTypeQuery->paginate($ministryTypeQuery->count() > 10 ? $ministryTypeQuery->count() : 10);
        } else {
            $ministry_types = $ministryTypeQuery->paginate(10);
        }

        return view('livewire.ministry', [
            'ministry_types' => $ministry_types,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.ministry');
    // }
}
