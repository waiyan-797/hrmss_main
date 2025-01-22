<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>

            <div>

                {{-- <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
     <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" wire:model.live="nameSearch"  id="search" class="block  p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Search"  />

    </div>  --}}
 
    <div class="w-1/3">
        <x-select
            wire:model="letter_type_id"
            :values="$letter_types"
            placeholder="စာအဆင့်အတန်းရွေးပါ"
            id="letter_type_id"
            name="letter_type_id"
            class="mt-11 block w-full"
            
        />
        <x-input-error class="mt-2" :messages="$errors->get('letter_type_id')" />
    </div>



            </div> 
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full border border-black">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black text-center p-2">စဥ်</th>
                            <th class="border border-black text-center p-2">အမည် /ရာထူး /ဌာန</th>
                            <th class="border border-black text-center p-2">အိမ်ထောင်ရှိ /မရှိ </th>
                            
                            <th class="border border-black text-center p-2">နေပြည်တော် တွင်နေထိုင်သည့်နေရပ်လိပ်စာ</th>
                            <th class="border border-black text-center p-2">မှတ်ချက်</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        {{-- @foreach($staffs as $staff)
                        <tr>
                            <td 
                            class="border border-black text-right p-1">{{ $loop->index + 1 }}</td>
                            <td 
                            class="border border-black text-right p-1">{{ $staff->name }}</td>


                            <td 
                            class="border border-black text-right p-1">{{ $staff->isInRs()  ? 'ရှိ' : 'မရှိ'}}</td>

                            <td 
                            class="border border-black text-right p-1">{{getAddress( $staff->current_address_street , $staff->current_address_ward , $staff->current_address_township_or_town_id  ,$staff->current_address_region_id) }}</td>
                        </tr>

                        
                        @endforeach --}}
                            @foreach($staffs as $staff)
                                <tr>
                                    <td class="border border-black text-right p-1">{{ $loop->index + 1 }}</td>
                                    <td class="border border-black text-right p-1">{{ $staff->name }}/{{ $staff->currentRank?->name}}/{{$staff->current_department?->name}}</td>
                                    <td class="border border-black text-right p-1">{{ $staff->marital_statuses?->name ? 'ရှိ' : 'မရှိ' }}</td>
                                    <td class="border border-black text-right p-1">
                                         {{ implode(', ', array_filter([
                                            $staff->current_address_street,
                                            $staff->current_address_ward,
                                            $staff->current_address_township_or_town?->name,
                                            $staff->current_address_region?->name
                                        ])) }} 
                                    </td>

                                    <td class="border border-black text-right p-1">
                                   </td>
                                </tr>
                            @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

















