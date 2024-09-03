<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;

class InvestmentCompanies extends Component
{
    public function render()
    {
        $staff = Staff::where('id', 3)->get();
        return view('livewire.investment-companies.investment-companies',[
            'staff' => $staff,
        ]);
    }
}
