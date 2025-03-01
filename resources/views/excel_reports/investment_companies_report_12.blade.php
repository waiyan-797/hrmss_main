

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
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        th[rowspan="2"] {
            vertical-align: middle;
        }

        th[colspan] {
            background-color: #f2f2f2;
        }

        td {
            text-align: right;
        }

        td.center, th.center {
            text-align: center;
        }

        td.note {
            text-align: left;
        }




    </style>
     {{-- <table>
         <tr>
            <th>
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </th> 
        </tr>
        <tr>
            <th>
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏ ဝန်ထမ်းအင်အားပြုန်းတီးမှုအခြေအနေနှင့်  ဝန်ထမ်းအင်အားစာရင်းချုပ်
            </th>
        </tr> 
        
    </table>  --}}
      <h1>ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
    <h1>ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏ ဝန်ထမ်းအင်အားပြုန်းတီးမှုအခြေအနေနှင့်  ဝန်ထမ်းအင်အားစာရင်းချုပ်</h1> 

        <table>
            <thead>
                <tr>
                    <th rowspan="2" class="center" style="font-weight:bold">စဥ်</th>
                    <th colspan="3" class="center" style="font-weight:bold">မူလအင်အား</th>
                    <th colspan="2" class="center" style="font-weight:bold">အသစ်ခန့်အပ်</th>
                    <th colspan="2" class="center" style="font-weight:bold">အခြားဌာန<br>မှရောက်ရှိ</th>
                    <th colspan="2" class="center" style="font-weight:bold">အခြားဌာနသို့<br>ပြောင်းရွေ့ခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">ပင်စင်ခံစားခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">နုတ်ထွက်ခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">ကွယ်လွန်ခြင်း</th>
                    <th colspan="3" class="center" style="font-weight:bold">{{formatDMYmm($date . '-' . $month . '-' . $year)}}<br> အင်အားစုစုပေါင်း</th>
                    <th rowspan="2" class="center" style="font-weight:bold">မှတ်ချက်</th>
                </tr>
                <tr>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ပေါင်း</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ရာ</th>
                    <th class="center"  style="font-weight:bold">မှု</th>
                    <th class="center"  style="font-weight:bold">ပေါင်း</th>
                </tr>
            </thead>
            <tbody>
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
                <td>၁</td>
                <td>{{ en2mm($high_staff_query->count()) }}</td>
                <td>{{ en2mm($low_staff_query->count()) }}</td>
                <td>{{ en2mm($totalAllStaff) }}</td>
                <td>{{ en2mm($high_new_appointed_staffs) }}</td>
                <td>{{ en2mm($low_new_appointed_staffs) }}</td>
                <td>{{ en2mm($high_transferred_staffs) }}</td>
                <td>{{ en2mm($low_transferred_staffs) }}</td>
                <td>{{ en2mm($high_leave_staffs) }}</td>
                <td>{{ en2mm($low_leave_staffs) }}</td>
                <td>{{ en2mm($totalHighQuery5) }}</td>
                <td>{{ en2mm($totalLowQuery5) }}</td>
                <td>{{ en2mm($totalHighQuery2) }}</td>
                <td>{{ en2mm($totalLowQuery2) }}</td>
                <td>{{ en2mm($totalHighQuery3) }}</td>
                <td>{{ en2mm($totalLowQuery3) }}</td>
                <td>{{ en2mm($totalHighQuery1) }}</td>
                <td>{{ en2mm($totalLowQuery1) }}</td>
                <td>{{ en2mm($d_limit_high_staffs) }}</td>
                <td>{{ en2mm($d_limit_low_staffs) }}</td>
                <td>{{ en2mm($totalDLimitHighLow) }}</td>
                <td></td>
            </tr>

            <tr>
                <td style="font-weight: bold">စုစုပေါင်း</td>
                <td>{{ en2mm($totalHighStaff) }}</td>
                <td>{{ en2mm($totalLowStaff) }}</td>
                <td>{{ en2mm($totalAllStaff) }}</td>
                <td>{{ en2mm($totalHighNewAppointed) }}</td>
                <td>{{ en2mm($totalLowNewAppointed) }}</td>
                <td>{{ en2mm($totalHighTransferred) }}</td>
                <td>{{ en2mm($totalLowTransferred) }}</td>
                <td>{{ en2mm($totalHighLeave) }}</td>
                <td>{{ en2mm($totalLowLeave) }}</td>
                <td>{{ en2mm($totalHighQuery5) }}</td>
                <td>{{ en2mm($totalLowQuery5) }}</td>
                <td>{{ en2mm($totalHighQuery2) }}</td>
                <td>{{ en2mm($totalLowQuery2) }}</td>
                <td>{{ en2mm($totalHighQuery3) }}</td>
                <td>{{ en2mm($totalLowQuery3) }}</td>
                <td>{{ en2mm($totalHighQuery1) }}</td>
                <td>{{ en2mm($totalLowQuery1) }}</td>
                <td>{{ en2mm($totalDLimitHigh) }}</td>
                <td>{{ en2mm($totalDLimitLow) }}</td>
                <td>{{ en2mm($totalDLimitHighLow) }}</td>
                <td></td>
            </tr>
            </tbody>
        </table>

