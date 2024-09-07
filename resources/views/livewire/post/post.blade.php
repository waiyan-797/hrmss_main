<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">တာဝန်</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $post_types,
                'modal' => 'modals/post_modal',
                'id' => $post_type_id,
                'title' => 'တာဝန်',
                'search_id' => 'post_type_search',
                'columns' => ['စဉ်','တာဝန်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

