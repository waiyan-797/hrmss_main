<?php

namespace App\Livewire\StaffReport;

use App\Models\Staff;
use Livewire\Component;

class StaffReport extends Component
{
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.staff-report.staff-report', [
            'staffs' => $staffs,
        ]);
    }
}
