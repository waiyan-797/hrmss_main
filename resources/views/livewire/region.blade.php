<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table',[
                'data_values' => $regions,
                'modal' => 'modals/region_modal',
                'id' => $region_id,
                'title' => 'ပြည်နယ်/တိုင်းဒေသကြီး',
                'search_id' => 'region_search',
                'columns' => ['စဉ်', 'ပြည်နယ်/တိုင်းဒေသကြီး', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>
