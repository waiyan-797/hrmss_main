<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body {
        font-family: 'pyidaungsu', sans-serif !important;
        font-size: 13px;
    }

    h1 {
        text-align: center;
        font-size: 1rem;
        font-weight: bold;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        font-size: 0.875rem;
        font-weight: 500;
        color: #555;
        border: 1px solid #ccc;
    }

    th {
        background-color: #f2f2f2;
        font-weight: 600;
    }

    .text-center {
        text-align: center;
    }

    .text-bold {
        font-weight: bold;
    }

    .bg-gray {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
    <div class="table-container">
        <table class="">
            <tr>
                <th colspan="11" style="font-weight:bold; align:center">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                </th>
            </tr>
            <tr>
                <th colspan="11" style="font-weight:bold; align:center">
                    {{ mmDateFormat($year, $month) }}ရက်နေ့၏ အရာထမ်းများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း
                </th>
            </tr>
            {{-- <tr>
                <th colspan="11">
                    @php
                    use Carbon\Carbon;
                    @endphp
                    {{formatDMYmm(Carbon::now())}}
                </th>
            </tr> --}}
        </table>
    
        <table>
            <thead>
                <tr class="bg-gray">
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ရာထူး</th>
                    <th>နိုင်ငံသားစိစစ်ရေး<br>အမှတ်</th>
                    <th>မွေးနေ့သက္ကရာဇ်</th>
                    <th>အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                    <th>လက်ရှိ<br>အဆင့်ရ<br>ရက်စွဲ</th>
                    <th>လက်ရှိဌာန<br>ရောက်ရှိ<br>ရက်စွဲ</th>
                    <th>ဌာနခွဲ</th>
                    <th>ပညာအရည်အချင်း</th>
                    <th>ပင်စင်ပြည့်<br>သည့်နေ့စွဲ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff)
                    <tr>
                        <td>{{ en2mm($loop->index + 1)}}
                        </td>
                        <td>{{ $staff->name }}
                        </td>
                        <td>{{ $staff->current_rank?->name }}</td>
                        <td>{{ $staff->nrc_region_id?->name . $staff->nrc_township_code?->name . '/' . $staff->nrc_sign?->name . '/' . $staff->nrc_code }}
                        </td>
                        <td>{{ en2mm(Illuminate\Support\Carbon::parse($staff->dob)->format('d-m-y')) }}
                        </td>
                        <td>{{ formatDMYmm($staff->join_date) }}
                            <br>
                            {{dateDiffYMDWithoutDays($staff->join_date, now())}}
                        </td>
                        <td>{{ formatDMYmm($staff->current_rank_date) }}
                            <br>
                            {{dateDiffYMDWithoutDays($staff->current_rank_date, now())}}
                        </td>
                        <td>{{ formatDMYmm($staff->current_rank_date) }}
                            <br>
                            {{dateDiffYMDWithoutDays($staff->current_rank_date, now())}}
                        </td>
                        <td style="white-space: normal; word-wrap: break-word;">
                            {{ $staff->current_division?->name }}
                        </td>
                        <td style="white-space: normal; word-wrap: break-word;">
                            @foreach ($staff->staff_educations as $edu)
                                {{ $edu->education?->name }}
                            @endforeach
                        </td>
                        <td>
                        {{ formatDMYmm(Illuminate\Support\Carbon::parse($staff->dob)->addYears($pension)->format('d-m-Y')) }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>