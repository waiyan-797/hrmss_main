<?php

namespace App\Livewire;

use Livewire\Component;

class PersonnelAccount extends Component
{

    public $reports = [];

    public function mount()
    {
        $this->reports = [
            ['id' => 1, 'name' => 'ဝန်ထမ်းအင်အား နှင့် လစာထုတ်ပေးမှုအခြေအနေ'],
            ['id' => 2, 'name' => 'အမြဲတမ်းဝန်ထမ်းအင်အားစာရင်း'],
            

        ];
    }
    public function showReport($id)
    {
        $routes = [
            1 => route('staff_salary'),
            2 => route('permanent_staff'),
           
        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.personnel-account', [
            'reports' => $this->reports,
        ]);
    }
   
}
