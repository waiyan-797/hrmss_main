<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <h1 class="text-center font-bold text-sm">Report - 3</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဝန်ထမ်းအမှတ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">အသက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လက်ရှိရာထူးရသောလုပ်သက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လုပ်သက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပညာအရည်အချင်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကျား/မ</th>
                        <th rowspan="2" class="border border-black text-center p-2">လူမျိုး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကိုးကွယ်သည့်ဘာသာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ</th>
                        <th colspan="2" class="border border-black text-center p-2">သားသမီးအရေအတွက်</th>
                        <th colspan="2" class="border border-black text-center p-2">အိမ်ထောင်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကျန်းမာရေးအခြေအနေ</th>
                        <th rowspan="2" class="border border-black text-center p-2">သွေးအုပ်စု</th>
                        <th rowspan="2" class="border border-black text-center p-2">အရပ်အမြင့်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဝါသနာပါသောအားကစား</th>
                        <th rowspan="2" class="border border-black text-center p-2">သီးခြားတတ်ကျွမ်းသောဘာသာ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ကျား</th>
                        <th class="border border-black text-center p-2">မ</th>
                        <th class="border border-black text-center p-2">ရှိ</th>
                        <th class="border border-black text-center p-2">မရှိ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->staff_no }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->current_rank?->name }}</td>
                            @php
                            $dob = \Carbon\Carbon::parse($staff->dob);
                            $diff = $dob->diff(\Carbon\Carbon::now());
                            $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                            @endphp
                            <td class="border border-black text-center p-2">{{ ' (' . en2mm($dob->format('d-m-Y')) . ')'.en2mm($age) }}</td>
                            @php
                            $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                            $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                            $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                            @endphp
                            <td class="border border-black text-center p-2">{{  ' (' . en2mm($current_rank_date->format('d-m-Y')) . ')'.en2mm($age)  }}</td>
                            @php
                            $join_date = \Carbon\Carbon::parse($staff->join_date);
                            $diff = $join_date->diff(\Carbon\Carbon::now());
                            $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                            @endphp
                            <td class="border border-black text-center p-2">{{  ' (' . en2mm($join_date->format('d-m-Y')) . ')'.en2mm($age)  }}</td>
                            <td class="border border-black text-center p-2">
                                @foreach ($staff->staff_educations as $education)
                                <div class="mb-2">
                                    <span>{{ $education->education?->name }}</span>
                                </div>
                            @endforeach
                            </td> 
                            <td class="border border-black text-center p-2">{{ $staff->gender?->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->ethnic?->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->religion?->name }}</td>
                            <td class="border border-black text-center p-2">{{$staff->current_address_house_no.'၊'. $staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_region?->name.'၊'.$staff->current_address_township_or_town?->name }}</td>
                            <td class="border border-black text-center p-2">{{$staff->current_address_house_no.'၊'. $staff->permanent_address_street.'၊'.$staff->permanent_address_ward.'၊'.$staff->permanent_address_region?->name.'၊'.$staff->permanent_address_township_or_town?->name }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($staff->children->where('gender_id', 1)->count()) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($staff->children->where('gender_id', 2)->count()) }}</td>
                            {{-- <td class="border border-black text-center p-2">{{ $staff->spouse_name != null ? 'ရှိ' : 'မရှိ'}}</td> --}}
                            <td class="border border-black text-center p-2">
                                {{ $staff->spouse_name ? 'ရှိ' : '' }}
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ $staff->spouse_name ? '' : 'မရှိ' }}
                            </td>
                            <td class="border border-black text-center p-2">{{ $staff->health_condition }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->blood_type?->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->height_feet}}<br>{{$staff->height_inch }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->habit }}</td>
                            <td class="border border-black text-center p-2">
                                @foreach ($staff->staff_languages as $lang)
                                    <div class="mb-2">
                                        <span class="font-semibold">{{ $lang?->language?->name }}</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
