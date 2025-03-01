<div class="container mx-5 my-3">
     <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> 
    {{-- <x-primary-button type="button" wire:click="go_word()">Word</x-primary-button> --}}
    <x-primary-button type="button" wire:click="go_excel({{ $staff->id }})">Excel</x-primary-button>
    <h1 class="text-left text-lg font-semibold font-arial my-4">{{ $staff->name }}</h1>
    <table class="md:w-full font-arial">
        <thead>
            <tr>
                <th class="border border-black p-2" colspan="5">တာဝန်ချိန် ကာလ</th>
                <th class="border border-black p-2" colspan="2">စာတိုင်(၂)အရ ခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်</th>
                <th class="border border-black p-2" colspan="2">စုစုပေါင်းခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်စာတိုင် <br> (၃)+(၇)</th>
                <th class="border border-black p-2" colspan="4">လုပ်သက်ခွင့်ခံစားသည့်ကာလ </th>
                <th class="border border-black p-2" colspan="2">လုပ်သက်ခွင့်လက်ကျန်စာတိုင် <br>(၄)-(၆)</th>
                <th class="border border-black p-2" colspan="4">ဆေးလက်မှတ်ခွင့် ခံစားသည့်ကာလ </th>
                <th class="border border-black p-2" colspan="3">ခံစားပြီးသည့်<br>စုစုပေါင်း<br>ဆေးလက်မှတ်ခွင့်<br>ကာလ</th>
                <th class="border border-black p-2" colspan="4">လစာမဲ့ခွင့် ခံစားသည့်ကာလ</th>
                <th class="border border-black p-2">မှတ်ချက်</th>
            </tr>
            <tr>
                <th class="border border-black p-2">မှ</th>
                <th class="border border-black p-2">ထိ</th>
                <th class="border border-black p-2">နှစ်</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2">မှ</th>
                <th class="border border-black p-2">ထိ</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2">မှ</th>
                <th class="border border-black p-2">ထိ</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2">နှစ်</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2">မှ</th>
                <th class="border border-black p-2">ထိ</th>
                <th class="border border-black p-2">လ</th>
                <th class="border border-black p-2">ရက်</th>
                <th class="border border-black p-2"></th>
            </tr>
            <tr>
                <th class="border border-black p-2" colspan="2">(၁)</th>
                <th class="border border-black p-2" colspan="3">(၂)</th>
                <th class="border border-black p-2" colspan="2">(၃)</th>
                <th class="border border-black p-2" colspan="2">(၄)</th>
                <th class="border border-black p-2" colspan="2">(၅)</th>
                <th class="border border-black p-2" colspan="2">(၆)</th>
                <th class="border border-black p-2" colspan="2">(၇)</th>
                <th class="border border-black p-2" colspan="2">(၈)</th>
                <th class="border border-black p-2" colspan="2">(၉)</th>
                <th class="border border-black p-2" colspan="3">(၁၀)</th>
                <th class="border border-black p-2" colspan="2">(၁၁)</th>
                <th class="border border-black p-2" colspan="2">(၁၂)</th>
                 <th class="border border-black p-2">(၁၃)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $workStartDate = $staff->join_date;
                $previous_total_leave_months = 0;
                $previous_total_leave_days = 0;
            @endphp
            @foreach ($leaves as $leave)
                <tr>
                    @php
                        $workEndDate = Carbon\Carbon::parse($leave->from_date)->subDay()->toDateString();
                        $work_diff = dateDiff($workStartDate, $workEndDate);
                    @endphp

                    <td class="border border-black p-2">{{ formatDMYmm($workStartDate) }}</td>
                        <td class="border border-black p-2"> {{ formatDMYmm($workEndDate) }}</td>
                    <td class="border border-black p-2">
                        {{ $work_diff->y > 0 ? en2mm($work_diff->y) . ' နှစ် ' : '-' }}
                    </td>
                    <td class="border border-black p-2">
                        {{ $work_diff->m > 0 ? en2mm($work_diff->m) . ' လ ' : en2mm('0') }}
                    </td>
                    <td class="border border-black p-2">
                        {{ $work_diff->d > 0 ? en2mm($work_diff->d) . ' ရက် ' : en2mm('0')}}
                    </td>
                    @php
                        $total_days_worked = Carbon\Carbon::parse($workStartDate)->diffInDays(Carbon\Carbon::parse($workEndDate));

                        $free_leave_days = floor($total_days_worked / 11); //floor is to change float numbers to round numbers

                        $free_leave_months = floor($free_leave_days / 30);
                        $remaining_free_leave_days = $free_leave_days % 30; // Remaining days after extracting full months
                    @endphp
                    <td class="border border-black p-2">{{ $free_leave_months > 0 ? en2mm($free_leave_months).' လ' : '-' }}</td>
                    <td class="border border-black p-2">{{ $remaining_free_leave_days > 0 ? en2mm($remaining_free_leave_days).' ရက်' : '-' }}</td>
                    @php
                        $leave_diff = dateDiff($leave->from_date, $leave->to_date);

                        $total_leave_months = $previous_total_leave_months + $free_leave_months;
                        $total_leave_days = $previous_total_leave_days + $remaining_free_leave_days;

                        $diff_leave_months = $total_leave_months - $leave_diff->m;

                        $diff_leave_days = $total_leave_days - $leave_diff->d;

                        if($diff_leave_days < 0){
                            --$diff_leave_months ;
                            $diff_leave_days = $total_leave_days - $leave_diff->d + 30 ;
                        }
                        $previous_total_leave_months = $diff_leave_months;
                        $previous_total_leave_days = $diff_leave_days;

                    @endphp
                    <td class="border border-black p-2">
                        {{ $total_leave_months > 0 ? en2mm($total_leave_months) . ' လ ' : '-' }}
                    </td>
                    <td class="border border-black p-2">
                        {{ $total_leave_days > 0 ? en2mm($total_leave_days) . ' ရက် ' : '-' }}
                    </td>
                    <td class="border border-black p-2">{{formatDMYmm($leave->from_date)}}</td>
                    <td class="border border-black p-2">{{formatDMYmm($leave->to_date)}}</td>
                    <td class="border border-black p-2">
                        {{ $leave_diff->m > 0 ? en2mm($leave_diff->m) . ' လ ' : '-' }}
                    </td>
                    <td class="border border-black p-2">
                        {{ $leave_diff->d > 0 ? en2mm($leave_diff->d + 1    ) . ' ရက် ' : '-' }}
                    </td>
                    <td class="border border-black p-2">
                        {{ $diff_leave_months > 0 ? en2mm($diff_leave_months) . ' လ' : '-' }}
                    </td>
                    <td class="border border-black p-2">
                        {{ $diff_leave_days > 0 ? en2mm($diff_leave_days  - 1 ) . ' ရက်' : '-' }}
                    </td>


                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                    <td class="border border-black p-2">
                    </td>
                </tr>
                @php
                    $workStartDate = Carbon\Carbon::parse($leave->to_date)->addDay()->toDateString();
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
