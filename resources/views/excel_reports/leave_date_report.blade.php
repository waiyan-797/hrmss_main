<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Date</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-left {
            text-align: left;
        }
    </style>
</head>
<body>
    <tr>
        <th colspan="27" style="text-align: center">
            ဝန်ထမ်းအမည်---------------------------------------------------------နှင့်ပတ်သက်သည့် ခွင့်အခြေပြဇယား
        </th>
    </tr>
<table>
    <thead>
        <tr>
            <th colspan="5">တာဝန်ချိန်ကာလ</th>
            <th colspan="2">စာတိုင်(၂)<br>အရ<br>ခံစားခွင့်<br>ရှိသည့်<br>လုပ်သက်ခွင့်</th>
            <th colspan="2">စုစုပေါင်း<br>ခံစားခွင့်<br>ရှိသည့်<br>လုပ်သက်ခွင့်<br>စာတိုင်<br> (၃)+(၇)</th>
            <th colspan="4">လုပ်သက်ခွင့်ခံစားသည့်ကာလ </th>
            <th colspan="2">လုပ်သက်ခွင့်<br>လက်ကျန်<br>စာတိုင်<br>(၄)-(၆)</th>
            <th colspan="4">ဆေးလက်မှတ်ခွင့် ခံစားသည့်ကာလ </th>
            <th colspan="3">ခံစားပြီးသည့်<br>စုစုပေါင်း<br>ဆေးလက်မှတ်ခွင့်<br>ကာလ</th>
            <th colspan="4">လစာမဲ့ခွင့် ခံစားသည့်ကာလ</th>
            <th>မှတ်ချက်</th>
        </tr>
        <tr>
            <th>မှ</th>
            <th>ထိ</th>
            <th>နှစ်</th>
            <th>လ</th>
            <th>ရက်</th>
            <th>လ</th>
            <th>ရက်</th>
            <th>လ</th>
            <th>ရက်</th>
            <th>မှ</th>
            <th>ထိ</th>
            <th>လ</th>
            <th>ရက်</th>
            <th>လ</th>
            <th>ရက်</th>
            <th>မှ</th>
            <th>ထိ</th>
            <th>လ</th>
            <th>ရက်</th>
            <th>နှစ်</th>
            <th>လ</th>
            <th>ရက်</th>
            <th>မှ</th>
            <th>ထိ</th>
            <th>လ</th>
            <th>ရက်</th>
            <th></th>
        </tr>
        <tr>
            <th colspan="2">(၁)</th>
            <th colspan="3">(၂)</th>
            <th colspan="2">(၃)</th>
            <th colspan="2">(၄)</th>
            <th colspan="2">(၅)</th>
            <th colspan="2">(၆)</th>
            <th colspan="2">(၇)</th>
            <th colspan="2">(၈)</th>
            <th colspan="2">(၉)</th>
            <th colspan="3">(၁၀)</th>
            <th colspan="2">(၁၁)</th>
            <th colspan="2">(၁၂)</th>
             <th>(၁၃)</th> 
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

                <td>{{ formatDMYmm($workStartDate) }}</td>
                <td>{{ formatDMYmm($workEndDate) }}</td>
                <td>{{ $work_diff->y > 0 ? en2mm($work_diff->y) . ' နှစ် ' : '-' }}</td>
                <td>{{ $work_diff->m > 0 ? en2mm($work_diff->m) . ' လ ' : en2mm('0') }}</td>
                <td>{{ $work_diff->d > 0 ? en2mm($work_diff->d) . ' ရက် ' : en2mm('0') }}</td>

                @php
                    $total_days_worked = Carbon\Carbon::parse($workStartDate)->diffInDays(Carbon\Carbon::parse($workEndDate));
                    $free_leave_days = floor($total_days_worked / 11);
                    $free_leave_months = floor($free_leave_days / 30);
                    $remaining_free_leave_days = $free_leave_days % 30;
                @endphp

                <td>{{ $free_leave_months > 0 ? en2mm($free_leave_months).' လ' : '-' }}</td>
                <td>{{ $remaining_free_leave_days > 0 ? en2mm($remaining_free_leave_days).' ရက်' : '-' }}</td>

                @php
                    $leave_diff = dateDiff($leave->from_date, $leave->to_date);
                    $total_leave_months = $previous_total_leave_months + $free_leave_months;
                    $total_leave_days = $previous_total_leave_days + $remaining_free_leave_days;
                    $diff_leave_months = $total_leave_months - $leave_diff->m;
                    $diff_leave_days = $total_leave_days - $leave_diff->d;
                    $previous_total_leave_months = $diff_leave_months;
                    $previous_total_leave_days = $diff_leave_days;
                @endphp

                <td>{{ $total_leave_months > 0 ? en2mm($total_leave_months) . ' လ ' : '-' }}</td>
                <td>{{ $total_leave_days > 0 ? en2mm($total_leave_days) . ' ရက် ' : '-' }}</td>
                <td>{{ formatDMYmm($leave->from_date) }}</td>
                <td>{{ formatDMYmm($leave->to_date) }}</td>
                <td>{{ $leave_diff->m > 0 ? en2mm($leave_diff->m) . ' လ ' : '-' }}</td>
                <td>{{ $leave_diff->d > 0 ? en2mm($leave_diff->d + 1) . ' ရက် ' : '-' }}</td>
                <td>{{ $diff_leave_months > 0 ? en2mm($diff_leave_months) . ' လ' : '-' }}</td>
                <td>{{ $diff_leave_days > 0 ? en2mm($diff_leave_days - 1) . ' ရက်' : '-' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>























