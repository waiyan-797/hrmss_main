<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class PdfStaffReport15 extends Component
{

    public function render()
    {

        $staff = Staff::with('ethnic', 'religion')->where('id', 4)->first();
        return view('livewire.pdf-staff-report15',[
            'staff' => $staff,
        ]);
    }
}
