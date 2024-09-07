<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ပြစ်ဒဏ်အမျိုးအစား</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $penalty_types,
                'modal' => 'modals/penalty_type_modal',
                'id' => $penalty_type_id,
                'title' => 'ပြစ်ဒဏ်အမျိုးအစား',
                'search_id' => 'penalty_type_search',
                // 'columns' => ['No', 'Name', 'Action'],
                'columns' => ['စဉ်	', 'ပြစ်ဒဏ်အမျိုးအစား', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

