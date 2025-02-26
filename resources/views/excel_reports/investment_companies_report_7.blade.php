

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
            <div class="table-container">
                <table class="">
                    <tr>
                        <th colspan="26" style="font-weight:bold;">
                            ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                        </th> 
                    </tr>
                    <tr>
                        <th colspan="26" style="font-weight:bold;">
                            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                        </th>
                    </tr>
                    <tr>
                        <th colspan="26" style="font-weight:bold;">
                            {{mmDateFormat($year,$month)}}
                        </th>
                    </tr>
                </table>

                <table>
                    <thead>
                        <tr>
                            <th rowspan="3" style="font-weight:bold;">စဥ်</th>
                            <th rowspan="3" style="font-weight:bold;">ဌာန</th>
                            <th colspan="3" style="font-weight:bold;">မူလအင်အား</th>
                            <th colspan="9" style="font-weight:bold;">ပြုန်းတီးအင်အား</th>
                            <th colspan="3" style="font-weight:bold;">ထပ်မံခန့်ထားခြင်း</th>
                            <th colspan="6" style="font-weight:bold;">ပြောင်းရွေ့အင်အား</th>
                            <th colspan="3" style="font-weight:bold;">လက်ကျန်အင်အား</th>
                        </tr>
                        <tr>
                            <th rowspan="2" style="font-weight:bold;">အရာရှိ</th>
                            <th rowspan="2" style="font-weight:bold;">အခြား</th>
                            <th rowspan="2" style="font-weight:bold;">ပေါင်း</th>
                            <th colspan="2" style="font-weight:bold;">သေဆုံး</th>
                            <th colspan="2" style="font-weight:bold;">နုတ်ထွက်</th>
                            <th colspan="2" style="font-weight:bold;">ထုတ်ပစ်</th>
                            <th colspan="2" style="font-weight:bold;">ပင်စင်</th>
                            <th rowspan="2" style="font-weight:bold;">ပေါင်း</th>
                            <th rowspan="2" style="font-weight:bold;">အရာရှိ</th>
                            <th rowspan="2" style="font-weight:bold;">အခြား</th>
                            <th rowspan="2" style="font-weight:bold;">ပေါင်း</th>
                            <th colspan="3" style="font-weight:bold;">ထွက်ခွာ</th>
                            <th colspan="3" style="font-weight:bold;">ရောက်ရှိ</th>
                            <th rowspan="2" style="font-weight:bold;">အရာရှိ</th>
                            <th rowspan="2" style="font-weight:bold;">အခြား</th>
                            <th rowspan="2" style="font-weight:bold;">ပေါင်း</th>
                        </tr>
                        <tr>
                            <th style="font-weight:bold;">ရှိ</th>
                            <th style="font-weight:bold;">ခြား</th>
                            <th style="font-weight:bold;">ရှိ</th>
                            <th style="font-weight:bold;">ခြား</th>
                            <th style="font-weight:bold;">ရှိ</th>
                            <th style="font-weight:bold;">ခြား</th>
                            <th style="font-weight:bold;">ရှိ</th>
                            <th style="font-weight:bold;">ခြား</th>
                            <th style="font-weight:bold;">ရှိ</th>
                            <th style="font-weight:bold;">ခြား</th>
                            <th style="font-weight:bold;">ပေါင်း</th>
                            <th style="font-weight:bold;">ရှိ</th>
                            <th style="font-weight:bold;">ခြား</th>
                            <th style="font-weight:bold;">ပေါင်း</th>
                        </tr>
                    </thead>
                    <tbody class="md:w-auto">
                        <tr>
                            <td>၁</td>
                            <td>ရင်းနှီးမြှပ်နှံမှုနှင့်<br>ကုမ္ပဏီများ<br>ညွှန်ကြားမှု<br>ဦးစီးဌာန</td>
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
                {{-- <table>
                    <tr>
                        <th colspan="26" rowspan="2" style="font-size:13px;">
                            ရှင်းလင်းချက်။ &nbsp; ၂၀၂၄ ခုနှစ်၊ ဖေဖော်ဝါရီလအတွင်း ပြည်ထောင်စုဝန်ကြီးရုံးမှ ဦးစီးအရာရှိ ၁ ဦး  ပြောင်းရွှေ့ရောက်ရှိလာခြင်း၊ ပြည်ထောင်စုဝန်ကြီးရုံးသို့ ဦးစီးအရာရှိ ၁ ဦး ပြောင်းရွှေ့ သွားခြင်း၊ ဒုတိယဦးစီးမှူး ၁ ဦးနှင့် အကြီးတန်းစာရေး ၁ ဦး နုတ်ထွက်ခဲ့ခြင်းတို့ဖြစ်ပါသည်။
                        </th>
                    </tr>
                </table> --}}
            </div>
        </div>



