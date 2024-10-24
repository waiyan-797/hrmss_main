<?php

namespace App\Livewire\Payscale;

use App\Models\Payscale as ModelsPayscale;
use App\Models\StaffType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Payscale extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $payscale_search, $payscale_name, $payscale_min_salary, $payscale_increment,$supply, $payscale_max_salary, $staff_type_name, $payscale_id,$allowed_qty;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'payscale_name' => 'required',
        'payscale_min_salary' => 'required',
        'payscale_increment' => 'required',
        'payscale_max_salary' => 'required',
        'staff_type_name' => 'required',
        'allowed_qty'=>'required',
        'supply'=>'required',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset(['payscale_name', 'payscale_min_salary', 'payscale_increment', 'payscale_max_salary', 'staff_type_name','allowed_qty','supply']);
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
        ModelsPayscale::create([
            'name' => $this->payscale_name,
            'min_salary' => $this->payscale_min_salary,
            'increment' => $this->payscale_increment,
            'max_salary' => $this->payscale_max_salary,
            'staff_type_id' => $this->staff_type_name,
            'allowed_qty'=>$this->allowed_qty,
            'supply'=>$this->supply,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset(['payscale_name', 'payscale_min_salary', 'payscale_increment', 'payscale_max_salary', 'staff_type_name','allowed_qty','supply']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->payscale_id = $id;
        $payscale = ModelsPayscale::findOrFail($id);
        $this->payscale_name = $payscale->name;
        $this->payscale_min_salary = $payscale->min_salary;
        $this->payscale_increment = $payscale->increment;
        $this->payscale_max_salary = $payscale->max_salary;
        $this->staff_type_name = $payscale->staff_type_id;
        $this->allowed_qty=$payscale->allowed_qty;
        $this->supply=$payscale->supply;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $payscale = ModelsPayscale::findOrFail($this->payscale_id);
        $payscale->update([
            'name' => $this->payscale_name,
            'min_salary' => $this->payscale_min_salary,
            'increment' => $this->payscale_increment,
            'max_salary' => $this->payscale_max_salary,
            'staff_type_id' => $this->staff_type_name,
            'allowed_qty'=>$this->allowed_qty,
            'supply'=>$this->supply,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->payscale_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsPayscale::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_payscale')]
    public function render_payscale(){
        $this->render();
    }
    public function render()
    {
        $staff_types = StaffType::get();
        $this->modal_title = $this->confirm_add ? 'လစာနှုန်းသိမ်းရန်' : 'လစာနှုန်းပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $payscaleSearch = '%' . $this->payscale_search . '%';
        $payscaleQuery = ModelsPayscale::query();
        if ($this->payscale_search) {
            $this->resetPage();
            $payscaleQuery->where(fn($q) => $q->where('name', 'LIKE', $payscaleSearch)->orWhereHas('staff_type', fn($query) => $query->where('name', 'LIKE', $payscaleSearch)));
            $payscales = $payscaleQuery->with('staff_type')->paginate($payscaleQuery->count() > 10 ? $payscaleQuery->count() : 10);
        } else {
            $payscales = $payscaleQuery->with('staff_type')->paginate(10);
        }

        return view('livewire.payscale.payscale', [
            'payscales' => $payscales,
            'staff_types' => $staff_types,
        ]);
    }
}
