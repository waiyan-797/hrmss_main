<div class="w-full">
    

                 
                  
    <div>
     @if(   auth()->user()->AdminHR() )
        <a href="{{ route('inbox') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            Inbox ဝန်ထမ်းစာရင်းအသစ်
        </a>
        <a href="{{ route('resubmit') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            resubmit  //ဝန်ထမ်းစာရင်းပြန်ပြင်ပြီး 
        </a>

        <a href="{{ route('reject') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            resubmit  //ဝန်ထမ်းစာရင်းပြန်ပြင်ခိုင်းထား
        </a>

        @else
        <a href="{{ route('reject') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            Rejct // ဝန်ထမ်းစာရင်းပြန်ပြင်ရန်
        </a>

        <a href="{{ route('resubmitted') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            Resubmitted //ဝန်ထမ်းစာရင်းပြန်ပြင်ထား
        </a>

        @endif 
        
        
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
