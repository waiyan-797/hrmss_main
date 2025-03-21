<div class="grid grid-cols-4 gap-4 py-5">
    <div>
        <x-input-label for="ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသား ဟုတ်/မဟုတ်" :value="__('ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသား ဟုတ်/မဟုတ်')" />
        <x-radio-input id1="parent_citizen_1" id2="parent_citizen_2" wire="is_parents_citizen_when_staff_born" required/>
        <x-input-error class="mt-2" :messages="$errors->get('is_parents_citizen_when_staff_born')" />
    </div>
    <div>
        <x-input-label for="လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်" :value="__('လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်')" />
        <x-searchable-select property="current_rank_id" :values="$ranks" placeholder="လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်ရွေးပါ" id="current_rank_id" name="current_rank_id" class="block w-full p-2 text-sm border rounded font-arial mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_rank_id')" />
    </div>
    <div>
        <x-input-label for="လက်ရှိရာထူးရသည့်နေ့" :value="__('လက်ရှိရာထူးရသည့်နေ့ (ရက် ၊ လ ၊ နှစ်)')" />
        <x-date-picker wire:model="current_rank_date" id="current_rank_date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_rank_date')" />
    </div>

    <div>
        <x-input-label for="ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်‌နေ့" :value="__('ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်‌နေ့  (ရက် ၊ လ ၊ နှစ်)')" />
        <x-date-picker wire:model="government_staff_started_date" id="government_staff_started_date" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('government_staff_started_date')" />
    </div>


    <div>
        <x-input-label for="လက်ရှိဌာန" :value="__('လက်ရှိဌာန')" />
        <x-select
            wire:model="current_department_id"
            :values="$dica_departments"
            placeholder="လက်ရှိဌာနရွေးပါ"
            name="current_department_id"
            class="mt-1 block w-full"
            required
        />
        <x-input-error class="mt-2" :messages="$errors->get('current_department_id')" />
    </div>

    <div>
        <x-input-label for="DICA ရောက်ရှိရက်စွဲ" :value="__('DICA ရောက်ရှိရက်စွဲ (ရက် ၊ လ ၊ နှစ်)')" />
        <x-date-picker wire:model="join_date" id="join_date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('join_date')" />
    </div>


    <div>


        <x-input-label for="current_division_id" :value="__('လက်ရှိဌာနခွဲ')" />
        <x-select
            {{-- disabled="{{!auth()->user()->AdminHR()}}" --}}
            wire:model="current_division_id"
            :values="$divisions"
            placeholder="လက်ရှိဌာနခွဲ‌ရွေးပါ"
            name="current_division_id"
            class="mt-1 block w-full"
            required
        />
        <x-input-error class="mt-2" :messages="$errors->get('current_division_id')" />
    </div>
    <div>
        <x-input-label for="လက်ရှိဌာနခွဲရောက်ရှိရက်စွဲ" :value="__('လက်ရှိဌာနခွဲရောက်ရှိရက်စွဲ(ရက် ၊ လ ၊ နှစ်)')" />
        <x-date-picker wire:model="current_division_join_date" id="current_division_join_date" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('current_division_join_date')" />
    </div>




    {{-- <div>
        <x-input-label for="ပြောင်းရွေ့သည့်ဌာနခွဲ" :value="__('ပြောင်းရွေ့သည့်ဌာနခွဲ')" />
        <x-select
            wire:model="transfer_division_id"
            :values="$divisions"
            placeholder="ပြောင်းရွေ့သည့်ဌာနခွဲရွေးပါ"
            name="transfer_divison_id"
            class="mt-1 block w-full"
        />
        <x-input-error class="mt-2" :messages="$errors->get('transfer_division_id')" />
    </div> --}}
    {{-- <div>
        <x-input-label for="ပြောင်းရွေ့သည့်မှတ်ချက်" :value="__('ပြောင်းရွေ့သည့်မှတ်ချက်')" />
        <x-text-input wire:model="transfer_remark" id="transfer_remark" name="transfer_remark" type="text" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('transfer_remark')" />
    </div> --}}
    <div>
        <x-input-label for="တွဲဖက်အင်အားဖြစ်လျှင် ၀န်ကြီးဌာန" :value="__('တွဲဖက်အင်အားဖြစ်လျှင် ၀န်ကြီးဌာန')" />
        <x-select
            wire:model.live="side_ministry_id"
            :values="$ministrys"
            placeholder="မရှိပါ"
            name="side_ministry_id"
            class="mt-1 block w-full"
        />
        <x-input-error class="mt-2" :messages="$errors->get('side_ministry_id')" />
    </div>
    <div>
        <x-input-label for="တွဲဖက်အင်အားဖြစ်လျှင် ဌာန" :value="__('တွဲဖက်အင်အားဖြစ်လျှင် ဌာန')" />
        <x-select
            wire:model="side_department_id"
            :values="$side_departments"
            placeholder="မရှိပါ"
            name="side_department_id"
            class="mt-1 block w-full"
        />
        <x-input-error class="mt-2" :messages="$errors->get('side_department_id')" />
    </div>
    <div>
        <x-input-label for="တွဲဖက်အင်အားဖြစ်လျှင် ဌာနခွဲ" :value="__('တွဲဖက်အင်အားဖြစ်လျှင် ဌာနခွဲ')" />
        <x-select
            wire:model="side_division_id"
            :values="$divisions"
            placeholder="မရှိပါ"
            name="side_division_id"
            class="mt-1 block w-full"
        />
        <x-input-error class="mt-2" :messages="$errors->get('side_division_id')" />
    </div>
    <div>
        <x-input-label for="လစာနှင့်စရိတ် ကုန်ကျခံမည့်ဌာန" :value="__('လစာနှင့်စရိတ် ကုန်ကျခံမည့်ဌာန')" />
        <x-select
            wire:model="salary_paid_by"
            :values="$departments"
            placeholder="လစာနှင့်စရိတ် ကုန်ကျခံမည့်ဌာနရွေးပါ"
            name="salary_paid_by"
            class="mt-1 block w-full"
        />
        <x-input-error class="mt-2" :messages="$errors->get('salary_paid_by')" />
    </div>
    <div>
        <x-input-label for="အသစ်ခန့်" :value="__('အသစ်ခန့်')" />
        <x-radio-input id1="newly_appointed_1" id2="newly_appointed_2" wire="is_newly_appointed" required/>
        <x-input-error class="mt-2" :messages="$errors->get('is_newly_appointed')" />
    </div>
    <div>
        <x-input-label for="ပြိုင်ရွေးခံ (သို့) တိုက်ရိုက်ခန့်" :value="__('ပြိုင်ရွေးခံ (သို့) တိုက်ရိုက်ခန့်')" />
        <x-select
            wire:model="is_direct_appointed"
            :values="[
                ['id' => 'ပြိုင်ရွေးခံ', 'name' => 'ပြိုင်ရွေးခံ'],
                ['id' => 'တိုက်ရိုက်ခန့်', 'name' => 'တိုက်ရိုက်ခန့်'],
            ]"
            placeholder="Select..."
            id="is_direct_appointed"
            name="is_direct_appointed"
            class="mt-1 block w-full"
            required
        />
        {{-- <x-radio-input id1="direct_appointed_1" id2="direct_appointed_2" wire="is_direct_appointed" required/> --}}
        <x-input-error class="mt-2" :messages="$errors->get('is_direct_appointed')" />
    </div>

    <div>
        <x-input-label for="လစာဝင်ငွေ" :value="__('လစာဝင်ငွေ')" />
        <x-select
            wire:model="payscale_id"
            :values="$payscales"
            placeholder="လစာဝင်ငွေရွေးပါ"
            name="payscale_id"
            class="mt-1 block w-full"
            required
        />
        <x-input-error class="mt-2" :messages="$errors->get('payscale_id')" />
    </div>
    <div>
        <x-input-label for="လက်ရှိလစာ" :value="__('လက်ရှိလစာ')" />
        <x-text-input wire:model="current_salary" id="current_salary" class="mt-1 block w-full" type="number" required/> {{--don't wanna write with burmese lang--}}
        <x-input-error class="mt-2" :messages="$errors->get('current_salary')" />
    </div>
    <div>
        <x-input-label for="လက်ရှိရာထူးတွင်နှစ်တိုးအကြိမ်" :value="__('လက်ရှိရာထူးတွင်နှစ်တိုးအကြိမ်')" />
        <x-text-input wire:model="current_increment_time" id="current_increment_time" name="current_increment_time" type="number" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('current_increment_time')" />
    </div>
    <div>
        <x-input-label for="နောက်ဆုံးနှစ်တိုးတိုးသည့်နေ့" :value="__('နောက်ဆုံးနှစ်တိုးတိုးသည့်နေ့(ရက် ၊ လ ၊ နှစ်)')" />
        <x-date-picker wire:model="last_increment_date" id="last_increment_date" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('last_increment_date')" />
    </div>

    {{-- <div>
        <x-input-label for="current_section_id" :value="__('လက်ရှိဌာနစိတ်')" />
        <x-select
            wire:model="current_section_id"
            :values="$sections"
            placeholder="လက်ရှိဌာနစိတ်ရွေးပါ "
            name="current_section_id"
            class="mt-1 block w-full"  
        />
        <x-input-error class="mt-2" :messages="$errors->get('current_section_id')" />
    </div> --}}

    <div>
        <x-input-label for="လက်ရှိဌာနစိတ်" :value="__('လက်ရှိဌာနစိတ်ရွေးပါ')" />
        <x-select
            wire:model="current_section_id"
            :values="$sections"
            placeholder="လက်ရှိဌာနစိတ်ရွေးပါ"
            name="current_section_id"
            class="mt-1 block w-full"
        />
        <x-input-error class="mt-2" :messages="$errors->get('current_section_id')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('အလုပ်အကိုင်အတွက် ထောက်ခံသူများ')" class="font-semibold"/>
        <button wire:click='add_recommendation_modal("recommendations_modal")' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('livewire/tables/simple', [
        'column_names' => ['ထောက်ခံသူ'],
        'data_master_add_stats' => [null],
        'column_vals' => $recommendations,
        'action_name'=>'recommendations',
        'column_types' => [
            [
                'type' => 'text',
                'wire_array_name' => 'recommendations',
                'wire_array_key' => 'recommend_by',
            ],
        ],
        'del_method' => 'removeRecommendation',
    ])
</div>
<div class="w-full h-auto py-5">
    <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
        <x-input-label :value="__('လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်')" class="font-semibold"/>
        <button wire:click='add_postings_modal("multiple_modal")' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('livewire/tables/multiple', [
        'column_names' => ['ရာထူး/အဆင့်', 'မှ', 'ထိ', 'ဝန်ကြီးဌာန', 'ဦးစီးဌာန', 'ဌာနခွဲ', 'နေရာ', 'မှတ်ချက်'],
        'columns' =>['rank','from_date','to_date','ministry','department','sub_department','location','remark'],
        'column_vals'=>$postings,
        'del_method' => 'removePostings',
        'add_modal' => 'add_postings_modal'
    ])
    
</div>



