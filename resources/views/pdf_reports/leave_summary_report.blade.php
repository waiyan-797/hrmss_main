<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leave Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2 class="text-center"> {{ $year }}-{{ $month }}</h2>

    <table>
        <thead>
            <tr>
                <th>စဉ်</th>
                <th>ဌာနခွဲ</th>
                <th>ဝန်ထမ်းအင်အား</th>
                <th>ခွင့်ယူသည့်ဝန်ထမ်းဦးရေ</th>
                @foreach ($leave_types as $leave_type)
                    <th>{{ $leave_type->name }}</th>
                @endforeach
                <th>ခွင့်ယူသည့်အင်အားရာခိုင်နှုန်း</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($divisionTypes as $index => $divisionType)
                <tr>
                    <td>{{ en2mm($index + 1) }}</td>
                    <td>{{ $divisionType->name }}</td>
                    <td>{{ en2mm($divisionType->staffCount()) }}</td>
                    <td>{{ en2mm($divisionType->leaveCount("$year-$month")) }}</td>
                    @foreach ($leave_types as $leave_type)
                        <td>{{ en2mm($divisionType->leaveCountWithLeaveTypeForDivisionType("$year-$month", $leave_type->id)) }}
                        </td>
                    @endforeach
                    <td>
                        {{ en2mm(number_format($divisionType->staffCount() > 0 ? ($divisionType->leaveCount("$year-$month") / $divisionType->staffCount()) * 100 : 0, 2)) }}%
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</body>

</html>
