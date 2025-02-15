<div class="w-full min-h-screen p-6 bg-gray-100">
     {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
    {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>  --}}
     <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>  
    <br><br>
    <div  class="flex items-end gap-x-5" >
        <div class="w-40 ">
            <label class="block mb-2 text-sm font-medium text-gray-700">Start Date</label>
            <x-date-picker wire:model.live="startDate" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div class="w-40">
            <label class="block mb-2 text-sm font-medium text-gray-700">End Date</label>
            <x-date-picker wire:model.live="endDate" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
       <div>
    <x-primary-button type="button" wire:click="search()">Search</x-primary-button>

       </div>

       <div>
<button wire:confirm='ရွေးချယ်ထားသည့်သူများအား နှစ်တိုးတိုးမည်' wire:click='doIncrementBulkAction'
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-700 border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-arial"
>
    နှစ်တိုးတိုးမည်
</button>

           </div>


    </div>

    <div class="mt-5 overflow-hidden bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        {{-- စဉ် --}}
                    </th>

                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        စဉ်
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        အမည်
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        ရာထူး
                  </th>

                  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  ဌာနခွဲ
              </th>

    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  နောက်ဆုံးနှစ်တိုးတိုးသည့်အကြိမ်
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                နောက်ဆုံးနှစ်တိုးတိုးသည့်နေ့
            </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                လစာမဲ့ခွင့်ရက်
            </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                နှစ်တိုးတိုးမည့်နေ့
            </th>
            {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Action
            </th> --}}
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($staffs)

                    @foreach ($staffs as $index=> $staff)
                        <tr>


                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                <input type="checkbox" wire:model.live='staff_to_increment' value="{{$index}}">
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                {{en2mm($loop->iteration)}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                {{ $staff->staff_name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">

                                {{$staff->rank_name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">

                                {{$staff->division_name }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">

                                {{en2mm($staff->increment_time)}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">

                                {{formatDMYmm($staff->last_increment_date)}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">

                                {{en2mm($staff->leave_days)}}

                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">

                                {{formatDMYmm($staff->coming_increment_date)}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10" class="px-6 py-4 text-sm text-center text-gray-500">
                            No staff data available.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
