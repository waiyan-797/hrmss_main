<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 2</title>
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

        h1 {
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            text-align: center;
            background-color: #f2f2f2;
        }
        td.text-left {
            text-align: left;
        }



    </style>
</head>
<body>
    <page size="A4">
        <h1>
            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
            ဝန်ထမ်းများ၏ သားသမီးအရေအတွက် စာရင်း<br>
            ၁။ စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ
        </h1>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th class="text-left">အမည်</th>
                    <th class="text-left">ရာထူး</th>
                    <th>ကျား</th>
                    <th class="text-left">မ</th>
                    <th>စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->current_rank->name }}</td>
                        <td>{{ en2mm($staff->children->where('gender_id', 1)->count()) }}</td>
                        <td>{{ en2mm($staff->children->where('gender_id', 2)->count()) }}</td>
                        <td>{{ en2mm($staff->children->count()) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </page>
</body>
</html>
