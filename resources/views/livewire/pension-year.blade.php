<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Pension Year</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $pension_years,
                'modal' => 'modals/pension_year_modal',
                'id' => $pension_year_id,
                'title' => 'Pension Year',
                'search_id' => 'pension_year_search',
                'columns' => ['No', 'Year', 'Action'],
                'column_vals' => ['year'],
            ])
        </div>
    </div>
</div>