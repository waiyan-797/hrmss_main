<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Table</title>
    <style>
        .table-container {
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <tr>
            <th colspan="9" style="font-weight:bold;">
                ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
            </th> 
        </tr>
        <tr>
            <th colspan="9" style="font-weight:bold;">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </th>
        </tr>
        
        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဉ်</th>
                    <th rowspan="2">အမည်/ရာထူး</th>
                    <th rowspan="2">ဌာန</th>
                    <th colspan="3">ရရှိသည့်ဘွဲ့၊ဒီပလိုမာ</th>
                    <th rowspan="2">ဖုန်းနံပါတ်</th>
                    <th rowspan="2">Email</th>
                    <th rowspan="2">မှတ်ချက်</th>
                </tr>
                <tr>
                    <th>ဘွဲ့၊ဒီပလိုမာ</th>
                    <th>တက္ကသိုလ်</th>
                    <th>ခုနှစ်</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $index => $staff)
                                <tr>
                                    <td>{{ en2mm($index + 1) }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>
                                        {{ $staff->current_division?->name }}</td>
                                    <td>
                                        @foreach ($staff->staff_educations as $edu)
                                            <div>
                                                <span>
                                                    {{ $edu->education?->name }}</span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach ($staff->schools as $school)
                                            <div>
                                                <span>{{ $school->school_name }}</span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach ($staff->schools as $school)
                                            <div>
                                                <span>{{ $school->from_date }} - {{ $school->to_date }}</span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td>{{ $staff->phone }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
