<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LetterType as ModelsLetterType;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class LetterType extends Component
{


    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $letter_type_search, $letter_type_name, $letter_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'letter_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('letter_type_name');
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
        ModelsLetterType::create([
            'name' => $this->letter_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('letter_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->letter_type_id = $id;
        $letter_type = ModelsLetterType::findOrFail($id);
        $this->letter_type_name = $letter_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsLetterType::findOrFail($this->letter_type_id)->update([
            'name' => $this->letter_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->letter_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsLetterType::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_letter_type')]
    public function render_letter_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'စာအဆင့်အတန်းအသစ်ထည့်ရန်
' : 'စာအဆင့်အတန်းပြင်ရန်
';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $letterTypeSearch = '%' . $this->letter_type_search . '%';
        $letterTypeQuery = ModelsLetterType::query();
        if ($this->letter_type_search) {
            $this->resetPage();
            $letterTypeQuery->where('name', 'LIKE', $letterTypeSearch);
            $letter_types = $letterTypeQuery->paginate($letterTypeQuery->count() > 10 ? $letterTypeQuery->count() : 10);
        } else {
            $letter_types = $letterTypeQuery->paginate(10);
        }

        return view('livewire.letter-type', [
            'letter_types' => $letter_types,
        ]);
    }
}
