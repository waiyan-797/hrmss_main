<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $relations,
                'modal' => 'modals/relation_modal',
                'id' => $relation_id,
                'title' => 'တော်စပ်ပုံ',
                'search_id' => 'relation_search',
                'columns' => ['စဉ်', 'တော်စပ်ပုံ', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>
