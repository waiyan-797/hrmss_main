<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>
            <h1 class="font-semibold text-base mb-2 text-center"> <h1 class="font-semibold text-base mb-2 text-center">ရင်နှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1></h1>
            <h1 class="font-semibold text-base mb-2 text-center"> <h1 class="font-semibold text-base mb-2 text-center">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏ ဝန်ထမ်းအင်အားပြုန်းတီးမှုအခြေအနေနှင့်  ဝန်ထမ်းအင်အားစာရင်းချုပ်
            </h1></h1>
            {{-- <input type="date" wire:model.live='filterRange'> --}}
            Date
            <x-date-picker wire:model.live='filterRange' />
            <br><br>
            @php

                $totalHighStaff = 0;
                $totalLowStaff = 0;
                $totalAllStaff = 0;
                $totalHighNewAppointed = 0;
                $totalLowNewAppointed = 0;
                $totalHighTransferred = 0;
                $totalLowTransferred = 0;
                $totalHighLeave = 0;
                $totalLowLeave = 0;
                $totalHighQuery5 = 0;
                $totalLowQuery5 = 0;
                $totalHighQuery2 = 0;
                $totalLowQuery2 = 0;
                $totalHighQuery3 = 0;
                $totalLowQuery3 = 0;
                $totalHighQuery1 = 0;
                $totalLowQuery1 = 0;
                $totalDLimitHigh = 0;
                $totalDLimitLow = 0;
                $totalDLimitHighLow = 0;
            @endphp

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th colspan="3" class="border border-black text-center p-2">မူလအင်အား</th>
                        <th colspan="2" class="border border-black text-center p-2">အသစ်ခန့်အပ်</th>
                        <th colspan="2" class="border border-black text-center p-2">အခြားဌာနမှ<br>ရောက်ရှိ</th>
                        <th colspan="2" class="border border-black text-center p-2">အခြားဌာနသို့<br>ပြေင်းရွှေ့ခြင်း
                        </th>
                        <th colspan="2" class="border border-black text-center p-2">ပင်စင်ခံစားခြင်း</th>
                        <th colspan="2" class="border border-black text-center p-2">နုတ်ထွက်ခြင်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း
                        </th>
                        <th colspan="2" class="border border-black text-center p-2">ကွယ်လွန်ခြင်း</th>

                        <th colspan="3" class="border border-black text-center p-2">
                            {{ formatDMYmm($date . '-' . $month . '-' . $year) }}
                            ထိအင်အားစုစုပေါင်း </th>

                        <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ပေါင်း</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ရာ</th>
                        <th class="border border-black text-center p-2">မှု</th>
                        <th class="border border-black text-center p-2">ပေါင်း</th>
                    </tr>
                </thead>
                <tbody>


                    @php
                        $totalHighStaff += $high_staff_query->count();
                        $totalLowStaff += $low_staff_query->count();
                        $totalAllStaff += $high_staff_query->count() + $low_staff_query->count();
                        $totalHighNewAppointed += $high_new_appointed_staffs;
                        $totalLowNewAppointed += $low_new_appointed_staffs;
                        $totalHighTransferred += $high_transferred_staffs;
                        $totalLowTransferred += $low_transferred_staffs;
                        $totalHighLeave += $high_leave_staffs;
                        $totalLowLeave += $low_leave_staffs;
                        $totalHighQuery5 += $high_staff_query->where('retire_type_id', 5)->count();
                        $totalLowQuery5 += $low_staff_query->where('retire_type_id', 5)->count();
                        $totalHighQuery2 += $high_staff_query->where('retire_type_id', 2)->count();
                        $totalLowQuery2 += $low_staff_query->where('retire_type_id', 2)->count();
                        $totalHighQuery3 += $high_staff_query->whereIn('retire_type_id', [3, 4])->count();
                        $totalLowQuery3 += $low_staff_query->whereIn('retire_type_id', [3, 4])->count();
                        $totalHighQuery1 += $high_staff_query->where('retire_type_id', 1)->count();
                        $totalLowQuery1 += $low_staff_query->where('retire_type_id', 1)->count();
                        $totalDLimitHigh += $d_limit_high_staffs;
                        $totalDLimitLow += $d_limit_low_staffs;
                        $totalDLimitHighLow += $d_limit_high_staffs + $d_limit_low_staffs;
                    @endphp

                    <tr>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_staff_query->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_staff_query->count()) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalAllStaff) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_new_appointed_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_new_appointed_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_transferred_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_transferred_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($high_leave_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($low_leave_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery5) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery5) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery3) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery3) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery1) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery1) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($d_limit_high_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($d_limit_low_staffs) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalDLimitHighLow) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>

                    <tr>
                        <td class="border border-black text-center p-2 font-bold">စုစုပေါင်း</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighStaff) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowStaff) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalAllStaff) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighNewAppointed) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowNewAppointed) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighTransferred) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowTransferred) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighLeave) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowLeave) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery5) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery5) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery3) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery3) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalHighQuery1) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalLowQuery1) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalDLimitHigh) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalDLimitLow) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($totalDLimitHighLow) }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
