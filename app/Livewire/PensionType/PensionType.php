<?php

namespace App\Livewire\PensionType;

use App\Models\PensionType as ModelsPensionType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PensionType extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $pension_type_search, $pension_type_name, $pension_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'pension_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset('pension_type_name');
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
        ModelsPensionType::create([
            'name' => $this->pension_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('pension_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->pension_type_id = $id;
        $pension_type = ModelsPensionType::findOrFail($id);
        $this->pension_type_name = $pension_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsPensionType::findOrFail($this->pension_type_id)->update([
            'name' => $this->pension_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->pension_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsPensionType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_pension_type')]
    public function render_pension_type(){
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add pension Type' : 'Edit pension Type';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $pensionTypeSearch = '%' . $this->pension_type_search . '%';
        $pensionTypeQuery = ModelsPensionType::query();
        if ($this->pension_type_search) {
            $this->resetPage();
            $pensionTypeQuery->where('name', 'LIKE', $pensionTypeSearch);
            $pension_types = $pensionTypeQuery->paginate($pensionTypeQuery->count() > 10 ? $pensionTypeQuery->count() : 10);
        } else {
            $pension_types = $pensionTypeQuery->paginate(10);
        }

        return view('livewire.pension-type.pension-type', [
            'pension_types' => $pension_types,
        ]);
    }
}
