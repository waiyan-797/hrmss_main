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
                'data_values' => $promotions,
                'modal' => 'modals/promotion_modal',
                'id' => $promotion_id,
                'title' => 'ရာထူးတိုး',
                'search_id' => 'promotion_search',
                'columns' => [
                    'စဉ်',
                    'ဝန်ထမ်းအမည်',
                    'ယခင်လုပ်ကိုင်ခဲ့ဖူးသည့်ရာထူး',
                    'တိုးမည့်ရာထူး',
                    'ရာထူးတိုးသည့်ရက်',
                    'အမိန့်အမှတ်',
                    'လုပ်ဆောင်ချက်',
                ],
                'column_vals' => ['staff', 'previousRank', 'rank', 'promotion_date', 'order_no'],
            ])
        </div>
    </div>
</div>
