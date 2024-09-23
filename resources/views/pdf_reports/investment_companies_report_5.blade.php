<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-rank=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
            font-family: 'tharlon';
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
    <page size="A4">
        <div class="container">
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
                    <tbody>
                        @foreach ($payscales as $payscale)
                            <tr>
                                <td style="border: 1px solid black; padding: 0.5rem; text-align: center;">{{$loop->index + 1}}</td>
                                <td style="border: 1px solid black; padding: 0.5rem;">{{$payscale->name}}</td>
                                <td style="border: 1px solid black; padding: 0.5rem;">{{en2mm($payscale->allowed_qty)}}</td>
                                <td style="border: 1px solid black; padding: 0.5rem;">{{en2mm($payscale->staff->count())}}</td>
                                <td style="border: 1px solid black; padding: 0.5rem;">{{en2mm($payscale->allowed_qty - $payscale->staff->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;" colspan="2">{{$payscale[0]->staff_type->name}}</td>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ en2mm($payscale->sum('allowed_qty')) }}</td>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ en2mm($payscale->sum(fn($payscale) => $payscale->staff->count())) }}</td>
                            <td style="border: 1px solid black; padding: 0.5rem; font-weight: bold;">{{ en2mm($payscale->sum('allowed_qty') - $payscale->sum(fn($payscale) => $payscale->staff->count())) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>
