<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Country</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $country_types,
                'modal' => 'modals/country_modal',
                'id' => $country_type_id,
                'title' => 'Country',
                'search_id' => 'country_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

