<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Information List</title>
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
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .table thead {
            background-color: white;
        }
        .font-semibold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <page size="A4">
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2">Indicator(s)</th>
                    <th colspan="12">1.4.A Women holding senior positions in the Civil Service (Director Level or equivalent and Above Posts) as (a) A Percentage of Total Senior Civil Servants and, (b) Increase in Percentage points from previous year</th>
                </tr>
                <tr>
                    <th colspan="12">1.4.B Proportion of Positions by (a) Sex, (b) Age, (c) Persons with disabilities, in public institutions compared to national distribution</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th colspan="2">Name of Ministries/Organizations</th>
                    <th colspan="11"></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th rowspan="2" >Sr No.</th>
                    <th rowspan="2">Level of Position and Same Level</th>
                    <th rowspan="2">Total Number</th>
                    <th colspan="2">Gender</th>
                    <th colspan="5">Age Group</th>
                    <th colspan="2">Person with disabilities</th>
                </tr>
                <tr>
                    <th>Male</th>
                    <th>Female</th>
                    <th>18 - 30</th>
                    <th>31 - 40</th>
                    <th>41 - 50</th>
                    <th>51 - 60</th>
                    <th>61 Above</th>
                    <th>Male</th>
                    <th>Female</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payscales as $payscale)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
                        <td>{{ en2mm($payscale->staff->count()) }}</td>
                        <td>{{ en2mm($payscale->staff->where('gender_id', 1)->count()) }}</td>
                        <td>{{ en2mm($payscale->staff->where('gender_id', 2)->count()) }}</td>
                        <td>
                            {{ en2mm($payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 18 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 30
                            )->count()) }}
                        </td>
                        <td>
                            {{ en2mm($payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 31 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 40
                            )->count()) }}
                        </td>
                        <td>
                            {{ en2mm($payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 41 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 50
                            )->count()) }}
                        </td>
                        <td>
                            {{ en2mm($payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 51 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 60
                            )->count()) }}
                        </td>
                        <td>
                            {{ en2mm($payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 61
                            )->count()) }}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="font-semibold">စုစုပေါင်း</td>
                    <td class="font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->count())) }}</td>
                    <td class="font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 1)->count())) }}</td>
                    <td class="font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 2)->count())) }}</td>
                    <td class="font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 18 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 30
                            )->count())
                        ) }}
                    </td>
                    <td class="font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 31 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 40
                            )->count())
                        ) }}
                    </td>
                    <td class="font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 41 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 50
                            )->count())
                        ) }}
                    </td>
                    <td class="font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 51 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 60
                            )->count())
                        ) }}
                    </td>
                    <td class="font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 61
                            )->count())
                        ) }}
                    </td>
                    <td class="font-semibold"></td>
                    <td class="font-semibold"></td>
                </tr>
            </tbody>
        </table>
    </page>
</body>
</html>

