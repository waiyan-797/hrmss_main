<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Payscale List</title>
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

        .table-container {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .table-container th {
            background-color: white;
        }

        .table-container tbody tr:nth-child(odd) {
            background-color: #f0f0f0;
        }

        .table-container .font-bold {
            font-weight: bold;
        }

        .table-container .bg-gray {
            background-color: #f3f3f3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .table-container {
                font-size: 12px;
            }

            .table-container th, .table-container td {
                padding: 5px;
            }
        }


    </style>
</head>
<body>
    <page size="A4">
        <table class="table-container">
            <thead>
                <tr>
                    <th rowspan="2">Indicator(s)</th>
                    <th colspan="12">1.4.A Women holding senior positions in the Civil Service (Director Level or equivalent and Above Posts)<br>as (a) A Percentage of Total Senior Civil Servants and, (b) Increase in Percentage points from the previous year</th>
                </tr>
                <tr>
                    <th>1.4.B Proportion of Positions by (a) Sex, (b) Age, (c) Persons with disabilities, in public institutions compared to national distribution</th>
                    <th></th>
                </tr>
                <tr>
                    <th rowspan="3">Name of Ministries/Organizations</th>
                </tr>
                <tr>
                    <th colspan="11"></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th rowspan="3">Sr No.</th>
                    <th rowspan="3">Level of Position and Same Level</th>
                    <th rowspan="3">Total Number</th>
                    <th colspan="2">Gender</th>
                    <th colspan="6">Age Group</th>
                    <th colspan="2">Person with disabilities</th>
                </tr>
                <tr>
                    <th rowspan="2">Male</th>
                    <th rowspan="2">Female</th>
                    <th rowspan="2">18 - 30</th>
                    <th rowspan="2">31 - 40</th>
                    <th rowspan="2">41 - 50</th>
                    <th rowspan="2">51 - 60</th>
                    <th rowspan="2">61 Above</th>
                </tr>
                <tr>
                    <th>Male</th>
                    <th>Female</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payscales as $payscale)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
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
                    <td class="border border-black p-2 font-semibold" colspan="2">စုစုပေါင်း</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 1)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 2)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 18 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 30
                                )->count())
                        ) }}
                    </td>
                    <td class="border border-black p-2 font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 31 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 40
                                )->count())
                        ) }}
                    </td>
                    <td class="border border-black p-2 font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 41 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 50
                                )->count())
                        ) }}
                    </td>
                    <td class="border border-black p-2 font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 51 &&
                                \Carbon\Carbon::parse($staff->dob)->age <= 60
                                )->count())
                        ) }}
                    </td>
                    <td class="border border-black p-2 font-semibold">
                        {{ en2mm(
                            $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                                \Carbon\Carbon::parse($staff->dob)->age >= 61
                                )->count())
                        ) }}
                    </td>
                    <td class="border border-black p-2 font-semibold"></td>
                    <td class="border border-black p-2 font-semibold"></td>
                </tr>
            </tbody>
        </table>

    </page>
</body>
</html>

