
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
        .heading {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }
        .sub-heading {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }
        .table-container {
            width: 100%;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            font-weight: bold;
        }
        .note-container {
            display: flex;
            justify-content: flex-start;
            font-weight: bold;
            margin-top: 16px;
        }
        .note-label {
            width: 20%;
            margin-left: 40px;
        }
        .note-content {
            width: 60%;
        }

    </style>
</head>
<body>
        <div class="container">
            <div class="table-container">
                    {{-- <tr>
                        <th colspan="16" style="font-weight:bold;">
                           ၃
                        </th> 
                    </tr> --}}
                    <tr>
                        <th colspan="16" style="font-weight:bold;">
                            ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                        </th> 
                    </tr>
                    <tr>
                        <th colspan="16" style="font-weight:bold;">
                            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                        </th>
                    </tr>
                    <tr>
                        <th colspan="16" style="font-weight:bold;">
                            {{mmDateFormat($year,$month)}}
                        </th>
                    </tr>
               
                <table>
                    <thead>
                        <tr>
                            <th rowspan="3" style="font-weight:bold;">စဥ်</th>
                            <th rowspan="3" style="font-weight:bold;">ဌာန</th>
                            <th colspan="8" style="font-weight:bold;">အိမ်ထောင်သည်</th>
                            <th colspan="2" style="font-weight:bold;">အရာရှိ</th>
                            <th rowspan="3" style="font-weight:bold;">အမှုထမ်း<br>အိမ်ထောင်သည်များ</th>
                            <th colspan="2" style="font-weight:bold;">အမှုထမ်း</th>
                            <th rowspan="3" style="font-weight:bold;">စုစုပေါင်း</th>
                        </tr>
                        <tr>
                            <th rowspan="2" style="font-weight:bold;">ဝန်ကြီး</th>
                            <th rowspan="2" style="font-weight:bold;">ဒု-ဝန်ကြီး</th>
                            <th rowspan="2" style="font-weight:bold;">ညွှန်ချုပ်</th>
                            <th rowspan="2" style="font-weight:bold;">ဒု-ညွှန်ချုပ်</th>
                            <th rowspan="2" style="font-weight:bold;">ညွှန်မှူး</th>
                            <th rowspan="2" style="font-weight:bold;">ဒု-ညွှန်မှူး</th>
                            <th rowspan="2" style="font-weight:bold;">လ/ထ<br> ညွှန်မှူး</th>
                            <th rowspan="2" style="font-weight:bold;">ဦးစီး<br>အရာရှိ</th>
                            <th colspan="2" style="font-weight:bold;">ပျို</th>
                            <th colspan="2" style="font-weight:bold;">ပျို</th>
                        </tr>
                        <tr>
                            <th style="font-weight:bold;">ကျား</th>
                            <th style="font-weight:bold;">မ</th>
                            <th style="font-weight:bold;">ကျား</th>
                            <th style="font-weight:bold;">မ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>၁</td>
                            <td>ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများ<br>ညွှန်ကြားမှုဦးစီးဌာန</td>
                            <td></td>
                            <td></td>
                            <td>{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>
                                {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                            </td>
                            <td>
                                {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                            </td>
                            <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNotNull('spouse_name')->count())) }}</td>
                            <td>
                                {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                            </td>
                            <td>
                                {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                            </td>
                            <td>{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>-</td>
                            <td></td>
                            <td></td>
                            <td>{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->whereNotNull('spouse_name')->count()) }}</td>
                            <td>
                                {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                            </td>
                            <td>
                                {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                            </td>
                            <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNotNull('spouse_name')->count())) }}</td>
                            <td>
                                {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                            </td>
                            <td>
                                {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                            </td>
                            <td>{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                        </tr>
                    </tbody>
                </table>

                {{-- <table>
                    <tr>
                        <th colspan="16" rowspan="2">
                            မှတ်ချက်။ &nbsp; လစဥ်လဆန်း(၂)ရက်နေ့အရောက်ဝန်ကြီးရုံးသို့ပေးပို့ရန်။
                        </th>
                    </tr>
                </table> --}}

                <table>
                    <tr>
                        <th colspan="16" rowspan="2" style="font-size: 14px;">
                            မှတ်ချက်။ &nbsp; လစဥ်လဆန်း(၂)ရက်နေ့အရောက်ဝန်ကြီးရုံးသို့ပေးပို့ရန်။
                        </th>
                    </tr>
                </table>
            </div>
        </div>
