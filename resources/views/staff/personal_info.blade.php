<form wire:submit="submit_staff">
    @if ($message)
        <div id="alert-border-1" class="flex items-center p-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium font-arial"> {{$message}} </div>
            <button type="button" wire:click="$set('message', null)" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-1" aria-label="Close">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    <div class="grid grid-cols-4 gap-4 py-5">
        <div class="col-span-4">
            @if ($photo)
                <img src="{{ $photo ? $photo->temporaryUrl() : storage_path('app/upload').$staff->staff_photo }}" class="w-20 h-20 rounded-full border-2 dark:border-blue-600 border-blue-400 mb-4">
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
        <table class="w-full text-sm rounded-lg">
            <thead class="font-arial text-xs text-center text-blue-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Education Group</th>
                    <th scope="col" class="px-6 py-3">Education Type</th>
                    <th scope="col" class="px-6 py-3">Education</th>
                    <th scope="col" class="px-6 py-3">
                        <button wire:click='add_edu' type="button" class="text-blue-500 bg-transparent border border-gray-300 hover:bg-blue-200 hover:text-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-blue-800 dark:border-gray-200 dark:hover:text-blue-700 dark:focus:ring-blue-700 dark:hover:bg-blue-200 dark:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span class="sr-only">Add Icon</span>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($educations as $index => $education)
                <tr class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-gray-500 dark:text-gray-300">
                        <x-select
                            wire:model="educations.{{ $index }}.education_group"
                            :values="$education_groups"
                            placeholder="Select an Option"
                            class="mt-1 block w-full"
                            required
                        />
                    </td>
                    <td class="px-6 py-4 text-gray-500 dark:text-gray-300">
                        <x-select
                            wire:model="educations.{{ $index }}.education_type"
                            :values="$education_types"
                            placeholder="Select an Option"
                            class="mt-1 block w-full"
                            required
                        />
                    </td>
                    <td class="px-6 py-4 text-gray-500 dark:text-gray-300">
                        <x-select
                            wire:model="educations.{{ $index }}.education"
                            :values="$_educations"
                            placeholder="Select an Option"
                            class="mt-1 block w-full"
                            required
                        />
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" wire:click="removeEdu({{ $index }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pb-5">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
