<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Report 4</title>
    <style type="text/css">
        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        h1 {
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th[rowspan="2"] {
            vertical-align: middle;
        }

        th[colspan="2"] {
            text-align: center;
            font-weight: bold;
        }

        th, td {
            vertical-align: middle;
        }

        
    </style>
</head>
<body>
    <tr>
        <th colspan="8" style="text-align: center">
            ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
        </th>
    </tr>
    <tr>
        <th colspan="8" style="text-align: center">
            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန       
        </th>
    </tr>
    <tr>
        <th colspan="8" style="text-align: center">
            ပြည်ပသို့သွားရောက်ခဲမှုမှတ်တမ်း     
        </th>
    </tr>
    @php
    use Carbon\Carbon;
    @endphp
    <tr>
        <th colspan="8" style="text-align: right">
                    {{ formatDMYmm(Carbon::now()) }}
        </th>
    </tr>
    <table>
        <thead>
            <tr>
                <th rowspan="2">စဥ်</th>
                <th rowspan="2">အမည်</th>
                <th rowspan="2">ရာထူး</th>
                <th colspan="2">သွားရောက်သည့်ကာလ</th>
                <th rowspan="2">သွားရောက်သည့်နိုင်ငံ</th>
                <th rowspan="2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                <th rowspan="2">ထောက်ပံ့<br>သည့်<br>အဖွဲ့အစည်း
                    </th>
            </tr>
            <tr>
                <th>မှ</th>
                <th>ထိ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                        @php
                            $maxRows = $staff->abroads->count();
                        @endphp
                
                        @for($i = 0; $i < $maxRows; $i++)
                        <tr>
                            @if($i == 0)
                                <td rowspan="{{ $maxRows }}">{{ en2mm($loop->index + 1) }}</td>
                                <td rowspan="{{ $maxRows }}">{{ $staff->name }}</td>
                                <td rowspan="{{ $maxRows }}">{{ $staff->currentRank?->name }}</td>
                            @endif
                            @if(isset($staff->abroads[$i]))
                            <td>{{ formatDMYmm($staff->abroads[$i]->from_date )}}</td>
                            <td>{{ formatDMYmm($staff->abroads[$i]->to_date) }}</td>  
                             <td>{{ $staff->abroads[$i]->countries->pluck('name')->unique()->join(', ')}}</td>
                            <td>{{ $staff->abroads[$i]->particular }}</td>
                            <td>{{ $staff->abroads[$i]->sponser }}</td> 
                            @else
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td>
                                <td></td> 
                            @endif
                        </tr>
                        @endfor
                    @endforeach 
        </tbody>
    </table>
</body>
</html>
