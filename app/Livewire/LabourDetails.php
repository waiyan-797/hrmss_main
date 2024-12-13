<?php

namespace App\Livewire;

use App\Models\NrcRegionId;
use App\Models\NrcSign;
use App\Models\NrcTownshipCode;
use App\Models\Region;
use App\Models\Staff;
use App\Models\Township;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LabourDetails extends Component
{
    
    use WithFileUploads;

    public $staff;

    // Fields
    public $name, $dob, $phone;
    public $nrc_region_ids, $nrc_region_id;
    public $nrc_township_code_id, $nrc_township_codes;
    public $nrc_sign_id, $nrc_signs, $nrc_code;
    public $nrc_front, $nrc_back;
    public $staff_nrc_front, $staff_nrc_back;
    public $regions;
    public $townships;
    public $current_address_street, $current_address_ward, $current_address_township_or_town_id, $current_address_region_id;
    public $current_address_townships;
    public $permanent_address_street, $permanent_address_ward, $permanent_address_township_or_town_id, $permanent_address_region_id;
    public $permanent_address_townships;

    public function render()
    {
        
        $this->nrc_township_codes = $this->nrc_region_id 
            ? NrcTownshipCode::where('nrc_region_id_id', $this->nrc_region_id)->get()
            : collect();

        $this->current_address_townships = $this->current_address_region_id 
            ? Township::where('region_id', $this->current_address_region_id)->get()
            : collect();

        $this->permanent_address_townships = $this->permanent_address_region_id 
            ? Township::where('region_id', $this->permanent_address_region_id)->get()
            : collect();

        return view('livewire.labour-details');
    }

    public function submit()
    {
        // Validate uploaded files
        if ($this->nrc_front) {
            $this->nrc_front = Storage::disk('upload')->put('staffs', $this->nrc_front);
            if ($this->staff && $old = $this->staff->nrc_front) {
                Storage::disk('upload')->delete($old);
            }
        }

        if ($this->nrc_back) {
            $this->nrc_back = Storage::disk('upload')->put('staffs', $this->nrc_back);
            if ($this->staff && $old = $this->staff->nrc_back) {
                Storage::disk('upload')->delete($old);
            }
        }

       
        Staff::updateOrCreate(
            ['id' => $this->staff?->id],
            [
                'name' => $this->name,
                'dob' => $this->dob,
                'nrc_region_id_id' => $this->nrc_region_id,
                'nrc_township_code_id' => $this->nrc_township_code_id,
                'nrc_sign_id' => $this->nrc_sign_id,
                'nrc_code' => $this->nrc_code,
                'nrc_front' => $this->nrc_front,
                'nrc_back' => $this->nrc_back,
                'payscale_id' => 13,
                'current_rank_id' => 23,
                'phone' => $this->phone,
                'current_address_street' => $this->current_address_street,
                'current_address_ward' => $this->current_address_ward,
                'current_address_township_or_town_id' => $this->current_address_township_or_town_id,
                'current_address_region_id' => $this->current_address_region_id,
                'permanent_address_street' => $this->permanent_address_street,
                'permanent_address_ward' => $this->permanent_address_ward,
                'permanent_address_township_or_town_id' => $this->permanent_address_township_or_town_id,
                'permanent_address_region_id' => $this->permanent_address_region_id,
            ]
        );


        return redirect()->to('/labour');

    }

    public function mount($id)
    {
        // Populate dropdowns
        $this->nrc_region_ids = NrcRegionId::all();
        $this->nrc_signs = NrcSign::all();
        $this->regions = Region::all();
        $this->townships=Township::all();

        // Populate form for editing
        if ($id) {
            $this->staff = Staff::findOrFail($id);

            $this->name = $this->staff->name;
            $this->dob = $this->staff->dob;
            $this->nrc_region_id = optional($this->staff->nrc_region_id)->id;
            $this->nrc_township_code_id = $this->staff->nrc_township_code_id;
            $this->nrc_sign_id = $this->staff->nrc_sign_id;
            $this->nrc_code = $this->staff->nrc_code;
            $this->nrc_front = $this->staff->nrc_front;
            $this->nrc_back = $this->staff->nrc_back;
            $this->phone = $this->staff->phone;
            $this->current_address_street = $this->staff->current_address_street;
            $this->current_address_ward = $this->staff->current_address_ward;
            $this->current_address_township_or_town_id = $this->staff->current_address_township_or_town_id;
            $this->current_address_region_id = $this->staff->current_address_region_id;
            $this->permanent_address_street = $this->staff->permanent_address_street;
            $this->permanent_address_ward = $this->staff->permanent_address_ward;
            $this->permanent_address_township_or_town_id = $this->staff->permanent_address_township_or_town_id;
            $this->permanent_address_region_id = $this->staff->permanent_address_region_id;
        }
    }
}
