<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ပင်စင်နှစ်</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $pension_years,
                'modal' => 'modals/pension_year_modal',
                'id' => $pension_year_id,
                'title' => 'ပင်စင်နှစ်',
                'search_id' => 'pension_year_search',
                'columns' => ['စဉ်', 'ပင်စင်နှစ်', 'လုပ်ဆောင်ချက်'],
                'column_vals' => ['year'],
            ])
        </div>
    </div>
</div>