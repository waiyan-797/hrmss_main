<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Education</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $educations,
                'modal' => 'modals/education_modal',
                'id' => $education_id,
                'title' => 'Education',
                'search_id' => 'education_search',
                'columns' => ['No', 'Name', 'Education Type', 'Action'],
                'column_vals' => ['name', 'education_type'],
            ])
        </div>
    </div>
</div>

