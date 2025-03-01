<?php

namespace App\Livewire;

use Livewire\Component;

class Pension extends Component
{
    public $reports = [];

    public function mount()
    {
        $this->reports = [
            ['id' => 1, 'name' => 'ပင်စင်ကိစ္စ(မနှင်းစု)'],
            ['id' => 2, 'name' => 'ပင်စင်ပြည့်ဝန်ထမ်းများစာရင်း'],
            ['id' => 3, 'name' => 'ပင်စင်ခံစားခဲ့သူများစာရင်း'],
            ['id' => 4, 'name' => 'မိသားစုပင်စင်ခံစားခဲ့သူများစာရင်း'],
            ['id' => 5, 'name' => 'အသက်(၆၂)ပြည့်ပင်စင်ခံစားမည့်စာရင်း'],
            ['id' => 6, 'name' => 'ပင်စင်ယူသည့်ရက်စွဲ'],
            ['id' => 7, 'name' => 'ပြုန်းတီး'],
        ];
    }
    public function showReport($id)
    {
        $routes = [
            1=>route('staff_report2'),
            2 =>route('staff_report3'),
            3 =>route('pension_list'),
            4 =>route('pension_family'),
            5 =>route('finance_pension_age62'),
            6 =>route('pension_report'),
            7 =>route('all_retire_report'),
        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.pension');
    }
}
