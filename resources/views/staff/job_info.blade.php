<div class="grid grid-cols-4 gap-4 py-5">
    <div>
        <x-input-label for="is_parents_citizen_when_staff_born" :value="__('Are parents citizen when staff was born?')" />
        <x-radio-input id1="parent_citizen_1" id2="parent_citizen_2" wire="is_parents_citizen_when_staff_born" />
        <x-input-error class="mt-2" :messages="$errors->get('is_parents_citizen_when_staff_born')" />
    </div>
    <div>
        <x-input-label for="current_rank_id" :value="__('Current Rank')" />
        <x-select wire:model="current_rank_id" :values="$ranks" placeholder="Select an Option" id="current_rank_id" name="current_rank_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_rank_id')" />
    </div>
    <div>
        <x-input-label for="current_rank_date" :value="__('Current Rank Date')" />
        <x-text-input wire:model="current_rank_date" id="current_rank_date" name="current_rank_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_rank_date')" />
    </div>
    <div>
        <x-input-label for="current_department_id" :value="__('Current Department')" />
        <x-select wire:model="current_department_id" :values="$departments" placeholder="Select an Option" id="current_department_id" name="current_department_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_department_id')" />
    </div>
    <div>
        <x-input-label for="current_division_id" :value="__('Current Division')" />
        <x-select wire:model="current_division_id" :values="$divisions" placeholder="Select an Option" id="current_division_id" name="current_division_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_division_id')" />
    </div>
    <div>
        <x-input-label for="side_department_id" :value="__('Side Department')" />
        <x-select wire:model="side_department_id" :values="$departments" placeholder="Select an Option" id="side_department_id" name="side_department_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('side_department_id')" />
    </div>
    <div>
        <x-input-label for="side_division_id" :value="__('Side Division')" />
        <x-select wire:model="side_division_id" :values="$divisions" placeholder="Select an Option" id="side_division_id" name="side_division_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('side_division_id')" />
    </div>
    <div>
        <x-input-label for="salary_paid_by" :value="__('Salary Paid By')" />
        <x-select wire:model="salary_paid_by" :values="$departments" placeholder="Select an Option" id="salary_paid_by" name="salary_paid_by" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('salary_paid_by')" />
    </div>
    <div>
        <x-input-label for="join_date" :value="__('Join Date')" />
        <x-text-input wire:model="join_date" id="join_date" name="join_date" type="date" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('join_date')" />
    </div>
    <div>
        <x-input-label for="form_of_appointment" :value="__('Form of appointment')" />
        <x-text-input wire:model="form_of_appointment" id="form_of_appointment" name="form_of_appointment" type="text" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('form_of_appointment')" />
    </div>
    <div>
        <x-input-label for="is_direct_appointed" :value="__('Is direct appointed?')" />
        <x-radio-input id1="direct_appointed_1" id2="direct_appointed_2" wire="is_direct_appointed" />
        <x-input-error class="mt-2" :messages="$errors->get('is_direct_appointed')" />
    </div>
    <div>
        <x-input-label for="payscale_id" :value="__('Payscale')" />
        <x-select wire:model="payscale_id" :values="$payscales" placeholder="Select an Option" id="payscale_id" name="payscale_id" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('payscale_id')" />
    </div>
    <div>
        <x-input-label for="current_salary" :value="__('Current Salary')" />
        <x-text-input wire:model="current_salary" id="current_salary" name="current_salary" type="number" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_salary')" />
    </div>
    <div>
        <x-input-label for="current_increment_time" :value="__('Current Increment Time')" />
        <x-text-input wire:model="current_increment_time" id="current_increment_time" name="current_increment_time" type="number" class="mt-1 block w-full" required/>
        <x-input-error class="mt-2" :messages="$errors->get('current_increment_time')" />
    </div>
</div>
<div class="w-full h-auto py-5">
    <div class="pb-2">
        <x-input-label :value="__('Recommendations')" class="font-semibold"/>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['Recommend By', 'Ministry', 'Department', 'Rank', 'Remark'],
        'add_event' => 'add_recommendation',
        'column_vals' => $recommendations,
        'column_types' => [
            [
                'type' => 'text',
                'wire_array_name' => 'recommendations',
                'wire_array_key' => 'recommend_by',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'recommendations',
                'wire_array_key' => 'ministry',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'recommendations',
                'wire_array_key' => 'department',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'recommendations',
                'wire_array_key' => 'rank',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'recommendations',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'removeRecommendation',
    ])
</div>

<div class="w-full h-auto py-5">
    <div class="pb-2">
        <x-input-label :value="__('Postings')" class="font-semibold"/>
    </div>
    @include('staff_multiple_table', [
        'column_names' => ['Rank', 'Post', 'From', 'To', 'Department', 'Division', 'Location', 'Remark'],
        'add_event' => 'add_posting',
        'column_vals' => $postings,
        'column_types' => [
            [
                'type' => 'select',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'rank',
                'select_values' => $ranks,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'post',
                'select_values' => $posts,
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'from_date',
            ],
            [
                'type' => 'date',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'to_date',
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'department',
                'select_values' => $departments,
            ],
            [
                'type' => 'select',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'division',
                'select_values' => $divisions,
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'location',
            ],
            [
                'type' => 'text',
                'wire_array_name' => 'postings',
                'wire_array_key' => 'remark',
            ],
        ],
        'del_method' => 'removePosting',
    ])
</div>
