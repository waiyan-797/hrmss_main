

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
     <table>
         <tr>
            <th colspan="22">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </th> 
        </tr>
        <tr>
            <th colspan="22">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏ ဝန်ထမ်းအင်အားပြုန်းတီးမှုအခြေအနေနှင့်  ဝန်ထမ်းအင်အားစာရင်းချုပ်
            </th>
        </tr> 
        
    </table> 
     {{-- <h1>ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
    <h1>ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏ ဝန်ထမ်းအင်အားပြုန်းတီးမှုအခြေအနေနှင့်  ဝန်ထမ်းအင်အားစာရင်းချုပ်</h1>  --}}

        <table>
            <thead>
                <tr>
                    <th rowspan="2" class="center" style="font-weight:bold">စဥ်</th>
                    <th colspan="3" class="center" style="font-weight:bold">မူလအင်အား</th>
                    <th colspan="2" class="center" style="font-weight:bold">အသစ်ခန့်အပ်</th>
                    <th colspan="2" class="center" style="font-weight:bold">အခြားဌာနမှ<br>ရောက်ရှိ</th>
                    <th colspan="2" class="center" style="font-weight:bold">အခြားဌာနသို့<br>ပြေင်းရွေ့ခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">ပင်စင်ခံစားခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">နုတ်ထွက်ခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း</th>
                    <th colspan="2" class="center" style="font-weight:bold">ကွယ်လွန်ခြင်း</th>
                    <th colspan="3" class="center" style="font-weight:bold">{{$year.'-'.$month.'-'.$date}} အင်အားစုစုပေါင်း</th>
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
                <tr>
                    <td>၁</td>
                    <td>{{ en2mm($high_staff_query->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->count() + $low_staff_query->count()) }}</td>
                    <td>{{ en2mm($high_new_appointed_staffs) }}</td>
                    <td>{{ en2mm($low_new_appointed_staffs) }}</td>
                    <td>{{ en2mm($high_transferred_staffs) }}</td>
                    <td>{{ en2mm($low_transferred_staffs) }}</td>
                    <td>{{ en2mm($high_leave_staffs) }}</td>
                    <td>{{ en2mm($low_leave_staffs) }}</td>
                    <td>{{ en2mm($high_staff_query->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($d_limit_high_staffs) }}</td>
                    <td>{{ en2mm($d_limit_low_staffs) }}</td>
                    <td>{{ en2mm($d_limit_high_staffs + $d_limit_low_staffs) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

