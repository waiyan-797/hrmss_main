<?php

namespace App\Livewire;

use App\Models\Staff; // Ensure you import the correct model
use Carbon\Carbon;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class AgeFilter extends Component
{
    public $age;

    public function render()
    {
        // Fetch the current date
        $now = Carbon::now();

        
        $staffs = Staff::where(function (Builder $query) use ($now) {
            if (!empty($this->age) && is_numeric($this->age)) {
                
                $birthDate = $now->copy()->subYears($this->age);
                $query->whereYear('dob', '<=', $birthDate->year);
            }
        })->get();
        
        return view('livewire.age-filter', compact('staffs'));
    }
}
