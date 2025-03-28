<?php

namespace App\Livewire;

use App\Models\DayOrMonth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LeaveType as ModelsLeaveType;
use App\Models\Rank;
use Livewire\Attributes\On;

class LeaveType extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $leave_type_search, $leave_type_name, $day_or_month_name,$allowed,$sort_no,$is_yearly, $leave_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'leave_type_name' => 'required|string|max:255',
        'day_or_month_name' => 'required',
        'allowed'=>'required|integer',
        'sort_no'=>'required|integer',
        'is_yearly'=>'required',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset(['leave_type_name', 'day_or_month_name','allowed','sort_no','is_yearly']);
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
        ModelsLeaveType::create([
            'name' => $this->leave_type_name,
            'day_or_month_id' => $this->day_or_month_name,
            'allowed'=>$this->allowed,
            'sort_no'=>$this->sort_no,
            'is_yearly'=>$this->is_yearly,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset(['leave_type_name', 'day_or_month_name','allowed','sort_no','is_yearly']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->leave_type_id = $id;
        $leave_type = ModelsLeaveType::findOrFail($id);
        $this->leave_type_name = $leave_type->name;
        $this->day_or_month_name = $leave_type->day_or_month_id;
        $this->allowed=$leave_type->allowed;
        $this->sort_no=$leave_type->sort_no;
        $this->is_yearly=$leave_type->is_yearly;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $leave_type = ModelsLeaveType::findOrFail($this->leave_type_id);
        $leave_type->update([
            'name' => $this->leave_type_name,
            'day_or_month_id' => $this->day_or_month_name,
            'allowed'=>$this->allowed,
            'sort_no'=>$this->sort_no,
            'is_yearly'=>$this->is_yearly
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->leave_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsLeaveType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_leave_type')]
    public function render_leave_type(){
        $this->render();
    }
//     public function render()
//     {
//         $dayOrMonths = DayOrMonth::get();
//         $this->modal_title = $this->confirm_add ? 'ခွင့် အမျိုးအစား
// အသစ်ထည့်ရန်' : 'ခွင့် အမျိုးအစားပြင်ရန်';
//         $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
//         $this->cancel_action = 'close_modal';
//         $this->submit_form = 'submitForm';

//         $LeaveTypeSearch = '%' . $this->leave_type_search . '%';
//         $LeaveTypeQuery = ModelsLeaveType::query();
//         if ($this->leave_type_search) {
//             $this->resetPage();
//             $LeaveTypeQuery->where(fn($q) => $q->where('name', 'LIKE', $LeaveTypeSearch)->orWhereHas('dayOrMonths', fn($query) => $query->where('name', 'LIKE', $LeaveTypeSearch)));
//             $leave_types = $LeaveTypeQuery->with('dayOrMonths')->paginate($LeaveTypeQuery->count() > 10 ? $LeaveTypeQuery->count() : 10);
//         } else {
//             $leave_types = $LeaveTypeQuery->with('dayOrMonths')->paginate(10);
//         }

//         return view('livewire.leave-type', [
//             'leave_types' => $leave_types,
//             'dayOrMonths' => $dayOrMonths,
//         ]);
//     }
public function render()
{
    $dayOrMonths = DayOrMonth::all(); 
    $this->modal_title = $this->confirm_add ? 'ခွင့် အမျိုးအစား အသစ်ထည့်ရန်' : 'ခွင့် အမျိုးအစား ပြင်ရန်';
    $this->submit_button_text = 'သိမ်းရန်';
    $this->cancel_action = 'close_modal';
    $this->submit_form = 'submitForm';
    $LeaveTypeSearch = '%' . $this->leave_type_search . '%';
    $leave_types = ModelsLeaveType::when($this->leave_type_search, function ($query) use ($LeaveTypeSearch) {
        $query->where('name', 'LIKE', $LeaveTypeSearch);
    })
    ->with('dayOrMonths')
    ->paginate(10);

    return view('livewire.leave-type', [
        'leave_types' => $leave_types,
        'dayOrMonths' => $dayOrMonths,
    ]);
}
}
