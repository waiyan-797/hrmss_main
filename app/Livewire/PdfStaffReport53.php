<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PdfStaffReport53 extends Component
{
    public function render()
    {

        $staffs = DB::table('staff')
        ->join('ethnics', 'staff.ethnic_id', '=', 'ethnics.id')
        ->join('religions', 'staff.religion_id', '=', 'religions.id')
        ->join('staff_education', 'staff.id', '=', 'staff_education.staff_id')
        ->join('education', 'staff_education.education_id', '=', 'education.id')
        ->select('staff.*', 'ethnics.name as ethnic_name', 'religions.name as religion_name', 'education.name as education_name')
        ->get();
        // dd($staffs);

        return view('livewire.pdf-staff-report53', [
            'staffs' => $staffs,
        ]);
    }
}
