<?php

namespace App\Livewire;

use Livewire\Component;

class EmployeeTakingLeave extends Component
{
    public $reports = [];

    public function mount()
    {
        $this->reports = [
            ['id' => 1, 'name' => 'ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း'],
            ['id' => 2, 'name' => 'ခွင့်ခံစားမှု အနည်းအများအလိုက် ရာခိုင်နှုန်းဇယား'],
            ['id' => 3, 'name' => 'ခွင့်ခံစားမှု အချုပ်ဇယား'],
        ];
    }
    public function showReport($id)
    {
        $routes = [
            1 => route('leaves'),
            2 => route('leaves2'),
            3 => route('leave_summary'),
           
        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.employee-taking-leave', [
            'reports' => $this->reports,
        ]);
    }
}
