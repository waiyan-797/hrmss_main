<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Award Type</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $award_types,
                'modal' => 'modals/award_type_modal',
                'id' => $award_type_id,
                'title' => 'Award Type',
                'search_id' => 'award_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div>
    </div>
</div>

