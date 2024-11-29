<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 18</title>
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
        }
        .section {
            margin-bottom: 20px;
        }
        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .section-header label {
            margin-right: 10px;
        }
        .section-header h1 {
            font-weight: bold;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        thead th {
            background-color: #f0f0f0;
        }
        .text-left {
            text-align: left;
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
                                    <td style="border: none; width: 5%;">၂။</td>
                                    <td style="border: none; width: 35%;">ဝန်ထမ်းအမှတ်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->staff_no }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။</td>
                                    <td style="border: none;">မွေးနေ့ (ရက်၊ လ၊ နှစ်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။</td>
                                    <td style="border: none;">လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->ethnic_id ? $staff->ethnic->name : '-' }}/{{ $staff->religion_id ? $staff->religion->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။</td>
                                    <td style="border: none;">အဘအမည်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->father_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">အမိအမည်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->mother_name }}</td>
                                </tr>


                                <tr>
                                    <td style="border: none;">၇။</td>
                                    <td style="border: none;">နိုင်ငံသားစိစစ်ရေးအမှတ်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">ဇနီး/ခင်ပွန်းအမည်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        @if($staff->spouses->count() > 1)
                                            {{ implode(', ', $staff?->spouses->pluck('name')->toArray()) }}
                                        @else
                                            {{ $staff?->spouses->first()?->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၉။</td>
                                    <td style="border: none;">သား/သမီးအမည်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        @if($staff->children->count() > 1)
                                            {{ implode(', ', $staff->children->pluck('name')->toArray()) }}
                                        @else
                                            {{ $staff->children->first()?->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၀။</td>
                                    <td style="border: none;">လိပ်စာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၁။</td>
                                    <td style="border: none;">ပညာအရည်အချင်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">@foreach ($staff->staff_educations as $education)
                                            {{$education->education->name.','}}
                                        @endforeach</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div style="margin-top: 16px;">
                            <label for="">၁၁။ ပညာအရည်အချင်း</label>
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
                                        <td style="border: none; width: 5%;">၁၂။</td>
                                        <td style="border: none; width: 35%;">လက်ရှိရာထူး/လစာနှုန်း/ဌာန
                                        </td>
                                        <td style="border: none; width: 5%;">-</td>
                                        <td style="border: none; width: 55%;">{{$staff->current_rank->name .'/'. $staff->current_salary .'/'. $staff->current_department->name}}</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td style="border: none;">၁၃။</td>
                                        <td style="border: none;">သွေးအုပ်စု
                                        </td>
                                        <td style="border: none;">-</td>
                                        <td style="border: none;">{{ $staff->blood_type->name ?? '' }}</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၄။ </label>
                                    <h1>နိုင်ငံ့ဝန်ထမ်းတာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (စစ်ဘက်/နယ်ဘက်)</h1>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">စဉ်</th>
                                            <th rowspan="2">ရာထူး/ဌာန</th>
                                            <th colspan="2">တာ၀န်ထမ်းဆောင်သည့်ကာလ</th>
                                            <th rowspan="2">နေရာ/ဒေသ</th>
                                        </tr>
                                        <tr>
                                            <th>မှ</th>
                                            <th>ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->past_occupations as $occupation)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$occupation->rank->name}}</td>
                                                <td>{{$occupation->from_date}}</td>
                                                <td>{{$occupation->to_date}}</td>
                                                <td>{{$occupation->address}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                             </div>

                             <div class="section">
                                <div class="section-header">
                                    <label for="">၁၅။ </label>
                                    <h1>ပြည်တွင်းသင်တန်းများ တက်ရောက်မှု</h1>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">စဉ်</th>
                                            <th rowspan="2">သင်တန်းအမည်</th>
                                            <th colspan="2">တက်ရောက်သည့်ကာလ</th>
                                            <th rowspan="2">နေရာ/ဒေသ</th>
                                        </tr>
                                        <tr>
                                            <th>မှ</th>
                                            <th>ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->trainings->where('training_location_id', 1) as $training)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$training->training_type->name}}</td>
                                                <td>{{$training->from_date}}</td>
                                                <td>{{$training->to_date}}</td>
                                                <td>{{$training->location}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၆။ </label>
                                    <h1>ပြည်ပသင်တန်းများ တက်ရောက်မှု</h1>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">စဉ်</th>
                                            <th rowspan="2">သင်တန်းအမည်</th>
                                            <th colspan="2">တက်ရောက်သည့်ကာလ</th>
                                            <th rowspan="2">နေရာ/ဒေသ</th>
                                        </tr>
                                        <tr>
                                            <th>မှ</th>
                                            <th>ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->trainings->where('training_location_id', 2) as $training)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$training->training_type->name}}</td>
                                                <td>{{$training->from_date}}</td>
                                                <td>{{$training->to_date}}</td>
                                                <td>{{$training->location}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၇။ </label>
                                    <h1>ပြစ်မှုမှတ်တမ်း</h1>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">စဉ်</th>
                                            <th rowspan="2">ပြစ်ဒဏ်</th>
                                            <th rowspan="2">ပြစ်ဒဏ်ချမှတ်ခံရသည့် အကြောင်းအရာ</th>
                                            <th colspan="2">ပြစ်ဒဏ်ချမှတ်သည့်ကာလ</th>
                                        </tr>
                                        <tr>
                                            <th>မှ</th>
                                            <th>ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->punishments as $punishment)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$punishment->penalty_type->name}}</td>
                                                <td>{{$punishment->reason}}</td>
                                                <td>{{$punishment->from_date}}</td>
                                                <td>{{$punishment->to_date}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၈။ </label>
                                    <h1>ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်များ</h1>
                                </div>
                                <div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>စဉ်</th>
                                                <th>ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်</th>
                                                <th>အမိန့်အမှတ်/ခုနှစ်</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staff->awardings as $awarding)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$awarding->award_type->name .'/'. $awarding->award->name}}</td>
                                                    <td>{{$awarding->order_no.'/'.$awarding->order_date}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>



                        <div style="margin-bottom: 16px; font-size: 13px;">
                            <table width="100%" style="margin-bottom: 16px; border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <p style="margin: 0; font-size: 13px;">
                                            အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။


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
                                                <td style="font-size: 13px; border: none;">အမည် - </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">ရာထူး - </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">ဖုန်းနံပါတ်(ရုံး/လက်ကိုင်ဖုန်း) - </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အီး‌မေးလ် -</td>
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
