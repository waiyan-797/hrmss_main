<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $education_groups,
                'modal' => 'modals/education_group_modal',
                'id' => $education_group_id,
                'title' => 'ပညာအရည်အချင်း အုပ်စု',
                'search_id' => 'education_group_search',
                'columns' => ['စဉ်', 'ပညာအရည်အချင်း အုပ်စု', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

