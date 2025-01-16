
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1 {
            text-align:right;
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
        }
        table {
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .content {
            margin: 20px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="content">
      
       <h1>ဝန်ထမ်းအမည်---------------------------------------------------------နှင့်ပတ်သက်သည့် ခွင့်အခြေပြဇယား</h1>  
        <table>
            <thead>
                <tr>
                    <th colspan="5" style="font-weight:bold">တာဝန်ချိန် ကာလ</th>
                    <th colspan="2" style="font-weight:bold">စာတိုင်(၂)<br>အရ<br>ခံစားခွင့်<br>ရှိသည့်<br>လုပ်သက်ခွင့်</th>
                    <th colspan="2" style="font-weight:bold">စုစုပေါင်း<br>ခံစားခွင့်<br>ရှိသည့်<br>လုပ်သက်ခွင့်<br>စာတိုင် <br> (၃)+(၇)</th>
                    <th colspan="4" style="font-weight:bold">လုပ်သက်ခွင့်ခံစားသည့်ကာလ </th>
                    <th colspan="2" style="font-weight:bold">လုပ်သက်ခွင့်<br>လက်ကျန်စာတိုင် <br>(၄)-(၆)</th>
                    <th colspan="4" style="font-weight:bold">ဆေးလက်မှတ်ခွင့် ခံစားသည့်ကာလ</th>
                    <th colspan="3" style="font-weight:bold">ခံစားပြီးသည့်<br>စုစုပေါင်း<br>ဆေးလက်မှတ်ခွင့်<br>ကာလ</th>
                    <th colspan="4" style="font-weight:bold">လစာမဲ့ခွင့် ခံစားသည့်ကာလ</th>
                    <th style="font-weight:bold">မှတ်ချက်</th>
                </tr>
                <tr>
                    <th style="font-weight:bold">မှ</th>
                    <th style="font-weight:bold">ထိ</th>
                    <th style="font-weight:bold">နှစ်</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold">မှ</th>
                    <th style="font-weight:bold">ထိ</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold">မှ</th>
                    <th style="font-weight:bold">ထိ</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold">နှစ်</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold">မှ</th>
                    <th style="font-weight:bold">ထိ</th>
                    <th style="font-weight:bold">လ</th>
                    <th style="font-weight:bold">ရက်</th>
                    <th style="font-weight:bold"></th>
                </tr>
                <tr>
                  
                    <th>(၁)</th>
                    <th></th>
                    <th>(၂)</th>
                    <th></th>
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

                    <td>{{ en2mm(formatDMY($workStartDate)) }} မှ {{ en2mm(formatDMY($workEndDate)) }} ထိ</td>
                    <td>{{ $work_diff->y > 0 ? en2mm($work_diff->y) . ' နှစ် ' : '-' }}</td>
                    <td>{{ $work_diff->m > 0 ? en2mm($work_diff->m) . ' လ ' : en2mm('0') }}</td>
                    <td>{{ $work_diff->d > 0 ? en2mm($work_diff->d) . ' ရက် ' : en2mm('0')}}</td>
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
                    <td>{{formatDMYmm($leave->from_date).' မှ'.formatDMYmm($leave->to_date).' ထိ '}}</td>
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

                </tr>
                @php
                    $workStartDate = Carbon\Carbon::parse($leave->to_date)->addDay()->toDateString();
                @endphp
                @endforeach
        </table>
    </div> 























