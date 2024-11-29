<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Department as ModelsDepartment;
use App\Models\Ministry;
use Livewire\Attributes\On;

class Department extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $department_search, $department_name, $ministry_name, $department_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

   
    protected $rules = [
        'department_name' => 'required|string|max:255',
        'ministry_name' => 'required',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['department_name', 'ministry_name']);
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
        ModelsDepartment::create([
            'name' => $this->department_name,
            'ministry_id' => $this->ministry_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['department_name', 'ministry_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->department_id = $id;
        $department = ModelsDepartment::findOrFail($id);
        $this->department_name = $department->name;
        $this->ministry_name = $department->ministry_id;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $department = ModelsDepartment::findOrFail($this->department_id);
        $department->update([
            'name' => $this->department_name,
            'ministry_id' => $this->ministry_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->department_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsDepartment::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_department')]
    public function render_department()
    {
        $this->render();
    }
    public function render()
    {
        $ministrys = Ministry::get();
        $this->modal_title = $this->confirm_add ? 'ဌာနစိတ်သိမ်းရန်' : 'ဌာနစိတ်ပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $departmentSearch = '%' . $this->department_search . '%';
        $departmentQuery = ModelsDepartment::query();
        if ($this->department_search) {
            $this->resetPage();
            $departmentQuery->where(fn($q) => $q->where('name', 'LIKE', $departmentSearch)->orWhereHas('ministry', fn($query) => $query->where('name', 'LIKE', $departmentSearch)));
            $departments = $departmentQuery->with('ministry')->paginate($departmentQuery->count() > 10 ? $departmentQuery->count() : 10);
        } else {
            $departments = $departmentQuery->with('ministry')->paginate(10);
        }

        return view('livewire.department', [
            'departments' => $departments,
            'ministrys' => $ministrys,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.department');
    // }
}
