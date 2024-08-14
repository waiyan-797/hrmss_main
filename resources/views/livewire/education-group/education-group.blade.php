<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Education Group</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $education_groups,
                'modal' => 'modals/education_group_modal',
                'id' => $education_group_id,
                'title' => 'Education Group',
                'search_id' => 'education_group_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

