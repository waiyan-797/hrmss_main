<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\Education;
use App\Models\Ethnic;
use App\Models\Religion;
use App\Models\Staff;
use Livewire\Component;

class PdfStaffReport18 extends Component
{
    public function render()
    {
       $staff = Staff::with('ethnic', 'religion', 'blood_type')->where("id", 3)->first();
        return view('livewire.pdf-staff-report18',[
            'staff' => $staff,
        ]);
    }
}
