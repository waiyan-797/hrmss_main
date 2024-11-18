<?php

namespace App\Livewire;

use App\Models\NrcRegionId;
use App\Models\NrcSign;
use App\Models\NrcTownshipCode;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LabourDetails extends Component
{
    use WithFileUploads;

    public $staff;

    public $name;
    public $dob;
    public $nrc_region_ids;
    public $nrc_region_id;

    public $nrc_township_code_id;

    public $nrc_township_codes;

    public $nrc_sign_id;
    public $nrc_code;
    public $nrc_signs;

    public $nrc_front;

    public $nrc_back;
    public $phone;

    public $staff_nrc_front;
    public $staff_nrc_back;

    public function render()
    {
        $this->nrc_township_codes = NrcTownshipCode::where('nrc_region_id_id', $this->nrc_region_id ?? $this->nrc_region_id)->get();

        return view('livewire.labour-details');
    }

    public function submit()
    {
        if ($this->nrc_front) {
            $this->nrc_front = Storage::disk('upload')->put('staffs', $this->nrc_front);
            if ($this->staff != null && ($old = $this->staff->nrc_front)) {
                Storage::disk('upload')->delete($old);
            }
        }

        if ($this->nrc_back) {
            $this->nrc_back = Storage::disk('upload')->put('staffs', $this->nrc_back);
            if ($this->staff != null && ($old = $this->staff->nrc_back)) {
                Storage::disk('upload')->delete($old);
            }
        }

        Staff::updateOrCreate(
            [
                'id' => $this->staff?->id,
            ],

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
                'phone' => $this->phone
            ],
        );
    }

    

    public function mount($id)
    {
        $this->nrc_region_ids = NrcRegionId::all();
        $this->nrc_signs = NrcSign::all();

        if ($id == 0) {
        } else {
            $this->staff = Staff::findOrFail($id);
            $this->name = $this->staff->name;
            $this->dob = $this->staff->dob;
            // dd( $this->staff->nrc_region_id);


            $this->nrc_region_id = $this->staff->nrc_region_id->id;

            $this->nrc_township_code_id = $this->staff->nrc_township_code_id;

            $this->nrc_sign_id = $this->staff->nrc_sign_id;
            $this->nrc_code = $this->staff->nrc_code;

            $this->nrc_front = $this->staff->nrc_front;

            $this->nrc_back = $this->staff->nrc_back;
            $this->phone = $this->staff->phone;
         
        }
    }
}
