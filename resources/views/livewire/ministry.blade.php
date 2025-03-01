<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ဝန်ကြီးဌာန</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $ministry_types,
                'modal' => 'modals/ministry_modal',
                'id' => $ministry_type_id,
                'title' => 'ဝန်ကြီးဌာန',
                'search_id' => 'ministry_type_search',
                'columns' => ['စဉ်','ဝန်ကြီးဌာန','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>
