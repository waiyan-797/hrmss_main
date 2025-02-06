<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <div>
                
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <x-text-input wire:model.live='nameSearch' class=" w-52"/>
</div>

            <div class="overflow-x-auto mt-5">
                <table class="min-w-full border border-black border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border border-black">စဥ်</th>
                            <th class="px-4 py-2 border border-black">အမည်</th>
                            <th class="px-4 py-2 border border-black">တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး</th>
                            <th class="px-4 py-2 border border-black">တာဝန်ထမ်းဆောင်ခဲ့သည့်ဌာနခွဲ</th>
                            <th class="px-4 py-2 border border-black">မွေးနေ့သက္ကရာဇ်</th>
                            <th class="px-4 py-2 border border-black">စုစုပေါင်းလုပ်သက်</th>
                            <th class="px-4 py-2 border border-black">ပင်စင်အမျိုးအစား</th>
                            <th class="px-4 py-2 border border-black">ပင်စင်ခံစားသည့် ရက်စွဲ</th>
                            <th class="px-4 py-2 border border-black">ပင်စင်လစာ</th>
                            <th class="px-4 py-2 border border-black">ဆုငွေ</th>
                            <th class="px-4 py-2 border border-black">ထုတ်ွံယူသည့်ဘဏ်</th>
                            <th class="px-4 py-2 border border-black">ပင်စင်ရုံး၏ ခွင့်ပြုမိန့်</th>
                            <th class="px-4 py-2 border border-black">ဆက်သွယ်ရန်လိပ်စာ/တယ်လီဖုန်းနံပါတ်</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($staffs as $staff)
                            <tr>
                                <td class="border border-black text-right p-1">{{ en2mm($loop->index+1)}}</td>
                                <td class="border border-black text-right p-1">{{ $staff->name}}</td>
                                
                                <td class="border border-black text-right p-1">
                                    {{-- {{$staff->postings->map(function ($posting) {
                                        return $posting->rank?->name;
                                    })->join(', ')}} --}}
                                    {{$staff->postings->sortByDesc('to_date')->first()?->rank?->name}}

                                </td>
                                <td class="border border-black text-right p-1">
                                   
                                    {{-- {{$staff->postings->map(function ($posting) {
                                        return $posting->division?->name;
                                    })->join(', ')}} --}}
                                    {{$staff->postings->sortByDesc('to_date')->first()?->division?->name}}
                                </td>
                                <td class="border border-black text-right p-1">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                                <td class="border border-black text-right p-1"> @php
                                    $currentDate = Carbon\Carbon::now();
                                    $rankDate = Carbon\Carbon::parse($staff->current_rank_date);
                                    $diff = $rankDate->diff($currentDate);
                                @endphp
                                {{ $diff->y == 0 ? '' : en2mm($diff->y) .' နှစ်'}} {{ $diff->m == 0 ? '' : en2mm($diff->m) .' လ' }} {{ $diff->d == 0 ? '' : en2mm($diff->d) .' ရက်' }}</td>
                                <td class="border border-black text-right p-1">  {{ $staff->pension_type?->name}}</td>
                                <td class="border border-black text-right p-1">{{ formatDMYmm($staff->retire_date)}}</td>
                                <td class="border border-black text-right p-1">{{ en2mm($staff->pension_salary)}}</td>
                                <td class="border border-black text-right p-1">{{ en2mm($staff->gratuity)}}</td>
                                <td class="border border-black text-right p-1">{{ $staff->pension_bank}}</td>
                                <td class="border border-black text-right p-1">{{ $staff->pension_office_order }}</td>
                                <td class="border border-black text-right p-1">{{ $staff->permanent_address_ward.'၊'.$staff->permanent_address_street.'၊'.$staff->permanent_address_township_or_town?->name.'၊'.$staff->permanent_address_region?->name }}၊{{ $staff->phone}}</td>
                            </tr>
                       @endforeach
                    </tbody> 
                </table>
            </div>

        </div>
    </div>
</div>

