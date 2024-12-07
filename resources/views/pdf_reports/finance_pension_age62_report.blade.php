<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 1</title>
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

        h1, h2 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
    <h2>၂၀၂၄-၂၀၂၅ ဘဏ္ဍာရေးနှစ်တွင် အသက် (၆၂)ပြည့် ပင်စင်ခံစားမည့်စာရင်း</h2>

    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်/ရာထူး</th>
                <th>မွေးသက္ကရာဇ်</th>
                <th>အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>နေ့စွဲ</th>
                <th>ကြိုတင်<br>ပြင်ဆင်ခွင့်</th>
                <th>ပင်စင်ပြည့်<br>သည့်နေ့စွဲ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                    <tr>
                        <td>{{ en2mm($loop->index+1)}}</td>
                        <td class="border border-black text-left p-2">{{ $staff?->name}}/{{ $staff->current_rank?->name}}</td>
                        <td>{{ $staff->dob}}</td>
                        <td>{{ $staff->join_date}}</td>
                        <td>            {{ \Carbon\Carbon::parse($staff->dob)->addYears(62)->subMonths(4)->format('Y-m-d') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($staff->dob)->addYears(62)->format('Y-m-d') }}</td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

    </page>
</body>
</html>

