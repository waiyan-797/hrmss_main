<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Rank</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $ranks,
                'modal' => 'modals/rank_modal',
                'id' => $rank_id,
                'title' => 'Rank',
                'search_id' => 'rank_search',
                'columns' => ['No', 'Name', 'Payscale', 'Staff Type', 'Action'],
                'column_vals' => ['name', 'payscale', 'staff_type'],
            ])
        </div>
    </div>
</div>
