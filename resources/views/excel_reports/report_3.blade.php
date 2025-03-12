<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report 3</title>
    <style>
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
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @php
    use Carbon\Carbon;
    @endphp
    <tr>
        <th colspan="22" style="text-align: center">
            ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
        </th>
    </tr>
    <tr>
        <th colspan="22" style="text-align: center">
            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
        </th>
    </tr>
    <tr>
        <th colspan="22" style="text-align: center">
            Report - 3
        </th>
    </tr>
    <tr>
        <th colspan="22" class="date-container">
            {{ formatDMYmm(Carbon::now()) }}
        </th>
    </tr> 
    <table>
        <thead>
            <tr>
                <th rowspan="2">စဥ်</th>
                <th rowspan="2">အမည်</th>
                <th rowspan="2">ဝန်ထမ်း<br>အမှတ်</th>
                <th rowspan="2">ရာထူး</th>
                <th rowspan="2">အသက်</th>
                <th rowspan="2">လက်ရှိရာထူး<br>ရသော<br>လုပ်သက်</th>
                <th rowspan="2">လုပ်သက်</th>
                <th rowspan="2">ပညာ<br>အရည်အချင်း</th>
                <th rowspan="2">ကျား/မ</th>
                <th rowspan="2">လူမျိုး</th>
                <th rowspan="2">ကိုးကွယ်<br>သည့်<br>ဘာသာ</th>
                <th rowspan="2">ယခုနေထိုင်သည့်<br>နေရပ်လိပ်စာ</th>
                <th rowspan="2">အမြဲတမ်း<br>ဆက်သွယ်နိုင်သော<br>နေရပ်လိပ်စာ</th>
                <th colspan="2">သားသမီး<br>အရေအတွက်</th>
                <th colspan="2">အိမ်ထောင်</th>
                <th rowspan="2">ကျန်းမာရေး<br>အခြေအနေ</th>
                <th rowspan="2">သွေးအုပ်စု</th>
                <th rowspan="2">အရပ်<br>အမြင့်</th>
                <th rowspan="2">ဝါသနာ<br>ပါသော<br>အားကစား</th>
                <th rowspan="2">သီးခြား<br>တတ်ကျွမ်းသော<br>ဘာသာ</th>
            </tr>
            <tr>
                <th>ကျား</th>
                <th>မ</th>
                <th>ရှိ</th>
                <th>မရှိ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td>{{ en2mm($loop->index + 1) }}</td>
                    <td style="white-space:normal; word-wrap: break-word;">{{ $staff->name }}</td>
                    <td style="white-space:normal; word-wrap: break-word;">{{ $staff->staff_no }}</td>
                    <td style="white-space:normal; word-wrap: break-word;">{{ $staff->current_rank?->name }}</td>
                    @php
                    $dob = \Carbon\Carbon::parse($staff->dob);
                    $diff = $dob->diff(\Carbon\Carbon::now());
                    $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                    @endphp
                    <td>{{ ' (' . en2mm($dob->format('d-m-Y')) . ')'}}<br>
                        {{ en2mm($age) }}
                    </td>
                     @php
                    $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                    $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                    $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                    @endphp
                    <td>{{  ' (' . en2mm($current_rank_date->format('d-m-Y')) . ')' }}<br>{{ en2mm($age)  }}</td>
                    @php
                    $join_date = \Carbon\Carbon::parse($staff->join_date);
                    $diff = $join_date->diff(\Carbon\Carbon::now());
                    $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                    @endphp
                    <td>{{  ' (' . en2mm($join_date->format('d-m-Y')) . ')'  }}<br>{{ en2mm($age)  }}</td>
                    <td style="white-space:normal; word-wrap: break-word;">
                        @foreach ($staff->staff_educations as $education)
                            <div>{{ $education->education?->name }}</div>
                        @endforeach
                    </td>
                    <td>{{ $staff->gender?->name }}</td>
                    <td>{{ $staff->ethnic?->name }}</td>
                    <td>{{ $staff->religion?->name }}</td>
                    <td style="white-space:normal; word-wrap: break-word;" class="border border-black text-center p-2">
                                                {{$staff->current_address_house_no . '၊' . $staff->current_address_street . '၊' . $staff->current_address_ward . '၊' . $staff->current_address_region?->name . '၊' . $staff->current_address_township_or_town?->name }}
                                            </td>
                                            <td style="white-space:normal; word-wrap: break-word;" class="border border-black text-center p-2">
                                                {{$staff->current_address_house_no . '၊' . $staff->permanent_address_street . '၊' . $staff->permanent_address_ward . '၊' . $staff->permanent_address_region?->name . '၊' . $staff->permanent_address_township_or_town?->name }}
                                            </td>
                    <td>{{ en2mm($staff->children->where('gender_id', 1)->count()) }}</td>
                    <td>{{ en2mm($staff->children->where('gender_id', 2)->count()) }}</td>
                    <td>{{ $staff->spouse_name ? 'ရှိ' : '' }}</td>
                    <td>{{ $staff->spouse_name ? '' : 'မရှိ' }}</td>
                    <td>{{ $staff->health_condition }}</td>
                    <td>{{ $staff->blood_type?->name }}</td>
                    <td>{{ $staff->height_feet }}' {{ $staff->height_inch }}"</td>
                    <td style="white-space:normal; word-wrap: break-word;">{{ $staff->habit }}</td>
                    <td style="white-space:normal; word-wrap: break-word;">
                        @foreach ($staff->staff_languages as $lang)
                            <div>{{ $lang?->language?->name }}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
