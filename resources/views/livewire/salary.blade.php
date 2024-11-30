<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $salaries,
                'modal' => 'modals/salary_modal',
                'id' => $salary_id,
                'title' => 'လစာ',
                'search_id' => 'salary_search',
            'columns' => ['စဉ်', 'ဝန်ထမ်းအမည်','ရာထူး','လအမည်','လက်ရှိစာ','ရက်ပေါင်း','နှစ်တိုးမတိုးခင်လစာ','ရက်ပေါင်း','ရာထူးမတိုးခင်လစာ','ရက်ပေါင်း','အခြား ချီးမြှင့်ငွေ','ဘွဲ့အလိုက် ချီးမြှင့်ငွေ','ရိက္ခာစရိတ်','ဖြတ်တောက်ငွေ','ဖြတ်တောက်ငွေ (အသက်အာမခံကြေး)','ဖြတ်တောက်ငွေ (၀င်ငွေခွန်)','အမှန်တကယ်လစာ','လုပ်ဆောင်ချက်'],
                'column_vals' => ['staff', 'rank','salary_month','current_salary','current_salary_day','previous_salary_before_increment','previous_salary_before_increment_day','previous_salary_before_promotion','previous_salary_before_promotion_day','addition','addition_education','addition_ration','deduction','deduction_insurance','deduction_tax','actual_salary'],
            ])
        </div>
    </div>
</div>

