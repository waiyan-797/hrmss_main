<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $ranks,
                'modal' => 'modals/rank_modal',
                'id' => $rank_id,
                'title' => 'ရာထူး',
                'search_id' => 'rank_search',
                // 'columns' => ['No', 'Name', 'Payscale', 'Staff Type','Allowed Qty','Action'],
                'columns' => ['စဉ်','ရာထူး','လစာနှုန်း','ဝန်ထမ်းအမျိုးအစား','ခွင့်ပြုသည့်အရေအတွက်','SortNo','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'payscale', 'staff_type','allowed_qty','sort_no'],
            ])
        </div>
    </div>
</div>
