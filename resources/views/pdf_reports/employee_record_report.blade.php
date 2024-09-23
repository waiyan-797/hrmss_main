<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Leave 2</title>
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
        .report-title {
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: center;
        }

        td {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1 class="report-title">Former Employee Record Report of April, 2021</h1>

    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>ရာထူး</th>
                <th>နှုတ်ထွက်သည့်ရက်စွဲ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
            <tr>
                <td class="text-right">{{ $loop->index+1}}</td>
                <td>{{ $staff->name}}</td>
                <td>{{ $staff->current_rank->name}}</td>
                <td class="text-center">{{ $staff->retire_date}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        

    </page>
</body>
</html>
