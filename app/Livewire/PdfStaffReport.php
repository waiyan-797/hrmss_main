<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class PdfStaffReport extends Component
{
    public function render()
    {
        $staff = Staff::with(['ethnic', 'religion', 'blood_type', 'gender'])->where('id', 3)->first();
        return view('livewire.pdf-staff-report',[
            'staff' => $staff,
        ]);
    }
}
