<div class="w-full">
    <div class="flex justify-start items-center space-x-1 mb-4">
    <a href="{{ route('staff') }}"
        class="{{ request()->routeIs('staff') ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
        Approve Staff
    </a>

    <a href="{{ route('saftdraft') }}"
        class="{{ request()->routeIs('saftdraft') ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
        Safe Draft
    </a>
</div>


    




    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $staffs,
                'modal' => '',
                'id' => $staff_id,
                'title' => 'ဝန်ထမ်း',
                'search_id' => 'staff_search',
                'columns' => ['No', 'Photo', 'Name', 'Staff No', 'Action', 'Type'],
                'column_vals' => ['staff_photo', 'name', 'staff_no'],
            ])

            @if ($open_staff_report)
                @include('modals/staff_report_choice_modal')
            @endif
        </div>
    </div>
</div>
