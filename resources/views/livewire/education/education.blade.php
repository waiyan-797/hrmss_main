<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full px-3 py-4 mx-auto">
            @include('table', [
                'data_values' => $educations,
                'modal' => 'modals/education_modal',
                'id' => $education_id,
                'title' => 'ပညာအရည်အချင်း',
                'search_id' => 'education_search',
                'columns' => ['စဉ်','ပညာအရည်အချင်း','ပညာအရည်အချင်း အမျိုးအစား',  'ပညာအရည်အချင်း အုပ်စု', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'education_type' ,'education_group'],
            ])
        </div>
    </div>
</div>

