<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;

class InvestmentCompanies5 extends Component
{
    public function render()
    {
        $staff = Staff::with(['rank'])->where('id', 4)->first();
        return view('livewire.investment-companies.investment-companies5', [
            'staff' => $staff,
        ]);
    }
}
