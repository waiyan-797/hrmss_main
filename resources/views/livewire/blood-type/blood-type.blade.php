<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Blood Type</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $blood_types,
                'modal' => 'modals/blood_type_modal',
                'id' => $blood_type_id,
                'title' => 'Blood Type',
                'search_id' => 'blood_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

