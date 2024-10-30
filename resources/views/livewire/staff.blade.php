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

{{-- <x-nav-link   class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32"  :href="route('staff_leave',[$staff_id])">ခွင့်</x-nav-link>
<x-nav-link    class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32" :href="route('staff_increment',[$staff_id])">နှစ်တိုး</x-nav-link>
<x-nav-link   class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32"  :href="route('staff_promotion',[$staff_id])">ရာထူးတိုး</x-nav-link>
<x-nav-link    class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32" :href="route('staff_retirement',[$staff_id])" >ပြုန်းတီး</x-nav-link> --}}