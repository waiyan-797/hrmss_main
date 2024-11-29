<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 17</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            width: 100%;
            margin-bottom: 16px;
        }

        .header {
            margin-bottom: 8px;
            display: flex;
            justify-content: flex-start;
            gap: 12px;
        }

        .header h2 {
            font-weight: 600;
            font-size: 13px;
        }

        .table-wrapper {
            width: 100%;
            border-radius: 8px;
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        thead {
            background-color: #f3f4f6;
        }

    </style>
</head>
<body>
    <page size="A4">
        <div style="width: 100%;">
            <div style="display: flex; justify-content: center; width: 100%; height: 83vh; overflow-y: auto;">
                <div style="width: 100%; margin: 0 auto; padding: 16px;">
                    <div style="width: 100%; padding: 16px;">
                        <table width="100%" style="border-collapse: collapse; border: none; margin-bottom: 20px;">
                            <tr style="border: none;">
                                <td style="border:none; text-align: right; padding: 0; width: 100%;">
                                    <img src="{{ $staff->staff_photo ? storage_path('app/upload/').$staff->staff_photo : 'img/user.png' }}" alt="" style="width: 80px; height: 80px;">
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border:none; text-align: center; padding: 0; width: 100%">
                                    <h1 style="color: black; font-weight: 600; font-size: 14px; margin: 0;">ကိုယ်ရေးမှတ်တမ်း</h1>
                                </td>
                            </tr>
                        </table>
                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၁။</td>
                                    <td style="border: none; width: 35%;">အမည်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂။</td>
                                    <td style="border: none;">အသက်(မွေးနေ့သက္ကရာဇ်)</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။</td>
                                    <td style="border: none;">လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->ethnic_id ? $staff->ethnic->name : '-' }}/{{ $staff->religion_id ? $staff->religion->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။</td>
                                    <td style="border: none;">အမျိုးသားမှတ်ပုံတင်အမှတ်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။</td>
                                    <td style="border: none;">ရာထူး/ ဌာန
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->current_rank->name .'/'. $staff->current_department->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">အမှုထမ်းလုပ်သက်၊ ဝင်ရောက်သည့်ရက်စွဲ</td>
                                    <td style="border: none;">-</td>
                                    @php
                                        $join_date = Carbon\Carbon::parse($staff->join_date);
                                        $join_date_duration = $join_date->diff(Carbon\Carbon::now());
                                    @endphp
                                    <td style="border: none;">{{formatPeriodMM($join_date_duration->y, $join_date_duration->m, $join_date_duration->d).', '. en2mm(Carbon\Carbon::parse($staff->join_date)->format('d-m-y'))}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၇။</td>
                                    <td style="border: none;">လက်ရှိနေရပ်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name }}</td>
                                </tr>
                                {{-- <tr style="font-weight: bold">
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">ပညာအရည်အချင်း</td>
                                </tr> --}}
                                <tr>
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">ပညာအရည်အချင်း</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">@foreach ($staff->staff_educations as $education)
                                            {{$education->education->name.','}}
                                        @endforeach</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div style="margin-top: 16px;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>စဉ်</th>
                                        <th>Education Group</th>
                                        <th>Education Type</th>
                                        <th>Education</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->staff_educations as $education)
                                    <tr>
                                        <td style="text-align: center;">{{$loop->index + 1}}</td>
                                        <td>{{$education->education_group->name}}</td>
                                        <td>{{$education->education_type->name}}</td>
                                        <td>{{$education->education->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%;">၉။</td>
                                        <td style="border: none; width: 35%;">အဖအမည်</td>
                                        <td style="border: none; width: 5%;">-</td>
                                        <td style="border: none; width: 55%;">{{$staff->father_name}}</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td style="border: none;">၁၀။</td>
                                        <td style="border: none;">အလုပ်အကိုင်</td>
                                        <td style="border: none;">-</td>
                                        <td style="border: none;">{{$staff->father_occupation}}</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td style="border: none;">၁၁။</td>
                                        <td style="border: none;">အမိအမည်</td>
                                        <td style="border: none;">-</td>
                                        <td style="border: none;">{{$staff->mother_name}}</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td style="border: none;">၁၂။</td>
                                        <td style="border: none;">အလုပ်အကိုင်</td>
                                        <td style="border: none;">-</td>
                                        <td style="border: none;">{{$staff->mother_occupation}}</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td style="border: none;">၁၃။</td>
                                        <td style="border: none;">နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)</td>
                                        <td style="border: none;">-</td>
                                        <td style="border: none;">{{en2mm($staff->abroads->count())}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <table>
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align: center">စဉ်</th>
                                        <th rowspan="2" style="text-align: center">သွားရောက်သည့်ကိစ္စ</th>
                                        <th rowspan="2" style="text-align: center">စေလွှတ်သည့်နှိင်ငံ</th>
                                        <th colspan="2" style="text-align: center">အချိန်ကာလ</th>
                                        <th rowspan="2" style="text-align: center">နိုင်ငံခြားသို့သွားရောက်မည့်နေ့</th>
                                        <th rowspan="2" style="text-align: center">ထောက်ပံ့သည့်အဖွဲ့အစည်း</th>
                                        <th rowspan="2" style="text-align: center">ပြန်ရောက်လျှင်အမှုထမ်းမည့် ဌာန/ရာထူး</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center">မှ</th>
                                        <th style="text-align: center">ထိ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->abroads as $abroad)
                                    <tr>
                                        <td style="text-align: center;">{{$loop->index + 1}}</td>
                                        <td style="text-align: center;">{{$abroad->particular}}</td>
                                        <td style="text-align: center;">{{$abroad->country->name}}</td>
                                        <td>{{$abroad->from_date}}</td>
                                        <td>{{$abroad->to_date}}</td>
                                        <td>{{$abroad->actual_abroad_date}}</td>
                                        <td>{{$abroad->sponser}}</td>
                                        <td>{{$abroad->position}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none; font-weight: bold;">
                                        <td style="border: none; width: 5%;">၁၄။</td>
                                        <td style="border: none; width: 35%;">ဇနီး/ခင်ပွန်း</td>
                                        <td style="border: none; width: 5%;"></td>
                                        <td style="border: none; width: 55%;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်(အခြားအမည်များရှိလျှင်လည်း ဖော်ပြရန်)</th>
                                            <th>လူမျိုး/နိုင်ငံသား</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်နှင့်ဌာန</th>
                                            <th>နေရပ်</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->spouses as $spouse)
                                            <tr>
                                                <td>{{$spouse->name}}</td>
                                                <td>{{$spouse->ethnic->name .'/'. $spouse->religion->name}}</td>
                                                <td>{{$spouse->place_of_birth}}</td>
                                                <td>{{$spouse->occupation}}</td>
                                                <td>{{$spouse->address}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none; font-weight: bold;">
                                        <td style="border: none; width: 5%;">၁၅။</td>
                                        <td style="border: none; width: 35%;">နိုင်ငံခြားသွားရောက်မည့်ကိစ္စ</td>
                                        <td style="border: none; width: 5%;"></td>
                                        <td style="border: none; width: 55%;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="text-align: center;">သွားရောက်သည့်ကိစ္စ</th>
                                            <th rowspan="2" style="text-align: center;">စေလွှတ်သည့်နှိင်ငံ</th>
                                            <th colspan="2" style="text-align: center;">အချိန်ကာလ</th>
                                            <th rowspan="2" style="text-align: center;">နိုင်ငံခြားသို့သွားရောက်မည့်နေ့</th>
                                            <th rowspan="2" style="text-align: center;">ထောက်ပံ့သည့်အဖွဲ့အစည်း</th>
                                            <th rowspan="2" style="text-align: center;">ပြန်ရောက်လျှင်အမှုထမ်းမည့် ဌာန/ရာထူး</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center">မှ</th>
                                            <th style="text-align: center">ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->abroads as $abroad)
                                            <tr>
                                                <td>{{$abroad->particular}}</td>
                                                <td>{{$abroad->country->name}}</td>
                                                <td>{{$abroad->from_date}}</td>
                                                <td>{{$abroad->to_date}}</td>
                                                <td>{{$abroad->actual_abroad_date}}</td>
                                                <td>{{$abroad->sponser}}</td>
                                                <td>{{$abroad->position}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div style="margin-bottom: 16px; font-size: 13px;">
                            <table width="100%" style="margin-bottom: 16px; border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <p style="margin: 0; font-size: 13px;">
                                            ၁၆။ အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" style="border: none;">
                                <tr>
                                    <td width="150px" style="vertical-align: top; border: none;">
                                        <table style="border: none; width: 100%; border-collapse: collapse;">
                                            <tr>
                                                <td style="font-size: 13px; border: none;">လက်မှတ် -</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အမည် - {{ auth()->user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အဆင့် - {{ auth()->user()->role->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">တပ်/ ဌာန -</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="vertical-align: top; text-align: right; padding-right: 10px; border: none;">
                                        <p style="margin: 0; font-size: 13px;">ရက်စွဲ - {{ formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day) }}</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin-bottom: 16px; font-size: 13px;">
                            <table width="100%" style="margin-bottom: 16px; border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <p style="margin: 0; font-size: 13px;">
                                            ၁၇။ နိုင်ငံခြားသို့ သွားရောက်မည့်ပုဂ္ဂိုလ်၏လုပ်ရည်ကိုင်ရည်နှင့် အကျင့်စာရိတ္တ ကောင်းမွန်ကြောင်းထပ်ဆင့် လက်မှတ်ရေးထိုးပါသည်။
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" style="border: none;">
                                <tr>
                                    <td width="150px" style="vertical-align: top; border: none;">
                                        <table style="border: none; width: 100%; border-collapse: collapse;">
                                            <tr>
                                                <td style="font-size: 13px; border: none;">လက်မှတ် -</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အမည် - {{ auth()->user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အဆင့် - {{ auth()->user()->role->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">တပ်/ ဌာန -</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="vertical-align: top; text-align: right; padding-right: 10px; border: none;">
                                        <p style="margin: 0; font-size: 13px;">ရက်စွဲ - {{ formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day) }}</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </page>
</body>
</html>
