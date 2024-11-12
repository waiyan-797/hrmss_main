<div class="w-full">
    <div class="flex justify-start items-center space-x-1 mb-4">
        @if(   auth()->user()->AdminHR() )
           <a href="{{ route('inbox') }}" class="{{ request()->routeIs('inbox') ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"
            wire:navigate>
               Inbox ဝန်ထမ်းစာရင်းအသစ်
           </a>
           <a href="{{ route('resubmit') }}" class="{{ request()->routeIs('resubmit') ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"
            wire:navigat
            wire:navigate>
               resubmit  //ဝန်ထမ်းစာရင်းပြန်ပြင်ပြီး 
           </a>
   
           <a href="{{ route('reject') }}" class="{{ request()->routeIs('reject') ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"
            wire:navigate>
               resubmit  //ဝန်ထမ်းစာရင်းပြန်ပြင်ခိုင်းထား
           </a>
   
           @else
           <a href="{{ route('reject') }}" class="{{ request()->routeIs('reject') ? 'bg-green-500 text-green-700' : 'text-green' }} font-arial flex items-center p-2 px-4 font-semibold rounded-lg hover:bg-green-100 hover:text-green-700 group"
            wire:navigate>
               Rejct // ဝန်ထမ်းစာရင်းပြန်ပြင်ရန်
           </a>
   
           <a href="{{ route('resubmitted') }}" class="{{ request()->routeIs('resubmitted') ? 'bg-green-500 text-green-700' : 'text-green' }} font-arial flex items-center p-2 px-4 font-semibold rounded-lg hover:bg-green-100 hover:text-green-700 group"
            wire:navigate>
               Resubmitted //ဝန်ထမ်းစာရင်းပြန်ပြင်ထား
           </a>
   
           @endif  
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
