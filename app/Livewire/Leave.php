<?php

namespace App\Livewire;

use App\Models\Leave as ModelsLeave;
use App\Models\LeaveType;
use App\Models\Staff;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Leave extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $leave_search, $leave_name, $leave_type_name, $leave_id, $staff_name, $from_date, $to_date, $qty, $order_no, $remark;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;
    public $staff_id;

    public $staff;
    //Validation
    protected $rules = [

        'leave_type_name' => 'required',
        'from_date' => 'required',
        'to_date' => 'required',
        'qty' => 'required',
        'order_no' => 'required',
        'remark' => 'required',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['staff_name', 'leave_type_name', 'from_date', 'to_date', 'qty', 'order_no', 'remark']);
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

        // $this->validate();

        ModelsLeave::create([
            'staff_id' => $this->staff_id,
            'leave_type_id' => $this->leave_type_name,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'qty' => $this->qty,
            'order_no' => $this->order_no,
            'remark' => $this->remark,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['staff_name', 'leave_type_name', 'from_date', 'to_date', 'qty', 'order_no', 'remark']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->leave_id = $id;
        $leave = ModelsLeave::findOrFail($id);
        $this->from_date = $leave->from_date;
        $this->to_date = $leave->to_date;
        $this->staff_name = $leave->staff_id;
        $this->qty = $leave->qty;
        $this->order_no = $leave->order_no;
        $this->remark  = $leave->remark;
        $this->leave_type_name = $leave->leave_type_id;
    }

    //update
    public function updatePosition()
    {
        $this->validate();

        $leave = ModelsLeave::findOrFail($this->leave_id);
        $leave->update([
            'staff_id' => $this->staff_name,
            'leave_type_id' => $this->leave_type_name,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'qty' => $this->qty,
            'order_no' => $this->order_no,
            'remark' => $this->remark,
        ]);
        $this->message = 'Updated successfully.';

        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->leave_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsLeave::find($id)->delete();
        $this->confirm_delete = false;
    }

    public function mount($staff_id)
    {
        $this->staff_id = $staff_id;
    }

    #[On('render_leave')]
    public function render_leave()
    {
        $this->render();
    }
    public function render()
    {

        $staff = Staff::find($this->staff_id);
        $leave_types = LeaveType::get();
        $this->modal_title = $this->confirm_add ? 'ခွင့်အသစ်ထည့်ရန်' : 'ခွင့်ပြင်ရန်
';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $leaveSearch = '%' . $this->leave_search . '%';
        $leaveQuery = ModelsLeave::query()->where('staff_id', $this->staff_id);
        if ($this->leave_search) {
            $this->resetPage();

            $leaves = $leaveQuery->with('leave_type')->where('remark', 'LIKE', $leaveSearch)->paginate($leaveQuery->count() > 10 ? $leaveQuery->count() : 10);
        } else {
            $leaves = $leaveQuery->with('leave_type')->paginate(10);
        }
        // return view('home');
        return view('livewire.leave', [
            'leaves' => $leaves,
            'staff' => $staff,
            'leave_types' => $leave_types,
        ]);
    }
}
