<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
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
    </style>
    
</head>
<body>
    <tr>
        <th colspan="13" style="text-align: center">
            ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
        </th>
    </tr>
    <tr>
        <th colspan="13" style="text-align: center">
            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
        </th>
    </tr>
    <tr>
        <th colspan="13" style="text-align: center">
            Report - 2
        </th>
    </tr>
<table>
    <thead>
        <tr>
            <th rowspan="2">စဥ်</th>
            <th rowspan="2">အမည်</th>
            <th rowspan="2">ရာထူး</th>
            <th rowspan="2">အသက်</th>
            <th rowspan="2">လက်ရှိရာထူး<br>ရသော<br>လုပ်သက်</th>
            <th rowspan="2">လူမျိုး</th>
            <th rowspan="2">ကိုးကွယ်သည့်<br>ဘာသာ</th>
            <th rowspan="2">ယခုနေထိုင်သည့်<br>နေရပ်လိပ်စာ</th>
            <th rowspan="2">အမြဲတမ်း<br>ဆက်သွယ်နိုင်သော<br>နေရပ်လိပ်စာ</th>
            <th rowspan="2">ကျား/မ</th>
            <th colspan="2">သားသမီး<br>အရေအတွက်</th>
            <th rowspan="2">အိမ်ထောင်<br>(ရှိ/မရှိ)</th>
        </tr>
        <tr>
            <th>ကျား</th>
            <th>မ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($staffs as $staff)
        <tr>
            <td style="text-align:center">{{ en2mm($loop?->index + 1) }}</td>
            <td style="text-align:center">{{ $staff?->name }}</td>
            <td style="text-align:center">{{ $staff?->current_rank?->name }}</td>
            @php
            $dob = \Carbon\Carbon::parse($staff->dob);
            $diff = $dob->diff(\Carbon\Carbon::now());
            $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
            @endphp
            <td> {{ ' (' . en2mm($dob->format('d-m-Y')) . ')' }}<br>{{en2mm($age)}}</td>
            @php
            $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
            $diff = $current_rank_date->diff(\Carbon\Carbon::now());
            $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
            @endphp
            <td>{{  ' (' . en2mm($current_rank_date->format('d-m-Y')) . ')'  }}<br>{{en2mm($age)}}</td>
            <td>{{ $staff?->ethnic?->name }}</td>
            <td>{{ $staff?->religion?->name }}</td>
            <td>{{ $staff->current_address_house_no.'၊'.$staff?->current_address_street.'၊'.$staff?->current_address_ward}}<br>{{$staff?->current_address_region?->name.'၊'.$staff?->current_address_township_or_town?->name }}</td>
            <td>{{$staff->permanent_address_house_no.'၊'.$staff?->permanent_address_street.'၊'.$staff?->permanent_address_ward}}<br>{{$staff?->permanent_address_region?->name.'၊'.$staff?->permanent_address_township_or_town?->name }}</td>
            <td>{{ $staff?->gender?->name }}</td>
            <td>{{ en2mm($staff?->children?->where('gender_id', 1)?->count()) }}</td>
            <td>{{ en2mm($staff?->children?->where('gender_id', 2)?->count()) }}</td>
            <td>{{ $staff?->spouse_name != null ? 'ရှိ' : 'မရှိ'}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>