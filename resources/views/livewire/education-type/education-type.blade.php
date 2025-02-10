<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full px-3 py-4 mx-auto">
            @include('table', [
                'data_values' => $education_types,
                'modal' => 'modals/education_type_modal',
                'id' => $education_type_id,
                'title' => 'ပညာအရည်အချင်း အမျိုးအစား',
                'search_id' => 'education_type_search',
                'columns' => ['No', 'Name',  'Action'],
                'columns' => ['စဉ်','ပညာအရည်အချင်း အမျိုးအစား',  'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

