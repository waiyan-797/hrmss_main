<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Age18 Over Staff List</title>
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
            font-size: 1.25em;
            margin-bottom: 10px;
        }
        h2 {
            text-align: center;
            font-weight: bold;
            font-size: 1em;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        .font-bold {
            font-weight: bold;
        }


    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
        <h2>အသက် ၁၈ နှစ်နှင့်အထက် ရှိသောဝန်ထမ်းဦးရေစာရင်း</h2>

        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ရာထူးအမည်</th>
                    <th>ကျား</th>
                    <th>မ</th>
                    <th>စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($first_ranks as $rank)
                    <tr>
                        <td>{{ en2mm($loop->index + 1) }}</td>
                        <td>{{ $rank->name }}</td>
                        <td>
                            {{ en2mm($rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
                        </td>
                        <td>
                            {{ en2mm($rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
                        </td>
                        <td>
                            {{ en2mm($rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
                        </td>
                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း အရာထမ်း</td>
                    <td>{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                </tr>
                @foreach ($second_ranks as $rank)
                    <tr>
                        <td>{{ en2mm($loop->index + 1) }}</td>
                        <td>{{ $rank->name }}</td>
                        <td>
                            {{ en2mm($rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
                        </td>
                        <td>
                            {{ en2mm($rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
                        </td>
                        <td>
                            {{ en2mm($rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
                        </td>
                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း အမှုထမ်း</td>
                    <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                </tr>
                <tr>
                    <td>၁</td>
                    <td>နေ့စား</td>
                    <td>{{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                </tr>
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း ဝန်ထမ်းဦးရေ</td>
                    <td>{{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                    <td>{{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
                </tr>
            </tbody>
        </table>
    </page>
</body>
</html>
