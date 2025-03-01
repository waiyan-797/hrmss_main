<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $leave_types,
                'modal' => 'modals/leave_type_modal',
                'id' => $leave_type_id,
                'title' => 'ခွင့်အမျိုးအစား',
                'search_id' => 'leave_type_search',
                'columns' => ['စဉ်', 'ခွင့်အမျိုးအစား','ခွင့်','နေ့(သို.မဟုတ်)လ','SortNo','နှစ်စဉ်','လုပ်ဆောင်ချက်'],
                'column_vals' => ['name', 'allowed', 'dayOrMonth','sort_no','is_yearly'],
            ])
        </div>
    </div>
</div>
