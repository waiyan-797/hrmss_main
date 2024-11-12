<div class="w-full">
    <div class="flex justify-start items-center space-x-2 mb-4">
        <a href="{{ route('inbox') }}"
            class="{{ request()->routeIs('inbox') ? 'bg-green-500 text-green-700' : 'text-blue' }} font-arial flex items-center p-2 px-4 font-semibold rounded-lg hover:bg-green-100 hover:text-green-700 group"
            wire:navigate>
            Inbox
        </a>
        <a href="{{ route('resubmit') }}"
            class="{{ request()->routeIs('resubmit') ? 'bg-green-500 text-green-700' : 'text-green' }} font-arial flex items-center p-2 px-4 font-semibold rounded-lg hover:bg-green-100 hover:text-green-700 group"
            wire:navigate>
            Resubmit
        </a>
        <a href="{{ route('reject') }}"
            class="{{ request()->routeIs('reject') ? 'bg-green-500 text-green-700' : 'text-green' }} font-arial flex items-center p-2 px-4 font-semibold rounded-lg hover:bg-green-100 hover:text-green-700 group"
            wire:navigate>
            Reject
        </a>
    </div>

    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $staffs,
                'is_crud_modal' => false,
                'title' => 'Inbox',
                'search_id' => 'inbox_search',
                'columns' => ['No', 'Photo', 'Name', 'Staff No', 'Action'],
                'column_vals' => ['staff_photo', 'name', 'staff_no'],
            ])

            @if ($open_staff_report)
                @include('modals/staff_report_choice_modal')
            @endif
        </div>
    </div>
</div>
