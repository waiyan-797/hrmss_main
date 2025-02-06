<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <div   class=" w-44">
                <x-text-input 
                    wire:model.live='searchName'
                />
            </div>
            <div class="relative overflow-x-auto shadow-md mb-5 mt-6">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class="font-arial text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-black">
                        <tr>
                            <th scope="col" class="px-3 py-3 border border-black">စဥ်</th>
                            <th scope="col" class="px-3 py-3 border border-black">အမည်</th>
                            <th scope="col" class="px-3 py-3 border border-black">တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး</th>
                            <th scope="col" class="px-3 py-3 border border-black">စတင်အမှုထမ်းသောနေ့</th>
                            <th scope="col" class="px-3 py-3 border border-black">အမှုထမ်းသက်ဆုံးခန်းတိုင်သည့်နေ့</th>
                            <th scope="col" class="px-3 py-3 border border-black">လုပ်သက်</th>
                            <th scope="col" class="px-3 py-3 border border-black">အိမ်ထောင်
                                သားစု
                                ပင်စင်အကျိုး ခံစားခွင့်ရှိ သည့်အမည်
                                </th>
                            <th scope="col" class="px-3 py-3 border border-black">ဝန်ထမ်း/ပင်စင်စားကွယ်လွန်သည့်နေ့</th>
                           
                            <th scope="col" class="px-3 py-3 border border-black">ကွယ်လွန်သူသည်ပင်စင်စားဖြစ်လျှင်ပင်စင်ယူသောနေ့</th>
                            <th scope="col" class="px-3 py-3 border border-black">ကွယ်လွန်သူနှင့်တော်စပ်ပုံ</th>
                            <th scope="col" class="px-3 py-3 border border-black">မိသားစုပင်စင်ခံစားသည့်နေ့</th>
                            <th scope="col" class="px-3 py-3 border border-black">ထုတ်ယူလိုသည့်ဘဏ်</th>
                            <th scope="col" class="px-3 py-3 border border-black">ရရှိမည့်ပင်စင်လစာ/ဆုငွေ</th>
                            <th scope="col" class="px-3 py-3 border border-black">ဆက်သွယ်ရန်လိပ်စာ/တယ်လီဖုန်းနံပါတ်</th>
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
                                <td class="border border-black text-right p-1">{{ formatDMYmm($staff->join_date) }}</td>
                                <td class="border border-black text-right p-1">{{formatDMYmm($staff->retire_date) }}</td>
                                <td class="border border-black text-right p-1">@php
                                    $currentDate = Carbon\Carbon::now();
                                    $rankDate = Carbon\Carbon::parse($staff->current_rank_date);
                                    $diff = $rankDate->diff($currentDate);
                                @endphp
                                {{ $diff->y == 0 ? '' : en2mm($diff->y) .' နှစ်'}} {{ $diff->m == 0 ? '' : en2mm($diff->m) .' လ' }} {{ $diff->d == 0 ? '' : en2mm($diff->d) .' ရက်' }}</td>
                                <td class="border border-black text-right p-1">{{ $staff->family_pension_inheritor}}</td>
                                <td class="border border-black text-right p-1">{{ formatDMYmm($staff->date_of_death) }}</td>
                                <td class="border border-black text-right p-1">{{ formatDMYmm($staff->retire_date) }}</td>
                                <td class="border border-black text-right p-1">{{ $staff->family_pension_inheritor_relation?->name}}</td>
                                <td class="border border-black text-right p-1">{{ en2mm(Carbon\Carbon::parse($staff->family_pension_date)->format('d-m-y')) }}</td>
                                <td class="border border-black text-right p-1">{{ $staff->pension_bank}}</td>
                                <td class="border border-black text-right p-1">{{ $staff->pension_salary}}၊{{ $staff->gratuity}}</td>
                                <td class="border border-black text-right p-1">{{ $staff->permanent_address_ward.'၊'.$staff->permanent_address_street.'၊'.$staff->permanent_address_township_or_town?->name.'၊'.$staff->permanent_address_region?->name }}၊{{ $staff->phone}}</td>
                            </tr>
                       @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>

