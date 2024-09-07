<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class PdfStaffReport19 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }
    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report19', [
            'staff' => $staff,
        ]);
    }
}
