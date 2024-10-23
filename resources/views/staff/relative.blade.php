
<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        <x-input-label :value="__('အဘ(အမည်, လူမျိုး, ဘာသာ, အလုပ်အကိုင်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="father_name" placeholder="အမည်" id="father_name" name="father_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
            </div>
            <div class="w-full">
                <x-select wire:model="father_ethnic_id" :values="$ethnics" placeholder=" လူမျိုးရွေးပါ" id="father_ethnic_id" name="father_ethnic_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="father_religion_id" :values="$religions" placeholder="ဘာသာရွေးပါ" id="father_religion_id" name="father_religion_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_religion_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="father_occupation" placeholder="အလုပ်အကိုင်" id="father_occupation" name="father_occupation" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_occupation')" />
            </div>
        </div>
    </div>

    <div class="col-span-4">
        <x-input-label :value="__('အဘ (ဇာတိ, ပြည်နယ်/တိုင်းဒေသကြီး, ခရိုင်, မြို့/မြို့နယ်, လမ်း, ရပ်ကွက်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="father_place_of_birth" placeholder="ဇာတိ" id="father_place_of_birth" name="father_place_of_birth" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_place_of_birth')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="father_address_region_id" :values="$regions" placeholder="ပြည်နယ်/တိုင်းဒေသကြီးရွေးပါ" id="father_address_region_id" name="father_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_address_region_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="father_address_township_or_town_id" :values="$father_townships" placeholder=" မြို့/မြို့နယ်ရွေးပါ" id="father_address_township_or_town_id" name="father_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="father_address_street" placeholder="လမ်း" id="father_address_street" name="father_address_street" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('father_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="father_address_ward" placeholder="ရပ်ကွက်" id="father_address_ward" name="father_address_ward" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('father_address_ward')" />
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('ခင်ပွန်းဇနီးအဘ၏(အမည်, လူမျိုး, ဘာသာ, အလုပ်အကိုင်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="spouse_father_name" placeholder="အမည်" id="father_name" name="father_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
            </div>
            <div class="w-full">
                <x-select wire:model="spouse_father_ethnic_id" :values="$ethnics" placeholder=" လူမျိုးရွေးပါ" id="spouse_father_ethnic_id" name="spouse_father_ethnic_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_father_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="spouse_father_religion_id" :values="$religions" placeholder="ဘာသာရွေးပါ" id="spouse_father_religion_id" name="spouse_father_religion_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_father_religion_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="spouse_father_occupation" placeholder="အလုပ်အကိုင်" id="spouse_father_occupation" name="spouse_father_occupation" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_father_occupation')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('ခင်ပွန်းဇနီးအဘ၏(ဇာတိ, ပြည်နယ်/တိုင်းဒေသကြီး, ခရိုင်, မြို့/မြို့နယ်, လမ်း, ရပ်ကွက်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="spouse_father_place_of_birth" placeholder="ဇာတိ" id="spouse_father_place_of_birth" name="spouse_father_place_of_birth" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_father_place_of_birth')" />
            </div>
           <div class="w-full">
                <x-select wire:model.change="spouse_father_address_region_id"  placeholder="ပြည်နယ်/တိုင်းဒေသကြီးရွေးပါ" :values="$regions" id="spouse_father_address_region_id" name="spouse_father_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_father_address_region_id')" />
            </div>

            <div class="w-full">
                <x-select wire:model="spouse_father_address_township_or_town_id"  placeholder="မြို့/မြို့နယ်ရွေးပါ" :values="$spouse_father_townships" id="spouse_father_address_township_or_town_id" name="spouse_father_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_father_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="spouse_father_address_street" placeholder="လမ်း" id="spouse_father_address_street" name="spouse_father_address_street" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('spouse_father_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="spouse_father_address_ward" placeholder="ရပ်ကွက်" id="spouse_father_address_ward" name="spouse_father_address_ward" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('spouse_father_address_ward')" />
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('အမိ (အမည်, လူမျိုး, ဘာသာ, အလုပ်အကိုင်)')" />
        <div class="flex flex-row items-center justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="mother_name" placeholder="အမည်" id="mother_name" name="mother_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_name')" />
            </div>
            <div class="w-full">
                <x-select wire:model="mother_ethnic_id" :values="$ethnics" placeholder="လူမျိုးရွေးပါ" id="mother_ethnic_id" name="mother_ethnic_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="mother_religion_id" :values="$religions" placeholder="ဘာသာ‌ရွေးပါ" id="mother_religion_id" name="mother_religion_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_religion_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="mother_occupation" placeholder="အလုပ်အကိုင်" id="mother_occupation" name="mother_occupation" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_occupation')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('အမိ (ဇာတိ, ပြည်နယ်/တိုင်းဒေသကြီး, ခရိုင်, မြို့/မြို့နယ်, လမ်း, ရပ်ကွက်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="mother_place_of_birth" placeholder="ဇာတိ" id="mother_place_of_birth" name="mother_place_of_birth" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_place_of_birth')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="mother_address_region_id"  placeholder="ပြည်နယ်/တိုင်းဒေသကြီး‌ရွေးပါ" :values="$regions" id="mother_address_region_id" name="mother_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_address_region_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="mother_address_township_or_town_id"  placeholder="မြို့/မြို့နယ်ရွေးပါ" id="mother_address_township_or_town_id" :values="$mother_townships" name="mother_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="mother_address_street" placeholder="လမ်း" id="mother_address_street" name="mother_address_street" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('mother_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="mother_address_ward" placeholder="ရပ်ကွက်" id="mother_address_ward" name="mother_address_ward" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('mother_address_ward')" />
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('ခင်ပွန်းဇနီးအမိ၏ (အမည်, လူမျိုး, ဘာသာ, အလုပ်အကိုင်)')" />
        <div class="flex flex-row items-center justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="spouse_mother_name" placeholder="အမည်" id="spouse_mother_name" name="spouse_mother_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_name')" />
            </div>
            <div class="w-full">
                <x-select wire:model="spouse_mother_ethnic_id" :values="$ethnics" placeholder="လူမျိုးရွေးပါ" id="spouse_mother_ethnic_id" name="spouse_mother_ethnic_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="spouse_mother_religion_id" :values="$religions" placeholder="ဘာသာ‌ရွေးပါ" id="spouse_mother_religion_id" name="spouse_mother_religion_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_religion_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="spouse_mother_occupation" placeholder="အလုပ်အကိုင်" id="spouse_mother_occupation" name="spouse_mother_occupation" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_occupation')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('ခင်ပွန်းဇနီးအမိ၏ (ဇာတိ, ပြည်နယ်/တိုင်းဒေသကြီး, ခရိုင်, မြို့/မြို့နယ်, လမ်း, ရပ်ကွက်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="spouse_mother_place_of_birth" placeholder="ဇာတိ" id="spouse_mother_place_of_birth" name="spouse_mother_place_of_birth" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_place_of_birth')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="spouse_mother_address_region_id" :values="$regions" placeholder="ပြည်နယ်/တိုင်းဒေသကြီး‌ရွေးပါ" id="mother_address_region_id" name="spouse_mother_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_address_region_id')" />
            </div>

            <div class="w-full">
                <x-select wire:model="spouse_mother_address_township_or_town_id" :values="$spouse_mother_townships" placeholder="မြို့/မြို့နယ်ရွေးပါ" id="spouse_mother_address_township_or_town_id" name="spouse_mother_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="spouse_mother_address_street" placeholder="လမ်း" id="spouse_mother_address_street" name="spouse_mother_address_street" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="spouse_mother_address_ward" placeholder="ရပ်ကွက်" id="spouse_mother_address_ward" name="spouse_mother_address_ward" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('spouse_mother_address_ward')" />
        </div>
    </div>
</div>
@foreach ($relatives as $key => $relative)
    <div class="w-full h-auto py-5">
        <div class="pb-2">
            <x-input-label :value="__($relative['label'])" class="font-semibold"/>
        </div>
        @include('staff_multiple_table', [
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ', 'ဇာတိ', 'အလုပ်အကိုင်', 'နေရပ်လိပ်စာ', 'တော်စပ်ပုံ'],
            'add_event' => 'add_'.$key,
            'column_vals' => $relative['data'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'name',
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'gender',
                    'select_values' => $genders,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'place_of_birth',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'occupation',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'address',
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'relation',
                    'select_values' => $relations,
                ],
            ],
            'del_method' => 'remove_'.$key,
        ])
    </div>
@endforeach
<div class="grid grid-cols-4 gap-4 py-5">
    <div>
        <x-input-label for="မိမိနှင့် မိမိ၏ဇနီး(သို့မဟုတ်) ခင်ပွန်းတို့၏ မိဘ၊ ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)" :value="__('မိမိနှင့် မိမိ၏ဇနီး(သို့မဟုတ်) ခင်ပွန်းတို့၏ မိဘ၊ ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)')" />
        <x-radio-input id1="family_in_politics_1" id2="family_in_politics_2" wire="family_in_politics" />
        <x-input-error class="mt-2" :messages="$errors->get('family_in_politics')" />
    </div>
</div>

