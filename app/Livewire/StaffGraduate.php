<?php

namespace App\Livewire;

use App\Exports\E09;
use App\Models\EducationType;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;

class StaffGraduate extends Component
{
    public $staffs;
    public $education_type_id;
    public $educationTypes;
    public $selectedEducationTypeName = 'ဘွဲ့ရရှိသူများစာရင်း';

    public function mount()
    {
        $this->educationTypes = EducationType::all();
        $this->updateStaffs();
    }

    public function go_excel() 
    {
        return Excel::download(new E09($this->staffs), 'E09.xlsx');
    }
    public function updatedEducationTypeId($value)
    {
        $this->selectedEducationTypeName = $value 
            ? EducationType::find($value)?->name 
            : 'အားလုံး';
        
        $this->updateStaffs();
    }
    public function updateStaffs()
    {
        $this->staffs = Staff::whereHas('schools', function ($query) {
            if ($this->education_type_id) {
                $query->where('education_type_id', $this->education_type_id);
            }
        })->with(['schools' => function ($query) {
            if ($this->education_type_id) {
                $query->where('education_type_id', $this->education_type_id)
                      ->select('staff_id', 'school_name', 'from_date', 'to_date');
            }
        }])->get();
    }
    public function render()
    {
        return view('livewire.staff-graduate', [
            'staffs' => $this->staffs,
            'educationTypes' => $this->educationTypes,
            'selectedEducationTypeName' => $this->selectedEducationTypeName,
        ]);
    }
}
