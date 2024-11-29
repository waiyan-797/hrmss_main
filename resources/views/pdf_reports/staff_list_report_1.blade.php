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
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        th[rowspan="2"], td[rowspan="2"] {
            vertical-align: middle;
        }
        td {
            text-align: left;
        }
        td.text-center {
            text-align: center;
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
            ဝန်ထမ်းအင်အားစာရင်း(တိုင်း‌ဒေသကြီး/ပြည်နယ်)
        </h1>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">တိုင်း/ပြည်နယ်</th>
                    <th colspan="3">ခန့်ပြီးအမြဲတမ်းဝန်ထမ်း</th>
                </tr>
                <tr>
                    <th>အရာထမ်း</th>
                    <th>အမှုထမ်း</th>
                    <th>စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisions as $division)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $division->name }}</td>
                        <td>
                            {{ en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 1)->count()) }}
                        </td>
                        <td>
                            {{ en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 2)->count()) }}
                        </td>
                        <td>{{ en2mm($division->staffs->count() )}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </page>
</body>
</html>
