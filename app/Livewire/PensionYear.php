<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PensionYear as ModelsPensionYear;
use Livewire\Attributes\On;


class PensionYear extends Component
{

    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $pension_year_search, $pension_year, $pension_year_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //validation
    protected $rules = [
        'pension_year' => 'required',
    ];

     //add new
    public function add_new(){
        $this->resetValidation();
        $this->reset('pension_year');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

     //submit form
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createPensionYear();
        } else {
            $this->updatePensionYear();
        }
    }

    //create
    public function createPensionYear()
    {
        $this->validate();
        ModelsPensionYear::create([
            'year' => $this->pension_year,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('pension_year');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->pension_year_id = $id;
        $pension_year = ModelsPensionYear::findOrFail($id);
        $this->pension_year = $pension_year->year;
    }

    //update
    public function updatePensionYear()
    {
        $this->validate();
        ModelsPensionYear::findOrFail($this->pension_year_id)->update([
            'year' => $this->pension_year,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->pension_year_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsPensionYear::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_pension_year')]
    public function render_pension_year(){
        $this->render();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add Pension Year' : 'Edit Pension Year';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $pensionYearSearch = '%' . $this->pension_year_search . '%';
        $pensionYearQuery = ModelsPensionYear::query();
        if ($this->pension_year_search) {
            $this->resetPage();
            $pensionYearQuery->where('name', 'LIKE', $pensionYearSearch);
            $pension_years = $pensionYearQuery->paginate($pensionYearQuery->count() > 10 ? $pensionYearQuery->count() : 10);
        } else {
            $pension_years = $pensionYearQuery->paginate(10);
        }

        return view('livewire.pension-year', [
            'pension_years' => $pension_years,
        ]);
    }










    // public function render()
    // {
    //     return view('livewire.pension-year');
    // }
}
