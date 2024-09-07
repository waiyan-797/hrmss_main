<?php

namespace App\Livewire\Religion;

use App\Models\Religion as ModelsReligion;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Religion extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $religion_type_search, $religion_type_name, $religion_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'religion_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('religion_type_name');
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
        ModelsReligion::create([
            'name' => $this->religion_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('religion_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->religion_type_id = $id;
        $religion_type = ModelsReligion::findOrFail($id);
        $this->religion_type_name = $religion_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsReligion::findOrFail($this->religion_type_id)->update([
            'name' => $this->religion_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->religion_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsReligion::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_religion_type')]
    public function render_religion_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ကိုးကွယ်သည့်ဘာသာအသစ်ထည့်ရန်
' : 'ကိုးကွယ်သည့်ဘာသာပြင်ရန်
';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $religionTypeSearch = '%' . $this->religion_type_search . '%';
        $religionTypeQuery = ModelsReligion::query();
        if ($this->religion_type_search) {
            $this->resetPage();
            $religionTypeQuery->where('name', 'LIKE', $religionTypeSearch);
            $religion_types = $religionTypeQuery->paginate($religionTypeQuery->count() > 10 ? $religionTypeQuery->count() : 10);
        } else {
            $religion_types = $religionTypeQuery->paginate(10);
        }

        return view('livewire.religion.religion', [
            'religion_types' => $religion_types,
        ]);
    }
}
