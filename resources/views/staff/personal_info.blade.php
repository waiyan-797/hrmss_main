<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        @if ($photo)
            <img src="{{ $photo ? $photo->temporaryUrl() : route('file', $staff->staff_photo)}}" class="w-20 h-20 rounded-full border-2 dark:border-blue-600 border-blue-400 mb-4">
        @else
            <img src="{{ $photo ? $photo->temporaryUrl() : asset('img/user.png') }}" class="w-20 h-20 rounded-full border-2 dark:border-blue-600 border-blue-400 mb-4">
        @endif
    </div>
    <div>
        <x-input-label for="ဓါတ်ပုံ" :value="__('ဓါတ်ပုံ')"/>
        <x-input-file wire:model='photo' id="photo" accept=".jpg, .jpeg, .png" name="photo"/>
        <x-input-error class="mt-1" :messages="$errors->get('photo')" />
    </div>
    <div>
        <x-input-label for="အမည်" :value="__('အမည်')" />
        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>
        <x-input-label for="ငယ်အမည်" :value="__('ငယ်အမည်')" />
        <x-text-input wire:model="nick_name" id="nick_name" name="nick_name" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('nick_name')" />
    </div>
    <div>
        <x-input-label for="အခြားအမည်" :value="__('အခြားအမည်')" />
        <x-text-input wire:model="other_name" id="other_name" name="other_name" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('other_name')" />
    </div>
    <div>
        <x-input-label for="ဝန်ထမ်းအမှတ်" :value="__('ဝန်ထမ်းအမှတ်')" />
        <x-text-input wire:model="staff_no" id="staff_no" name="staff_no" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('staff_no')" />
    </div>
    <div>
        <x-input-label for="မွေးသက္ကရာဇ်" :value="__('မွေးသက္ကရာဇ်')" />
        <x-text-input wire:model="dob" id="dob" name="dob" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('dob')" />
    </div>
    <div>
        <x-input-label for="ကျား/မ" :value="__('ကျား/မ')" />
        <x-select wire:model="gender_id" :values="$genders" placeholder="ကျား/မရွေးပါ" id="gender_id" name="gender_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('gender_id')" />
    </div>
    <div>
        <x-input-label for="လူမျိုး" :value="__('လူမျိုး')" />
        <x-select wire:model="ethnic_id" :values="$ethnics" placeholder="လူမျိုးရွေးပါ" id="ethnic_id" name="ethnic_id" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('ethnic_id')" />
    </div>
    <div>
        <x-input-label for="ဘာသာ" :value="__('ဘာသာ')" />
        <x-select wire:model="religion_id" :values="$religions" placeholder="ဘာသာရွေးပါ" id="religion_id" name="religion_id" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('religion_id')" />
    </div>
    <div>
        <x-input-label :value="__('အရပ်အမြင့်(ပေ, လက်မ)')" />
        <div class="flex flex-row gap-2">
            <div>
                <x-text-input wire:model="height_feet" placeholder="ပေ" id="height_feet" name="height_feet" type="number" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('height_feet')" />
            </div>
            <div>
                <x-text-input wire:model="height_inch" placeholder="လက်မည" id="height_inch" name="height_inch" type="number" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('height_inch')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="ဆံပင်အရောင်" :value="__('ဆံပင်အရောင်')" />
        <x-text-input wire:model="hair_color" id="hair_color" name="hair_color" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('hair_color')" />
    </div>
    <div>
        <x-input-label for="မျက်စိအရောင်" :value="__('မျက်စိအရောင်')" />
        <x-text-input wire:model="eye_color" id="eye_color" name="eye_color" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('eye_color')" />
    </div>
    <div>
        <x-input-label for="ထင်ရှားသည့်အမှတ်အသား" :value="__('ထင်ရှားသည့်အမှတ်အသား')" />
        <x-text-input wire:model="prominent_mark" id="prominent_mark" name="prominent_mark" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('prominent_mark')" />
    </div>
    <div>
        <x-input-label for="အသားအရောင်" :value="__('အသားအရောင်')" />
        <x-text-input wire:model="skin_color" id="skin_color" name="skin_color" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('skin_color')" />
    </div>
    <div>
        <x-input-label for="ကိုယ်အလေးချိန် (ပေါင်)" :value="__('ကိုယ်အလေးချိန် (ပေါင်)')" />
        <x-text-input wire:model="weight" placeholder="ကိုယ်အလေးချိန်" id="weight" name="weight" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')" />
    </div>
    <div>
        <x-input-label for="သွေးအုပ်စု" :value="__('သွေးအုပ်စု')" />
        <x-select wire:model="blood_type_id" :values="$blood_types" placeholder="သွေးအုပ်စုရွေးပါ" id="blood_type_id" name="blood_type_id" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('blood_type_id')" />
    </div>
    <div>
        <x-input-label for="မွေးဖွားရာဇာတိ" :value="__('မွေးဖွားရာဇာတိ')" />
        <x-textarea-input wire:model="place_of_birth" id="place_of_birth" name="place_of_birth" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('place_of_birth')" />
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်(တိုင်းဒေသကြီး/ပြည်နယ်, မြို့/မြို့နယ်, အမှတ်အသား, ကုဒ်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-select wire:model.change="nrc_region_id" :values="$nrc_region_ids" placeholder="Select Region ID" id="nrc_region_id" name="nrc_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_region_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="nrc_township_code_id" :values="$nrc_township_codes" placeholder="Select Township Code" id="nrc_township_code_id" name="nrc_township_code_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_township_code_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="nrc_sign_id" :values="$nrc_signs" placeholder="Select Sign" id="nrc_sign_id" name="nrc_sign_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_sign_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="nrc_code" id="nrc_code" placeholder="Code" name="nrc_code" type="number" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_code')" />
            </div>
        </div>
        <br>
         
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="mb-4">
                    @if ($nrc_front)
                        <img src="{{ $nrc_front ? $nrc_front->temporaryUrl() : route('file', $staff->nrc_front)}}" class="w-20 h-20 border-2 rounded-full dark:border-blue-600 border-blue-400 mb-4">
                    @else
                        <img src="{{ $nrc_front ? $nrc_front->temporaryUrl() : asset('img/a1.png') }}" class="w-40 h-20 border-2 dark:border-blue-600 border-blue-400 mb-4">
                    @endif
                </div>
        
                <x-input-label for="nrc_front" :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြား (အရှေ့ဘက်)')"/>
                <x-input-file wire:model='nrc_front' id="nrc_front" accept=".jpg, .jpeg, .png" name="nrc_front" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-700 focus:outline-none placeholder-gray-400 mt-1 font-arial bg-white border-gray-300" />
                <x-input-error class="mt-1" :messages="$errors->get('nrc_front')" />
            </div>
        
            <div>
                <div class="col-span-2">
                    @if ($nrc_back)
                        <img src="{{ $nrc_back ? $nrc_back->temporaryUrl() : route('file', $staff->nrc_back)}}" class="w-40 h-20 rounded-full border-2 dark:border-blue-600 border-blue-400 mb-4">
                    @else
                        <img src="{{ $nrc_back ? $nrc_back->temporaryUrl() : asset('img/a2.png') }}" class="w-40 h-20 border-2 dark:border-blue-600 border-blue-400 mb-4">
                    @endif
                </div>
                <x-input-label for="nrc_back" :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြား (အနောက်ဘက်)')"/>
                <input wire:model='nrc_back' id="nrc_back" accept=".jpg, .jpeg, .png" name="nrc_back" type="file" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-700 focus:outline-none placeholder-gray-400 mt-1 font-arial bg-white border-gray-300" />
                <x-input-error class="mt-1" :messages="$errors->get('nrc_back')" />
            </div>
        </div>
        
    </div>
    <div>
        <x-input-label for="ဖုန်းနံပါတ်" :value="__('ဖုန်းနံပါတ်')" />
        <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
    </div>
    <div>
        <x-input-label for="လက်ကိုင်ဖုန်း" :value="__('လက်ကိုင်ဖုန်း')" />
        <x-text-input wire:model="mobile" id="mobile" name="mobile" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
    </div>
    <div>
        <x-input-label for="အီးမေးလ်" :value="__('အီးမေးလ်')" />
        <x-text-input wire:model="email" id="email" name="email" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>
    <div class="col-span-3">
        <x-input-label :value="__('လက်ရှိနေရပ်လိပ်စာ အပြည့်အစုံ (လမ်း,ရပ်ကွက်,မြို့/မြို့နယ်,ခရိုင်,ပြည်နယ်/တိုင်းဒေသကြီး)')" />
        <div class="flex flex-row gap-2">
            <div>
                <x-text-input wire:model="current_address_street" placeholder="လမ်း" id="current_address_street" name="current_address_street" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_street')" />
            </div>
            <div>
                <x-text-input wire:model="current_address_ward" placeholder="ရပ်ကွက်" id="current_address_ward" name="current_address_ward" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_ward')" />
            </div>
            <div>
                <x-select wire:model="current_address_township_or_town_id" :values="$current_address_townships" placeholder="မြို့/မြို့နယ်" id="current_address_township_or_town_id" name="current_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_township_or_town_id')" />
            </div>
            <div>
                <x-select wire:model.change="current_address_district_id" :values="$current_address_districts" placeholder="ခရိုင်" id="current_address_district_id" name="current_address_district_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_district_id')" />
            </div>
            <div>
                <x-select wire:model.change="current_address_region_id" :values="$regions" placeholder="ပြည်နယ်/တိုင်းဒေသကြီး" id="current_address_region_id" name="current_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_region_id')" />
            </div>
           
            
        </div>
    </div>
    <div class="col-span-3">
        <x-input-label :value="__('အမြဲတမ်းနေရပ်လိပ်စာ အပြည့်အစုံ (လမ်း,ရပ်ကွက်,မြို့/မြို့နယ်,ခရိုင်,ပြည်နယ်/တိုင်းဒေသကြီး)')" />
        <div class="flex flex-row gap-2">
            <div>
                <x-text-input wire:model="permanent_address_street" placeholder="လမ်း" id="permanent_address_street" name="permanent_address_street" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_street')" />
            </div>
            <div>
                <x-text-input wire:model="permanent_address_ward" placeholder="ရပ်ကွက်" id="permanent_address_ward" name="permanent_address_ward" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_ward')" />
            </div>
            <div>
                <x-select wire:model="permanent_address_township_or_town_id" :values="$permanent_address_townships" placeholder="မြို့/မြို့နယ်" id="permanent_address_township_or_town_id" name="permanent_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_township_or_town_id')" />
            </div>
            <div>
                <x-select wire:model.change="permanent_address_district_id" :values="$permanent_address_districts" placeholder="ခရိုင်" id="permanent_address_district_id" name="permanent_address_district_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_district_id')" />
            </div>
            <div>
                <x-select wire:model.change="permanent_address_region_id" :values="$regions" placeholder="ပြည်နယ်/တိုင်းဒေသကြီး" id="permanent_address_region_id" name="permanent_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_region_id')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="ယခင်နေခဲ့ဖူးသောဒေသနှင့် နေရပ်လိပ်စာ အပြည့်အစုံ" :value="__('ယခင်နေခဲ့ဖူးသောဒေသနှင့် နေရပ်လိပ်စာ အပြည့်အစုံ')" />
        <x-textarea-input wire:model="previous_addresses" id="previous_addresses" name="previous_addresses" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('previous_addresses')" />
    </div>
   
    <div>
        <x-input-label for="တပ်မတော်သို့ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်(က)ကိုယ်ပိုင်အမှတ်" :value="__('(က)တပ်မတော်သို့ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင် ကိုယ်ပိုင်အမှတ်')" />
        <x-text-input wire:model="military_solider_no" id="military_solider_no" name="military_solider_no" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_solider_no')" />
    </div>
    <div>
        <x-input-label for="(ခ) တပ်သို့ဝင်သည့်နေ့" :value="__('(ခ) တပ်သို့ဝင်သည့်နေ့')" />
        <x-text-input wire:model="military_join_date" id="military_join_date" name="military_join_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_join_date')" />
    </div>
    <div>
        <x-input-label for="(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်" :value="__('(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်')" />
        <x-text-input wire:model="military_dsa_no" id="military_dsa_no" name="military_dsa_no" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_dsa_no')" />
    </div>
    <div>
        <x-input-label for="(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့" :value="__('(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့')" />
        <x-text-input wire:model="military_gazetted_date" id="military_gazetted_date" name="military_gazetted_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_gazetted_date')" />
    </div>
    <div>
        <x-input-label for="(င) တပ်ထွက်သည့်နေ့" :value="__('(င) တပ်ထွက်သည့်နေ့')" />
        <x-text-input wire:model="military_leave_date" id="military_leave_date" name="military_leave_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_leave_date')" />
    </div>
    <div>
        <x-input-label for="(စ) ထွက်သည့်အကြောင်း" :value="__('(စ) ထွက်သည့်အကြောင်း')" />
        <x-text-input wire:model="military_leave_reason" id="military_leave_reason" name="military_leave_reason" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_leave_reason')" />
    </div>
    <div>
        <x-input-label for="(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ" :value="__('(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ')" />
        <x-text-input wire:model="military_served_army" id="military_served_army" name="military_served_army" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_served_army')" />
    </div>
    <div>
        <x-input-label for="(ဇ) တပ်တွင်းရာဇဝင်အကျဉ်း/ပြစ်မှု" :value="__('(ဇ) တပ်တွင်းရာဇဝင်အကျဉ်း/ပြစ်မှု')" />
        <x-textarea-input wire:model="military_brief_history_or_penalty" id="military_brief_history_or_penalty" name="military_brief_history_or_penalty" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_brief_history_or_penalty')" />
    </div>
    <div>
        <x-input-label for="(ဈ) အငြိမ်းစားလစာ" :value="__('(ဈ) အငြိမ်းစားလစာ')" />
        <x-text-input wire:model="military_pension" id="military_pension" name="military_pension" type="number" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_pension')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    @include('staff_multiple_table', [
        'column_names' => ['ပညာအရည်အချင်း အုပ်စု', 'ပညာအရည်အချင်း အမျိုးအစား', 'ပညာအရည်အချင်း'],
        'add_event' => 'add_edu',
        'column_vals' => $educations,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'education_group',
                'select_values' => $education_groups,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'education_type',
                'select_values' => $education_types,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'education',
                'select_values' => $_educations,
            ],
        ],
        'del_method' => 'removeEdu',
    ])
</div>
