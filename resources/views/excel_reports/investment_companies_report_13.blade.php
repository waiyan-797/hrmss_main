<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

        .custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table th,
.custom-table td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

.custom-table th {
    background-color: #f2f2f2;
    text-align: center;
}

.custom-table td {
    vertical-align: top;
}

.custom-table th:first-child,
.custom-table td:first-child {
    text-align: center;
}

   
    </style>
</head>
<body>
    <page size="A4">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်/ရာထူး/ဌာန</th>
                    <th>ရရှိခဲ့သည့်ဘွဲ့နှင့် အထူးပြုဘာသာရပ်</th>
                    <th>တက္ကသိုလ်/ကျောင်း</th>
                    <th>နိုင်ငံ</th>
                    <th>ဘွဲ့ရရှိခဲ့သည့်နှစ်</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
             
                    @foreach($staffs as $staff)
                    @foreach($staff->schools as $school)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $staff->name }} / {{ $staff->current_rank->name }} / {{ $staff->side_department->name }}</td>
                            <td>{{ $school->education?->name }}၊ {{ $school->major }}</td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->country?->name }}</td>
                            <td>{{ $school->year }}</td>
                            <td>{{ $school->remark }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        
</body>
</html>