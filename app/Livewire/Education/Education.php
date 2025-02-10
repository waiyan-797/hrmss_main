<?php

namespace App\Livewire\Education;

use App\Models\Education as ModelsEducation;
use App\Models\EducationGroup;
use App\Models\EducationType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Education extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $education_search, $education_name, $education_type_name, $education_id , $education_group_name;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'education_name' => 'required|string|max:255',
        'education_type_name' => 'required',
        'education_group_name' => 'required',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset(['education_name', 'education_type_name','education_group_name']);
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
        ModelsEducation::create([
            'name' => $this->education_name,
            'education_type_id' => $this->education_type_name,
            'education_group_id' => $this->education_group_name,

        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset(['education_name', 'education_type_name' , 'education_group_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->education_id = $id;
        $education = ModelsEducation::findOrFail($id);
        $this->education_name = $education->name;
        $this->education_type_name = $education->education_type_id;
        $this->education_group_name = $education->education_group_id;

    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $education = ModelsEducation::findOrFail($this->education_id);
        $education->update([
            'name' => $this->education_name,
            'education_type_id' => $this->education_type_name  ,
            'education_group_id' => $this->education_group_name


        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->education_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsEducation::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_education')]
    public function render_education(){
        $this->render();
    }
    public function render()
    {
        $education_types = EducationType::get();
        $education_groups = EducationGroup::get();

        $this->modal_title = $this->confirm_add ? 'ပညာအရည်အချင်းအသစ်ထည့်ရန်
' : 'ပညာအရည်အချင်းပြင်ရန်
';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $educationSearch = '%' . $this->education_search . '%';
        $educationQuery = ModelsEducation::query();
        if ($this->education_search) {
            $this->resetPage();
            $educationQuery->where(fn($q) => $q->where('name', 'LIKE', $educationSearch)->
            orWhereHas('education_type', fn($query) => $query->where('name', 'LIKE', $educationSearch)))
            ->orWhereHas('education_group', fn($query) => $query->where('name', 'LIKE', $educationSearch))

            ;
            $educations = $educationQuery->with('education_type' , 'education_group')->paginate($educationQuery->count() > 10 ? $educationQuery->count() : 10);
        } else {
            $educations = $educationQuery->with('education_type','education_group')->paginate(10);
        }
        return view('livewire.education.education', [
            'educations' => $educations,
            'education_types' => $education_types,
            'education_groups' => $education_groups,
        ]);
    }
}
