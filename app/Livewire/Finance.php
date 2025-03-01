<?php

namespace App\Livewire;

use Livewire\Component;

class Finance extends Component
{
    public $reports = [];

    public function mount()
    {
        $this->reports = [
            ['id' => 1, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၁)'],
            ['id' => 2, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၂)'],
            ['id' => 3, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၃)'],
            ['id' => 4, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၄)'],
            ['id' => 5, 'name' => 'ရာထူးအလိုက်လစာနှုန်းထားစာရင်း'],
            ['id' => 6, 'name' => 'လစာစာရင်း(၁)'],
            ['id' => 7, 'name' => 'လစာစာရင်း(၂)'],
            ['id' => 8, 'name' => 'လစာစာရင်း(၃)'],
            ['id' => 9, 'name' => 'ရန်ကုန်ရုံးချုပ်ရှိဝန်ထမ်းများ၏ဧပြီလစာရင်း'],
            ['id' => 10, 'name' => 'လစာအပေါ်ဝင်ငွေခွန်တွက်ချက်မှုပုံစံ'],
            ['id' => 11, 'name' => 'ပျှမ်းမျှလစာတွက်ချက်မှုဇယား'],
            ['id' => 12, 'name' => 'လစာမဲ့ ခွင့်လစာ တွက်ချက်မှုဇယား'],
            ['id' => 13, 'name' => 'စတင်ခန့်ထားသည့်ဝန်ထမ်းများ၏လစာတွက်ချက်မှု'],
            ['id' => 14, 'name' => 'ဘဏ္ဍာရေးနှစ်အတွက် လစာငွေထုတ်ယူမည့် စာရင်း'],
            ['id' => 15, 'name' => 'ရန်ကုန် ရန်ကုန်ရုံးချုပ်ရှိဝန်ထမ်းများ၏ဧပြီလစာရင်း'],
            ['id' => 16, 'name' => 'ဘဏ္ဍာရေးနှစ်လစာ'],
            // ['id' => 17, 'name' => 'အဆင့်တူ ကျားမ အသက်အုပ်စု'],
            ['id' => 17, 'name' => 'ဝန်ထမ်းများ၏ လစာငွေတောင်းခံလွှာ'],

        ];
    }
    public function showReport($id)
    {
        $routes = [
            1 => route('staff_salary_list'),
            2 => route('staff_salary_list2'),
            3 => route('staff_salary_list3'),
            4 => route('staff_salary_list4'),
            5 => route('rank_salary_list'),
            6 => route('yangon_office_staff'),
            7 => route('yangon_office_staff2'),
            8 =>route('january_salary_list'),
            9 =>route('april_salary_list'),
            10 =>route('payscale_list'),
            11 =>route('salary_list'),
            12 =>route('no_salary_leave'),
            13 =>route('started_salary_list'),
            14 =>route('finance_salary_list'),
            15 =>route('yangon_staff_april_salary_list'),
            16 =>route('finance_year_salary_list'),
            // 17 =>route('information_list'),
            17 =>route('detail_staff_salary'),
        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.finance', [
            'reports' => $this->reports,
        ]);
    }
}
