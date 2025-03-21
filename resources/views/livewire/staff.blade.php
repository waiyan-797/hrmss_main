<div class="w-full {{ isset($header) ? 'h-[83vh]' : 'h-[90vh]' }} overflow-y-auto">
    <div class="flex justify-left items-center space-x-1 px-3 mt-10">
          <a href="{{ route('staff', ['status' => 1]) }}" wire:navigate wire:ignore
            class="{{ request()->path() == 'staff/1' ? 'bg-yellow-400' : 'bg-green-500' }} text-white hover:bg-yellow-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            အချက်အလက်အကြမ်းစာရင်း  {{-- {{saveDraft}} --}}
            <span class="inline-flex items-center justify-center px-2 py-1 text-white bg-red-600 rounded-full">
                {{ $saveDraftCount }}
            </span>
        </a>  
        
         
        <a href="{{ route('staff', ['status' => 2]) }}" wire:navigate wire:ignore
            class="{{ request()->path() == 'staff/2' ? 'bg-yellow-400' : 'bg-green-500' }} text-white hover:bg-yellow-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            တင်ပြထားသည့်စာရင်း {{-- {{submit}} --}}
            <span class="inline-flex items-center justify-center px-2 py-1 text-white bg-red-600 rounded-full">
                {{ $submitCount }}
            </span>
        </a>

        <a href="{{ route('staff', ['status' => 3]) }}" wire:navigate wire:ignore
            class="{{ request()->path() == 'staff/3' ? 'bg-yellow-400' : 'bg-green-500' }} text-white hover:bg-yellow-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            တောင်းဆိုသည့်စာရင်း {{-- {{reject}} --}}
            <span class="inline-flex items-center justify-center px-2 py-1 text-white bg-red-600 rounded-full">
                {{ $rejectCount }}
            </span>
        </a>

        <a href="{{ route('staff', ['status' => 4]) }}" wire:navigate wire:ignore
            class="{{ request()->path() == 'staff/4' ? 'bg-yellow-400' : 'bg-green-500' }} text-white hover:bg-yellow-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            ပြန်လည်ပေးပို့သည့်စာရင်း {{-- {{resubmit}} --}}
            <span class="inline-flex items-center justify-center px-2 py-1 text-white bg-red-600 rounded-full">
                {{ $resubmitCount }}
            </span>
        </a>

        <a href="{{ route('staff', ['status' => 5]) }}" wire:navigate wire:ignore
            class="{{ request()->path() == 'staff/5' ? 'bg-yellow-400' : 'bg-green-500' }} text-white hover:bg-yellow-400 font-semibold py-2 px-4 rounded-md shadow-lg transition duration-300 ease-in-out">
            အတည်ပြုဝန်ထမ်းစာရင်း{{-- {{approve}} --}}
            <span class="inline-flex items-center justify-center px-2 py-1 text-white bg-red-600 rounded-full">
                {{ $approveCount }}
            </span>
            
        </a> 
       
         
    </div>
    @if (session('message'))
        <div id="alert-border-1"
            class="flex items-center p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium font-arial"> {{ session('message') }} </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-border-1" aria-label="Close">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <div class="flex justify-center w-full">
        <div class="w-full mx-auto px-3 py-4">
            {{-- @include('table', [
                'ranks' => \App\Models\Rank::where('is_dica',1)->get(),
                'divisions' => \App\Models\Division::all(),
                'data_values' => $staffs,
                'modal' => '',
                'is_crud_modal' => $status == 5,
                'comment' => $status == 4 || $status == 3 || $status == 5,
                'id' => $staff_id,
                'title' => $status == 5 ? 'ဝန်ထမ်း' : '',
                'search_id' => 'staff_search',
                'columns' => array_filter([
                        'စဉ်', 'အမည်', 'ရာထူး','ဌာန','ဌာနခွဲ','လုပ်ဆောင်ချက်',
                        $status == 5 ? 'ဆောင်ရွက်ချက်' : ($status == 3 || $status == 4 ? 'Comment' : null),
                        ($status == 5 || $status == 2) ? 'မှတ်ချက်' : null
                    ]),
                'column_vals' => [ 'name','currentRank','current_department','current_division'],
            ]) --}}

            @php
                $tableData = [
                    'data_values' => $staffs,$ranks,$divisions,
                    'modal' => '',
                    'is_crud_modal' => $status == 5,
                    'comment' => $status == 4 || $status == 3 || $status == 5,
                    'id' => $staff_id,
                    'title' => $status == 5 ? 'ဝန်ထမ်း' : '',
                    'search_id' => 'staff_search',
                    'selectedRank'=> 'selectedRank',
                    'retire_type_filter' => $retire_type_filter,
                    'selectedDivision'=> 'selectedDivision',
                    'selectedRetireType'=> 'selectedRetireType',
                    'ranks_id'=> 'ranks',
                    'divisions_id'=> 'divisions',
                    'columns' => array_filter([
                        'စဉ်',
                        'အမည်',
                        'ရာထူး',
                        'ဌာန',
                        'ဌာနခွဲ',
                        'လုပ်ဆောင်ချက်',
                        $status == 5 ? 'ဆောင်ရွက်ချက်' : ($status == 3 || $status == 4 ? 'Comment' : null),
                        $status == 5 || $status == 2 ? 'မှတ်ချက်' : null,
                    ]),
                    'column_vals' => ['name', 'currentRank', 'current_department', 'current_division'],
                ];

                if ($status == 5) {
                    $tableData['ranks'] = \App\Models\Rank::where('is_dica', 1)->get();
                    $tableData['divisions'] = \App\Models\Division::all();
                }
                if ($status == 5 && $retire_type_filter) {
                    $tableData['retire_type']= \App\Models\RetireType::all();
                }
            @endphp

            @include('table', $tableData)

            @if ($open_staff_report)
                @include('modals/staff_report_choice_modal')
            @endif
        </div>
    </div>
</div>
