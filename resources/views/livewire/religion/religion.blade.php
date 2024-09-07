<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ကိုးကွယ်သည့်ဘာသာ</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $religion_types,
                'modal' => 'modals/religion_modal',
                'id' => $religion_type_id,
                'title' => 'ကိုးကွယ်သည့်ဘာသာ',
                'search_id' => 'religion_type_search',
                'columns' => ['စဉ်','ကိုးကွယ်သည့်ဘာသာ','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

