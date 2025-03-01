<div class="w-full">
    <div class="m-3">
        <a href="{{ route('staff', ['status' => 5]) }}" wire:navigate
            class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">
            Back
        </a>
    </div>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $increments,
                'modal' => 'modals/increment_modal',
                'id' => $increment_id,
                'title' => 'နှစ်တိုး',
                'search_id' => 'increment_search',
                'columns' => ['စဉ်', 'ဝန်ထမ်းအမည်','ရာထူး','အနိမ့်ဆုံးလစာ','အတိုးနှုန်း','အမြင့်ဆုံးလစာ','အတိုးနှုန်းတိုးသည့်ရက်','အတိုးနှူန်းအကြိမ်အရေအတွက်','အမိန့်အမှတ်','မှတ်ချက်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['staff', 'increment_rank','min_salary','increment','max_salary','increment_date','increment_time','order_no','remark'],
            ])
        </div>
    </div>
</div>
