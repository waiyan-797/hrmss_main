<?php

namespace App\Livewire;

use Livewire\Component;

class EmployeeInformation extends Component
{
    public $reports = [];

    public function mount()
    {
        $this->reports = [
            ['id' => 1, 'name' => 'နှုတ်ထွက်သည့်စာရင်း'],
            ['id' => 2, 'name' => 'ဘာသာရေး'],
            ['id' => 3, 'name' => 'ဘာသာစကား'],
            ['id' => 4, 'name' => 'လူမှုရေး'],
            ['id' => 5, 'name' => 'ဆုတံဆိပ်'],
            ['id' => 6, 'name' => 'သွားရောက်ခဲ့သည့်နိုင်ငံ'],
            ['id' => 7, 'name' => 'ပညာရေး (ရရှိသောဒီပလိုမာ/ဘွဲ့)'],
            // ['id' => 8, 'name' => 'ရရှိသောဒီပလိုမာ/ဘွဲ့'],
            ['id' => 8, 'name' => 'ပြစ်ဒဏ်'],
           
        ];
    }
    public function showReport($id)
    {
        $routes = [
            1 => route('employee_record_report'),
            2 => route('religion_report'),
            3 => route('language_report'),
            4 => route('social_report'),
            5 => route('award_report'),
            6 => route('foreign_report'),
            7 => route('education_report'),
            // 8 =>route('other_qualification_report'),
            8 =>route('punishment_report'),
            
        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.employee-information', [
            'reports' => $this->reports,
        ]);
    }
   
}
