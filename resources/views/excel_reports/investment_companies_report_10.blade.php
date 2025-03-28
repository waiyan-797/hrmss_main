
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
        th[rowspan="2"] {
            vertical-align: middle;
        }
        th[colspan="3"] {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        thead th {
            padding: 12px;
        }
        tbody td {
            padding: 10px;
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
                    <th rowspan="3" style="font-weight:bold;">ဦစီးဌာန</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">အမြဲတမ်းအတွင်းဝန်/<br>ညွှန်ကြားရေးမှူးချုပ်</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">ဒုတိယအမြဲတမ်းအတွင်းဝန်/<br>ဒုတိယညွှန်ကြားရေးမှူးချုပ်</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">လက်ထောက်အတွင်းဝန်/<br>ညွှန်ကြားရေးမှူး</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">ဒုတိယညွှန်ကြားရေးမှူး</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">လက်ထောက်<br>ညွှန်ကြားရေးမှူး</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">ဦးစီးအရာရှိ</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">အရာရှိပေါင်း</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">အမှုထမ်းပေါင်း</th>
                    <th rowspan="2" colspan="3" style="font-weight:bold;">စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
                <tr>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                    <th style="font-weight:bold;">ခွင့်ပြု</th>
                    <th style="font-weight:bold;">ခန့်အပ်</th>
                    <th style="font-weight:bold;">ပို/လို</th>
                </tr>
                <tr>
                    <td>၁</td>
                    <td>ရင်းနှီးမြှပ်နှံမှုနှင့်<br>ကုမ္ပဏီများ<br>ညွှန်ကြားမှုဦးစီးဌာန</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($first_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($second_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm($all_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight: bold">စုစုပေါင်း</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($first_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($second_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm($all_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')) }}</td>
                </tr>
            </tbody>
        </table>

        </div>
    </div>
</body>
</html>

