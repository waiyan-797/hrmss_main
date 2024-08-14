<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Post</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $post_types,
                'modal' => 'modals/post_modal',
                'id' => $post_type_id,
                'title' => 'Post',
                'search_id' => 'post_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

