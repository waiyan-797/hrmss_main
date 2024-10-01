<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">ဘာသာစကား</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $language_types,
                'modal' => 'modals/language_modal',
                'id' => $language_type_id,
                'title' => 'ဘာသာစကား',
                'search_id' => 'language_type_search',
                'columns' => ['စဉ်','ဘာသာစကား','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>
