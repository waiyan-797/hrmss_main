<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $blood_types,
                'modal' => 'modals/blood_type_modal',
                'id' => $blood_type_id,
                'title' => 'သွေးအုပ်စု',
                'search_id' => 'blood_type_search',
                'columns' => ['စဉ်','သွေးအုပ်စု','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

