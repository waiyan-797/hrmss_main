<div class="w-full">
    <div class="flex justify-center w-full   h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
          
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <select wire:model.live='selectedDivisionTypeId' id="">
                <option value="3">
                    All
                </option>
                @foreach ($divisionTypes as $divisionType)
                    <option value="{{$divisionType->id}}">
                    {{
                        $divisionType->name
                    }}
                    </option>
                @endforeach
            </select>
        
            <div class="w-full mb-4">
                <h2 class="font-semibold text-base text-center mt-4 mb-4">
                    
                   {{$title}} နေ့စားဝန်ထမ်းအင်အားစာရင်း
                </h2>
                <table class="w-full text-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border border-black">စဥ်</th>
                            <th class="p-2 border border-black">အမည်</th>
                            <th class="p-2 border border-black">ရာထူး/တာဝန်ချထားမှု</th>
                            <th class="p-2 border border-black">နိုင်ငံသားစိစစ်ရေးအမှတ်</th>
                            <th class="p-2 border border-black">မွေးနေ့သက္ကရာဇ်</th>
                            <th class="p-2 border border-black">အလုပ်စတင်
                                ဝင်ရောက်သည့်
                                ရက်စွဲ</th>
                            <th class="p-2 border border-black">ဌာနခွဲ</th>
                            <th class="p-2 border border-black">ပညာအရည်အချင်း</th>
                            <th class="p-2 border border-black">တာဝန်ထမ်းဆောင်သည့်ဌာန</th>
                            <th class="p-2 border border-black">မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                       @foreach($staffs as  $key => $staff)
                        <tr>
                            <td class="border border-black p-2">{{ en2mm($key + 1)  }}</td>
                            <td class="border border-black p-2">{{ $staff->name}}</td>
                            <td class="border border-black p-2">{{ $staff->currentRank?->name}}</td>
                            <td class="border border-black p-2">{{ collect([$staff->nrc_region_id?->name, $staff->nrc_township_code?->name, $staff->nrc_sign?->name, en2mm($staff->nrc_code)])->filter()->implode('၊') }}</td>
                            <td class="border border-black p-2">{{ formatDMYmm($staff->dob)}}</td>
                            <td class="border border-black p-2">{{ formatDMYmm($staff->join_date)}}</td>
                            <td class="border border-black p-2">{{ $staff->current_division?->name}}</td>
                            <td class="border border-black p-2">
                            @foreach ($staff->staff_educations as $education)
                            {{ $education->education?->name }}
                            @endforeach
                            </td>
                            <td class="border border-black p-2">{{ $staff->current_department?->name}}</td>
                            <td class="border border-black p-2"></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            
            </div>

            {{$staffs->links()}}
        </div>

    </div>
</div>
</div>
