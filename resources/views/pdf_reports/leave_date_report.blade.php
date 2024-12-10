<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Leave Date Report</title>
</head>
<body>
    <page size="A4">
    <div style="margin: 20px;">
        <h1 style="text-align: left; font-size: 18px; font-weight: bold; font-family: Arial, sans-serif; margin: 20px 0;">{{ $staff->name }}</h1>
        <table style="width: 100%; font-family: Arial, sans-serif; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid black; padding: 8px;" colspan="4">တာဝန်ချိန် ကာလ</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">စာတိုင်(၂)အရ ခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">စုစုပေါင်းခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်စာတိုင် <br> (၃)+(၇)</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="3">လုပ်သက်ခွင့်ခံစားသည့်ကာလ </th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">လုပ်သက်ခွင့်လက်ကျန်စာတိုင် <br>(၄)-(၆)</th>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 8px;">မှ---ထိ</th>
                    <th style="border: 1px solid black; padding: 8px;">နှစ်</th>
                    <th style="border: 1px solid black; padding: 8px;">လ</th>
                    <th style="border: 1px solid black; padding: 8px;">ရက်</th>
                    <th style="border: 1px solid black; padding: 8px;">လ</th>
                    <th style="border: 1px solid black; padding: 8px;">ရက်</th>
                    <th style="border: 1px solid black; padding: 8px;">လ</th>
                    <th style="border: 1px solid black; padding: 8px;">ရက်</th>
                    <th style="border: 1px solid black; padding: 8px;">မှ---ထိ</th>
                    <th style="border: 1px solid black; padding: 8px;">လ</th>
                    <th style="border: 1px solid black; padding: 8px;">ရက်</th>
                    <th style="border: 1px solid black; padding: 8px;">လ</th>
                    <th style="border: 1px solid black; padding: 8px;">ရက်</th>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 8px;">(၁)</th>
                    <th></th>
                    <th style=" 1px solid black; padding: 8px;" rowspan="1">(၂)</th>
                    <th></th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">(၃)</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">(၄)</th>
                    <th style="border: 1px solid black; padding: 8px;">(၅)</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">(၆)</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">(၇)</th>
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
    
                        <td style="border: 1px solid black; padding: 8px;">{{ en2mm(formatDMY($workStartDate)) }} မှ {{ en2mm(formatDMY($workEndDate)) }} ထိ</td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $work_diff->y > 0 ? en2mm($work_diff->y) . ' နှစ် ' : '-' }}
                        </td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $work_diff->m > 0 ? en2mm($work_diff->m) . ' လ ' : en2mm('0') }}
                        </td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $work_diff->d > 0 ? en2mm($work_diff->d) . ' ရက် ' : en2mm('0')}}
                        </td>
                        @php
                            $total_days_worked = Carbon\Carbon::parse($workStartDate)->diffInDays(Carbon\Carbon::parse($workEndDate));
                            
                            $free_leave_days = floor($total_days_worked / 11);
                            
                            $free_leave_months = floor($free_leave_days / 30);
                            $remaining_free_leave_days = $free_leave_days % 30;
                        @endphp
                        <td style="border: 1px solid black; padding: 8px;">{{ $free_leave_months > 0 ? en2mm($free_leave_months).' လ' : '-' }}</td>
                        <td style="border: 1px solid black; padding: 8px;">{{ $remaining_free_leave_days > 0 ? en2mm($remaining_free_leave_days).' ရက်' : '-' }}</td>
                        @php
                            $leave_diff = dateDiff($leave->from_date, $leave->to_date);
    
                            $total_leave_months = $previous_total_leave_months + $free_leave_months;
                            $total_leave_days = $previous_total_leave_days + $remaining_free_leave_days;
    
                            $diff_leave_months = $total_leave_months - $leave_diff->m;
                            $diff_leave_days = $total_leave_days - $leave_diff->d;
    
                            $previous_total_leave_months = $diff_leave_months;
                            $previous_total_leave_days = $diff_leave_days;
    
                        @endphp
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $total_leave_months > 0 ? en2mm($total_leave_months) . ' လ ' : '-' }}
                        </td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $total_leave_days > 0 ? en2mm($total_leave_days) . ' ရက် ' : '-' }}
                        </td>
                        <td style="border: 1px solid black; padding: 8px;">{{formatDMYmm($leave->from_date).' မှ'.formatDMYmm($leave->to_date).' ထိ '}}</td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $leave_diff->m > 0 ? en2mm($leave_diff->m) . ' လ ' : '-' }}
                        </td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $leave_diff->d > 0 ? en2mm($leave_diff->d + 1) . ' ရက် ' : '-' }}
                        </td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $diff_leave_months > 0 ? en2mm($diff_leave_months) . ' လ' : '-' }}
                        </td>
                        <td style="border: 1px solid black; padding: 8px;">
                            {{ $diff_leave_days > 0 ? en2mm($diff_leave_days - 1) . ' ရက်' : '-' }}
                        </td>
                    </tr>
                    @php
                        $workStartDate = Carbon\Carbon::parse($leave->to_date)->addDay()->toDateString();
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    
    </page>
</body>
</html>
