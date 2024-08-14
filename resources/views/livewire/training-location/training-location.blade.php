<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Training Location</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $training_locations,
                'modal' => 'modals/training_location_modal',
                'id' => $training_location_id,
                'title' => 'Training Location',
                'search_id' => 'training_location_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

