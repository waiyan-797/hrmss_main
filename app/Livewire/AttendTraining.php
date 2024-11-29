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
            // ['id' => 19, 'name' => 'ပင်စင်ကိစ္စ(မနှင်းစု)'],
            // ['id' => 20, 'name' => 'ပင်စင်ပြည့်ဝန်ထမ်းများစာရင်း'],
            // ['id' => 21, 'name' => 'ပင်စင်ခံစားခဲ့သူများစာရင်း'],
            // ['id' => 22, 'name' => 'မိသားစုပင်စင်ခံစားခဲ့သူများစာရင်း'],
            // ['id' => 23, 'name' => 'အသက်(၆၂)ပြည့်ပင်စင်ခံစားမည့်စာရင်း'],
            // ['id' => 24, 'name' => 'ပင်စင်ယူသည့်ရက်စွဲ'],
            // ['id' => 25, 'name' => 'နိုင်ငံခြားသွားရောက်သည့်ကိစ္စများ'],
            // ['id' => 26, 'name' => 'နိုင်ငံခြားသွားရောက်ခဲ့သောအကြိမ်ရေစုစုပေါင်းနှင့်အကြောင်းအရာ'],
            // ['id' => 27, 'name' => 'Report1'],
            // ['id' => 28, 'name' => 'Report2'],
            // ['id' => 29, 'name' => 'Report3'],
            // ['id' => 30, 'name' => 'Report4'],
            // ['id' => 31, 'name' => 'သင်တန်းတတ်ရောက်ရန်အတွက်အဆိုပြုသင်တန်းသားအမည်စာရင်း'],
            // ['id' => 32, 'name' => 'ဝန်ထမ်းအင်အားစာရင်း(တိုင်းဒေသကြီး/ပြည်နယ်)'],
            // ['id' => 33, 'name' => 'ဝန်ထမ်းအင်အားစာရင်းအချုပ်'],
            // ['id' => 34, 'name' => 'စီမံ‌ရေးနှင့်ငွေစာရင်းဌာနခွဲဝန်ထမ်းအင်အားစာရင်း'],
            // ['id' => 35, 'name' => 'စီမံ‌ရေးနှင့်ငွေစာရင်းဌာနခွဲ(၁)'],
            // ['id' => 36, 'name' => 'စီမံ‌ရေးနှင့်ငွေစာရင်းဌာနခွဲ(၂)'],
            // ['id' => 37, 'name' => 'သွေးအုပ်စု A ရှိသောဝန်ထမ်းစာရင်း'],
            // ['id' => 38, 'name' => 'လုပ်သက်၁၀နှစ်နှင့်အထက်ရှိသောဝန်ထမ်းဦးရေစာရင်း'],
            // ['id' => 39, 'name' => 'အသက်၁၈နှစ်နှင့်အထက်ရှိသောဝန်ထမ်းဦးရေ'],
            // ['id' => 40, 'name' => 'စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲဝန်ထမ်းအင်အားစာရင်း'],
            // ['id' => 41, 'name' => 'နေ့စားဝန်ထမ်းစာရင်း'],
            // ['id' => 42, 'name' => 'ဝန်ထမ်းအင်အားနှင့်လစာထုတ်ပေးမှုအခြေအနေ'],
            // ['id' => 43, 'name' => 'အမြဲတမ်းဝန်ထမ်းအင်အားစာရင်း'],
            // ['id' => 44, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၁)'],
            // ['id' => 45, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၂)'],
            // ['id' => 46, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၃)'],
            // ['id' => 47, 'name' => 'လစာစရိတ်စာရင်းချုပ်(၄)'],
            // ['id' => 48, 'name' => 'ရာထူအလိုက်လစာနှုန်းထားစာရင်း'],
           

        ];
    }
    public function showReport($id)
    {
        $routes = [
          

            1 =>route('local_training_report'),
            2 =>route('local_training_report2'),
            3 =>route('local_training_report_3'),
            // 19 =>route('staff_report2'),
            // 20 =>route('staff_report3'),
            // 21 =>route('pension_list'),
            // 22 =>route('pension_family'),
            // 23 =>route('finance_pension_age62'),
            // 24 =>route('pension_report'),
            // 25 =>route('foreign_training_report'),
            // 26 =>route('foreign_gone_total'),
            // 27 =>route('report1'),
            // 28 =>route('report2'),
            // 29 =>route('report3'),
            // 30 =>route('report4'),
            // 31 =>route('een'),
            // 32 =>route('staff_list1'),
            // 33 =>route('staff_list3'),
            // 34 =>route('staff_list4'),
            // 35 =>route('staff_progeny'),
            // 36 =>route('staff_list5'),
            // 37 =>route('blood_staff_list6'),
            // 38 =>route('we10over_staff_list'),
            // 39 =>route('age18over_staff_list'),
            // 40 =>route('planning_accounting'),
            // 41 =>route('labour-staff'),
            // 42 =>route('staff_salary'),
            // 43 =>route('permanent_staff'),
            // 44 =>route('staff_salary_list'),
            // 45 =>route('staff_salary_list2'),
            // 46 =>route('staff_salary_list3'),
            // 47 =>route('staff_salary_list4'),
            // 48 =>route('rank_salary_list'),
            

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
