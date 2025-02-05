<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>

            <h1 class="font-bold text-center text-base mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                {{ mmDateFormat($year, $month) }} ဝန်ထမ်းများ၏<br>ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း</h1>

            <div class="flex space-x-4">
                <div>

                </div>


                <div>
                    <input type="month" wire:model.live='dateRange' class="border rounded p-2">
                </div>
            </div><br>

            <table class="md:w-full">
                <thead>
                    <tr class="font-bold">
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">ဌာနခွဲ</th>
                        <th class="border border-black text-center p-2">ဝန်ထမ်းအင်အား</th>
                        <th class="border border-black text-center p-2">ခွင့်ယူသည့်ဝန်ထမ်းဦးရေ</th>
                        @foreach ($leave_types as $leave_type)
                            <th class="border border-black text-center p-2">{{ $leave_type->name }}</th>
                        @endforeach
                        <th class="border border-black text-center p-2">ခွင့်ယူသည့်အင်အားရာခိုင်နှုန်း</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @php
                        $totalStaffCount = 0;
                        $totalLeaveCount = 0;
                        $leaveTypeTotals = array_fill(0, count($leave_types), 0);
                    @endphp

                    @foreach ($divisionTypes as $divisionType)
                        <tr>
                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black text-center p-2">{{ $divisionType->name }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($divisionType->staffCount()) }}
                                
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($divisionType->leaveCount($dateRange)) }}
                              
                            </td>
                            @foreach ($leave_types as $index => $leave_type)
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($divisionType->leaveCountWithLeaveTypeForDivisionType($dateRange, $leave_type->id)) }}
                                    @php $leaveTypeTotals[$index] += $divisionType->leaveCountWithLeaveTypeForDivisionType($dateRange, $leave_type->id); @endphp
                                </td>
                            @endforeach
                            <td class="border border-black text-center p-2">
                                {{ en2mm(number_format($divisionType->staffCount() > 0 ? ($divisionType->leaveCount($dateRange) / $divisionType->staffCount()) * 100 : 0, 2)) }}%
                            </td>
                        </tr>
                    @endforeach

                   
                    @php $totalStaffCount += $divisionType->staffCount();
                    $totalLeaveCount += $divisionType->leaveCount($dateRange); 
                     @endphp
                    <tr>
                        <td class="border border-black text-center p-2" colspan="2"><strong>စုစုပေါင်း</strong></td>
                        <td class="border border-black text-center p-2"><strong>{{ en2mm($totalStaffCount) }}</strong>
                        </td>
                        <td class="border border-black text-center p-2"><strong>{{ en2mm($totalLeaveCount) }}</strong>
                        </td>
                        @foreach ($leaveTypeTotals as $total)
                            <td class="border border-black text-center p-2"><strong>{{ en2mm($total) }}</strong></td>
                        @endforeach
                        <td class="border border-black text-center p-2">
                            <strong>{{ en2mm(number_format($totalStaffCount > 0 ? ($totalLeaveCount / $totalStaffCount) * 100 : 0, 2)) }}%</strong>
                        </td>
                    </tr> --}}

                    @php
    $totalStaffCount = 0;
    $totalLeaveCount = 0;
    $leaveTypeTotals = array_fill(0, count($leave_types), 0);
@endphp

@foreach ($divisionTypes as $divisionType)
    <tr>
        <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }}</td>
        <td class="border border-black text-center p-2">{{ $divisionType->name }}</td>
        <td class="border border-black text-center p-2">
            {{ en2mm($divisionType->staffCount()) }}
            @php $totalStaffCount += $divisionType->staffCount(); @endphp
        </td>
        <td class="border border-black text-center p-2">
            {{ en2mm($divisionType->leaveCount($dateRange)) }}
            @php $totalLeaveCount += $divisionType->leaveCount($dateRange); @endphp
        </td>
        @foreach ($leave_types as $index => $leave_type)
            <td class="border border-black text-center p-2">
                {{ en2mm($divisionType->leaveCountWithLeaveTypeForDivisionType($dateRange, $leave_type->id)) }}
                @php 
                    $leaveTypeTotals[$index] += $divisionType->leaveCountWithLeaveTypeForDivisionType($dateRange, $leave_type->id); 
                @endphp
            </td>
        @endforeach
        <td class="border border-black text-center p-2">
            {{ en2mm(number_format($divisionType->staffCount() > 0 ? ($divisionType->leaveCount($dateRange) / $divisionType->staffCount()) * 100 : 0, 2)) }}%
        </td>
    </tr>
@endforeach


<tr>
    <td class="border border-black text-center p-2" colspan="2"><strong>စုစုပေါင်း</strong></td>
    <td class="border border-black text-center p-2"><strong>{{ en2mm($totalStaffCount) }}</strong></td>
    <td class="border border-black text-center p-2"><strong>{{ en2mm($totalLeaveCount) }}</strong></td>
    @foreach ($leaveTypeTotals as $total)
        <td class="border border-black text-center p-2"><strong>{{ en2mm($total) }}</strong></td>
    @endforeach
    <td class="border border-black text-center p-2">
        <strong>{{ en2mm(number_format($totalStaffCount > 0 ? ($totalLeaveCount / $totalStaffCount) * 100 : 0, 2)) }}%</strong>
    </td>
</tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
