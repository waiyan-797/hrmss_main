<?php

namespace App\Livewire\Award;

use App\Models\Award as ModelsAward;
use App\Models\AwardType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Award extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $award_search, $award_name, $award_type_name, $award_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'award_name' => 'required',
        'award_type_name' => 'required',
    ];
    //Add New
    public function add_new(){
        $this->resetValidation();
        $this->reset(['award_name', 'award_type_name']);
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
        ModelsAward::create([
            'name' => $this->award_name,
            'award_type_id' => $this->award_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset(['award_name', 'award_type_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->award_id = $id;
        $award = ModelsAward::findOrFail($id);
        $this->award_name = $award->name;
        $this->award_type_name = $award->award_type_id;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $award = ModelsAward::findOrFail($this->award_id);
        $award->update([
            'name' => $this->award_name,
            'award_type_id' => $this->award_type_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        $this->award_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsAward::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_award')]
    public function render_award(){
        $this->render();
    }
    public function render()
    {
        $award_types = AwardType::get();
        $this->modal_title = $this->confirm_add ? 'Add Award' : 'Edit Award';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $awardSearch = '%' . $this->award_search . '%';
        $awardQuery = ModelsAward::query();
        if ($this->award_search) {
            $this->resetPage();
            $awardQuery->where(fn($q) => $q->where('name', 'LIKE', $awardSearch)->orWhereHas('award_type', fn($query) => $query->where('name', 'LIKE', $awardSearch)));
            $awards = $awardQuery->with('award_type')->paginate($awardQuery->count() > 10 ? $awardQuery->count() : 10);
        } else {
            $awards = $awardQuery->with('award_type')->paginate(10);
        }

        return view('livewire.award.award', [
            'awards' => $awards,
            'award_types' => $award_types,
        ]);
    }
}
