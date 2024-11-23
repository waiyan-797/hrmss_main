<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Education Report</title>
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
            font-weight: bold;
            text-align: center;
            font-size: 16px; 
            margin-bottom: 5px;
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
        }
        th, td {
            border: 1px solid black; 
            padding: 5px; 
            text-align: left;
        }
        th {
            font-weight: bold;
        }
        td.text-right {
            text-align: right;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1>Education Report</h1>
    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>ရာထူး</th>
                <th>ပညာအရည်အချင်း</th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td class="text-right">1</td>
                <td></td>
                <td></td>
                <td></td>
            </tr> --}}
            @foreach ($staffs as $staff)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->currentRank?->name }}</td>
                <td>
                    @foreach ($staff->staff_educations as $edu)
                        <div>
                            <span>{{ $edu->education_group->name }}</span>
                            <span>{{ $edu->education_type->name }}</span>
                            <span>{{ $edu->education->name }}</span>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </page>
</body>
</html>
