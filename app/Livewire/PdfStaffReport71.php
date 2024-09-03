<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PdfStaffReport71 extends Component
{
    public function render()
    {
        $staff = Staff::with(['ethnic', 'religion', 'blood_type'])->where('id', 3)->first();
        return view('livewire.pdf-staff-report71', [
            'staff' => $staff,
        ]);
    }
}
