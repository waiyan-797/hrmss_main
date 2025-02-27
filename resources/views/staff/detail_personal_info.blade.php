<div class="w-full h-auto py-5">
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ် ဖော်ပြရန်)')" class="font-semibold"/>
        <button wire:click='add_schools' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['ဘွဲ့အုပ်စု', 'ဘွဲ့အမျိုးအစား', 'ရရှိခဲ့သောဘွဲ့အမည်', 'ကျောင်းအမည်', 'မြို့','မှ','ထိ','မှတ်ချက်'],
        'data_master_add_stats' => ['edu_group', 'edu_type', null, null, null, null, null, null],
        'column_vals' => $schools,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'education_group',
                'select_values' => $education_groups,
                'next_col_update' => null,
                'next_col_model' => null,
                'next_col_model_related' => null,
                'ini_array' => 'eduTypes',
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'education_type',
                'select_values' =>  $education_types,
                'next_col_update' => null,
                'next_col_model' => null,
                'next_col_model_related' => null,
                'ini_array' => null,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'education',
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
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'schools',
                'wire_array_key' => 'to_date',
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
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('သင်တန်း')" class="font-semibold"/>
        <button wire:click='add_trainings' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['သင်တန်းအမည်', 'အခြားသင်တန်းအမည်', 'သင်တန်းအမှတ်စဉ်' , 'မှ', 'ထိ', 'နေရာ', 'နိုင်ငံ', 'သင်တန်းအမျိုးအစား','အဆင့်အတန်း'],
        'data_master_add_stats' => [null, null, null, null, null, null, null, null, null],
        'add_event' => 'add_trainings',
        'column_vals' => $trainings,
        'column_types' => [
            [
                'type' => 'search_select',
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
                'type' => 'text',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'batch',
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
                'type' => 'search_select',
                'wire_array_name' => 'trainings',
                'wire_array_key' => 'country',
                'select_values' => $countries,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'trainings',
                'next_col_update' => null,
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
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်')" class="font-semibold"/>
        <button wire:click='add_awardings' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်', 'ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်', 'အမိန့်အမှတ်/ခုနှစ်','မှတ်ချက်'],
        'data_master_add_stats' => [null, null, null, null, null],
        'column_vals' => $awards,
        'column_types' => [
            [
                'type' => 'search_select',
                'wire_array_name' => 'awards',
                'wire_array_key' => 'award_type',
                'select_values' => $award_types,
            ],
            [
                'type' => 'search_select',
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
                <x-text-input :NoneedValidate=true wire:model="last_school_name" placeholder="အမည်" id="last_school_name" name="last_school_name" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_name')" />
                    {{-- @dd($errors) --}}
            </div>
            <div class="w-full">
                <x-text-input :NoneedValidate=true  wire:model="last_school_subject" placeholder="အတန်း" id="last_school_subject" name="last_school_subject" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_subject')" />
            </div>
            <div class="w-full">
                <x-text-input :NoneedValidate=true  wire:model="last_school_row_no" placeholder="ခုံအမှတ်" id="last_school_row_no" name="last_school_row_no" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_row_no')" />
            </div>
            <div class="w-full">
                <x-text-input :NoneedValidate=true  wire:model="last_school_major" placeholder="ဘာသာရပ်" id="last_school_major" name="last_school_major" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_major')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်" :value="__('ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်')" />
        <x-textarea-input :NoneedValidate=true  wire:model="student_life_political_social" id="student_life_political_social" name="student_life_political_social" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('student_life_political_social')" />
    </div>
    <div>
        <x-input-label for="ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး၊ ကစားခုန်းစားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေး၊ စက်မှုလက်မှု" :value="__('ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး၊ ကစားခုန်းစားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေး၊ စက်မှုလက်မှု')" />
        <x-text-input :NoneedValidate=true wire:model="habit" id="habit" name="habit" type="text" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('habit')" />
    </div>
    <div>
        <x-input-label for="လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့်ဌာန၊မြို့နယ်များ" :value="__('လုပ်ကိုင်ခဲ့သောဌာန၊မြို့နယ်များ')" />
        <x-textarea-input wire:model="past_occupation" id="past_occupation" name="past_occupation" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('past_occupation')" />
    </div>
</div>
<div class="grid grid-cols-3 gap-4 py-5">
    <div>
        <x-input-label for="တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ" :value="__('တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ')" />
        <x-textarea-input wire:model="revolution" id="revolution" name="revolution" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('revolution')" />
    </div>
    <div>
        <x-input-label for="အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့် လစာ" :value="__('အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့် လစာ')" />
        <x-textarea-input wire:model="transfer_reason_salary" id="transfer_reason_salary" name="transfer_reason_salary" type="text" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('transfer_reason_salary')" />
    </div>
    <div>
        <x-input-label for="အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ် နိုင်ငံရေး မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့် တာဝန်" :value="__('အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ် နိုင်ငံရေး မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့် တာဝန်')" />
        <x-text-input :NoneedValidate=true  wire:model="during_work_political_social" id="during_work_political_social" name="during_work_political_social" type="text" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('during_work_political_social')" />
    </div>
</div>
<div class="grid grid-cols-2 gap-4 py-5">
    <div>
        <x-input-label for="စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ မရှိ" :value="__('စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ မရှိ')" />
        <x-radio-input id1="has_military_friend_1" id2="has_military_friend_2" wire="has_military_friend" />
        <x-input-error class="mt-2" :messages="$errors->get('has_military_friend')" />
    </div>
    @if($has_military_friend)
        <div>
            <x-input-label for="စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ" :value="__('စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ')" />
            <x-textarea-input wire:model='has_military_friend_text' class="mt-1 block w-full"/>
        </div>
    @endif
</div>

<div class="w-full py-5">
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('နိုင်ငံခြားသွားရောက်ခြင်း')" class="font-semibold"/>
        <button wire:click='add_abroads' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => [
            'သွားရောက်ခဲ့သည့်နိုင်ငံ',
            'သွားရောက်ခဲ့သည့်အကြောင်း',
            'သင်တန်းတက်ခြင်းဖြစ်လျှင် အောင်/မအောင်',
            'သင်တန်းတက်ခြင်းဖြစ်လျှင် အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်',
            'ထောက်ပံ့သည့်အဖွဲ့အစည်း',
            'တွေ့ဆုံခဲ့သည့် ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန',
            'သွားသည့်နေ့ (လ၊ ရက်၊ နှစ်)',
            'ပြန်သည့်နေ့ (လ၊ ရက်၊ နှစ်)',
            'နိုင်ငံခြားသို့သွားရောက်မည်ံနေ့ (လ၊ ရက်၊ နှစ်)',
            'ပြန်ရောက်လျှင်အမှုထမ်းမည့် ဌာန/ရာထူး'
        ],
        'data_master_add_stats' => [null, null, null, null, null, null, null, null, null, null],
        'column_vals' => $abroads,
        'column_types' => [
            [
                'type' => 'multiple-select',
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
                <x-text-input :NoneedValidate=true  wire:model="foreigner_friend_name" placeholder="အမည်" id="foreigner_friend_name" name="foreigner_friend_name" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_name')" />
            </div>
            <div class="w-full">
                <x-text-input :NoneedValidate=true  wire:model="foreigner_friend_occupation" placeholder="အလုပ်အကိုင်" id="foreigner_friend_occupation" name="foreigner_friend_occupation" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_occupation')" />
            </div>
            <div class="w-full">
                <x-searchable-select
                    property="foreigner_friend_nationality_id"
                    :values="$nationalities"
                    placeholder="Select Nationality"
                    id="foreigner_friend_nationality_id"
                    name="foreigner_friend_nationality_id"
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_nationality_id')" />
            </div>
            <div class="w-full">
                <x-searchable-select
                    property="foreigner_friend_country_id"
                    :values="$countries"
                    placeholder="Select Country"
                    id="foreigner_friend_country_id"
                    name="foreigner_friend_country_id"
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_country_id')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="မည်ကဲ့သို့ ရင်းနှီးသည်" :value="__('မည်ကဲ့သို့ ရင်းနှီးသည်')" />
        <x-textarea-input wire:model="foreigner_friend_how_to_know" id="foreigner_friend_how_to_know" name="foreigner_friend_how_to_know" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_how_to_know')" />
    </div>
    <div>
        <x-input-label for="မိမိအား ထောက်ခံသည့် ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက် အရာရှိ၊ မြို့နယ်/ကျေးရွာ/ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)" :value="__('မိမိအား ထောက်ခံသည့် ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက် အရာရှိ၊ မြို့နယ်/ကျေးရွာ/ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)')" />
        <x-text-input :NoneedValidate=true  wire:model="recommended_by_military_person" id="recommended_by_military_person" name="recommended_by_military_person" type="text" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('recommended_by_military_person')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        {{-- <x-input-label :value="__('ရာဇဝတ်ပြစ်မှုခံရခြင်း')" class="font-semibold"/> --}}
        <x-input-label :value="__('ပြစ်ဒဏ်ခံရခြင်း')" class="font-semibold"/>

        <button wire:click='add_punishments' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['ပြစ်ဒဏ်အမျိုးအစား', 'ပြစ်ဒဏ်ချမှတ်ခံရသည့် အကြောင်းအရင်း', 'မှ', 'ထိ'],
        'data_master_add_stats' => [null, null, null, null],
        'column_vals' => $punishments,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'punishments',
                'next_col_update' => null,
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
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('လူမှုရေးလှုပ်ရှားမှု')" class="font-semibold"/>
        <button wire:click='add_socials' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['အကြောင်းအရာ', 'မှတ်ချက်'],
        'data_master_add_stats' => [null, null],
        'column_vals' => $socials,
        'column_types' => [
            [
                'type' => 'text',
                'wire_array_name' => 'socials',
                'wire_array_key' => 'particular',
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
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('ဘာသာစကားကျွမ်းကျင်မှု')" class="font-semibold"/>
        <button wire:click='add_staff_languages' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['ဘာသာစကား', 'အဆင့်', 'အရေး', 'အဖတ်', 'အပြော', 'မှတ်ချက်'],
        'data_master_add_stats' => [null, null, null, null, null, null],
        'column_vals' => $staff_languages,
        'column_types' => [
            [
                'type' => 'search_select',
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


{{-- start waiyan --}}

<div class="w-full h-auto py-5">
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('ဆုတံဆိပ်များ')" class="font-semibold"/>
        <button wire:click='add_staff_rewards' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['အမျိုးအစား', 'ပြည်တွင်း/နိုင်းငံခြား', 'ခုနှစ်','မှတ်ချက်'],
        'data_master_add_stats' => [null, null, null, null],
        'column_vals' => $staff_rewards,
        'column_types' => [
            [
                'type' => 'text',
                'wire_array_name' => 'staff_rewards',
                'wire_array_key' => 'name',
                'select_values' => $rewards,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_rewards',
                'wire_array_key' => 'type',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_rewards',
                'wire_array_key' => 'year',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'staff_rewards',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'remove_staff_rewards',
    ])
</div>
