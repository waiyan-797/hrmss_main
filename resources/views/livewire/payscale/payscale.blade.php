<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Payscale</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $payscales,
                'modal' => 'modals/payscale_modal',
                'id' => $payscale_id,
                'title' => 'Payscale',
                'search_id' => 'payscale_search',
                'columns' => ['No', 'Name', 'Min Salary', 'Increment', 'Max Salary', 'Staff Type', 'Action'],
                'column_vals' => ['name', 'min_salary', 'increment', 'max_salary', 'staff_type'],
            ])
        </div>
    </div>
</div>
