<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Penalty Type</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $penalty_types,
                'modal' => 'modals/penalty_type_modal',
                'id' => $penalty_type_id,
                'title' => 'Penalty Type',
                'search_id' => 'penalty_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

