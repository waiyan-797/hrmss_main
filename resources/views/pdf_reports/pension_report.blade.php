<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pension Report</title>
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
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

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        

    </style>
</head>
<body>
    <page size="A4">
        <h1>Pension Report</h1>

    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>ရာထူး</th>
                <th>ဌာန</th>
                <th>txtsection</th>
                <th>မွေးသက္ကရာဇ်</th>
                <th>ပင်စင်ယူသည့်ရက်စွဲ</th>
                <th>ပင်စင်အမျိုးအစား</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($staffs as $staff)
            <tr>
                <td>{{ $loop->index+1}}</td>
                <td>{{ $staff->name}}</td>
                <td>{{ $staff->current_rank->name}}</td>
                <td>{{ $staff->current_department->name}}</td>
                <td>-</td>
                <td>{{ $staff->dob}}</td>
                <td>{{ $staff->retire_date}}</td>
           
                <td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    </page>
</body>
</html>

