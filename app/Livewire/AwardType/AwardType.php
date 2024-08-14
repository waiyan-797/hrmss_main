<?php

namespace App\Livewire\AwardType;

use App\Models\AwardType as ModelsAwardType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AwardType extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $award_type_search, $award_type_name, $award_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'award_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset('award_type_name');
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
        ModelsAwardType::create([
            'name' => $this->award_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('award_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->award_type_id = $id;
        $award_type = ModelsAwardType::findOrFail($id);
        $this->award_type_name = $award_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsAwardType::findOrFail($this->award_type_id)->update([
            'name' => $this->award_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->award_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsAwardType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_award_type')]
    public function render_award_type(){
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'Add award Type' : 'Edit award Type';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $awardTypeSearch = '%' . $this->award_type_search . '%';
        $awardTypeQuery = ModelsAwardType::query();
        if ($this->award_type_search) {
            $this->resetPage();
            $awardTypeQuery->where('name', 'LIKE', $awardTypeSearch);
            $award_types = $awardTypeQuery->paginate($awardTypeQuery->count() > 10 ? $awardTypeQuery->count() : 10);
        } else {
            $award_types = $awardTypeQuery->paginate(10);
        }

        return view('livewire.award-type.award-type', [
            'award_types' => $award_types,
        ]);
    }
}
