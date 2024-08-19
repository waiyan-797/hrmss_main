<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        @if ($photo)
            <img src="{{ $photo ? $photo->temporaryUrl() : route('file', $staff->staff_photo)}}" class="w-20 h-20 rounded-full border-2 dark:border-blue-600 border-blue-400 mb-4">
        @else
            <img src="{{ $photo ? $photo->temporaryUrl() : asset('img/user.png') }}" class="w-20 h-20 rounded-full border-2 dark:border-blue-600 border-blue-400 mb-4">
        @endif
    </div>
    <div>
        <x-input-label for="photo" :value="__('Photo')"/>
        <input wire:model='photo' id="photo" accept=".jpg, .jpeg, .png" name="photo" type="file" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-700 focus:outline-none placeholder-gray-400 mt-1 font-arial bg-white border-gray-300" />
        <x-input-error class="mt-1" :messages="$errors->get('photo')" />
    </div>
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>
        <x-input-label for="nick_name" :value="__('Nick Name')" />
        <x-text-input wire:model="nick_name" id="nick_name" name="nick_name" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('nick_name')" />
    </div>
    <div>
        <x-input-label for="other_name" :value="__('Other Name')" />
        <x-text-input wire:model="other_name" id="other_name" name="other_name" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('other_name')" />
    </div>
    <div>
        <x-input-label for="staff_no" :value="__('Staff Number')" />
        <x-text-input wire:model="staff_no" id="staff_no" name="staff_no" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('staff_no')" />
    </div>
    <div>
        <x-input-label for="dob" :value="__('Date of Birth')" />
        <x-text-input wire:model="dob" id="dob" name="dob" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('dob')" />
    </div>
    <div>
        <x-input-label for="gender_id" :value="__('Gender')" />
        <x-select wire:model="gender_id" :values="$genders" placeholder="Select an Option" id="gender_id" name="gender_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('gender_id')" />
    </div>
    <div>
        <x-input-label for="ethnic_id" :value="__('Ethnic')" />
        <x-select wire:model="ethnic_id" :values="$ethnics" placeholder="Select an Option" id="ethnic_id" name="ethnic_id" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('ethnic_id')" />
    </div>
    <div>
        <x-input-label for="religion_id" :value="__('Religion')" />
        <x-select wire:model="religion_id" :values="$religions" placeholder="Select an Option" id="religion_id" name="religion_id" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('religion_id')" />
    </div>
    <div>
        <x-input-label :value="__('Height (Feet, Inches)')" />
        <div class="flex flex-row gap-2">
            <div>
                <x-text-input wire:model="height_feet" placeholder="Feet" id="height_feet" name="height_feet" type="number" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('height_feet')" />
            </div>
            <div>
                <x-text-input wire:model="height_inch" placeholder="Inches" id="height_inch" name="height_inch" type="number" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('height_inch')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="hair_color" :value="__('Hair Color')" />
        <x-text-input wire:model="hair_color" id="hair_color" name="hair_color" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('hair_color')" />
    </div>
    <div>
        <x-input-label for="eye_color" :value="__('Eye Color')" />
        <x-text-input wire:model="eye_color" id="eye_color" name="eye_color" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('eye_color')" />
    </div>
    <div>
        <x-input-label for="prominent_mark" :value="__('Prominent Mark')" />
        <x-text-input wire:model="prominent_mark" id="prominent_mark" name="prominent_mark" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('prominent_mark')" />
    </div>
    <div>
        <x-input-label for="skin_color" :value="__('Skin Color')" />
        <x-text-input wire:model="skin_color" id="skin_color" name="skin_color" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('skin_color')" />
    </div>
    <div>
        <x-input-label for="weight" :value="__('Weight')" />
        <x-text-input wire:model="weight" placeholder="Body Weight" id="weight" name="weight" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')" />
    </div>
    <div>
        <x-input-label for="blood_type_id" :value="__('Blood Type')" />
        <x-select wire:model="blood_type_id" :values="$blood_types" placeholder="Select an Option" id="blood_type_id" name="blood_type_id" class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('blood_type_id')" />
    </div>
    <div>
        <x-input-label for="place_of_birth" :value="__('Birth Place')" />
        <x-textarea-input wire:model="place_of_birth" id="place_of_birth" name="place_of_birth" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('place_of_birth')" />
    </div>
    <div>
        <x-input-label for="nrc" :value="__('NRC')" />
        <x-text-input wire:model="nrc" id="nrc" name="nrc" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('nrc')" />
    </div>
    <div>
        <x-input-label for="phone" :value="__('Phone Number')" />
        <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
    </div>
    <div>
        <x-input-label for="mobile" :value="__('Mobile Number')" />
        <x-text-input wire:model="mobile" id="mobile" name="mobile" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input wire:model="email" id="email" name="email" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>
    <div class="col-span-3">
        <x-input-label :value="__('Current Address (Street, Ward, Region, District, Township)')" />
        <div class="flex flex-row gap-2">
            <div>
                <x-text-input wire:model="current_address_street" placeholder="Street" id="current_address_street" name="current_address_street" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_street')" />
            </div>
            <div>
                <x-text-input wire:model="current_address_ward" placeholder="Ward" id="current_address_ward" name="current_address_ward" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_ward')" />
            </div>
            <div>
                <x-select wire:model="current_address_region_id" :values="$regions" placeholder="Region" id="current_address_region_id" name="current_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_region_id')" />
            </div>
            <div>
                <x-select wire:model="current_address_district_id" :values="$districts" placeholder="District" id="current_address_district_id" name="current_address_district_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_district_id')" />
            </div>
            <div>
                <x-select wire:model="current_address_township_or_town_id" :values="$townships" placeholder="Township" id="current_address_township_or_town_id" name="current_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('current_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div class="col-span-3">
        <x-input-label :value="__('Permanent Address (Street, Ward, Region, District, Township)')" />
        <div class="flex flex-row gap-2">
            <div>
                <x-text-input wire:model="permanent_address_street" placeholder="Street" id="permanent_address_street" name="permanent_address_street" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_street')" />
            </div>
            <div>
                <x-text-input wire:model="permanent_address_ward" placeholder="Ward" id="permanent_address_ward" name="permanent_address_ward" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_ward')" />
            </div>
            <div>
                <x-select wire:model="permanent_address_region_id" :values="$regions" placeholder="Region" id="permanent_address_region_id" name="permanent_address_region_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_region_id')" />
            </div>
            <div>
                <x-select wire:model="permanent_address_district_id" :values="$districts" placeholder="District" id="permanent_address_district_id" name="permanent_address_district_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_district_id')" />
            </div>
            <div>
                <x-select wire:model="permanent_address_township_or_town_id" :values="$townships" placeholder="Township" id="permanent_address_township_or_town_id" name="permanent_address_township_or_town_id" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('permanent_address_township_or_town_id')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="previous_addresses" :value="__('Previous addresses')" />
        <x-textarea-input wire:model="previous_addresses" id="previous_addresses" name="previous_addresses" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('previous_addresses')" />
    </div>
    <div>
        <x-input-label for="military_solider_no" :value="__('Military Soldier No.')" />
        <x-text-input wire:model="military_solider_no" id="military_solider_no" name="military_solider_no" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_solider_no')" />
    </div>
    <div>
        <x-input-label for="military_join_date" :value="__('Military Join Date')" />
        <x-text-input wire:model="military_join_date" id="military_join_date" name="military_join_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_join_date')" />
    </div>
    <div>
        <x-input-label for="military_dsa_no" :value="__('Military DSA No.')" />
        <x-text-input wire:model="military_dsa_no" id="military_dsa_no" name="military_dsa_no" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_dsa_no')" />
    </div>
    <div>
        <x-input-label for="military_gazetted_date" :value="__('Military Gazetted Date')" />
        <x-text-input wire:model="military_gazetted_date" id="military_gazetted_date" name="military_gazetted_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_gazetted_date')" />
    </div>
    <div>
        <x-input-label for="military_leave_date" :value="__('Military Leave Date')" />
        <x-text-input wire:model="military_leave_date" id="military_leave_date" name="military_leave_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_leave_date')" />
    </div>
    <div>
        <x-input-label for="military_leave_reason" :value="__('Military Leave Reason')" />
        <x-text-input wire:model="military_leave_reason" id="military_leave_reason" name="military_leave_reason" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_leave_reason')" />
    </div>
    <div>
        <x-input-label for="military_served_army" :value="__('Military Served Army')" />
        <x-text-input wire:model="military_served_army" id="military_served_army" name="military_served_army" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_served_army')" />
    </div>
    <div>
        <x-input-label for="military_brief_history_or_penalty" :value="__('Military Brief History or Penalty')" />
        <x-textarea-input wire:model="military_brief_history_or_penalty" id="military_brief_history_or_penalty" name="military_brief_history_or_penalty" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_brief_history_or_penalty')" />
    </div>
    <div>
        <x-input-label for="military_pension" :value="__('Military Pension')" />
        <x-text-input wire:model="military_pension" id="military_pension" name="military_pension" type="number" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('military_pension')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    @include('staff_multiple_table', [
        'column_names' => ['Education Group', 'Education Type', 'Education'],
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
