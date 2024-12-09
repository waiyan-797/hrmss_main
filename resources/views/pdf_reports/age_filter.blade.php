<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Age Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Age Report</h1>
    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>ရာထူး</th>
                <th>မွေးသက္ကရာဇ်</th>
                <th>အသက်</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $index => $staff)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->currentRank?->name }}</td>
                <td>{{ $staff->dob }}</td>
                <td>{{ $staff->howOldAmI() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
