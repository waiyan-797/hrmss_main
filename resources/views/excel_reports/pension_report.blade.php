<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pension Report</title>
    <style type="text/css">
        /* page{
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
        } */

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
 
    <table>
        <tr>
            <th colspan="7">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </th> 
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th style="font-weight:bold text-align:center">စဥ်</th>
                <th style="font-weight:bold text-align:center">အမည်</th>
                <th style="font-weight:bold text-align:center">ရာထူး</th>
                <th style="font-weight:bold text-align:center">တာဝန်ထမ်းဆောင်<br>ခဲ့သည့်ဌာနခွဲ</th>
                <th style="font-weight:bold text-align:center">မွေးသက္ကရာဇ်</th>
                <th style="font-weight:bold text-align:center">ပင်စင်ယူ<br>သည့်ရက်စွဲ</th>
                <th style="font-weight:bold text-align:center">ပင်စင်အမျိုးအစား</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                    <tr>
                        <td>{{ en2mm($loop->index+1)}}</td>
                        <td>{{ $staff->name}}</td>
                        <td>{{ $staff->currentRank?->name}}</td>
                        <td>{!!'<br>'. $staff->current_division?->name!!}</td>
                        {{-- {!! '<br>' . mmDateFormat(explode('-', $month)[0], explode('-', $month)[1]) !!} --}}
                        @php
                        $dob = \Carbon\Carbon::parse($staff->dob);
                        $diff = $dob->diff(\Carbon\Carbon::now());
                        $age =  $diff->y . ' နှစ် ' .  $diff->m . ' လ';
                        @endphp
                        <td>{{ formatDMYmm($staff->dob).'('.en2mm($age).')'}}</td>
                        <td>{{ formatDMYmm($staff->retire_date)}}</td>
                        <td>
                            {{ $staff->pension_type?->name}}
                        </td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

    
   
</body>
</html>

