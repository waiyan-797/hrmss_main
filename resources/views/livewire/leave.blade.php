<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $leaves,
                'modal' => 'modals/leave_modal',
                'id' => $leave_id,
                'title' => 'ခွင့်',
                'search_id' => 'leave_search',
                'columns' => ['စဉ်','ဝန်ထမ်းအမည်','ခွင့်အမျိုးအစား','လက်ရှိဌာန','မှ','ထိ','အရေအတွက်','ရုံးမိန့်','မှတ်ချက်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['staff', 'leave_type','currentDivision','from_date','to_date','qty','order_no','remark'],
            ])
        </div>
    </div>
</div>
