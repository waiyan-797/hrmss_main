<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Section</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $sections,
                'modal' => 'modals/section_modal',
                'id' => $section_id,
                'title' => 'Section',
                'search_id' => 'section_search',
                'columns' => ['No', 'Name', 'Division', 'Action'],
                'column_vals' => ['name', 'division'],
            ])
        </div>
    </div>
</div>

