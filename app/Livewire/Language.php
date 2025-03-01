<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Language as ModelsLanguage;
use Livewire\Attributes\On;

class Language extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $language_type_search, $language_type_name, $language_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'language_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('language_type_name');
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
        ModelsLanguage::create([
            'name' => $this->language_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('language_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->language_type_id = $id;
        $language_type = ModelsLanguage::findOrFail($id);
        $this->language_type_name = $language_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsLanguage::findOrFail($this->language_type_id)->update([
            'name' => $this->language_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->language_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsLanguage::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_language_type')]
    public function render_language_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ဘာသာစကားအသစ်ထည့်ရန်
' :'ဘာသာစကားပြင်ရန်' ;

        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $languageTypeSearch = '%' . $this->language_type_search . '%';
        $languageTypeQuery = ModelsLanguage::query();
        if ($this->language_type_search) {
            $this->resetPage();
            $languageTypeQuery->where('name', 'LIKE', $languageTypeSearch);
            $language_types = $languageTypeQuery->paginate($languageTypeQuery->count() > 10 ? $languageTypeQuery->count() : 10);
        } else {
            $language_types = $languageTypeQuery->paginate(10);
        }

        return view('livewire.language', [
            'language_types' => $language_types,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.language');
    // }
}
