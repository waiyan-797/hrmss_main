

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

        .header-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }

        .table-container {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        thead tr {
            background-color: #f3f4f6;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        tbody tr td {
            height: 32px;
        }

    </style>
</head>
<body>
        <div class="container">
            {{-- <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1> --}}
            <div class="table-container">

                <table class="tabletitle">
                    <tr>
                        <th colspan="5" style="font-weight:bold">
                            ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                        </th>
                    </tr>
                    <tr>
                        <th colspan="5" style="font-weight:bold">
                            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                        </th>
                    </tr>
                    <tr>
                        <th colspan="5" style="font-weight:bold;">
                            {{-- {{mmDateFormat($year,$month)}}ရက်နေ့ရှိ ဝန်ထမ်းအင်အားစာရင်း --}}
                          {{mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day))}}ရက်နေ့ရှိ ဝန်ထမ်းအင်အားစာရင်း
   
                        </th>
                    </tr>
                </table>
                
                <table>
                    <thead>
                        <tr>
                            <th style="font-weight:bold;">စဥ်</th>
                            <th style="font-weight:bold;">လစာနှုန်း (ကျပ်)</th>
                            <th style="font-weight:bold;">ခွင့်ပြုအင်အား</th>
                            <th style="font-weight:bold;">ခန့်ပြီးအင်အား</th>
                            <th style="font-weight:bold;">လစ်လပ်အင်အား</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                        @foreach ($first_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{en2mm(++$count)}}</td>
                                <td class="border border-black p-2">{{$payscale->name}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->staff->count())}}</td>
                                <td class="border border-black p-2">{{en2mm( $payscale->staff->count()  - $payscale->allowed_qty)}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-black p-2 " style="font-weight:bold;" colspan="2">{{$first_payscales[0]->staff_type->name}}ပေါင်း</td>
                            <td class="border border-black p-2 " style="font-weight:bold;">{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2 " style="font-weight:bold;">{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                            <td class="border border-black p-2 " style="font-weight:bold;">{{ en2mm((
                                
                           $first_payscales->sum(fn($scale) => $scale->staff->count())  - $first_payscales->sum('allowed_qty')
                            )) }}</td>
                        </tr>

                        @foreach ($second_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{en2mm(++$count)}}</td>
                                <td class="border border-black p-2">{{$payscale->name}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->staff->count())}}</td>
                                <td class="border border-black p-2">{{en2mm( 
                                    
                                    $payscale->staff->count() - $payscale->allowed_qty 
                                    )}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-black p-2" colspan="2" style="font-weight:bold;">{{$second_payscales[0]->staff_type->name}}ပေါင်း</td>
                            <td class="border border-black p-2" style="font-weight:bold;">{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2" style="font-weight:bold;">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                            <td class="border border-black p-2" style="font-weight:bold;">{{ en2mm(
                                 $second_payscales->sum(fn($scale) => $scale->staff->count() ) - $second_payscales->sum('allowed_qty')
                                ) }}</td>
                        </tr>

                        <tr>
                            <td class="border border-black p-2" colspan="2" style="font-weight:bold;">ပေါင်း</td>
                            <td class="border border-black p-2" style="font-weight:bold;">{{ en2mm($second_payscales->sum('allowed_qty') + $first_payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2" style="font-weight:bold;">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count()) + $first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                            <td class="border border-black p-2" style="font-weight:bold;">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count() ) - $second_payscales->sum('allowed_qty') + $first_payscales->sum(fn($scale) => $scale->staff->count() ) - $first_payscales->sum('allowed_qty')) }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>
