<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $training_types,
                'modal' => 'modals/training_type_modal',
                'id' => $training_type_id,
                'title' => 'သင်တန်းအမျိုးအစား',
                'search_id' => 'training_type_search',
                'columns' => ['စဉ်', 'သင်တန်းအမျိုးအစား', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

