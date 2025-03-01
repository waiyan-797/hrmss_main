<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $ethnic_types,
                'modal' => 'modals/ethnic_modal',
                'id' => $ethnic_type_id,
                'title' => 'လူမျိုး',
                'search_id' => 'ethnic_type_search',
                'columns' => ['စဉ်','လူမျိုး', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

