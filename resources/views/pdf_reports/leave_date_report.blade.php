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
                    <th style="border: 1px solid black; padding: 8px;" colspan="5">တာဝန်ချိန် ကာလ</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">စာတိုင်(၂)အရ ခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">စုစုပေါင်းခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်စာတိုင် <br> (၃)+(၇)</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="4">လုပ်သက်ခွင့်ခံစားသည့်ကာလ </th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="2">လုပ်သက်ခွင့်လက်ကျန်စာတိုင် <br>(၄)-(၆)</th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="4">ဆေးလက်မှတ်ခွင့် ခံစားသည့်ကာလ </th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="3">ခံစားပြီးသည့်<br>စုစုပေါင်း<br>ဆေးလက်မှတ်ခွင့်<br>ကာလ </th>
                    <th style="border: 1px solid black; padding: 8px;" colspan="4">လစာမဲ့ခွင့် ခံစားသည့်ကာလ</th>
                    <th style="border: 1px solid black; padding: 8px;">မှတ်ချက်</th>
                </tr>
                <tr>
                  

                    <th>မှ</th>
            <th style="border: 1px solid black; padding: 8px;">ထိ</th>
            <th style="border: 1px solid black; padding: 8px;">နှစ်</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;">မှ</th>
            <th style="border: 1px solid black; padding: 8px;">ထိ</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;">မှ</th>
            <th style="border: 1px solid black; padding: 8px;">ထိ</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;">နှစ်</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;">မှ</th>
            <th style="border: 1px solid black; padding: 8px;">ထိ</th>
            <th style="border: 1px solid black; padding: 8px;">လ</th>
            <th style="border: 1px solid black; padding: 8px;">ရက်</th>
            <th style="border: 1px solid black; padding: 8px;"></th>
                </tr>
                <tr>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၁)</th>
                    <th colspan="3" style="border: 1px solid black; padding: 8px;" >(၂)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၃)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၄)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၅)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၆)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၇)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၈)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၉)</th>
                    <th colspan="3" style="border: 1px solid black; padding: 8px;" >(၁၀)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၁၁)</th>
                    <th colspan="2" style="border: 1px solid black; padding: 8px;" >(၁၂)</th>
                     <th style="border: 1px solid black; padding: 8px;" >(၁၃)</th> 
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
    </div>
    
    </page>
</body>
</html>
