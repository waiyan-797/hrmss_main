<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Religion Report</title>
    <style type="text/css">
        page{
            background: white;
        }e

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
        .report-title {
            font-weight: bold;
            text-align: center;
            font-size: 1rem; 
            margin-bottom: 0.25rem; 
        }
        .report-table {
            width: 100%;
            border-collapse: collapse; */
        }
        .report-table th, .report-table td {
            border: 1px solid black;
            padding: 0.25rem; 
            text-align: left;
        }
        .report-table th {
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1 class="report-title">Other Qualification Report</h1>

    <table class="report-table">
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>ရာထူး</th>
                <th>ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $staff->name}}</td>
                        <td>{{ $staff->currentRank?->name}}</td>
                        @foreach ($staff->staff_educations as $education)
                        <td>{{$education->education->name}}</td>
                            @endforeach
                    @endforeach
        </tbody>
    </table>

    </page>
</body>
</html>
