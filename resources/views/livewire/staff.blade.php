<div class="w-full">
   

<div
class="flex  justify-center items-center space-x-4  mt-10"
>



    @if(auth()->user()->role_id != 2 )

    <a href="{{ route('staff' , ['status'=>1]) }}" 
        class="{{ request()->path() == 'staff/1' ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"
        >
        Safe Draft
    </a>
    @endif

    <a href="{{ route('staff' ,['status'=>2]) }}"
        class="{{  request()->path() == 'staff/2'  ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"

         >
        Applied  {{-- submit  --}}
            
    </a>
      

        <a href="{{ route('staff' ,['status' => 3]) }}" 
        class="{{  request()->path() == 'staff/3'  ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"

            >
            Reject
        </a>

        
     
        <a href="{{ route('staff' , ['status'=>4]) }}" 
        class="{{  request()->path() == 'staff/4'  ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"

            >
          Resubmit
        </a>

     
        <a href="{{ route('staff' , ['status'=>5]) }}" 
        class="{{  request()->path() == 'staff/5'  ? 'bg-blue-700' : 'bg-green-500' }} text-white hover:bg-blue-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out"

            >
            Approve Staff 
        </a>
   

        
    </div>


    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $staffs,
                'modal' => '',
                'is_crud_modal' =>  $status == 5 ,
                    'comment' => $status == 4 || $status == 3 ,
                'id' => $staff_id,
                'title' => $status == 5  ? 'ဝန်ထမ်း' : '',
                'search_id' => 'staff_search',
                'columns' => ['No', 'Photo', 'Name', 'Staff No', 'Action' , $status == 5 ?  'Type' : ($status == 3 || $status == 4 ? 'Comment' : '')],
                'column_vals' => ['staff_photo', 'name', 'staff_no'],
            ])

            @if ($open_staff_report)
                @include('modals/staff_report_choice_modal')
            @endif
        </div>
    </div>
</div>
