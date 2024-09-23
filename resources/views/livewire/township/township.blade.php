<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $townships,
                'modal' => 'modals/township_modal',
                'id' => $township_id,
                'title' => 'မြို့/မြို့နယ်',
                'search_id' => 'township_search',
                'columns' => ['စဉ်', 'မြို့/မြို့နယ်','ခရိုင်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'district'],
            ])
        </div>
    </div>
</div>

