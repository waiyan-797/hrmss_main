<?php

namespace App\Livewire\Country;

use App\Models\Country as ModelsCountry;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Country extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $country_type_search, $country_type_name, $country_type_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'country_type_name' => 'required|string|max:255',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('country_type_name');
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
        ModelsCountry::create([
            'name' => $this->country_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('country_type_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->country_type_id = $id;
        $country_type = ModelsCountry::findOrFail($id);
        $this->country_type_name = $country_type->name;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsCountry::findOrFail($this->country_type_id)->update([
            'name' => $this->country_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->country_type_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsCountry::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_country_type')]
    public function render_country_type()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'တိုင်းပြည်အသစ်ထည့်ရန်
' :'တိုင်းပြည်ပြင်ရန်' ;

        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $countryTypeSearch = '%' . $this->country_type_search . '%';
        $countryTypeQuery = ModelsCountry::query();
        if ($this->country_type_search) {
            $this->resetPage();
            $countryTypeQuery->where('name', 'LIKE', $countryTypeSearch);
            $country_types = $countryTypeQuery->paginate($countryTypeQuery->count() > 10 ? $countryTypeQuery->count() : 10);
        } else {
            $country_types = $countryTypeQuery->paginate(10);
        }

        return view('livewire.country.country', [
            'country_types' => $country_types,
        ]);
    }
}
