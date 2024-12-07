

    <style type="text/css">
        /* page{
            background: white;
        }

       
        page[size="A4 portrait"] {
            width: 210mm;
            height: 297mm;
        }


        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        } */

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
            <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>စဥ်</th>
                            <th>ရာထူးအမည်</th>
                            <th>ခွင့်ပြုအင်အား</th>
                            <th>ခန့်ပြီးအင်အား</th>
                            <th>လစ်လပ်အင်အား</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                        @foreach ($payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{$loop->index + 1}}</td>
                                <td class="border border-black p-2">{{$payscale->ranks[0]->name}} နှင့်အဆင့်တူ</td>
                                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->staff->count())}}</td>
                                <td class="border border-black p-2">{{en2mm(
                           $payscale->staff->count() -            $payscale->allowed_qty)}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-black p-2 font-semibold" colspan="2">စုစုပေါင်း</td>
                            <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->count())) }}</td>
                            <td class="border border-black p-2 font-semibold">{{ en2mm(
          $payscales->sum(fn($payscale) => $payscale->staff->count()) -                        $payscales->sum('allowed_qty')) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

