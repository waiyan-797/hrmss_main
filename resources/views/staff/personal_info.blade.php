<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        @if ($staff_photo && $photo == null)
            <img src="{{ route('file', $staff_photo) }}" class="w-20 h-20 mb-4 border-2 border-green-400 rounded-full dark:border-green-600">
        @else
            <img src="{{ $photo ? $photo->temporaryUrl() :asset('img/user.png')}}" class="w-20 h-20 mb-4 border-2 border-green-400 rounded-full dark:border-green-600">
        @endif
    </div>

    <div>
        <x-input-label for="ဓါတ်ပုံ" :value="__('ဓါတ်ပုံ')"/>
        <x-input-file wire:model='photo' id="photo" accept=".jpg, .jpeg, .png" name="photo"/>
        <x-input-error class="mt-1" :messages="$errors->get('photo')" />
    </div>
    <div>
        <x-input-label for="အမည်" :value="__('အမည်')" />
        <x-text-input wire:model="name" id="name" name="name" type="text" class="block w-full mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('name')" required/>
    </div>
    <div>
        <x-input-label for="ငယ်အမည်" :value="__('ငယ်အမည်')" />
        <x-text-input wire:model="nick_name" id="nick_name" name="nick_name" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('nick_name')" />
    </div>
    <div>
        <x-input-label for="အခြားအမည်" :value="__('အခြားအမည်')" />
        <x-text-input wire:model="other_name" id="other_name" name="other_name" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('other_name')" />
    </div>
    <div>
        <x-input-label for="ဝန်ထမ်းအမှတ်" :value="__('ဝန်ထမ်းအမှတ်')" />
        <x-text-input wire:model="staff_no" id="staff_no" name="staff_no" type="text" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('staff_no')" />
    </div>
    <div>
        <x-input-label for="မွေးသက္ကရာဇ်" :value="__('မွေးသက္ကရာဇ် (လ ၊ ရက် ၊ နှစ်)')" />
        <x-text-input wire:model="dob" id="dob" name="dob" class="block w-full mt-1" type="date" required/>
        <x-input-error class="mt-2" :messages="$errors->get('dob')" required/>
    </div>
    <div>
        <x-input-label for="Attendid" :value="__('Attend Id')" />
        <x-text-input wire:model="attendid" id="attendid" name="attendid" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('attendid')" />
    </div>
    <div>
        <x-input-label for="GPMSဝန်ထမ်းအမှတ်" :value="__('GPMS ဝန်ထမ်းအမှတ်')" />
        <x-text-input wire:model="gpms_staff_no" id="gpms_staff_no" name="gpms_staff_no" type="text" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('gpms_staff_no')" />
    </div>

    <div>
        <x-input-label for="ကျား/မ" :value="__('ကျား/မ')" />
        <x-select
            wire:model="gender_id"
            :values="$genders"
            placeholder="ကျား/မရွေးပါ"
            name="gender_id"
            class="block w-full mt-1"
        />
        <x-input-error class="mt-2" :messages="$errors->get('gender_id')" />
    </div>
    <div>
        <x-input-label for="လူမျိုး" :value="__('လူမျိုး')" />
        <x-searchable-select
            placeholder="လူမျိုးရွေးပါ"
            :values="$ethnics"
            property="ethnic_id"
            class="block w-full p-2 mt-1 text-sm border rounded font-arial"
        />
        <x-input-error class="mt-2" :messages="$errors->get('ethnic_id')" />
    </div>
    <div>
        <x-input-label for="ဘာသာ" :value="__('ဘာသာ')" />
        <x-select
            wire:model="religion_id"
            :values="$religions"
            placeholder="ဘာသာရွေးပါ"
            name="religion_id"
            class="block w-full mt-1"
        />
        <x-input-error class="mt-2" :messages="$errors->get('religion_id')" />
    </div>
    <div>
        <x-input-label :value="__('အရပ်အမြင့်(ပေ, လက်မ)')" />
        <div class="flex flex-row gap-2">
            <div>
                <x-text-input wire:model="height_feet" placeholder="ပေ" id="height_feet" name="height_feet" type="number" class="block w-full mt-1" required/>
                <x-input-error class="mt-2" :messages="$errors->get('height_feet')" required/>
            </div>
            <div>
                <x-text-input wire:model="height_inch" placeholder="လက်မ" id="height_inch" name="height_inch" type="number" class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('height_inch')"/>
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="ဆံပင်အရောင်" :value="__('ဆံပင်အရောင်')" />
        <x-text-input wire:model="hair_color" id="hair_color" name="hair_color" type="text" class="block w-full mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('hair_color')" required/>
    </div>
    <div>
        <x-input-label for="မျက်စိအရောင်" :value="__('မျက်စိအရောင်')" />
        <x-text-input wire:model="eye_color" id="eye_color" name="eye_color" type="text" class="block w-full mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('eye_color')" required/>
    </div>
    <div>
        <x-input-label for="ထင်ရှားသည့်အမှတ်အသား" :value="__('ထင်ရှားသည့်အမှတ်အသား')" />
        <x-text-input wire:model="prominent_mark" id="prominent_mark" name="prominent_mark" type="text" class="block w-full mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('prominent_mark')" required/>
    </div>
    <div>
        <x-input-label for="အသားအရောင်" :value="__('အသားအရောင်')" />
        <x-text-input wire:model="skin_color" id="skin_color" name="skin_color" type="text" class="block w-full mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('skin_color')" required/>
    </div>
    <div>
        <x-input-label for="ကိုယ်အလေးချိန် (ပေါင်)" :value="__('ကိုယ်အလေးချိန် (ပေါင်)')" />
        <x-text-input wire:model="weight" placeholder="ကိုယ်အလေးချိန်" id="weight" name="weight" type="text" class="block w-full mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')" required/>
    </div>
    <div>
        <x-input-label for="သွေးအုပ်စု" :value="__('သွေးအုပ်စု')" />
        <x-select
            wire:model="blood_type_id"
            :values="$blood_types"
            placeholder="သွေးအုပ်စုရွေးပါ"
            id="blood_type_id"
            name="blood_type_id"
            class="block w-full mt-1"
        />
        <x-input-error class="mt-2" :messages="$errors->get('blood_type_id')" />
    </div>
    <div>
        <x-input-label for="အိမ်ထောင်သည်" :value="__('အိမ်ထောင်သည်')" />
        <x-select
            wire:model="marital_status_id"
            :values="$marital_statuses"
            placeholder="အိမ်ထောင်သည်ရွေးပါ"
            id="marital_status_id"
            name="marital_status_id"
            class="block w-full mt-1"
        />
        <x-input-error class="mt-2" :messages="$errors->get('marital_status_id')" />
    </div>
    <div>
        <x-input-label for="ခင်ပွန်း/ဇနီး" :value="__('ခင်ပွန်း/ဇနီးအမည်')" />
        <x-text-input wire:model="spouse_name" id="spouse_name" name="spouse_name" type="text" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('spouse_name')" />
    </div>
    <div>
        <x-input-label for="မွေးဖွားရာဇာတိ" :value="__('မွေးဖွားရာဇာတိ')" />
        <x-text-input wire:model="place_of_birth" id="place_of_birth" name="place_of_birth" class="block w-full mt-1" required/>
        <x-input-error class="mt-2" :messages="$errors->get('place_of_birth')" required/>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်(တိုင်းဒေသကြီး/ပြည်နယ်, မြို့/မြို့နယ်, အမှတ်အသား, ကုဒ်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-select wire:model.live="nrc_region_id" :values="$nrc_region_ids" placeholder="Select Region ID" id="nrc_region_id" name="nrc_region_id" class="block w-full mt-1" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_region_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="nrc_township_code_id" :values="$nrc_township_codes" placeholder="Select Township Code" id="nrc_township_code_id" name="nrc_township_code_id" class="block w-full mt-1" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_township_code_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="nrc_sign_id" :values="$nrc_signs" placeholder="Select Sign" id="nrc_sign_id" name="nrc_sign_id" class="block w-full mt-1" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_sign_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="nrc_code" id="nrc_code" placeholder="Code" name="nrc_code" type="text" class="block w-full mt-1" required/>
                <x-input-error class="mt-2" :messages="$errors->get('nrc_code')" />
            </div>
        </div>
        <br>

        <div class="grid grid-cols-2 gap-4">
            <!-- NRC Front Section -->
            <div class="flex flex-col">
                <div class="mb-4">
                    @if ($staff_nrc_front && $nrc_front == null)
                        <img src="{{ route('file', $staff_nrc_front) }}" class="w-40 h-40 border-2 border-gray-400 rounded-md">
                    @else
                        <img src="{{ $nrc_front ? $nrc_front->temporaryUrl() : asset('img/img.png') }}" class="w-40 h-40 border-2 border-gray-400 rounded-md">
                    @endif
                </div>
                <x-input-label for="nrc_front" :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြား (အရှေ့ဘက်)')"/>
                <x-input-file wire:model='nrc_front' id="nrc_front" accept=".jpg, .jpeg, .png" name="nrc_front" class="block w-full mt-1 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none font-arial" />
                <x-input-error class="mt-1" :messages="$errors->get('nrc_front')" />
            </div>

            <!-- NRC Back Section -->
            <div class="flex flex-col">
                <div class="mb-4">
                    @if ($staff_nrc_back && $nrc_back == null)
                        <img src="{{ route('file', $staff_nrc_back) }}" class="w-40 h-40 border-2 border-gray-400 rounded-md">
                    @else
                        <img src="{{ $nrc_back ? $nrc_back->temporaryUrl() : asset('img/img.png') }}" class="w-40 h-40 border-2 border-gray-400 rounded-md">
                    @endif
                </div>
                <x-input-label for="nrc_back" :value="__('နိုင်ငံသားစိစစ်ရေးကတ်ပြား (အနောက်ဘက်)')"/>
                <input wire:model='nrc_back' id="nrc_back" accept=".jpg, .jpeg, .png" name="nrc_back" type="file" class="block w-full mt-1 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none font-arial" />
                <x-input-error class="mt-1" :messages="$errors->get('nrc_back')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <x-input-label for="ဖုန်းနံပါတ်" :value="__('ဖုန်းနံပါတ်')" />
                <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="block w-full mt-1" required/>
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
            <div>
                <x-input-label for="လက်ကိုင်ဖုန်း" :value="__('လက်ကိုင်ဖုန်း')" />
                <x-text-input wire:model="mobile" id="mobile" name="mobile" type="text" class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
            </div>
            <div>
                <x-input-label for="အီးမေးလ်" :value="__('အီးမေးလ်')" />
                <x-text-input wire:model="email" id="email" name="email" type="text" class="block w-full mt-1" required/>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('လက်ရှိနေရပ်လိပ်စာ အပြည့်အစုံ (ပြည်နယ်/တိုင်းဒေသကြီး,ခရိုင်,မြို့/မြို့နယ်,ရပ်ကွက်,လမ်း,အိမ်နံပါတ်)')" />
        <div class="grid grid-cols-5 gap-4">
            <div>
                <x-select
                    required
                    wire:model.live="current_address_region_id"
                    :values="$regions"
                    placeholder="ပြည်နယ်/တိုင်းဒေသကြီး"
                    name="current_address_region_id"
                    class="block w-full mt-1"
                />
                <x-input-error class="mt-2" :messages="$errors->get('current_address_region_id')" />
            </div>
            <div>
                <x-select
                    required
                    wire:model="current_address_township_or_town_id"
                    :values="$current_address_townships"
                    placeholder="မြို့/မြို့နယ်"
                    name="current_address_township_or_town_id"
                    class="block w-full mt-1"
                />
                <x-input-error class="mt-2" :messages="$errors->get('current_address_township_or_town_id')" />
            </div>
            <div>
                <x-text-input wire:model="current_address_ward" placeholder="ရပ်ကွက်/ရွာ" id="current_address_ward" name="current_address_ward" type="text" class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('current_address_ward')" />
            </div>
            <div>
                <x-text-input wire:model="current_address_street" placeholder="လမ်း" id="current_address_street" name="current_address_street" type="text" class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('current_address_street')" />
            </div>
            <div>
                <x-text-input wire:model="current_address_house_no" placeholder="အိမ်နံပါတ်" id="current_address_house_no" name="current_address_house_no" type="text" class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('current_address_house_no')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('အမြဲတမ်းနေရပ်လိပ်စာ အပြည့်အစုံ (ပြည်နယ်/တိုင်းဒေသကြီး,ခရိုင်,မြို့/မြို့နယ်,ရပ်ကွက်,လမ်း,အိမ်နံပါတ်)')" />
        <div class="grid grid-cols-5 gap-4">
            <div>
                <x-select
                    required
                    wire:model.live="permanent_address_region_id"
                    :values="$regions"
                    placeholder="ပြည်နယ်/တိုင်းဒေသကြီး"
                    name="permanent_address_region_id"
                    class="block w-full mt-1"
                />
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_region_id')" />
            </div>
            <div>
                <x-select
                    required
                    wire:model="permanent_address_township_or_town_id"
                    :values="$permanent_address_townships"
                    placeholder="မြို့/မြို့နယ်"
                    name="permanent_address_township_or_town_id"
                    class="block w-full mt-1"
                />
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_township_or_town_id')" />
            </div>
            <div>
                <x-text-input wire:model="permanent_address_ward" placeholder="ရပ်ကွက်/ရွာ" id="permanent_address_ward" name="permanent_address_ward" type="text" class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_ward')" />
            </div>
            <div>
                <x-text-input wire:model="permanent_address_street" placeholder="လမ်း" id="permanent_address_street" name="permanent_address_street" type="text" class="block w-full mt-1" />
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_street')" />
            </div>
            <div>
                <x-text-input wire:model="permanent_address_house_no" placeholder="အိမ်နံပါတ်" id="permanent_address_house_no" name="permanent_address_house_no" type="text" class="block w-full mt-1"/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_house_no')" />
            </div>
        </div>
    </div>
    <div class="col-span-2">
        <x-input-label for="ယခင်နေခဲ့ဖူးသောဒေသနှင့် နေရပ်လိပ်စာ အပြည့်အစုံ" :value="__('ယခင်နေခဲ့ဖူးသောဒေသနှင့် နေရပ်လိပ်စာ အပြည့်အစုံ')" />
        <x-textarea-input wire:model="previous_addresses" id="previous_addresses" name="previous_addresses" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('previous_addresses')" />
    </div>
    <div class="col-span-2"></div>
    <div>
        <x-input-label for="တပ်မတော်သို့ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်(က)ကိုယ်ပိုင်အမှတ်" :value="__('(က) တပ်မတော်သို့ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင် ကိုယ်ပိုင်အမှတ်')" />
        <x-text-input wire:model="military_solider_no" id="military_solider_no" name="military_solider_no" type="text" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('military_solider_no')" />
    </div>
    <div>
        <x-input-label for="(ခ) တပ်သို့ဝင်သည့်နေ့" :value="__('(ခ) တပ်သို့ဝင်သည့်နေ့ (လ ၊ ရက် ၊ နှစ်)')" />
        <x-text-input wire:model="military_join_date" id="military_join_date" name="military_join_date" type="date" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('military_join_date')" />
    </div>
    <div>
        <x-input-label for="(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်" :value="__('(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဉ်')" />
        <x-text-input wire:model="military_dsa_no" id="military_dsa_no" name="military_dsa_no" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('military_dsa_no')" />
    </div>
    <div>
        <x-input-label for="(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့" :value="__('(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့ (လ ၊ ရက် ၊ နှစ်)')" />
        <x-text-input wire:model="military_gazetted_date" id="military_gazetted_date"  name="military_gazetted_date" type="date" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('military_gazetted_date')" />
    </div>
    <div>
        <x-input-label for="(င) တပ်ထွက်သည့်နေ့" :value="__('(င) တပ်ထွက်သည့်နေ့ (လ ၊ ရက် ၊ နှစ်)')" />
        <x-text-input wire:model="military_leave_date" id="military_leave_date"  name="military_leave_date" type="date" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('military_leave_date')" />
    </div>
    <div>
        <x-input-label for="(စ) ထွက်သည့်အကြောင်း" :value="__('(စ) ထွက်သည့်အကြောင်း')" />
        <x-text-input wire:model="military_leave_reason" id="military_leave_reason" name="military_leave_reason" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('military_leave_reason')" />
    </div>
    <div>
        <x-input-label for="(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ" :value="__('(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ')" />
        <x-text-input wire:model="military_served_army" id="military_served_army" name="military_served_army" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('military_served_army')" />
    </div>
    <div class="col-span-2">
        <x-input-label for="(ဇ) တပ်တွင်းရာဇဝင်အကျဉ်း/ပြစ်မှု" :value="__('(ဇ) တပ်တွင်းရာဇဝင်အကျဉ်း/ပြစ်မှု')" />
        <x-textarea-input wire:model="military_brief_history_or_penalty" id="military_brief_history_or_penalty" name="military_brief_history_or_penalty" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('military_brief_history_or_penalty')" />
    </div>
    <div>
        <x-input-label for="(ဈ) အငြိမ်းစားလစာ" :value="__('(ဈ) အငြိမ်းစားလစာ')" />
        <x-text-input wire:model="military_pension" id="military_pension" name="military_pension" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('military_pension')" />
    </div>

    <div>
        <x-input-label for="ပြန်တမ်းဝင်အမှတ်" :value="__('ပြန်တမ်းဝင်အမှတ်')" />
        <x-text-input wire:model="military_gazetted_no" id="military_gazetted_no" name="military_gazetted_no" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('military_gazetted_no')" />
    </div>
    <div>
        <x-input-label for="စစ်မှုထမ်းဟောင်းအမှတ်" :value="__('စစ်မှုထမ်းဟောင်းအမှတ်')" />
        <x-text-input wire:model="veteran_no" id="veteran_no" name="veteran_no" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('veteran_no')" />
    </div>
    <div>
        <x-input-label for="စစ်မှုထမ်းဟောင်းရက်စွဲ" :value="__('စစ်မှုထမ်းဟောင်းရက်စွဲ (လ ၊ ရက် ၊ နှစ်)')" />
        <x-text-input wire:model="veteran_date" id="veteran_date"  name="veteran_date" type="date" class="block w-full mt-1"/>
        <x-input-error class="mt-2" :messages="$errors->get('veteran_date')" />
    </div>
    <div>
        <x-input-label for="နောက်ဆုံးတာဝန်ထမ်းဆောင်ခဲ့သောတပ်များ" :value="__('နောက်ဆုံးတာဝန်ထမ်းဆောင်ခဲ့သောတပ်များ')" />
        <x-text-input wire:model="last_serve_army" id="last_serve_army" name="last_serve_army" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('last_serve_army')" />
    </div>
    <div>
        <x-input-label for="ကျန်းမာရေးအခြေအနေ" :value="__('ကျန်းမာရေးအခြေအနေ')" />
        <x-text-input wire:model="health_condition" id="health_condition" name="health_condition" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('health_condition')" />
    </div>
    <div>
        <x-input-label for="ဝင်‌ငွေခွန်သက်သာခွင့်" :value="__('ဝင်‌ငွေခွန်သက်သာခွင့်')" />
        <x-text-input wire:model="tax_exception" id="tax_exception" name="tax_exception" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('tax_exception')" />
    </div>
    <div>
        <x-input-label for="အဆိုပြုလွှာ" :value="__('အဆိုပြုလွှာ')" />
        <x-text-input wire:model="life_insurance_proposal" id="life_insurance_proposal" name="life_insurance_proposal" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('life_insurance_proposal')" />
    </div>
    <div>
        <x-input-label for="ပေါ်လစီအမှတ်" :value="__('ပေါ်လစီအမှတ်')" />
        <x-text-input wire:model="life_insurance_policy_no" id="life_insurance_policy_no" name="life_insurance_policy_no" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('life_insurance_policy_no')" />
    </div>
    <div>
        <x-input-label for="ပရီမီယံ" :value="__('ပရီမီယံ')" />
        <x-text-input wire:model="life_insurance_premium" id="life_insurance_premium" name="life_insurance_premium" type="text" class="block w-full mt-1" />
        <x-input-error class="mt-2" :messages="$errors->get('life_insurance_premium')" />
    </div>

    <div>
        <x-input-label for="ပြည်သူ့စစ်မှုထမ်းတာ၀န်ထမ်းဆောင်မှုအ‌ခြေအနေ" :value="__('ပြည်သူ့စစ်မှုထမ်းတာ၀န်ထမ်းဆောင်မှုအ‌ခြေအနေ')" />
        <x-select
            wire:model="military_service_id"
            :values="$military_services"
            placeholder="အ‌ခြေအနေရွေးပါ"
            id="military_service_id"
            name="military_service_id"
            class="block w-full mt-1"
        />
        <x-input-error class="mt-2" :messages="$errors->get('military_service_id')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <div class="flex flex-row items-center gap-2 pb-2 mb-3 text-sm font-semibold font-arial">
        <x-input-label :value="__('ပညာအရည်အချင်း')" class="font-semibold"/>
        <button wire:click='add_edu' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="sr-only">Add Icon</span>
        </button>
    </div>
    @include('education_table', [
        'column_names' => ['ပညာအရည်အချင်း' , 'ပညာအရည်အချင်း အုပ်စု', 'ပညာအရည်အချင်း အမျိုးအစား', 'ပေးအပ်သည့်နိုင်ငံ', 'ဘွဲ့လက်မှတ်'],
        'data_master_add_stats' => ['edu', 'edu_group', 'edu_type',  null, null],
        'column_vals' => $educations,

        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'education',
                'select_values' => $_educations,
                'next_col_update' => 'education_type',
                'next_col_model' => 'education_type',
                'next_col_model_related' => 'education_group',
                'ini_array' => 'eduTypesAndGroups',
                'disabled' => false ,

            ],
            [
                'type' => 'select',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'education_type',
                'select_values' => $education_types,
                // 'next_col_update' => 'education_groups',
                // 'next_col_model' => 'education_groups',
                // 'next_col_model_related' => null,
                // 'ini_array' => null ,

                'next_col_update' => null,
                'next_col_model' => null,
                'next_col_model_related' => null,
                'ini_array' => null ,

                'disabled' => true ,



            ],
            [
                'type' => 'select',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'education_group',
                'select_values' => $education_groups,
                // 'next_col_update' => null,
                // 'next_col_model' => null,
                // 'next_col_model_related' => null,
                // 'ini_array' => null,
                'next_col_update' => null,
                'next_col_model' => null,
                'next_col_model_related' => null,
                'ini_array' => null ,
                'disabled' => true ,

            ],
            [
                'type' => 'search_select',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'country_id',
                'select_values' => $_countries,
            ],
            [
                'type' => 'file',
                'wire_array_name' => 'educations',
                'wire_array_key' => 'degree_certificate',
            ],
        ],
        'del_method' => 'removeEdu',
    ])
</div>
