<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $districts,
                'modal' => 'modals/district_modal',
                'id' => $district_id,
                'title' => 'ခရိုင်',
                'search_id' => 'district_search',
                'columns' => ['စဉ်', 'ခရိုင်','ပြည်နယ်/တိုင်းဒေသကြီး','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'region'], //region ca foreign name
            ])
        </div>
    </div>
</div>

