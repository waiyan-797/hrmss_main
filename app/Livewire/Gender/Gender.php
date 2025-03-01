<?php

namespace App\Livewire\Gender;

use App\Models\Gender as ModelsGender;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Gender extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $gender_type_search, $gender_type_name, $gender_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'gender_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('gender_type_name');
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
        ModelsGender::create([
            'name' => $this->gender_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('gender_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->gender_type_id = $id;
        $gender_type = ModelsGender::findOrFail($id);
        $this->gender_type_name = $gender_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsGender::findOrFail($this->gender_type_id)->update([
            'name' => $this->gender_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->gender_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsGender::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_gender_type')]
    public function render_gender_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ကျား/မအသစ်ထည့်ရန်
' : 'ကျား/မပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $genderTypeSearch = '%' . $this->gender_type_search . '%';
        $genderTypeQuery = ModelsGender::query();
        if ($this->gender_type_search) {
            $this->resetPage();
            $genderTypeQuery->where('name', 'LIKE', $genderTypeSearch);
            $gender_types = $genderTypeQuery->paginate($genderTypeQuery->count() > 10 ? $genderTypeQuery->count() : 10);
        } else {
            $gender_types = $genderTypeQuery->paginate(10);
        }

        return view('livewire.gender.gender', [
            'gender_types' => $gender_types,
        ]);
    }
}
