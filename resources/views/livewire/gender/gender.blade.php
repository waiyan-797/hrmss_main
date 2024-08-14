<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Gender</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $gender_types,
                'modal' => 'modals/gender_modal',
                'id' => $gender_type_id,
                'title' => 'Gender',
                'search_id' => 'gender_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

