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
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-y: auto;
            height: 83vh;
        }

        .content {
            width: 100%;
            margin: 0 auto;
            padding: 15px;
            /* border: 1px solid #ccc; */
        }

        h1 {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .text-right {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        td.text-left {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="center-content">
            <div class="content">

                <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာနရှိ သား/သမီးများ၏အရေအတွက်စာရင်း</h1>
                <h1 class="text-right">ရက်စွဲ - {{ getTdyDateInMyanmarYearMonthDay(2) }}</h1>

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
                        @foreach ($divisions as $key => $division)
                            <tr>
                                <td>{{ en2mm($key + 1) }}</td>
                                <td class="text-left">{{ $division->name }}</td>
                                <td>{{ en2mm($division->staffs->sum(fn($staff) => $staff->children->where('gender_id', 1)->count())) }}</td>
                                <td>{{ en2mm($division->staffs->sum(fn($staff) => $staff->children->where('gender_id', 2)->count())) }}</td>
                                <td>{{ en2mm($division->staffs->sum(fn($staff) => $staff->children->count())) }}</td>
                                <td class="text-left"></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td class="text-left">ပေါင်း</td>
                            <td>{{ en2mm($divisions->sum(fn($division) => $division->staffs->sum(fn($staff) => $staff->children->where('gender_id', 1)->count()))) }}</td>
                            <td>{{ en2mm($divisions->sum(fn($division) => $division->staffs->sum(fn($staff) => $staff->children->where('gender_id', 2)->count()))) }}</td>
                            <td>{{ en2mm($divisions->sum(fn($division) => $division->staffs->sum(fn($staff) => $staff->children->count()))) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
