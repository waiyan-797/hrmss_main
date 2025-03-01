<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $country_types,
                'modal' => 'modals/country_modal',
                'id' => $country_type_id,
                'title' => 'တိုင်းပြည်',
                'search_id' => 'country_type_search',
                'columns' => ['စဉ်','တိုင်းပြည်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

