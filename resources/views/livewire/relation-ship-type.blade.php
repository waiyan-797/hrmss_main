<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $relation_ship_types,
                'modal' => 'modals/relation_ship_type',

                'id' => $relation_ship_type_id,
                'title' => 'တော်စပ်ပုံအမျိုးအစား',
                'search_id' => 'relation_search',
                'columns' => ['စဉ်', 'တော်စပ်ပုံအမျိုးအစား', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>
