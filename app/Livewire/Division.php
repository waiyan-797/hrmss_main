<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\DifficultyLevel;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Division as ModelsDivision;
use App\Models\DivisionType;
use App\Models\Rank;
use Livewire\WithPagination;

class Division extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $division_search, $division_name,$nick_name, $division_type_name,$department_name,$difficulty_level_name,$sort_no, $division_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'division_name' => 'required|string|max:255',
        'nick_name' => 'required|string|max:255',
        'division_type_name' => 'required',
        'department_name' => 'required',
        'difficulty_level_name' => 'required',
        'sort_no' => 'required|integer',
    ];
    
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset(['division_name','nick_name', 'division_type_name','department_name','difficulty_level_name','sort_no']);
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
        ModelsDivision::create([
            'name' => $this->division_name,
            'nick_name'=>$this->nick_name,
            'division_type_id' => $this->division_type_name,
            'department_id'=>$this->department_name,
            'difficulty_level_id'=>$this->difficulty_level_name,
            'sort_no'=>$this->sort_no,
            
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset(['division_name','nick_name', 'division_type_name','department_name','difficulty_level_name','sort_no']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->division_id = $id;
        $division = ModelsDivision::findOrFail($id);
        $this->division_name = $division->name;
        $this->nick_name=$division->nick_name;
        $this->division_type_name = $division->division_type_id;
        $this->department_name=$division->department_id;
        $this->difficulty_level_name=$division->difficulty_level_id;
        $this->sort_no=$division->sort_no;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $division = ModelsDivision::findOrFail($this->division_id);
        $division->update([
            'name' => $this->division_name,
            'nick_name'=>$this->nick_name,
            'division_type_id' => $this->division_type_name,
            'department_id'=>$this->department_name,
            'difficulty_level_id'=>$this->difficulty_level_name,
            'sort_no'=>$this->sort_no
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->division_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsDivision::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_division')]
    public function render_division(){
        $this->render();
    }
    public function render()
    {
        $division_types = divisionType::get();
        $departments=Department::get();
        $difficulty_levels=DifficultyLevel::get();
        $this->modal_title = $this->confirm_add ? 'ဌာနခွဲအသစ်ထည့်ရန်
' : 'ဌာနခွဲပြင်ရန်
';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $divisionSearch = '%' . $this->division_search . '%';
        $divisionQuery = ModelsDivision::query();
        if ($this->division_search) {
            $this->resetPage();
            $divisionQuery->where(fn($q) => $q->where('name', 'LIKE', $divisionSearch)->orWhereHas('divisionType', fn($query) => $query->where('name', 'LIKE', $divisionSearch)));
            $divisions = $divisionQuery->with('divisionType')->paginate($divisionQuery->count() > 10 ? $divisionQuery->count() : 10);
        } else {
            $divisions = $divisionQuery->with('divisionType')->paginate(10);
        }

        return view('livewire.division', [
            'divisions' => $divisions,
            'division_types' => $division_types,
            'departments'=>$departments,
            'difficulty_levels'=>$difficulty_levels,
        ]);
    }
}
