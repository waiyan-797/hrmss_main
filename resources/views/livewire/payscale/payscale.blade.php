<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $payscales,
                'modal' => 'modals/payscale_modal',
                'id' => $payscale_id,
                'title' => 'လစာနှုန်း',
                'search_id' => 'payscale_search',
              
                'columns' => ['စဉ်', 'လစာနှုန်း','အနိမ့်ဆုံးလစာ','အတိုးနှုန်း','အမြင့်ဆုံးလစာ','ဝန်ထမ်းအမျိုးအစား','ခွင့်ပြုသည့်အရေအတွက်','အထောက်အပံ့','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'min_salary', 'increment', 'max_salary', 'staff_type_id','allowed_qty','supply'],
            ])
        </div>
    </div>
</div>
