
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
            {{-- <h1 class="heading">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>ဌာနအလိုက်နေပြည်တော်သို့ပြောင်းရွေ့ရောက်ရှိအင်အားစာရင်း</h1>
            <h2 class="sub-heading">၂၀၂၄ ခုနှစ်၊ ဇွန်လ</h2> --}}
            
            <div class="table-container">

                <table>
                    <tr>
                        <th colspan="16" rowspan="2">
                            ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>
                            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                            {{-- ၂၀၂၄ခုနှစ်၊နိုဝင်ဘာလ ၃၀ ရက်နေ့ရှိ ဝန်ထမ်းအင်အားစာရင်း --}}
                        </th>
                    </tr>
                </table>

                <table>
                    <thead>
                        <tr>
                            <th rowspan="3">စဥ်</th>
                            <th rowspan="3">ဌာန</th>
                            <th colspan="8">အိမ်ထောင်သည်</th>
                            <th colspan="2">အရာရှိ</th>
                            <th rowspan="3">အမှုထမ်း<br>အိမ်ထောင်သည်များ</th>
                            <th colspan="2">အမှုထမ်း</th>
                            <th rowspan="3">စုစုပေါင်း</th>
                        </tr>
                        <tr>
                            <th rowspan="2">ဝန်ကြီး</th>
                            <th rowspan="2">ဒု-ဝန်ကြီး</th>
                            <th rowspan="2">ညွှန်ချုပ်</th>
                            <th rowspan="2">ဒု-ညွှန်ချုပ်</th>
                            <th rowspan="2">ညွှန်မှူး</th>
                            <th rowspan="2">ဒု-ညွှန်မှူး</th>
                            <th rowspan="2">လ/ထ ညွှန်မှူး</th>
                            <th rowspan="2">ဦးစီးအရာရှိ</th>
                            <th colspan="2">ပျို</th>
                            <th colspan="2">ပျို</th>
                        </tr>
                        <tr>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>၁</td>
                            <td>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
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

                <table>
                    <tr>
                        <th colspan="16" rowspan="2">
                            မှတ်ချက်။ &nbsp; လစဥ်လဆန်း(၂)ရက်နေ့အရောက်ဝန်ကြီးရုံးသို့ပေးပို့ရန်။
                        </th>
                    </tr>
                </table>

                
            </div>
        </div>
