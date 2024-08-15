<?php

namespace App\Livewire\District;

use App\Models\District as ModelsDistrict;
use App\Models\Region;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class District extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $district_search, $district_name, $region_name, $district_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'district_name' => 'required|string|max:255',
        'region_name' => 'required',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['district_name', 'region_name']);
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
        ModelsDistrict::create([
            'name' => $this->district_name,
            'region_id' => $this->region_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['district_name', 'region_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->district_id = $id;
        $district = ModelsDistrict::findOrFail($id);
        $this->district_name = $district->name;
        $this->region_name = $district->region_id;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $district = ModelsDistrict::findOrFail($this->district_id);
        $district->update([
            'name' => $this->district_name,
            'education_group_id' => $this->region_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->district_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsDistrict::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_district')]
    public function render_district()
    {
        $this->render();
    }
    public function render()
    {
        $regions = Region::get();
        $this->modal_title = $this->confirm_add ? 'Add district' : 'Edit district';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $districtSearch = '%' . $this->district_search . '%';
        $districtQuery = ModelsDistrict::query();
        if ($this->district_search) {
            $this->resetPage();
            $districtQuery->where(fn($q) => $q->where('name', 'LIKE', $districtSearch)->orWhereHas('region', fn($query) => $query->where('name', 'LIKE', $districtSearch)));
            $districts = $districtQuery->with('region')->paginate($districtQuery->count() > 10 ? $districtQuery->count() : 10);
        } else {
            $districts = $districtQuery->with('region')->paginate(10);
        }

        return view('livewire.district.district', [
            'districts' => $districts, //'districts' ca foreign name
            'regions' => $regions,
        ]);
    }
}
