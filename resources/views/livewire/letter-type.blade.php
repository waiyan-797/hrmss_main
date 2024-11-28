<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $letter_types,
                'modal' => 'modals/letter_type_modal',
                'id' => $letter_type_id,
                'title' => 'စာအဆင့်အတန်း',
                'search_id' => 'letter_type_search',
                'columns' => ['စဉ်','စာအဆင့်အတန်း','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

