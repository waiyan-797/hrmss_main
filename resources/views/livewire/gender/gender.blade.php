<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $gender_types,
                'modal' => 'modals/gender_modal',
                'id' => $gender_type_id,
                'title' => 'ကျား/မ',
                'search_id' => 'gender_type_search',
                'columns' => ['စဉ်','ကျား/မ','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

