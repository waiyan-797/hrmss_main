<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class PdfStaffReport19 extends Component
{
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.pdf-staff-report19', [
            'staffs' => $staffs,
        ]);
    }
}
