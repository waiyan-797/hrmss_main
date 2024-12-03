<?php

namespace App\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Report extends Component
{
    public $reports = [];
    

    public function mount()
    {

    
        $this->reports = [
            ['id' => 1, 'name' => 'ရုံးခွဲအလိုက်ခွင့်ပြုနှင့်ခန့်ပြီးဝန်ထမ်း'],
            ['id' => 2, 'name' => 'ရုံးခွဲအလိုက်ကျား/မ ခန့်ပြီး အင်အား'],
            ['id' => 3, 'name' => 'ဖွဲ့ခန့်ပိုလိုအချုပ်ဇယား(ရာထူး)'],
            ['id' => 4, 'name' => 'ဖွဲ့ခန့်ပိုလိုအချုပ်ဇယား(လစာနှုန်း)'],
            ['id' => 5, 'name' => 'ဖွဲ့ခန့်ပိုလိုအချုပ်ဇယား(အဆင့်တူ)'],
            ['id' => 6, 'name' => '‌အရေးယူဆောင်ရွက်ပြီးစီးမှုနှင့်ဆောင်ရွက်ဆဲ'],
            ['id' => 7, 'name' => 'နပတ၁'],
            ['id' => 8, 'name' => 'နပတ၂'],
            ['id' => 9, 'name' => 'ဝန်ထမ်းအဖြစ်မှထုတ်ပါယ်/ထုတ်ပစ်'],
            ['id' => 10, 'name' => 'နပတ၄'],
            ['id' => 11, 'name' => '၁၀နှစ်အထက်/၁၀နှစ်အောက်ပင်စင်ပို့စာရင်း'],
            ['id' => 12, 'name' => 'ပင်စင်ကိစ္စ(မနှင်းစု)'],
            ['id' => 13, 'name' => 'ဘွဲ့နှင့်သက်ဆိုင်သည့်စာရင်း'],
            ['id' => 14, 'name' => 'ဖွဲ့ခန့်ပိုလိုရုံးချုပ်'],
            ['id' => 15, 'name' => 'ဖွဲ့ခန့်ပိုလို(တိုင်းဒေသကြီး)'],
            ['id' => 16, 'name' => 'လက်ရှိဌာနရောက်ရှိရက်စွဲ'],
            ['id' => 17, 'name' => 'အသက်ဇယား'],
            ['id' => 18, 'name' => 'နပတရှိ အရာထမ်း/အမှုထမ်း ဝန်ထမ်းအင်အားစာရင်း'],
            ['id' => 19, 'name' => 'အသက်ဖြင့်ရှာမည်'],
            ['id' => 20, 'name' => 'နှစ်တိုးရတော့မည်သူများ'],
            
            

        ];
    }
    public function showReport($id)
    {
        $routes = [
            1 => route('investment_companies'),
            2 => route('investment_companies2'),
            3 => route('investment_companies3'),
            4 => route('investment_companies4'),
            5 => route('investment_companies5'),
            6 => route('investment_companies6'),
            7 => route('investment_companies7'),
            8 =>route('investment_companies8'),
            9 =>route('investment_companies9'),
            10 =>route('investment_companies10'),
            11 =>route('investment_companies11'),
            12 =>route('investment_companies12'),
            13 =>route('investment_companies13'),
            14 =>route('investment_companies14'),
            15 =>route('investment_companies15'),
            16 =>route('staff_report1'),
            17 =>route('staff_report2'),
            18 =>route('staff_in_npt'),
            19 =>route('age_filter'),
            20 =>route('about_to_increment'),
            

        ];
        if (array_key_exists($id, $routes)) {
            return redirect()->to($routes[$id]);
        }

        session()->flash('message', 'Invalid Report ID!');
    }

    public function render()
    {
        return view('livewire.report', [
            'reports' => $this->reports,
        ]);
    }
 
}
