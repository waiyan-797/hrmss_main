<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investment Companies Report</title>

    {{-- <style type="text/css">
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
    </style> --}}
</head>
<body>
    <div class="">
        {{-- <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1> --}}
        <div class="">

            <table class="">
                <tr>
                    <th colspan="5">
                        ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                      ဝန်ထမ်းအင်အားစာရင်း
                    </th>
                </tr>

            </table>
            
            <table>
                <thead>
                    <tr>
                        <th>စဥ်</th>
                        <th>ရာထူး</th>
                        <th>ခွင့်ပြုအင်အား</th>
                        <th>ခန့်ပြီးအင်အား</th>
                        <th>လစ်လပ်အင်အား</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>၁</td>
                        <td>အမြဲတမ်းအတွင်းဝန်</td>
                        <td>၀</td>
                        <td>၀</td>
                        <td>၀</td>
                    </tr>
                    @php
                    $count=1;
                    @endphp
                    @foreach ($payscales as $index=>$payscale)
                        <tr>
                            <td>{{en2mm(++$count)}}</td>
                            <td> 
                                @if($index == 0 )
                                {{$payscale->ranks[0]->name}} /<br> ဦးဆောင်ညွှန်ကြားရေးမှူးနှင့်အဆင့်တူ
                                @else 
                                {{$payscale->ranks[0]->name}}နှင့်အဆင့်တူ
                                @endif </td>
                            <td>{{en2mm($payscale->allowed_qty)}}</td>
                            <td>{{en2mm($payscale->staff->count())}}</td>
                            <td>{{en2mm($payscale->allowed_qty - $payscale->staff->count())}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" style="font-weight: bold;">စုစုပေါင်း</td>
                        <td>{{en2mm($payscales->sum('allowed_qty'))}}</td>
                        <td>{{en2mm($payscales->sum(fn($payscale) => $payscale->staff->count()))}}</td>
                        <td>{{en2mm($payscales->sum(fn($payscale) => $payscale->staff->count()) - $payscales->sum('allowed_qty'))}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
