<?php

namespace App\Livewire;

use App\Models\RelationShipType as ModelsRelationShipType;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class RelationShipType extends Component
{

    use WithPagination;
    public $confirm_delete = false;
    
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $relation_ship_type_search, $relation_ship_type_name, $relation_ship_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //validation
    protected $rules = [
        'relation_ship_type_name' => 'required',
    ];

     //add new
    public function add_new(){
        $this->resetValidation();
        $this->reset('relation_ship_type_name');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

     //submit form
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createrelation_ship_type();
        } else {
            $this->updaterelation_ship_type();
        }
    }

    //create
    public function createrelation_ship_type()
    {
        $this->validate();
        ModelsRelationShipType::create([
            'name' => $this->relation_ship_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal(){
        $this->resetValidation();
        $this->reset('relation_ship_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    //edit
    public function edit_modal($id){
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->relation_ship_type_id = $id;
        $relation_ship_type = ModelsRelationShipType::findOrFail($id);
        $this->relation_ship_type_name = $relation_ship_type->name;
    }

    //update
    public function updaterelation_ship_type()
    {
        $this->validate();
        ModelsRelationShipType::findOrFail($this->relation_ship_type_id)->update([
            'name' => $this->relation_ship_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id){
        
        $this->relation_ship_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id){
        ModelsRelationShipType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_relation_ship_type')]
    public function render_relation_ship_type(){
        $this->render();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'တော်စပ်ပုံအမျိုးအစားအသစ်ထည့်ပါ
' : 'တော်စပ်အမျိုးအစားပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $relation_ship_typeSearch = '%' . $this->relation_ship_type_search . '%';
        $relation_ship_typeQuery = ModelsRelationShipType::query();
        if ($this->relation_ship_type_search) {
            $this->resetPage();
            $relation_ship_typeQuery->where('name', 'LIKE', $relation_ship_typeSearch);
            $relation_ship_types = $relation_ship_typeQuery->paginate($relation_ship_typeQuery->count() > 10 ? $relation_ship_typeQuery->count() : 10);
        } else {
            $relation_ship_types = $relation_ship_typeQuery->paginate(perPage: 10);
        }

        return view('livewire.relation-ship-type', [
            'relation_ship_types' => $relation_ship_types,
        ]);
    }

   
}
