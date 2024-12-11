<?php

namespace App\Livewire;

use Livewire\Component;

class StaffStrengthList extends Component
{
    public $reports = [];

    public function mount()
    {
        $this->reports = [
            ['id' => 1, 'name' => 'ဝန်ထမ်းအင်အားစာရင်း(တိုင်းဒေသကြီး/ပြည်နယ်)'],
            ['id' => 2, 'name' => 'ဝန်ထမ်းအင်အားစာရင်းအချုပ်'],
            ['id' => 3, 'name' => 'စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ ဝန်ထမ်းအင်အားစာရင်း'],
            ['id' => 4, 'name' => 'စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ(၁)'],
            ['id' => 5, 'name' => 'စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ(၂)'],
            ['id' => 6, 'name' => 'သွေးအုပ်စုAရှိသောဝန်ထမ်းစာရင်း'],
            ['id' => 7, 'name' => 'လုပ်သက်၁၀နှစ် နှင့်အထက်ရှိသောဝန်ထမ်းဦး‌ရေစာရင်း'],
            ['id' => 8, 'name' => 'အသက်၁၈နှစ်နှင့်အထက်ရှိသောဝန်ထမ်းဦးရေ'],
            ['id' => 9, 'name' => 'စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲဝန်ထမ်းအင်အားစာရင်း'],
            ['id' => 10, 'name' => 'နေ့စားဝန်ထမ်းစာရင်း'],
            ['id' => 11, 'name' => 'ဖွဲ့ခန်ပိုလို(division အလိုက်)'],
            ['id' => 12, 'name' => 'ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာနရှိ သား/သမီးများ၏အရေအတွက်စာရင်း'],
            ['id' => 13, 'name' => 'ဝန်ထမ်းများ၏ မိသားစုဝင် သား/သမီးများစာရင်း'],
        ];
    }
    public function showReport($id)
    {
        $routes = [
            1 => route('staff_list1'),
            2 => route('staff_list3'),
            3 => route('staff_list4'),
            4 => route('staff_progeny'),
            5 => route('staff_list5'),
            6 => route('blood_staff_list6'),
            7 => route('we10over_staff_list'),
            8 =>route('age18over_staff_list'),
            9 =>route('planning_accounting'),
            10 =>route('labour-staff'),
            11 =>route('vacancy_over_by_division'),
            12 =>route('children_report_detials'),
            13 =>route('children_report_summary'),
            
        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }
    public function render()
    {
        return view('livewire.staff-strength-list', [
            'reports' => $this->reports,
        ]);
    }
}
