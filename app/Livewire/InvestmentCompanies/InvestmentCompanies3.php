<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;

class InvestmentCompanies3 extends Component
{
    public function render()
    {
        $staff = Staff::with(['rank'])->where('id', 3)->first();
        return view('livewire.investment-companies.investment-companies3',[
            'staff' => $staff,
        ]);
    }
}
