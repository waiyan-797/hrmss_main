<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Region as ModelsRegion;

class Region extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $region_search, $region_name, $region_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //validation
    protected $rules = [
        'region_name' => 'required',
    ];

    //add new
    public function add_new()
    {
        $this->resetValidation();
        $this->reset('region_name');
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

    //submit form
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createRegion();
        } else {
            $this->updateRegion();
        }
    }

    //create
    public function createRegion()
    {
        $this->validate();
        ModelsRegion::create([
            'name' => $this->region_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset('region_name');
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->region_id = $id;
        $relation = ModelsRegion::findOrFail($id);
        $this->region_name = $relation->name;
    }

    //update
    public function updateRegion()
    {
        $this->validate();
        ModelsRegion::findOrFail($this->region_id)->update([
            'name' => $this->region_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->region_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsRegion::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_region')]
    public function render_region()
    {
        $this->render();
    }

    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ပြည်နယ်/တိုင်းဒေသကြီးအသစ်ထည့်ရန်
' : 'ပြည်နယ်/တိုင်းဒေသကြီးပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $regionSearch = '%' . $this->region_search . '%';
        $regionQuery = ModelsRegion::query();
        if ($this->region_search) {
            $this->resetPage();
            $regionQuery->where('name', 'LIKE', $regionSearch);
            $regions = $regionQuery->paginate($regionQuery->count() > 10 ? $regionQuery->count() : 10);
        } else {
            $regions = $regionQuery->paginate(10);
        }

        return view('livewire.region', [
            'regions' => $regions,
        ]);
    }
}
