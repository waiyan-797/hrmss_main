<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\Education;
use App\Models\Ethnic;
use App\Models\Religion;
use App\Models\Spouse;
use App\Models\Staff;
use Livewire\Component;

class PdfStaffReport18 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }
    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report18',[
            'staff' => $staff,
        ]);
    }
}
