<?php

namespace App\Livewire;

use App\Exports\E10;
use App\Models\EducationType;
use App\Models\Rank;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class GraduateList extends Component
{
    public $count  = 0 ;
    public $educationTypes;
    public $selectedEducationType = '';
    public $selectedEducationTypeName = '';
    public $education_type_id = ''; 

    public function mount()
    {
        $this->educationTypes = EducationType::all();
    }

    public function updatedEducationTypeId($value)
{
    $this->selectedEducationTypeName = EducationType::find($value)?->name ?? 'ဘွဲ့ရရှိခဲ့သူများစာရင်း';
}
    public function go_excel() 
    {
        return Excel::download(new E10($this->education_type_id
    ), 'E10.xlsx');
    }

    public function render()
    {
        $educationTypes = EducationType::all(); 

        $query = function ($query) {
            $query->whereBetween('education_group_id', [1, 5]);
            if ($this->education_type_id) {
                $query->where('education_type_id', $this->education_type_id);
            }
        };

        $first_ranks = Rank::where('staff_type_id', 1)
            ->where('is_dica', 1)
            ->with(['staffs' => $query])
            ->withCount(['staffs' => $query])
            ->get();

        $second_ranks = Rank::where('staff_type_id', 2)
            ->where('is_dica', 1)
            ->with(['staffs' => $query])
            ->withCount(['staffs' => $query])
            ->get();

        return view('livewire.graduate-list', [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'educationTypes' => $educationTypes,
            'selectedEducationTypeName' => $this->selectedEducationTypeName,
        ]);
    }
}
