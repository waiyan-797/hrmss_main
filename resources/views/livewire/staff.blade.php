<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $staffs,
                'modal' => '',
                'id' => $staff_id,
                'title' => 'ဝန်ထမ်း',
                'search_id' => 'staff_search',
                'columns' => ['No', 'Photo', 'Name', 'Staff No', 'Action' , 'Type'],
                'column_vals' => ['staff_photo', 'name', 'staff_no'],
            ])

            @if ($open_staff_report)
                @include('modals/staff_report_choice_modal')
            @endif
        </div>
    </div>
</div>
