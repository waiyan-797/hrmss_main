<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $departments,
                'modal' => 'modals/department_modal',
                'id' => $department_id,
                'title' => 'ဌာန',
                'search_id' => 'department_search',
                'columns' => ['စဉ်', 'ဌာန','ဝန်ကြီးဌာန','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'ministry'],
            ])
        </div>
    </div>
</div>
