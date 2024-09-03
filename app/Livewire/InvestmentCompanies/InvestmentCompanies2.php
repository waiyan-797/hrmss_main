<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;

class InvestmentCompanies2 extends Component
{
    public function render()
    {
        $staff = Staff::where('id', 4)->get();
        return view('livewire.investment-companies.investment-companies2',[
            'staff' => $staff,
        ]);
    }
}
