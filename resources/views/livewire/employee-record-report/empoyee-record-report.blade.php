 <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full px-3 py-4 mx-auto">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="mb-2 text-base font-bold text-center font-arial">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </h1>
            <h1 class="mb-2 text-base font-bold text-center font-arial">
                {{formatDMYmm($startDateListen)}}
                မှ
                {{formatDMYmm($endDateListen)}}

                အထိ နုတ်ထွက်သွားသော ဝန်ထမ်းစာရင်း
            </h1>
            <div  class="flex items-end justify-around my-5 " >
                <div class="w-40 ">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Start Date</label>
                    <x-date-picker wire:model="startDateListen" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div class="w-40">
                    <label class="block mb-2 text-sm font-medium text-gray-700">End Date</label>
                    <x-date-picker wire:model="endDateListen" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>
                <div class="w-40">
                    <x-select wire:model="selectedRetireType_id_listen" :values="$retireTypes" placeholder="ပြုန်းတီးမှုအမျိုးအစားအားလုံး"
                        class="!w-48 !border-2 rounded-md" />
                </div>
               <div>
            <x-primary-button type="button" wire:click="search()">Search</x-primary-button>
               </div>
               </div>
            <table class="md:w-full font-arial">
                <thead>
                    <tr>
                        <th class="p-1 text-center border border-black">စဥ်</th>
                        <th class="p-1 text-left border border-black">အမည်</th>
                        <th class="p-1 text-left border border-black">ရာထူး</th>
                        <th class="p-1 text-left border border-black">ဌာနခွဲ</th>
                        <th class="p-1 text-center border border-black">အလုပ်မှနုတ်ထွက်သည့် ရက်စွဲ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($staffs ?? [] as $index=> $staff)
                    <tr>
                        <td class="p-1 text-left border border-black">{{ en2mm($start++) }}</td>
                        <td class="p-1 text-left border border-black">{{ $staff->name}}</td>
                        <td class="p-1 text-left border border-black">{{ $staff->currentRank ? $staff->currentRank?->name : '-'}}</td>
                        <td class="p-1 text-left border border-black">{{ $staff->current_division->name}}</td>
                        <td class="p-1 text-center border border-black">
                        {{formatDMYmm($staff->retire_date)}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $staffs?->links('pagination') }}
            </div>
        </div>
    </div>
</div>

