<?php

namespace App\Livewire;

use Livewire\Component;

class AttendTraining extends Component
{
    public $reports = [];

    public function mount()
    {
        $this->reports = [
            ['id' => 1, 'name' => 'တက်‌ရောက်ခဲ့သည့်သင်တန်း(၁)'],
            ['id' => 2, 'name' => 'တက်‌ရောက်ခဲ့သည့်သင်တန်း(၂)'],
            ['id' => 3, 'name' => 'တက်‌ရောက်ခဲ့သည့်သင်တန်း(၃)'],
        ];
    }
    public function showReport($id)
    {
        $routes = [
          

            1 =>route('local_training_report'),
            2 =>route('local_training_report2'),
            3 =>route('local_training_report_3'),
           

        ];
       
       
      
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.attend-training');
    }
}
