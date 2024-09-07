<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ဝန်ထမ်းအမျိုးအစား</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $staff_types,
                'modal' => 'modals/staff_type_modal',
                'id' => $staff_type_id,
                'title' => 'ဝန်ထမ်းအမျိုးအစား',
                'search_id' => 'staff_type_search',
                'columns' => ['စဉ်	', 'ဝန်ထမ်းအမျိုးအစား', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

