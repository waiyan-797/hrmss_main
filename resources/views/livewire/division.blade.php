<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $divisions,
                'modal' => 'modals/division_modal',
                'id' => $division_id,
                'title' => 'ဌာနခွဲ',
                'search_id' => 'division_search',
                'columns' => ['စဉ်', 'ဌာနခွဲ','ဌာနခွဲအတိုကောက်','ဌာနခွဲ အမျိုးအစား','ဌာန','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name','nick_name','division_type_id','department_id'],
            ])
        </div>
    </div>
</div>
