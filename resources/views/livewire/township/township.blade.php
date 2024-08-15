<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Township</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $townships,
                'modal' => 'modals/township_modal',
                'id' => $township_id,
                'title' => 'Township',
                'search_id' => 'township_search',
                'columns' => ['No', 'Name', 'District', 'Action'],
                'column_vals' => ['name', 'district'],
            ])
        </div>
    </div>
</div>

