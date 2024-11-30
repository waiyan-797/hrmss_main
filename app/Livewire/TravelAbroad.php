<?php

namespace App\Livewire;

use Livewire\Component;

class TravelAbroad extends Component
{
    public $reports = [];

    public function mount()
    {

    
        $this->reports = [
            ['id' => 1, 'name' => 'နိုင်ငံခြားသွားရောက်သည့်ကိစ္စများ'],
            ['id' => 2, 'name' => 'နိုင်ငံခြားသွားရောက်သည့်ကိစ္စများ(၂)'],
            ['id' => 3, 'name' => 'နိုင်ငံခြားသွားရောက်ခဲ့သောအကြိမ်ရေစုစုပေါင်းနှင့်အကြောင်းအရာ'],
            ['id' => 4, 'name' => 'report1'],
            ['id' => 5, 'name' => 'report2'],
            ['id' => 6, 'name' => 'report3'],
            ['id' => 7, 'name' => 'report4'],
            ['id' => 8, 'name' => 'een'],
           

        ];
    }
    public function showReport($id)
    {
        $routes = [
            1 => route('foreign_training_report'),
            2 => route('foreign_training_report2'),
            3 => route('foreign_gone_total'),
            4 => route('report1'),
            5 => route('report2'),
            6 => route('report3'),
            7 => route('report4'),
            8 => route('een'),
            
        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.travel-abroad', [
            'reports' => $this->reports,
        ]);
    }
}
