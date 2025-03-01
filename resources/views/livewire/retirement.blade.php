<div class="w-full">
    <div class="m-3">
        <a href="{{ route('staff', ['status' => 5]) }}" wire:navigate
            class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">
            Back
        </a>
    </div>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">

            @include('modalTable', [
                'data_values' => $staff,
                'modal' => 'modals/retirement_modal',
                'title' => 'ပြုန်းတီးအင်အား',
                'search_id' => 'promotion_search',
                'columns' => ['စဉ်', 'ဝန်ထမ်းအမည်','retire type ', 'retire date', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'retire','retire_date'],
            ])
        </div>
    </div>
</div>
