<?php

namespace App\Livewire\EducationGroup;

use App\Models\EducationGroup as ModelsEducationGroup;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EducationGroup extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $education_group_search, $education_group_name, $education_group_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'education_group_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('education_group_name');
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
        ModelsEducationGroup::create([
            'name' => $this->education_group_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('education_group_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->education_group_id = $id;
        $education_group = ModelsEducationGroup::findOrFail($id);
        $this->education_group_name = $education_group->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsEducationGroup::findOrFail($this->education_group_id)->update([
            'name' => $this->education_group_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->education_group_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsEducationGroup::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_education_group')]
    public function render_education_group()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ပညာအရည်အချင်း အုပ်စုအသစ်ထည့်ရန်
' : 'ပညာအရည်အချင်း အုပ်စုပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $educationGroupSearch = '%' . $this->education_group_search . '%';
        $educationGroupQuery = ModelsEducationGroup::query();
        if ($this->education_group_search) {
            $this->resetPage();
            $educationGroupQuery->where('name', 'LIKE', $educationGroupSearch);
            $education_groups = $educationGroupQuery->paginate($educationGroupQuery->count() > 10 ? $educationGroupQuery->count() : 10);
        } else {
            $education_groups = $educationGroupQuery->paginate(10);
        }

        return view('livewire.education-group.education-group', [
            'education_groups' => $education_groups,
        ]);
    }
}
