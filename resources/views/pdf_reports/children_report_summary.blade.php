<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children Count Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow-y: auto;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

    </style>
</head>
<body>
    <div class="container">
        

        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန ရှိ သား/သမီးများ၏အရေအတွက် စာရင်း</h1>

        <div class="text-right">
            ရက်စွဲ - {{ getTdyDateInMyanmarYearMonthDay(2) }}
        </div>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2" class="text-left">ရုံး/ဌာန</th>
                    <th colspan="2">သား/သမီးအရေအတွက်</th>
                    <th rowspan="2">စုစုပေါင်း</th>
                    <th rowspan="2">မှတ်ချက်</th>
                </tr>
                <tr>
                    <th>ကျား</th>
                    <th>မ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisionTypes as $key => $divisionType)
                    <tr>
                        <td>{{ en2mm($key + 1) }}</td>
                        <td class="text-left">
                            {{ $divisionType->name }}
                            @if ($key == 1)
                                ညွှန်ကြားရေးမှုးရုံးများတွင်
                            @endif
                            တွင်တာဝန်ထမ်းဆောင်နေသည့်မိသားစုဝင်သား/သမီးများ
                        </td>
                        <td>
                            {{ en2mm(
                                $divisionType->divisions->sum(function ($division) {
                                    return $division->staffs->sum(function ($staff) {
                                        return $staff->children->where('gender_id', 1)->count();
                                    });
                                })
                            ) }}
                        </td>
                        <td>
                            {{ en2mm(
                                $divisionType->divisions->sum(function ($division) {
                                    return $division->staffs->sum(function ($staff) {
                                        return $staff->children->where('gender_id', 2)->count();
                                    });
                                })
                            ) }}
                        </td>
                        <td>
                            {{ en2mm(
                                $divisionType->divisions->sum(function ($division) {
                                    return $division->staffs->sum(function ($staff) {
                                        return $staff->children->count();
                                    });
                                })
                            ) }}
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td class="text-center">ပေါင်း</td>
                    <td>{{ en2mm($children->where('gender_id', 1)->count()) }}</td>
                    <td>{{ en2mm($children->where('gender_id', 2)->count()) }}</td>
                    <td>{{ en2mm($children->count()) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
