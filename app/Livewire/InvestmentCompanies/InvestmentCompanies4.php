<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;

class InvestmentCompanies4 extends Component
{
    public function render()
    {
        $staff = Staff::where('id', 4)->first();
        return view('livewire.investment-companies.investment-companies4',[
            'staff' => $staff,
        ]);
    }
}
