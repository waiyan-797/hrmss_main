<?php

namespace App\Livewire\Report;

use App\Models\Staff;
use Livewire\Component;

class ReportName extends Component
{
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.staff-report.report-name',[
            'staffs' => $staffs,
        ]);
    }
}
