<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rank Salary List</title>
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
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        td.text-left {
            text-align: left;
        }

        .total-row td {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <page size="A4">
        <h1>ရာထူးအလိုက်လစာနှုန်းထားစာရင်း</h1>
    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>ရာထူးအမည်</th>
                <th>လစာနှုန်း</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>၁</td>
                <td class="text-left">၂</td>
                <td>၃</td>
            </tr>
            @foreach($staffs as $staff)
            <tr>
                <td>{{ $staff->name}}</td>
                <td>{{ $staff->current_rank?->name}}</td>
                <td>{{ $staff->payscale?->name}}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td></td>
                <td></td>
                <td>စုစုပေါင်း</td>
            </tr>
        </tbody>
    </table>

    </page>
</body>
</html>

