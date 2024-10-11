
    <div class="grid grid-cols-4 gap-4 py-5  ">
        
        <div>
            <x-input-label for="ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသား ဟုတ်/မဟုတ်" :value="__('ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသား ဟုတ်/မဟုတ်')" />
            <x-radio-input id1="parent_citizen_1" id2="parent_citizen_2" wire="is_parents_citizen_when_staff_born" />
            <x-input-error class="mt-2" :messages="$errors->get('is_parents_citizen_when_staff_born')" />
        </div>
        <div>
            <x-input-label for="လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်" :value="__('လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်')" />
            <x-select wire:model="current_rank_id" :values="$ranks" placeholder="လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်ရွေးပါ" id="current_rank_id" name="current_rank_id" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('current_rank_id')" />
        </div>
        <div>
            <x-input-label for="လက်ရှိရာထူးရသည့်နေ့" :value="__('လက်ရှိရာထူးရသည့်နေ့')" />
            <x-text-input wire:model="current_rank_date" id="current_rank_date" name="current_rank_date" type="date" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('current_rank_date')" />
        </div>
        <div>
            <x-input-label for="လက်ရှိဌာန" :value="__('လက်ရှိဌာန')" />
            <x-select wire:model="current_department_id" :values="$departments" placeholder="လက်ရှိဌာနရွေးပါ" id="current_department_id" name="current_department_id" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('current_department_id')" />
        </div>
        <div>
            <x-input-label for="လက်ရှိဌာနခွဲ" :value="__('လက်ရှိဌာနခွဲ')" />
            <x-select wire:model="current_division_id" :values="$divisions" placeholder="လက်ရှိဌာနခွဲ‌ရွေးပါ" id="current_division_id" name="current_division_id" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('current_division_id')" />
        </div>
        <div>
            <x-input-label for="တွဲဖက်အင်အားဖြစ်လျှင် ဌာန" :value="__('တွဲဖက်အင်အားဖြစ်လျှင် ဌာန')" />
            <x-select wire:model="side_department_id" :values="$departments" placeholder="တွဲဖက်အင်အားဖြစ်လျှင် ဌာနရွေးပါ" id="side_department_id" name="side_department_id" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('side_department_id')" />
        </div>
        <div>
            <x-input-label for="တွဲဖက်အင်အားဖြစ်လျှင် ဌာနခွဲ" :value="__('တွဲဖက်အင်အားဖြစ်လျှင် ဌာနခွဲ')" />
            <x-select wire:model="side_division_id" :values="$divisions" placeholder="တွဲဖက်အင်အားဖြစ်လျှင် ဌာနခွဲရွေးပါ" id="side_division_id" name="side_division_id" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('side_division_id')" />
        </div>
        <div>
            <x-input-label for="လစာနှင့်စရိတ် ကုန်ကျခံမည့်ဌာန" :value="__('လစာနှင့်စရိတ် ကုန်ကျခံမည့်ဌာန')" />
            <x-select wire:model="salary_paid_by" :values="$departments" placeholder="လစာနှင့်စရိတ် ကုန်ကျခံမည့်ဌာနရွေးပါ" id="salary_paid_by" name="salary_paid_by" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('salary_paid_by')" />
        </div>
        <div>
            <x-input-label for="အလုပ်စတင်ဝင်ရောက်သည့်နေ့" :value="__('အလုပ်စတင်ဝင်ရောက်သည့်နေ့')" />
            <x-text-input wire:model="join_date" id="join_date" name="join_date" type="date" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('join_date')" />
        </div>
        <div>
            <x-input-label for="လက်ရှိအလုပ်အကိုင်ရလာပုံ" :value="__('လက်ရှိအလုပ်အကိုင်ရလာပုံ')" />
            <x-text-input wire:model="form_of_appointment" id="form_of_appointment" name="form_of_appointment" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('form_of_appointment')" />
        </div>
        <div>
            <x-input-label for="ပြိုင်ရွေးခံ (သို့) တိုက်ရိုက်ခန့်" :value="__('ပြိုင်ရွေးခံ (သို့) တိုက်ရိုက်ခန့်')" />
            <x-radio-input id1="direct_appointed_1" id2="direct_appointed_2" wire="is_direct_appointed" />
            <x-input-error class="mt-2" :messages="$errors->get('is_direct_appointed')" />
        </div>
        <div>
            <x-input-label for="လစာဝင်ငွေ" :value="__('လစာဝင်ငွေ')" />
            <x-select wire:model="payscale_id" :values="$payscales" placeholder="လစာဝင်ငွေရွေးပါ" id="payscale_id" name="payscale_id" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('payscale_id')" />
        </div>
        <div>
            <x-input-label for="လက်ရှိလစာ" :value="__('လက်ရှိလစာ')" />
            <x-text-input wire:model="current_salary" id="current_salary" name="current_salary" type="number" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('current_salary')" />
        </div>
        <div>
            <x-input-label for="လက်ရှိရာထူးတွင်နှစ်တိုးအကြိမ်" :value="__('လက်ရှိရာထူးတွင်နှစ်တိုးအကြိမ်')" />
            <x-text-input wire:model="current_increment_time" id="current_increment_time" name="current_increment_time" type="number" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('current_increment_time')" />
        </div>
    </div>
    <div class="w-full h-auto py-5">
        <div class="pb-2">
            <x-input-label :value="__('အလုပ်အကိုင်အတွက် ထောက်ခံသူများ')" class="font-semibold"/>
        </div>
        @include('staff_multiple_table', [
            'column_names' => ['ထောက်ခံသူ', 'ဝန်ကြီးဌာန', 'ဦးစီးဌာန', 'ရာထူး', 'အကြောင်းအရာ','ထောက်ခံစာ'],
            'add_event' => 'add_recommendation',
            'column_vals' => $recommendations,
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'recommendations',
                    'wire_array_key' => 'recommend_by',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'recommendations',
                    'wire_array_key' => 'ministry',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'recommendations',
                    'wire_array_key' => 'department',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'recommendations',
                    'wire_array_key' => 'rank',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'recommendations',
                    'wire_array_key' => 'remark',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'recommendations',
                    'wire_array_key' => 'recommendation_lette',
                ],
            ],
            'del_method' => 'removeRecommendation',
        ])
    </div>

    <div class="w-full h-auto py-5">
        <div class="pb-2">
            <x-input-label :value="__('လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်')" class="font-semibold"/>
        </div>
        @include('staff_multiple_table', [
            'column_names' => ['ရာထူး', 'အဆင့်', 'မှ', 'ထိ', 'ဌာန', 'ဌာနခွဲ', 'နေရာ', 'တည်နေရာ'],
            'add_event' => 'add_posting',
            'column_vals' => $postings,
            'column_types' => [
                [
                    'type' => 'select',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'rank',
                    'select_values' => $ranks,
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'post',
                    'select_values' => $posts,
                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'from_date',
                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'to_date',
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'department',
                    'select_values' => $departments,
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'division',
                    'select_values' => $divisions,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'location',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'postings',
                    'wire_array_key' => 'remark',
                ],
            ],
            'del_method' => 'removePosting',
        ])
    </div>


