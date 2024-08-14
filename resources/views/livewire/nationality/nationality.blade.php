<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Nationality Type</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $nationality_types,
                'modal' => 'modals/nationality_modal',
                'id' => $nationality_type_id,
                'title' => 'Nationality',
                'search_id' => 'nationality_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

