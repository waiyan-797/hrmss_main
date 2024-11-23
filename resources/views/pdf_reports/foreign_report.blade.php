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
            margin-bottom: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }
        th {
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }

            
    </style>
</head>
<body>
    <page size="A4">
        <h1>Foreign Report</h1>

    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>သွားရောက်သည့်နိုင်ငံ</th>
                <th>သွားရောက်သည့်ရက်</th>
            </tr>
        </thead>
        <tbody>
          
            {{-- @foreach($staffs as $staff)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $staff->name}}</td>
                @foreach ($staff->abroads as $abroad)
                    <td>{{$abroad->country->name}}</td>
                    <td>{{$abroad->from_date}}</td>
            @endforeach
            
            @endforeach --}}
            @foreach($staffs as $index=> $staff)
                    <tr>
                        <td  rowspan="{{ max(1, $staff->abroads->count()) }}">
                            {{ $index++ }}
                        </td>
                        <td  rowspan="{{ max(1, $staff->abroads->count()) }}">
                            {{ $staff->name }}
                        </td>

                        @if($staff->abroads->isNotEmpty())
                        
                        <td>{{ $staff->abroads[0]->country->name }}</td>
                        <td>{{ $staff->abroads[0]->from_date }}</td>
                    </tr>
                    
                    @foreach($staff->abroads->skip(1) as $abroad)
                    <tr>
                        <td>{{ $abroad->country->name }}</td>
                        <td>{{ $abroad->from_date }}</td>
                    </tr>
                    @endforeach
                    @else
                    <!-- No abroads case -->
                    <td colspan="2">no </td>
                    </tr>
                    @endif

                    @endforeach
        </tbody>
    </table>

    </page>
</body>
</html>
