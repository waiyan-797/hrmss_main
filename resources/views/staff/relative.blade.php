<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        <x-input-label :value="__('အဘ(အမည်, လူမျိုး, ဘာသာ, အလုပ်အကိုင်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <!-- Label -->
                <x-input-label value="အမည်" />
                <x-text-input wire:model="father_name" placeholder="အမည်" id="father_name" name="father_name" type="text" class="mt-1 block w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
            </div>

            <div class="w-full">
                <x-input-label value="လူမျိုး" />
                <x-searchable-select
                    property="father_ethnic_id"
                    :values="$ethnics"
                    placeholder="လူမျိုးရွေးပါ"
                    id="father_ethnic_id"
                    name="father_ethnic_id"
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('father_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-input-label  value="ဘာသာ" />
                <x-select wire:model="father_religion_id" :values="$religions" placeholder="ဘာသာရွေးပါ" id="father_religion_id" name="father_religion_id" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('father_religion_id')" />
            </div>
            <div class="w-full">
                <x-input-label  value="အလုပ်အကိုင်" />

                <x-text-input wire:model="father_occupation" placeholder="" id="father_occupation" name="father_occupation" type="text" class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('father_occupation')" />
                    @error('father_occupation')
                    <div class="mt-2 text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-span-4">
        <x-input-label :value="__('အဘ (ဇာတိ, ပြည်နယ်/တိုင်းဒေသကြီး, ခရိုင်, မြို့/မြို့နယ်, လမ်း, ရပ်ကွက်,အိမ်နံပါတ်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="father_place_of_birth" placeholder="ဇာတိ" id="father_place_of_birth" name="father_place_of_birth" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('father_place_of_birth')" />
            </div>
            <div class="w-full">
                <x-select
                    wire:model.live="father_address_region_id"
                    placeholder="ပြည်နယ်/တိုင်းဒေသကြီးရွေးပါ"
                    :values="$regions"
                    id="father_address_region_id"
                    name="father_address_region_id"
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('father_address_region_id')" />
            </div>
            <div class="w-full">
                <x-select
                    wire:model="father_address_township_or_town_id"
                    placeholder="မြို့/မြို့နယ်ရွေးပါ"
                    :values="$father_townships"
                    id="father_address_township_or_town_id"
                    name="father_address_township_or_town_id"
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('father_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="father_address_street" placeholder="လမ်း" id="father_address_street" name="father_address_street" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('father_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="father_address_ward" placeholder="ရပ်ကွက်" id="father_address_ward" name="father_address_ward" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('father_address_ward')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="father_address_house_no" placeholder="အိမ်နံပါတ်" id="father_address_house_no" name="father_address_ward" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('father_address_house_no')" />
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('အမိ (အမည်, လူမျိုး, ဘာသာ, အလုပ်အကိုင်)')" />
        <div class="flex flex-row items-center justify-center gap-4">
            <div class="w-full">
                <x-input-label value='အမည်'/>
                <x-text-input wire:model="mother_name" placeholder="အမည်" id="mother_name" name="mother_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_name')" />
            </div>
            <div class="w-full">
                <x-input-label value='လူမျိုး'/>
                <x-searchable-select property="mother_ethnic_id" :values="$ethnics" placeholder="လူမျိုးရွေးပါ" id="mother_ethnic_id" name="mother_ethnic_id" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('mother_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-input-label value='ဘာသာ‌'/>
                <x-select wire:model="mother_religion_id" placeholder="ဘာသာ‌ရွေးပါ" :values="$religions" id="mother_religion_id" name="mother_religion_id" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('mother_religion_id')" />
            </div>
            <div class="w-full">
                <x-input-label value='အလုပ်အကိုင်'/>
                <x-text-input wire:model="mother_occupation" placeholder="အလုပ်အကိုင်" id="mother_occupation" name="mother_occupation" type="text" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('mother_occupation')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('အမိ (ဇာတိ, ပြည်နယ်/တိုင်းဒေသကြီး, ခရိုင်, မြို့/မြို့နယ်, လမ်း, ရပ်ကွက်,အိမ်နံပါတ်)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="mother_place_of_birth" placeholder="ဇာတိ" id="mother_place_of_birth" name="mother_place_of_birth" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('mother_place_of_birth')" />
            </div>
            <div class="w-full">
                <x-select
                    wire:model.live="mother_address_region_id"
                    placeholder="ပြည်နယ်/တိုင်းဒေသကြီးရွေးပါ"
                    :values="$regions"
                    id="mother_address_region_id"
                    name="mother_address_region_id"
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('mother_address_region_id')" />
            </div>
            <div class="w-full">
                <x-select
                    wire:model="mother_address_township_or_town_id"
                    placeholder="မြို့/မြို့နယ်ရွေးပါ"
                    :values="$mother_townships"
                    id="mother_address_township_or_town_id"
                    name="mother_address_township_or_town_id"
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('mother_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="mother_address_street" placeholder="လမ်း" id="mother_address_street" name="mother_address_street" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('mother_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="mother_address_ward" placeholder="ရပ်ကွက်" id="mother_address_ward" name="mother_address_ward" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('mother_address_ward')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="mother_address_house_no" placeholder="အိမ်နံပါတ်" id="mother_address_house_no" name="mother_address_house_no" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('mother_address_house_no')" />
        </div>
    </div>
</div>

@foreach ($relatives as $key => $relative)
    <div class="w-full h-auto py-5">
        <div class="pb-2 flex flex-row items-center gap-2 mb-3 font-arial font-semibold text-sm">
            <x-input-label :value="__($relative['label'])" class="font-semibold"/>
            <button wire:click='add_{{$key}}' type="button" class="text-green-500 bg-transparent border border-gray-300 hover:bg-green-200 hover:text-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-green-800 dark:border-gray-200 dark:hover:text-green-700 dark:focus:ring-green-700 dark:hover:bg-green-200 dark:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="sr-only">Add Icon</span>
            </button>
        </div>

        @include('staff_multiple_table', [
            'column_names' => ['အမည်', 'လူမျိုး', 'ဘာသာ','ကျား/မ', 'ဇာတိ', 'အလုပ်အကိုင်', 'နေရပ်လိပ်စာ', 'တော်စပ်ပုံ'],
            'column_vals' => $relative['data'],
            'data_master_add_stats' => [null, null, null, null, null, null, null, null],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => $key,
                    'wire_array_key' => 'name',
                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => $key,
                    'next_col_update' => null,
                    'wire_array_key' => 'ethnic',
                    'select_values' => $ethnics,
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => $key,
                    'next_col_update' => null,
                    'wire_array_key' => 'religion',
                    'select_values' => $religions,
                ],
                [
                    'type' => 'select',
                    'wire_array_name' => $key,
                    'next_col_update' => null,
                    'wire_array_key' => 'gender_id',
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
                    'next_col_update' => null,
                    'wire_array_key' => 'relation',
                    'select_values' => getRelatedRsType($relations , $key),
                ],
            ],
            'del_method' => 'remove_'.$key,
        ])
    </div>
@endforeach
<div class="mb-6">
        <x-input-label for="မိမိနှင့် မိမိ၏ဇနီး(သို့မဟုတ်) ခင်ပွန်းတို့၏ မိဘ၊ ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)" :value="__('မိမိနှင့် မိမိ၏ဇနီး(သို့မဟုတ်) ခင်ပွန်းတို့၏ မိဘ၊ ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)')" />
        <x-radio-input id1="family_in_politics_1" id2="family_in_politics_2" wire="family_in_politics" />

        @if($family_in_politics)
            <x-textarea-input  wire:model='family_in_politics_text' />
        @endif

       <x-input-error class="mt-2" :messages="$errors->get('family_in_politics')" />
</div>

