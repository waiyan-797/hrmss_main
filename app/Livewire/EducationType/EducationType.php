<?php

namespace App\Livewire\EducationType;

use App\Models\EducationGroup;
use App\Models\EducationType as ModelsEducationType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EducationType extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $education_type_search, $education_type_name, $education_group_name, $education_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'education_type_name' => 'required|string|max:255',
        'education_group_name' => 'required',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset(['education_type_name', 'education_group_name']);
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
        ModelsEducationType::create([
            'name' => $this->education_type_name,
            'education_group_id' => $this->education_group_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset(['education_type_name', 'education_group_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->education_type_id = $id;
        $education_type = ModelsEducationType::findOrFail($id);
        $this->education_type_name = $education_type->name;
        $this->education_group_name = $education_type->education_group_id;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $education_type = ModelsEducationType::findOrFail($this->education_type_id);
        $education_type->update([
            'name' => $this->education_type_name,
            'education_group_id' => $this->education_group_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->education_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsEducationType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_education_type')]
    public function render_education_type(){
        $this->render();
    }
    public function render()
    {
        $education_groups = EducationGroup::get();
        $this->modal_title = $this->confirm_add ? 'ပညာအရည်အချင်း အမျိုးအစား
အသစ်ထည့်ရန်' : 'ပညာအရည်အချင်း အမျိုးအစားပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $educationTypeSearch = '%' . $this->education_type_search . '%';
        $educationTypeQuery = ModelsEducationType::query();
        if ($this->education_type_search) {
            $this->resetPage();
            $educationTypeQuery->where(fn($q) => $q->where('name', 'LIKE', $educationTypeSearch)->orWhereHas('education_group', fn($query) => $query->where('name', 'LIKE', $educationTypeSearch)));
            $education_types = $educationTypeQuery->with('education_group')->paginate($educationTypeQuery->count() > 10 ? $educationTypeQuery->count() : 10);
        } else {
            $education_types = $educationTypeQuery->with('education_group')->paginate(10);
        }

        return view('livewire.education-type.education-type', [
            'education_types' => $education_types,
            'education_groups' => $education_groups,
        ]);
    }
}
