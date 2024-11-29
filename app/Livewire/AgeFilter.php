<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\Gender;
use App\Models\Staff; // Ensure you import the correct model
use Carbon\Carbon;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class AgeFilter extends Component
{
    public $age;
    public $divisions ,$division_id;
    public $genders ,$gender_id;

    

    public function mount(){
        $this->divisions = Division::all();
        $this->genders = Gender::all();
        $this->division_id = 1 ;
        $this->gender_id = 1 ;
    }
    public function render()
    {
        
        $now = Carbon::now();

        
        $staffs = Staff::where(function (Builder $query) use ($now) {
            if (!empty($this->age) && is_numeric($this->age)) {
                
                $birthDate = $now->copy()->subYears($this->age);
                $query->whereYear('dob', '<=', $birthDate->year);
            }
            
            
            ;

            
        })
        ->where('current_division_id',  $this->division_id)
        ->where('gender_id' , $this->gender_id)

        
        ->get();
        
        return view('livewire.age-filter', compact('staffs'));
    }
}
