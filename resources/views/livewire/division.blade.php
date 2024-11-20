<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $divisions,
                'modal' => 'modals/division_modal',
                'id' => $division_id,
                'title' => 'ဌာနခွဲ',
                'search_id' => 'division_search',
                'columns' => ['စဉ်', 'ဌာနခွဲ','ဌာနခွဲအတိုကောက်','ဌာနခွဲ အမျိုးအစား','ဌာန','အခက်အခဲအဆင့်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name','nick_name','DivisionType','department','difficultyLevel'],
            ])
        </div>
    </div>
</div>
