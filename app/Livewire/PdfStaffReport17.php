<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class PdfStaffReport17 extends Component
{
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.pdf-staff-report17',[
            'staffs' => $staffs,
        ]);
    }
}
