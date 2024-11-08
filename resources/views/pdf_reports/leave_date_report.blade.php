<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Leave Date Report</title>
    <style type="text/css">
        page{
            background: white;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }

        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        }

        body {
            font-family: 'tharlon';
            font-size: 13px;
        }
        h1 {
            text-align: left;
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 0.5rem;
            text-align: center;
        }
        thead th {
            background-color: #f0f0f0;
        }

       
    </style>
</head>
<body>
    <page size="A4">    
        <h1>{{ $staff->name }}</h1> 
    <table>
        <thead>
            <tr>
                <th colspan="4">တာဝန်ချိန် ကာလ</th>
                <th colspan="2">စာတိုင်(၂)အရ ခံစာခွင့်ရှိသည့်လုပ်သက်</th>
                <th colspan="2">စုစုပေါင်းခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်စာတိုင်(၃)+(၇)</th>
                <th colspan="3">လုပ်သက်ခွင့်ခံစားသည့်ကာလ </th>
                <th colspan="2">လုပ်သက်ခွင့်စာတိုင်(၄)-(၆)</th>
            </tr>
            <tr>
                <th>မှ---ထိ</th>
                <th>နှစ်</th>
                <th>လ</th>
                <th>ရက်</th>
                <th>လ</th>
                <th>ရက်</th>
                <th>လ</th>
                <th>ရက်</th>
                <th>မှ---ထိ</th>
                <th>လ</th>
                <th>ရက်</th>
                <th>လ</th>
                <th>ရက်</th>

            </tr>
            <tr>
                <th>(၁)</th>
                <th></th>
                <th rowspan="1">(၂)</th>
                <th></th>
                <th></th>
                <th>(၃)</th>
                <th ></th>
                <th>(၄)</th>
                <th>(၅)</th>
                <th></th>
                <th>(၆)</th>
                <th></th>
                <th>(၇)</th>
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

                    <td>{{ en2mm(formatDMY($workStartDate)) }} မှ {{ en2mm(formatDMY($workEndDate)) }} ထိ</td>
                    <td>
                        {{ $work_diff->y > 0 ? en2mm($work_diff->y) . ' နှစ် ' : '-' }}
                    </td>
                    <td>
                        {{ $work_diff->m > 0 ? en2mm($work_diff->m) . ' လ ' : '-' }}
                    </td>
                    <td>
                        {{ $work_diff->d > 0 ? en2mm($work_diff->d) . ' ရက် ' : '-' }}
                    </td>
                    @php
                        $total_days_worked = Carbon\Carbon::parse($workStartDate)->diffInDays(Carbon\Carbon::parse($workEndDate));
                        $free_leave_days = floor($total_days_worked / 11); //floor is to change float numbers to round numbers
                        $free_leave_months = floor($free_leave_days / 30);
                        $remaining_free_leave_days = $free_leave_days % 30; // Remaining days after extracting full months
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
                    <td>
                        {{ $total_leave_months > 0 ? en2mm($total_leave_months) . ' လ ' : '-' }}
                    </td>
                    <td>
                        {{ $total_leave_days > 0 ? en2mm($total_leave_days) . ' ရက် ' : '-' }}
                    </td>
                    <td>{{ en2mm(formatDMY($leave->from_date)).' မှ '.en2mm(formatDMY($leave->to_date)).' ထိ '}}</td>
                    <td>
                        {{ $leave_diff->m > 0 ? en2mm($leave_diff->m) . ' လ ' : '-' }}
                    </td>
                    <td>
                        {{ $leave_diff->d > 0 ? en2mm($leave_diff->d) . ' ရက် ' : '-' }}
                    </td>
                    <td>
                        {{ $diff_leave_months > 0 ? en2mm($diff_leave_months) . ' လ' : '-' }}
                    </td>
                    <td>
                        {{ $diff_leave_days > 0 ? en2mm($diff_leave_days) . ' ရက်' : '-' }}
                    </td>
                </tr>
                @php
                    $workStartDate = Carbon\Carbon::parse($leave->to_date)->addDay()->toDateString();
                @endphp
            @endforeach
        </tbody>
    </table>
    </page>
</body>
</html>
