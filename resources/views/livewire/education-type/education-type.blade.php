<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ပညာအရည်အချင်း အမျိုးအစား</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $education_types,
                'modal' => 'modals/education_type_modal',
                'id' => $education_type_id,
                'title' => 'ပညာအရည်အချင်း အမျိုးအစား',
                'search_id' => 'education_type_search',
                'columns' => ['No', 'Name', 'Education Group', 'Action'],
                'columns' => ['စဉ်','ပညာအရည်အချင်း အမျိုးအစား','ပညာအရည်အချင်း အုပ်စု', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'education_group'],
            ])
        </div>
    </div>
</div>

