<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ပင်စင်အမျိူးအစား</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $pension_types,
                'modal' => 'modals/pension_type_modal',
                'id' => $pension_type_id,
                'title' => 'ပင်စင်အမျိူးအစား',
                'search_id' => 'pension_type_search',
                'columns' => ['စဉ်', 'ပင်စင်အမျိူးအစား', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

