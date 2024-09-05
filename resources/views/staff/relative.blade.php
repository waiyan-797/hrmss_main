<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        <x-input-label :value="__('Father (Name, Ethnic, Religion, Occupation)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="father_name" placeholder="Name" id="father_name" name="father_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
            </div>
            <div class="w-full">
                <x-select wire:model="father_ethnic_id" :values="$ethnics" placeholder="Select Ethnics" id="father_ethnic_id" name="father_ethnic_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="father_religion_id" :values="$religions" placeholder="Select Religions" id="father_religion_id" name="father_religion_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_religion_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="father_occupation" placeholder="Occupation" id="father_occupation" name="father_occupation" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_occupation')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('Father (Birth Place, Region, District, Township, Street, Ward)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="father_place_of_birth" placeholder="Enter birth place..." id="father_place_of_birth" name="father_place_of_birth" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_place_of_birth')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="father_address_region_id" :values="$regions" placeholder="Select Regions" id="father_address_region_id" name="father_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_address_region_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="father_address_district_id" :values="$father_districts" placeholder="Select Districts" id="father_address_district_id" name="father_address_district_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_address_district_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="father_address_township_or_town_id" :values="$father_townships" placeholder="Select Townships" id="father_address_township_or_town_id" name="father_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('father_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="father_address_street" placeholder="Street" id="father_address_street" name="father_address_street" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('father_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="father_address_ward" placeholder="Ward" id="father_address_ward" name="father_address_ward" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('father_address_ward')" />
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('Mother (Name, Ethnic, Religion, Occupation)')" />
        <div class="flex flex-row items-center justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="mother_name" placeholder="Name" id="mother_name" name="mother_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_name')" />
            </div>
            <div class="w-full">
                <x-select wire:model="mother_ethnic_id" :values="$ethnics" placeholder="Select Ethnics" id="mother_ethnic_id" name="mother_ethnic_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_ethnic_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="mother_religion_id" :values="$religions" placeholder="Select Religions" id="mother_religion_id" name="mother_religion_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_religion_id')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="mother_occupation" placeholder="Occupation" id="mother_occupation" name="mother_occupation" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_occupation')" />
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <x-input-label :value="__('Mother (Birth Place, Region, District, Township, Street, Ward)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-textarea-input wire:model="mother_place_of_birth" placeholder="Enter birth place..." id="mother_place_of_birth" name="mother_place_of_birth" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_place_of_birth')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="mother_address_region_id" :values="$regions" placeholder="Select Regions" id="mother_address_region_id" name="mother_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_address_region_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model.change="mother_address_district_id" :values="$mother_districts" placeholder="Select Districts" id="mother_address_district_id" name="mother_address_district_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_address_district_id')" />
            </div>
            <div class="w-full">
                <x-select wire:model="mother_address_township_or_town_id" :values="$mother_townships" placeholder="Select Townships" id="mother_address_township_or_town_id" name="mother_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('mother_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-row justify-center gap-4">
        <div class="w-full">
            <x-text-input wire:model="mother_address_street" placeholder="Street" id="mother_address_street" name="mother_address_street" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('mother_address_street')" />
        </div>
        <div class="w-full">
            <x-text-input wire:model="mother_address_ward" placeholder="Ward" id="mother_address_ward" name="mother_address_ward" type="text" class="mt-1 block w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('mother_address_ward')" />
        </div>
    </div>
</div>
@foreach ($relatives as $key => $relative)
    <div class="w-full h-auto py-5">
        <div class="pb-2">
            <x-input-label :value="__($relative['label'])" class="font-semibold"/>
        </div>
        @include('staff_multiple_table', [
            'column_names' => ['Name', 'Ethnic', 'Religion', 'Place of Birth', 'Occupation', 'Address', 'Relation'],
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
        <x-input-label for="family_in_politics" :value="__('Are family in politics?')" />
        <x-radio-input id1="family_in_politics_1" id2="family_in_politics_2" wire="family_in_politics" />
        <x-input-error class="mt-2" :messages="$errors->get('family_in_politics')" />
    </div>
</div>
