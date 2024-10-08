<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Report 3</title>
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
        h1 {
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th[rowspan="2"] {
            vertical-align: middle;
        }

        th[colspan="2"] {
            text-align: center;
        }

        th, td {
            vertical-align: middle;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1>Report - 4</h1>

    <table>
        <thead>
            <tr>
                <th rowspan="2">စဥ်</th>
                <th rowspan="2">အမည်</th>
                <th rowspan="2">ရာထူး</th>
                <th rowspan="2">ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
                <th rowspan="2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲ</th>
                <th colspan="2">သွားရောက်သည့်ကာလ</th>
                <th rowspan="2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                <th colspan="2">သွားရောက်သည့်ကာလ</th>
            </tr>
            <tr>
                <th>မှ</th>
                <th>ထိ</th>
                <th>မှ</th>
                <th>ထိ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
            <tr>
                <td>{{ $loop->index+1}}</td>
                <td>{{ $staff->name}}</td>
                <td>{{ $staff->current_rank->name}}</td>
                @foreach($staff->trainings as $training)
                <td>{{ $training->diploma_name}}
                   </td>
                <td>{{ $training->training_type->name}}
                </td>
                <td>{{ $training->from_date}}</td>
                <td>{{ $training->to_date}}</td>
                @endforeach
                @foreach($staff->abroads as $abroad)
                <td>{{ $abroad->particular}}</td>
                <td>{{ $abroad->from_date}}</td>
                <td>{{ $abroad->to_date}}</td>
                <td></td>
                <td></td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>


    </page>
</body>
</html>
