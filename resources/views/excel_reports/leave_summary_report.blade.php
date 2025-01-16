
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>

    <table class="">
        <tr>
            <th colspan="12">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </th> 
        </tr>
        <tr>
            <th colspan="12">
                {{mmDateFormat($year,$month)}}ဝန်ထမ်းများ၏
            </th>
        </tr>
        <tr>
            <th colspan="12">
                ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း
            </th>
        </tr>
        
    </table>

    <table>
        <thead>
            <tr>
                <th>စဉ်</th>
                <th>ဌာနခွဲ</th>
                <th>ဝန်ထမ်း<br>အင်အား</th>
                <th>ခွင့်ယူသည့်<br>ဝန်ထမ်း<br>ဦးရေ</th>
                <th>ရှောင်တခင်<br>ခွင့်ရက်ပေါင်း</th>
                <th>လုပ်သက်ခွင့်<br>ရက်ပေါင်း</th>
                <th>မီးဖွားခွင့်/<br>သားပျက်ခွင့်</th>
                <th>ဆေးခွင့်<br>ရက်ပေါင်း</th>
                <th>လစာမဲ့ခွင့်</th>
                <th>ကြိုတင်<br>ပြင်ဆင်ခွင့်<br>ရက်ပေါင်း</th>
                <th>ကလေးပြုစု<br>စောင့်ရှောက်<br>ခွင့်ရက်ပေါင်း</th>
                <th>ခွင့်ယူသည့်<br>အင်အား<br>ရာခိုင်နှုန်း</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalStaffCount = 0;
            $totalLeaveCount = 0;
            $leaveTypeTotals = array_fill(0, count($leave_types), 0);
        @endphp
        
        @foreach ($divisionTypes as $divisionType)
            <tr>
                <td>{{ en2mm($loop->index + 1) }}</td>
                <td>{{ $divisionType->name }}</td>
                <td>
                    {{ en2mm($divisionType->staffCount()) }}
                    @php $totalStaffCount += $divisionType->staffCount(); @endphp
                </td>
                <td>
                    {{ en2mm($divisionType->leaveCount($dateRange)) }}
                    @php $totalLeaveCount += $divisionType->leaveCount($dateRange); @endphp
                </td>
                @foreach ($leave_types as $index => $leave_type)
                    <td>
                        {{ en2mm($divisionType->leaveCountWithLeaveTypeForDivisionType($dateRange, $leave_type->id)) }}
                        @php 
                            $leaveTypeTotals[$index] += $divisionType->leaveCountWithLeaveTypeForDivisionType($dateRange, $leave_type->id); 
                        @endphp
                    </td>
                @endforeach
                <td>
                    {{ en2mm(number_format($divisionType->staffCount() > 0 ? ($divisionType->leaveCount($dateRange) / $divisionType->staffCount()) * 100 : 0, 2)) }}%
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"><strong>စုစုပေါင်း</strong></td>
            <td><strong>{{ en2mm($totalStaffCount) }}</strong></td>
            <td><strong>{{ en2mm($totalLeaveCount) }}</strong></td>
            @foreach ($leaveTypeTotals as $total)
                <td><strong>{{ en2mm($total) }}</strong></td>
            @endforeach
            <td>
                <strong>{{ en2mm(number_format($totalStaffCount > 0 ? ($totalLeaveCount / $totalStaffCount) * 100 : 0, 2)) }}%</strong>
            </td>
        </tr>
        
        </tbody>
    </table>


