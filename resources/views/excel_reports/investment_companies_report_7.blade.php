

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

        .container {
            width: 100%;
            margin-bottom: 16px;
        }

        h1, h3 {
            font-weight: 400;
            font-size: 16px;
            text-align: center;
            margin-bottom: 8px;
        }

        .table-container {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
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
            font-weight: bold;
        }

        .font-bold {
            font-weight: bold;
        }



    </style>
</head>
<body>
        <div class="container">
            <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h3>{{mmDateFormat($year,$month      )}} </h3>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="3">စဥ်</th>
                            <th rowspan="3">ဌာန</th>
                            <th colspan="3">မူလအင်အား</th>
                            <th colspan="9">ပြုန်းတီးအင်အား</th>
                            <th colspan="3">ထပ်မံခန့်ထားခြင်း</th>
                            <th colspan="6">ပြောင်းရွေ့အင်အား</th>
                            <th colspan="3">လက်ကျန်အင်အား</th>
                        </tr>
                        <tr>
                            <th rowspan="2">အရာရှိ</th>
                            <th rowspan="2">အခြား</th>
                            <th rowspan="2">ပေါင်း</th>
                            <th colspan="2">သေဆုံး</th>
                            <th colspan="2">နုတ်ထွက်</th>
                            <th colspan="2">ထုတ်ပစ်</th>
                            <th colspan="2">ပင်စင်</th>
                            <th rowspan="2">ပေါင်း</th>
                            <th rowspan="2">အရာရှိ</th>
                            <th rowspan="2">အခြား</th>
                            <th rowspan="2">ပေါင်း</th>
                            <th colspan="3">ထွက်ခွာ</th>
                            <th colspan="3">ရောက်ရှိ</th>
                            <th rowspan="2">အရာရှိ</th>
                            <th rowspan="2">အခြား</th>
                            <th rowspan="2">ပေါင်း</th>
                        </tr>
                        <tr>
                            <th>ရှိ</th>
                            <th>ခြား</th>
                            <th>ရှိ</th>
                            <th>ခြား</th>
                            <th>ရှိ</th>
                            <th>ခြား</th>
                            <th>ရှိ</th>
                            <th>ခြား</th>
                            <th>ရှိ</th>
                            <th>ခြား</th>
                            <th>ပေါင်း</th>
                            <th>ရှိ</th>
                            <th>ခြား</th>
                            <th>ပေါင်း</th>
                        </tr>
                    </thead>
                    <tbody class="md:w-auto">
                        <tr>
                            <td>၁</td>
                            <td>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
                            <td>{{ en2mm($high_staffs) }}</td>
                            <td>{{ en2mm($low_staffs) }}</td>
                            <td>{{ en2mm($high_staffs + $low_staffs) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                            <td>{{ en2mm($total_reduced_staffs->count()) }}</td>
                            <td>{{ en2mm($high_new_staffs) }}</td>
                            <td>{{ en2mm($low_new_staffs) }}</td>
                            <td>{{ en2mm($total_new_staffs) }}</td>
                            <td>{{ en2mm($high_leave_staffs) }}</td>
                            <td>{{ en2mm($low_leave_staffs) }}</td>
                            <td>{{ en2mm($total_leave_staffs) }}</td>
                            <td>{{ en2mm($high_transfer_staffs) }}</td>
                            <td>{{ en2mm($low_transfer_staffs) }}</td>
                            <td>{{ en2mm($total_transfer_staffs) }}</td>
                            <td>{{ en2mm($high_left_staffs) }}</td>
                            <td>{{ en2mm($low_left_staffs) }}</td>
                            <td>{{ en2mm($total_left_staffs) }}</td>
                        </tr>
                        <tr class="font-bold">
                            <td></td>
                            <td></td>
                            <td>{{ en2mm($high_staffs) }}</td>
                            <td>{{ en2mm($low_staffs) }}</td>
                            <td>{{ en2mm($high_staffs + $low_staffs) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                            <td>{{ en2mm($high_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                            <td>{{ en2mm($low_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                            <td>{{ en2mm($total_reduced_staffs->count()) }}</td>
                            <td>{{ en2mm($high_new_staffs) }}</td>
                            <td>{{ en2mm($low_new_staffs) }}</td>
                            <td>{{ en2mm($total_new_staffs) }}</td>
                            <td>{{ en2mm($high_leave_staffs) }}</td>
                            <td>{{ en2mm($low_leave_staffs) }}</td>
                            <td>{{ en2mm($total_leave_staffs) }}</td>
                            <td>{{ en2mm($high_transfer_staffs) }}</td>
                            <td>{{ en2mm($low_transfer_staffs) }}</td>
                            <td>{{ en2mm($total_transfer_staffs) }}</td>
                            <td>{{ en2mm($high_left_staffs) }}</td>
                            <td>{{ en2mm($low_left_staffs) }}</td>
                            <td>{{ en2mm($total_left_staffs) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



