<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Social Report</title>
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
            font-size: 1rem; 
            margin-bottom: 0.25rem; 
        }

        table {
            width: 100%; 
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid black;
            padding: 0.25rem; 
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        td {
            text-align: left;
        }

       
        .text-right {
            text-align: right;
        }

          
    </style>
</head>
<body>
    <page size="A4">
        <h1>Social Report</h1>
            <table>
                <thead>
                    <tr>
                        <th>စဥ်</th>
                        <th>အမည်</th>
                        <th>ရာထူး</th>
                        <th>လုပ်ဆောင်မှုများ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-right p-1">{{ $loop->index+1}}</td>
                        <td>{{ $staff->name}}</td>
                        <td>{{ $staff->current_rank->name}}</td>
                        <td>
                       @foreach($staff->socialActivities as $activity)
                       {{ $activity->particular}}
                       @endforeach
                        </td>  
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </page>
</body>
</html>
