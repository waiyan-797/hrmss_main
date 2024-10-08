<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Salary as ModelsSalary;
use App\Models\Staff;
use App\Models\Rank;
use Livewire\Attributes\On;

class Salary extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $salary_search, $staff_name, $rank_name, $salary_id, $salary_month, $current_salary, $current_salary_day, $previous_salary_before_increment, $previous_salary_before_increment_day, $previous_salary_before_salary, $previous_salary_before_salary_day, $addition, $addition_education, $addition_ration, $deduction, $deduction_insurance, $deduction_tax, $actual_salary;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    protected $rules = [
        'staff_name' => 'required',
        'rank_name' => 'required',
        'salary_month' => 'required|date',
        'current_salary' => 'required',
        'current_salary_day' => 'required|date',
        'previous_salary_before_increment' => 'required',
        'previous_salary_before_increment_day' => 'required|date',
        'previous_salary_before_salary' => 'required',
        'previous_salary_before_salary_day' => 'required|date',
        'addition' => 'required',
        'addition_education' => 'required',
        'addition_ration' => 'required',
        'deduction' => 'required',
        'deduction_insurance' => 'required',
        'deduction_tax' => 'required',
        'actual_salary' => 'required',
    ];

    public function add_new()
    {
        $this->resetValidation();
        $this->reset([
            'staff_name', 'rank_name', 'salary_month', 'current_salary', 'current_salary_day',
            'previous_salary_before_increment', 'previous_salary_before_increment_day',
            'previous_salary_before_salary', 'previous_salary_before_salary_day',
            'addition', 'addition_education', 'addition_ration', 'deduction',
            'deduction_insurance', 'deduction_tax', 'actual_salary'
        ]);
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

    public function submitForm()
    {
        if ($this->confirm_add) {
            $this->createSalary();
        } else {
            $this->updateSalary();
        }
    }

    public function createSalary()
    {
        $this->validate();
        ModelsSalary::create([
            'staff_id' => $this->staff_name,
            'rank_id' => $this->rank_name,
            'salary_month' => $this->salary_month,
            'current_salary' => $this->current_salary,
            'current_salary_day' => $this->current_salary_day,
            'previous_salary_before_increment' => $this->previous_salary_before_increment,
            'previous_salary_before_increment_day' => $this->previous_salary_before_increment_day,
            'previous_salary_before_salary' => $this->previous_salary_before_salary,
            'previous_salary_before_salary_day' => $this->previous_salary_before_salary_day,
            'addition' => $this->addition,
            'addition_education' => $this->addition_education,
            'addition_ration' => $this->addition_ration,
            'deduction' => $this->deduction,
            'deduction_insurance' => $this->deduction_insurance,
            'deduction_tax' => $this->deduction_tax,
            'actual_salary' => $this->actual_salary,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['staff_name', 'rank_name', 'salary_month', 'current_salary', 'current_salary_day',
            'previous_salary_before_increment', 'previous_salary_before_increment_day',
            'previous_salary_before_salary', 'previous_salary_before_salary_day',
            'addition', 'addition_education', 'addition_ration', 'deduction',
            'deduction_insurance', 'deduction_tax', 'actual_salary'
        ]);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->salary_id = $id;
        $salary = ModelsSalary::findOrFail($id);
        $this->staff_name = $salary->staff_id;
        $this->rank_name = $salary->rank_id;
        $this->salary_month = $salary->salary_month;
        $this->current_salary = $salary->current_salary;
        $this->current_salary_day = $salary->current_salary_day;
        $this->previous_salary_before_increment = $salary->previous_salary_before_increment;
        $this->previous_salary_before_increment_day = $salary->previous_salary_before_increment_day;
        $this->previous_salary_before_salary = $salary->previous_salary_before_salary;
        $this->previous_salary_before_salary_day = $salary->previous_salary_before_salary_day;
        $this->addition = $salary->addition;
        $this->addition_education = $salary->addition_education;
        $this->addition_ration = $salary->addition_ration;
        $this->deduction = $salary->deduction;
        $this->deduction_insurance = $salary->deduction_insurance;
        $this->deduction_tax = $salary->deduction_tax;
        $this->actual_salary = $salary->actual_salary;
    }

    public function updateSalary()
    {
        $this->validate();
        $salary = ModelsSalary::findOrFail($this->salary_id);
        $salary->update([
            'staff_id' => $this->staff_name,
            'rank_id' => $this->rank_name,
            'salary_month' => $this->salary_month,
            'current_salary' => $this->current_salary,
            'current_salary_day' => $this->current_salary_day,
            'previous_salary_before_increment' => $this->previous_salary_before_increment,
            'previous_salary_before_increment_day' => $this->previous_salary_before_increment_day,
            'previous_salary_before_salary' => $this->previous_salary_before_salary,
            'previous_salary_before_salary_day' => $this->previous_salary_before_salary_day,
            'addition' => $this->addition,
            'addition_education' => $this->addition_education,
            'addition_ration' => $this->addition_ration,
            'deduction' => $this->deduction,
            'deduction_insurance' => $this->deduction_insurance,
            'deduction_tax' => $this->deduction_tax,
            'actual_salary' => $this->actual_salary,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    public function delete_confirm($id)
    {
        $this->salary_id = $id;
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        ModelsSalary::findOrFail($id)->delete();
        $this->confirm_delete = false;
    }

   
   #[On('render_salary')]
  public function render_salary()
  {
    $this->render();
}
//   public function render()
// {
    
//     $staffs = Staff::all();
//     $ranks = Rank::all();
//     $this->modal_title = $this->confirm_add ? 'လစာသိမ်းရန်' : 'လစာပြင်ရန်';
//     $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
//     $this->cancel_action = 'close_modal';
//     $this->submit_form = 'submitForm';

//     $salarySearch = '%' . $this->salary_search . '%';
//     $salaryQuery = ModelsSalary::query();
//     if ($this->salary_search) {
//         $this->resetPage();
//         $salaryQuery->where(fn($q) => $q->where('name', 'LIKE', $salarySearch)->orWhereHas('staff', fn($query) => $query->where('name', 'LIKE', $salarySearch)));
//         $salarys = $salaryQuery->with('staff')->paginate($salaryQuery->count() > 10 ? $salaryQuery->count() : 10);
//     } else {
//         $salarys = $salaryQuery->with('staff')->paginate(10);
//     }
   
//     return view('livewire.salary', [
//         'salarys' => $salarys,
//         'staffs' => $staffs,
//         'ranks' => $ranks,
//     ]);
// }
public function render()
{
   
    $staffs = Staff::all();
    $ranks = Rank::all();
    $this->modal_title = $this->confirm_add ? 'အတိုးနှူန်းသိမ်းရန်' : 'အတိုးနှုန်းပြင်ရန်';
    $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
    $this->cancel_action = 'close_modal';
    $this->submit_form = 'submitForm';
    $salarySearch = '%' . $this->salary_search . '%';
    $salaryQuery =ModelsSalary::query();
    if ($this->salary_search) {
        $this->resetPage();
        $salaryQuery->where(function ($q) use ($salarySearch) {
            $q->where('rank_name' ,'LIKE', $salarySearch)->orWhereHas('staff', function ($query) use ($salarySearch) {
                  $query->where('name', 'LIKE', $salarySearch);
              });
        });
       
        
    }

    $salarys = $salaryQuery->with(['staff', 'rank'])
        ->paginate($salaryQuery->count() > 10 ? $salaryQuery->count() : 10);
    return view('livewire.salary', [
        'salarys' => $salarys,
        'staffs' => $staffs,
        'ranks' => $ranks,
    ]);
}   

}

