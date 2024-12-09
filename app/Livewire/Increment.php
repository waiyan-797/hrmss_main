<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Increment as ModelsIncrement;
use App\Models\Staff;
use App\Models\Rank;
use App\Models\User;
use Livewire\Attributes\On;

class Increment extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $increment_search, $staff_name, $increment_id, $increment_rank_name, $min_salary, $increment, $max_salary, $increment_date, $increment_time, $order_no, $remark;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;
    public $staff;
    public $staff_id;
    protected $rules = [
        'staff_name' => 'required',
        'increment_rank_name' => 'required',
        'min_salary' => 'required',
        'increment' => 'required',
        'max_salary' => 'required',
        'increment_date' => 'required|date',
        'increment_time' => 'required',
        'order_no' => 'required|max:255',
        'remark' => 'required',

    ];

    public function mount($staff_id)
    {
        $this->staff_id = $staff_id;
        $this->staff = Staff::find($staff_id);
    }

    public function add_new()
    {




        $this->resetValidation();
        $this->reset([
            'staff_name',
            'increment_rank_name',
            'min_salary',
            'increment',
            'max_salary',
            'increment_date',
            'increment_time',
            'order_no',
            'remark'
        ]);

        $this->increment_rank_name = $this->staff->currentRank->id;
        $this->min_salary = $this->staff->currentRank->payscale->min_salary;

        $this->increment = $this->staff->currentRank->payscale->increment;
        $this->max_salary = $this->staff->currentRank->payscale->max_salary;

        $this->confirm_add = true;
        $this->confirm_edit = false;
    }
    public function submitForm()
    {
        if ($this->confirm_add) {
            $this->createincrement();
        } else {
            $this->updateincrement();
        }
    }
    public function createincrement()
    {
        // $this->validate();


        ModelsIncrement::create([
            'staff_id' => $this->staff_id,
            'increment_rank_id' => $this->increment_rank_name,
            'min_salary' => $this->min_salary,
            'increment' => $this->increment,
            'max_salary' => $this->max_salary,
            'increment_date' => $this->increment_date,
            'increment_time' => $this->increment_time,
            'order_no' => $this->order_no,
            'remark' => $this->remark,


        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset([
            'staff_name',
            'increment_rank_name',
            'min_salary',
            'increment',
            'max_salary',
            'increment_date',
            'increment_time',
            'order_no',
            'remark'
        ]);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->increment_id = $id;
        $increment = ModelsIncrement::findOrFail($id);
        $this->staff_name = $increment->staff_id;
        $this->increment_rank_name = $increment->increment_rank_id;
        $this->min_salary = $increment->min_salary;
        $this->increment = $increment->increment;
        $this->max_salary = $increment->max_salary;
        $this->increment_date = $increment->increment_date;
        $this->increment_time = $increment->increment_time;
        $this->order_no = $increment->order_no;
        $this->remark = $increment->remark;
    }

    public function updateincrement()
    {
        $this->validate();
        $increment = ModelsIncrement::findOrFail($this->increment_id);
        $increment->update([
            'staff_id' => $this->staff_name,
            'increment_rank_id' => $this->increment_rank_name,
            'min_salary' => $this->min_salary,
            'increment' => $this->increment,
            'max_salary' => $this->max_salary,
            'increment_date' => $this->increment_date,
            'increment_time' => $this->increment_time,
            'order_no' => $this->order_no,
            'remark' => $this->remark,


        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    public function delete_confirm($id)
    {
        $this->increment_id = $id;
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        ModelsIncrement::findOrFail($id)->delete();
        $this->confirm_delete = false;
    }


    #[On('render_increment')]
    public function render_increment()
    {
        $this->render();
    }
    public function render()
    {


        $ranks = Rank::all();
        $this->modal_title = $this->confirm_add ? 'နှစ်တိုးသိမ်းရန်' : 'နှစ်တိုးပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';
        $incrementSearch = '%' . $this->increment_search . '%';
        $incrementQuery = ModelsIncrement::query();
        if ($this->increment_search) {
            $this->resetPage();
            $incrementQuery->where(function ($q) use ($incrementSearch) {
                $q->where('order_no', 'LIKE', $incrementSearch)->orWhereHas('staff', function ($query) use ($incrementSearch) {
                    $query->where('name', 'LIKE', $incrementSearch);
                })
                
                ;
            })
            
           
            ;
        }

        $increments = $incrementQuery
        ->where('staff_id' ,$this->staff_id)
        ->with(['staff', 'rank'])
            ->paginate($incrementQuery->count() > 10 ? $incrementQuery->count() : 10);
        return view('livewire.increment', [
            'increments' => $increments,
            'staff' => $this->staff,
            'ranks' => $ranks,
        ]);
    }
}
