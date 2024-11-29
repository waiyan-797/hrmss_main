<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Punishment Report </title>
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
        .report-title {
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
            background-color: #f2f2f2;
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
        
        <h1 class="report-title">Punishment Report</h1>

        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ရာထူး</th>
                    <th>txtpenalty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $index=> $staff)
                    <tr>
                        <td>{{ $index+1}}</td>

                        <td>{{ $staff->name}}</td>
                        <td>{{ $staff->currentRank?->name}}</td>
                        
                        <td>
                            @foreach($staff->punishments as   $punishment )
                           
                              <h1>
                                <span>
                                    {{$loop->iteration}}
                                                                </span>
                                {{ $punishment->penalty_type->name}} 
                              </h1>
                            @endforeach
                        </td>
                       
                    </tr>
                    @endforeach
            </tbody>
        </table>
    
    </page>
</body>
</html>
