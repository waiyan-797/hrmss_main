<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">

            @include('modalTable', [
                'data_values' => $staff,
                'modal' => 'modals/retirement_modal',
                // 'id' => $retire,
                'title' => 'ပြုန်းတီးအင်အား',
                'search_id' => 'promotion_search',
                'columns' => ['စဉ်', 'ဝန်ထမ်းအမည်','retire type ', 'retire date'],
                'column_vals' => ['name', 'retire','retire_date'],
            ])
        </div>
    </div>
</div>
