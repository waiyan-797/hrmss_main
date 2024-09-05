<div class="w-full h-auto py-5">
    <h1 class="text-blue-700 font-arial text-md mb-2 uppercase font-semibold">Schools</h1>
    @include('staff_multiple_table', [
        'column_names' => ['Education Group', 'Education Type', 'Education', 'School Name', 'Town', 'Year'],
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
                'wire_array_key' => 'year',
            ],

        ],
        'del_method' => 'remove_schools',
    ])
</div>
<div class="w-full h-auto py-5">
    <h1 class="text-blue-700 font-arial text-md mb-2 uppercase font-semibold">Trainings</h1>
    @include('staff_multiple_table', [
        'column_names' => ['Training Type', 'From Date', 'To Date', 'Location', 'Country', 'Training Location'],
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
        ],
        'del_method' => 'remove_trainings',
    ])
</div>
<div class="w-full h-auto py-5">
    <h1 class="text-blue-700 font-arial text-md mb-2 uppercase font-semibold">Awardings</h1>
    @include('staff_multiple_table', [
        'column_names' => ['Award Type', 'Award', 'Order No', 'Order Date'],
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
        ],
        'del_method' => 'remove_awardings',
    ])
</div>
<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        <x-input-label :value="__('Last School (Name, Subject, Row Number, Major)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="last_school_name" placeholder="Name" id="last_school_name" name="last_school_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_name')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="last_school_subject" placeholder="Subject" id="last_school_subject" name="last_school_subject" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_subject')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="last_school_row_no" placeholder="Row Number" id="last_school_row_no" name="last_school_row_no" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_row_no')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="last_school_major" placeholder="Major" id="last_school_major" name="last_school_major" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('last_school_major')" />
            </div>
        </div>
    </div>
    <div>
        <x-input-label for="student_life_political_social" :value="__('Student Life Political Social')" />
        <x-textarea-input wire:model="student_life_political_social" id="student_life_political_social" name="student_life_political_social" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('student_life_political_social')" />
    </div>
    <div>
        <x-input-label for="habit" :value="__('Habit')" />
        <x-text-input wire:model="habit" id="habit" name="habit" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('habit')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <h1 class="text-blue-700 font-arial text-md mb-2 uppercase font-semibold">Past Occupations</h1>
    @include('staff_multiple_table', [
        'column_names' => ['Rank', 'Department', 'Section', 'From Date', 'To Date', 'Remark'],
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
        <x-input-label for="revolution" :value="__('Revolution')" />
        <x-textarea-input wire:model="revolution" id="revolution" name="revolution" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('revolution')" />
    </div>
    <div>
        <x-input-label for="transfer_reason_salary" :value="__('Transfer Reason and Salary')" />
        <x-text-input wire:model="transfer_reason_salary" id="transfer_reason_salary" name="transfer_reason_salary" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('transfer_reason_salary')" />
    </div>
    <div>
        <x-input-label for="during_work_political_social" :value="__('Political Social During Work')" />
        <x-text-input wire:model="during_work_political_social" id="during_work_political_social" name="during_work_political_social" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('during_work_political_social')" />
    </div>
    <div>
        <x-input-label for="has_military_friend" :value="__('Has military friend?')" />
        <x-radio-input id1="has_military_friend_1" id2="has_military_friend_2" wire="has_military_friend" />
        <x-input-error class="mt-2" :messages="$errors->get('has_military_friend')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <h1 class="text-blue-700 font-arial text-md mb-2 uppercase font-semibold">Abroads</h1>
    @include('staff_multiple_table', [
        'column_names' => ['Country', 'Particular', 'Meet With', 'From Date', 'To Date'],
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
        ],
        'del_method' => 'remove_abroads',
    ])
</div>
<div class="grid grid-cols-4 gap-4 py-5">
    <div class="col-span-4">
        <x-input-label :value="__('Foreigner Friend (Name, Occupation, Nationality, Country)')" />
        <div class="flex flex-row justify-center gap-4">
            <div class="w-full">
                <x-text-input wire:model="foreigner_friend_name" placeholder="Name" id="foreigner_friend_name" name="foreigner_friend_name" type="text" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_name')" />
            </div>
            <div class="w-full">
                <x-text-input wire:model="foreigner_friend_occupation" placeholder="Occupation" id="foreigner_friend_occupation" name="foreigner_friend_occupation" type="text" class="mt-1 block w-full" required/>
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
        <x-input-label for="foreigner_friend_how_to_know" :value="__('How do you know your foreigner friend?')" />
        <x-textarea-input wire:model="foreigner_friend_how_to_know" id="foreigner_friend_how_to_know" name="foreigner_friend_how_to_know" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('foreigner_friend_how_to_know')" />
    </div>
    <div>
        <x-input-label for="recommended_by_military_person" :value="__('Recommended by Military Person')" />
        <x-text-input wire:model="recommended_by_military_person" id="recommended_by_military_person" name="recommended_by_military_person" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('recommended_by_military_person')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <h1 class="text-blue-700 font-arial text-md mb-2 uppercase font-semibold">Punishments</h1>
    @include('staff_multiple_table', [
        'column_names' => ['Penalty Type', 'Reason', 'From Date', 'To Date'],
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
