<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <page size="A4">
            <div class="container">
                <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>စဥ်</th>
                                <th>ရာထူးအမည်</th>
                                <th>လစာနှုန်း (ကျပ်)</th>
                                <th>ခွင့်ပြုအင်အား</th>
                                <th>ခန့်ပြီးအင်အား</th>
                                <th>လစ်လပ်အင်အား</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($first_ranks as $rank)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$rank->name}}</td>
                                <td>{{$rank->payscale->name}}</td>
                                <td>{{en2mm($rank->allowed_qty)}}</td>
                                <td>{{en2mm($rank->staffs->count())}}</td>
                                <td>{{en2mm($rank->allowed_qty - $rank->staffs->count())}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">{{$first_ranks[0]->staff_type->name}}</td>
                                <td>{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                                <td>{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                <td>{{ en2mm($first_ranks->sum('allowed_qty') - $first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                            </tr>
                            @foreach ($second_ranks as $rank)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$rank->name}}</td>
                                    <td>{{$rank->payscale->name}}</td>
                                    <td>{{en2mm($rank->allowed_qty)}}</td>
                                    <td>{{en2mm($rank->staffs->count())}}</td>
                                    <td>{{en2mm($rank->allowed_qty - $rank->staffs->count())}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">{{$second_ranks[0]->staff_type->name}}</td>
                                <td>{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                                <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                <td>{{ en2mm($second_ranks->sum('allowed_qty') - $second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </page>
    </body>
</html>
