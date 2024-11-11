<div class="w-full">
    

    <div>
        <a href="{{ route('inbox') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            Inbox
        </a>
        <a href="{{ route('inbox') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            Inbox
        </a>
        <a href="{{ route('inbox') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            Inbox
        </a>
        <a href="{{ route('inbox') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            Inbox
        </a>
        
    </div>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $staffs,
                'is_crud_modal' => false ,
                
                // 'id' => $staff_id,
                'title' => 'Inbox',
                'search_id' => 'inbox_search',
                'columns' => ['No', 'Photo', 'Name', 'Staff No', 'Action' ],
                'column_vals' => ['staff_photo', 'name', 'staff_no'],
            ])

            @if ($open_staff_report)
                @include('modals/staff_report_choice_modal')
            @endif
        </div>
    </div>
</div>
