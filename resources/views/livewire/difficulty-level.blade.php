<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $difficulty_levels,
                'modal' => 'modals/difficulty_level_modal',
                'id' => $difficulty_level_id,
                'title' => 'အခက်အခဲအဆင့်',
                'search_id' => 'difficulty_level_search',
                'columns' => ['စဉ်','အခက်အခဲအဆင့်','ဒေသစရိတ်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name','hardship_allowance'],
            ])
        </div>
    </div>
</div>