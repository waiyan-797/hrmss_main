
<div class="w-full py-5 h-auto overflow-y-auto">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ် ဖော်ပြရန်)</h1>
    @include('staff_multiple_table', [
        'column_names' => ['ဘွဲ့အုပ်စု', 'ဘွဲ့အမျိုးအစား', 'ရရှိခဲ့သော ဘွဲ့အမည်', 'ကျောင်းအမည်', 'မြို့','အတန်း','ခုံအမှတ်','မေဂျာ','မှ','ထိ', 'ခုနှစ်','ဘွဲ့လက်မှတ်','အမှတ်စာရင်း','မှတ်ချက်'],
        'add_event' => 'add_schools',
        'column_vals' => $schools,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'education_group',
                'select_values' => $education_groups,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'education_type',
                'select_values' => $education_types,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'education',
                'select_values' => $_educations,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'school_name',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'town',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'semester',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'roll_no',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'major',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'to_date',
            ],


            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'year',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'certificate',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'exam_mark',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'remark',
            ],

        ],
        'del_method' => 'remove_schools',
    ])
</div>

<div class="w-full h-auto py-5">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">သင်တန်း</h1>
    @include('staff_multiple_table', [
        'column_names' => ['သင်တန်းအမည်','ဒီပလိုမာလက်မှတ်','သင်တန်းကြေး', 'မှ', 'ထိ', 'နေရာ', 'နိုင်ငံ', 'သင်တန်းတည်နေရာ','မှတ်ချက်'],
        'add_event' => 'add_trainings',
        'column_vals' => $trainings,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'training_type',
                'select_values' => $training_types,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'diploma_name',
            ],
            [
                'type' => 'number',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'fees',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'to_date',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'location',
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'country',
                'select_values' => $countries,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'training_location',
                'select_values' => $training_locations,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'remove_trainings',
    ])


</div>
<div class="w-full h-auto py-5">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်</h1>
    @include('staff_multiple_table', [
        'column_names' => ['ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်', 'ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်', 'အမိန့်အမှတ်', 'ရက်စွဲ','မှတ်ချက်'],
        'add_event' => 'add_awardings',
        'column_vals' => $awards,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'awards',
                'wire_array_key' => 'award_type',
                'select_values' => $award_types,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'awards',
                'wire_array_key' => 'award',
                'select_values' => $_awards,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'awards',
                'wire_array_key' => 'order_no',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'awards',
                'wire_array_key' => 'order_date',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'awards',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'remove_awardings',
    ])

</div>


<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        <x-input-label :value="__('နောက်ဆုံးအောင်မြင်ခဲ့သည့် ကျောင်း (အမည်, အတန်း, ခုံအမှတ်, ဘာသာရပ်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="last_school_name" placeholder="အမည်" id="last_school_name" name="last_school_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_name')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="last_school_subject" placeholder="အတန်း" id="last_school_subject" name="last_school_subject" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_subject')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="last_school_row_no" placeholder="ခုံအမှတ်" id="last_school_row_no" name="last_school_row_no" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_row_no')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="last_school_major" placeholder="ဘာသာရပ်" id="last_school_major" name="last_school_major" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_major')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်" :value="__('ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်')" />
        <x-textarea-input wire:model="student_life_political_social" id="student_life_political_social" name="student_life_political_social" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('student_life_political_social')" />
    </div>
    <div>
        <x-input-label for="ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး၊ ကစားခုန်းစားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေး၊ စက်မှုလက်မှု" :value="__('ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး၊ ကစားခုန်းစားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေး၊ စက်မှုလက်မှု')" />
        <x-text-input wire:model="habit" id="habit" name="habit" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('habit')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်</h1>
    @include('staff_multiple_table', [
        'column_names' => ['ရာထူး', 'ဌာန', 'ဌာနခွဲ','လိပ်စာ' ,'မှ', 'ထိ', 'မှတ်ချက်'],
        'add_event' => 'add_past_occupations',
        'column_vals' => $past_occupations,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'past_occupations',
                'wire_array_key' => 'rank',
                'select_values' => $ranks,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'past_occupations',
                'wire_array_key' => 'department',
                'select_values' => $departments,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'past_occupations',
                'wire_array_key' => 'section',
                'select_values' => $sections,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'past_occupations',
                'wire_array_key' => 'address',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'past_occupations',
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'past_occupations',
                'wire_array_key' => 'to_date',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'past_occupations',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'remove_past_occupations',
    ])

</div>
<div class="grid grid-cols-4 gap-4 py-5">
    <div>
        <x-input-label for="တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ" :value="__('တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ')" />
        <x-textarea-input wire:model="revolution" id="revolution" name="revolution" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('revolution')" />
    </div>
    <div>
        <x-input-label for="အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့် လစာ" :value="__('အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့် လစာ')" />
        <x-text-input wire:model="transfer_reason_salary" id="transfer_reason_salary" name="transfer_reason_salary" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('transfer_reason_salary')" />
    </div>
    <div>
        <x-input-label for="အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ် နိုင်ငံရေး မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့် တာဝန်" :value="__('အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ် နိုင်ငံရေး မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့် တာဝန်')" />
        <x-text-input wire:model="during_work_political_social" id="during_work_political_social" name="during_work_political_social" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('during_work_political_social')" />
    </div>
    <div>
        <x-input-label for="စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ မရှိ" :value="__('စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ မရှိ')" />
        <x-radio-input id1="has_military_friend_1" id2="has_military_friend_2" wire="has_military_friend" />
        <x-input-error class="mt-2" :messages="$errors->get('has_military_friend')" />
    </div>
</div>

<div class="w-full py-5">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">နိုင်ငံခြားသွားရောက်ခြင်း</h1>
    @include('staff_multiple_table', [
        'column_names' => ['သွားရောက်ခဲ့သည့်နိုင်ငံ', 'သွားရောက်ခဲ့သည့်အကြောင်း','သင်တန်းတက်ခြင်းဖြစ်လျှင် အောင်','သင်တန်းတက်ခြင်းဖြစ်လျှင် အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်','ထောက်ပံ့သည့်အဖွဲ့အစည်း', 'တွေ့ဆုံခဲ့သည့် ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန', 'သွားသည့်နေ့', 'ပြန်သည့်နေ့','နိုင်ငံခြားခရီးစဉ်','နိုင်ငံခြားသို့သွားရောက်မည်ံနေ့','ပြန်ရောက်လျှင်အမှုထမ်းမည့် ဌာန/ရာထူး'],
        'add_event' => 'add_abroads',
        'column_vals' => $abroads,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'country',
                'select_values' => $countries,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'particular',
            ],
            [
                'type' => 'checkbox',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'training_success_fail',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'training_success_count',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'sponser',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'meet_with',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'to_date',
            ],
            [
                'type' => 'number',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'status',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'actual_abroad_date',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'abroads',
                'wire_array_key' => 'position',
            ],
        ],
        'del_method' => 'remove_abroads',
    ])
</div>
<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        <x-input-label :value="__('မိမိနှင့် ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသား (နိုင်ငံခြားအမည်,အလုပ်အကိုင် ,လူမျိုး, တိုင်းပြည်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="foreigner_friend_name" placeholder="အမည်" id="foreigner_friend_name" name="foreigner_friend_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_name')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="foreigner_friend_occupation" placeholder="အလုပ်အကိုင်" id="foreigner_friend_occupation" name="foreigner_friend_occupation" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_occupation')" />
            </div>
            <div class="w-full">
                <x-select wire:model="foreigner_friend_nationality_id" :values="$nationalities" placeholder="Select Nationality" id="foreigner_friend_nationality_id" name="foreigner_friend_nationality_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_nationality_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="foreigner_friend_country_id" :values="$countries" placeholder="Select Country" id="foreigner_friend_country_id" name="foreigner_friend_country_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_country_id')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="မည်ကဲ့သို့ ရင်းနှီးသည်" :value="__('မည်ကဲ့သို့ ရင်းနှီးသည်')" />
        <x-textarea-input wire:model="foreigner_friend_how_to_know" id="foreigner_friend_how_to_know" name="foreigner_friend_how_to_know" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_how_to_know')" />
    </div>
    <div>
        <x-input-label for="မိမိအား ထောက်ခံသည့် ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက် အရာရှိ၊ မြို့နယ်/ကျေးရွာ/ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)" :value="__('မိမိအား ထောက်ခံသည့် ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက် အရာရှိ၊ မြို့နယ်/ကျေးရွာ/ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)')" />
        <x-text-input wire:model="recommended_by_military_person" id="recommended_by_military_person" name="recommended_by_military_person" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('recommended_by_military_person')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">ရာဇဝတ်ပြစ်မှုခံရခြင်း</h1>
    @include('staff_multiple_table', [
        'column_names' => ['ပြစ်ဒဏ်အမျိုးအစား', 'ပြစ်ဒဏ်ချမှတ်ခံရသည့် အကြောင်းအရင်း', 'မှ', 'ထိ'],
        'add_event' => 'add_punishments',
        'column_vals' => $punishments,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'punishments',
                'wire_array_key' => 'penalty_type',
                'select_values' => $penalty_types,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'punishments',
                'wire_array_key' => 'reason',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'punishments',
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'punishments',
                'wire_array_key' => 'to_date',
            ],
        ],
        'del_method' => 'remove_punishments',
    ])
</div>

<div class="w-full py-5">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">လူမှုရေးလှုပ်ရှားမှု</h1>
    @include('staff_multiple_table', [
        'column_names' => ['အကြောင်းအရာ', 'မှ', 'အထိ', 'မှတ်ချက်'],
        'add_event' => 'add_socials',
        'column_vals' => $socials,
        'column_types' => [
            [
                'type' => 'text',
                'wire_array_name' => 'socials',
                'wire_array_key' => 'particular',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'socials',
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'socials',
                'wire_array_key' => 'to_date',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'socials',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'remove_socials',
    ])
</div>

<div class="w-full h-auto py-5">
    <h1 class="text-gray-900 font-arial text-md mb-2 uppercase font-semibold">ဝန်ထမ်းဘာသာစကားကျွမ်းကျင်မှု</h1>
    @include('staff_multiple_table', [
        'column_names' => ['ဘာသာစကား', 'အဆင့်', 'အရေး', 'အဖတ်', 'အပြော', 'မှတ်ချက်'],
        'add_event' => 'add_staff_languages',
        'column_vals' => $staff_languages,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'staff_languages',
                'wire_array_key' => 'language',
                'select_values' => $languages,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_languages',
                'wire_array_key' => 'rank',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_languages',
                'wire_array_key' => 'writing',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_languages',
                'wire_array_key' => 'reading',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_languages',
                'wire_array_key' => 'speaking',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_languages',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'remove_staff_languages',
    ])
</div>
