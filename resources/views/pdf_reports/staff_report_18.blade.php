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
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* font-size: 13px; */
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
            /* font-size: 16px; */
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
                        
                        <div style="overflow-x: auto;">
                        <table style="border: none; width: 100%; table-layout: auto; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="border: none;  text-align:center; font-size: 13px;">၁။</td>
                                    <td style="border: none;  text-align:left; font-size: 13px;">အမည်</td>
                                    <td style="border: none;  text-align:center; font-size: 13px;">-</td>
                                    <td style="border: none;  text-align:left; font-size: 13px;">{{ $staff->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၂။</td>
                                    <td style="border: none; text-align:left;">ဝန်ထမ်းအမှတ်
                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ $staff->staff_no }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၃။</td>
                                    <td style="border: none; text-align:left;">မွေးနေ့ (ရက်၊ လ၊ နှစ်)
                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ formatDMYmm($staff->dob) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၄။</td>
                                    <td style="border: none; text-align:left;">လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ $staff->ethnic_id ? $staff->ethnic->name : '-' }}/{{ $staff->religion_id ? $staff->religion->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၅။</td>
                                    <td style="border: none; text-align:left;">အဘအမည်
                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ $staff->father_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၆။</td>
                                    <td style="border: none; text-align:left;">အမိအမည်

                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ $staff->mother_name }}</td>
                                </tr>


                                <tr>
                                    <td style="border: none; text-align:center;">၇။</td>
                                    <td style="border: none; text-align:left;">နိုင်ငံသားစိစစ်ရေးအမှတ်</td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၈။</td>
                                    <td style="border: none; text-align:left;">ဇနီး/ခင်ပွန်းအမည်

                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">
                                        @if($staff->spouses->count() > 1)
                                            {{ implode(', ', $staff?->spouses->pluck('name')->toArray()) }}
                                        @else
                                            {{ $staff?->spouses->first()?->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၉။</td>
                                    <td style="border: none; text-align:left;">သား/သမီးအမည်
                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">
                                        @if($staff->children->count() > 1)
                                            {{ implode(', ', $staff->children->pluck('name')->toArray()) }}
                                        @else
                                            {{ $staff->children->first()?->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center; width:7%">၁၀။</td>
                                    <td style="border: none; text-align:left;">လိပ်စာ
                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ $staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_township_or_town->name.'မြို့နယ်၊'.$staff->current_address_region->name.'။' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; text-align:center;">၁၁။</td>
                                    <td style="border: none; text-align:left;">ပညာအရည်အချင်း
                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">@foreach ($staff->staff_educations as $education)
                                            {{$education->education?->name.','}}
                                        @endforeach</td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="border: none; text-align:center; width:5%;">၁၂။</td>
                                    <td style="border: none; text-align:left; width:35%;">လက်ရှိရာထူး/လစာနှုန်း/ဌာန
                                    </td>
                                    <td style="border: none; text-align:center; width:5%;">-</td>
                                    <td style="border: none; text-align:left; width:55%;"> {!!collect([$staff->current_rank?->name , $staff->payscale?->name , $staff->current_department?->name ])->filter()->implode('<br>')!!}</td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="border: none; text-align:center;">၁၃။</td>
                                    <td style="border: none; text-align:left;">သွေးအုပ်စု
                                    </td>
                                    <td style="border: none; text-align:center;">-</td>
                                    <td style="border: none; text-align:left;">{{ $staff->blood_type->name ?? '' }}</td>
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

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၄။ နိုင်ငံ့ဝန်ထမ်းတာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (စစ်ဘက်/နယ်ဘက်)</label>
                                    {{-- <h1>နိုင်ငံ့ဝန်ထမ်းတာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (စစ်ဘက်/နယ်ဘက်)</h1> --}}
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
                                        @foreach ($staff->past_occupations as $index=>$occupation)
                                            <tr>
                                                <td>{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                                <td>{{$occupation->rank->name}}</td>
                                                <td>{{formatDMYmm($occupation->from_date)}}</td>
                                                <td>{{formatDMYmm($occupation->to_date)}}</td>
                                                <td>{{$occupation->address}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                             </div>

                             <div class="section">
                                <div class="section-header">
                                    <label for="">၁၅။ ပြည်တွင်းသင်တန်းများ တက်ရောက်မှု</label>
                                    {{-- <h1>ပြည်တွင်းသင်တန်းများ တက်ရောက်မှု</h1> --}}
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
                                        @foreach ($staff->trainings->where('training_location_id', 1) as $index=>$training)
                                            <tr>
                                                <td>{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                                <td>{{$training->training_type->name}}</td>
                                                <td>{{formatDMYmm($training->from_date)}}</td>
                                                <td>{{formatDMYmm($training->to_date)}}</td>
                                                <td>{{$training->location}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၆။ ပြည်ပသင်တန်းများ တက်ရောက်မှု</label>
                                    {{-- <h1>ပြည်ပသင်တန်းများ တက်ရောက်မှု</h1> --}}
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
                                                <td>{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                                <td>{{$training->training_type->name}}</td>
                                                <td>{{formatDMYmm($training->from_date)}}</td>
                                                <td>{{formatDMYmm($training->to_date)}}</td>
                                                <td>{{$training->location}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၇။ ပြစ်မှုမှတ်တမ်း</label>
                                    {{-- <h1>ပြစ်မှုမှတ်တမ်း</h1> --}}
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
                                                <td>{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                                <td>{{$punishment->penalty_type->name}}</td>
                                                <td>{{$punishment->reason}}</td>
                                                <td>{{formatDMYmm($punishment->from_date)}}</td>
                                                <td>{{formataDMYmm($punishment->to_date)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="section">
                                <div class="section-header">
                                    <label for="">၁၈။ ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်များ</label>
                                    {{-- <h1>ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်များ</h1> --}}
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
                                                    <td>{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                                    <td>{{$awarding->award_type->name .'/'. $awarding->award->name}}</td>
                                                    <td>{{$awarding->order_no.'/'.formatDMYmm($awarding->order_date)}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>



                        <div style="margin-bottom: 16px; font-size: 13px;">
                            <p style=" text-align:justify;  margin: 0; padding: 0;">အထက်ပါဇယားကွက်များတွင်ဖြည့်စွက်ရေးသွင်းထားသောအကြောင်းအရာများအားမှန်ကန်ကြောင်းတာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။</p>
                            <br>
                                        <table style=" width: 50%; border-collapse: collapse; margin-left: auto; border:none;">
                                            <tr>
                                                <td style="font-size: 13px; border: none;">လက်မှတ် </td>
                                                <td style="font-size: 13px; border: none;">၊</td>
                                                <td style="font-size: 13px; border: none; "></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အမည်</td>
                                                <td style="font-size: 13px; border: none;">၊</td>
                                                <td style="font-size: 13px; border: none;">{{$staff->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">ရာထူး</td>
                                                <td style="font-size: 13px; border: none;">၊</td>
                                                <td style="font-size: 13px; border: none;">{{$staff->current_rank->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">ဖုန်းနံပါတ်(ရုံး/လက်ကိုင်ဖုန်း)</td>
                                                <td style="font-size: 13px; border: none;">၊</td>
                                                <td style="font-size: 13px; border: none;">{{$staff->phone}} <br> {{$staff->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အီးမေးလ်</td>
                                                <td style="font-size: 13px; border: none;">၊</td>
                                                <td style="font-size: 13px; border: none;">{{$staff->email}}</td>
                                            </tr>
                                      </table>
                                    
                                    <table style="border:none;">
                                    <tr>
                                    <td style=" text-align: start;  border: none;">
                                        <p style="margin: 0; font-size: 13px;">ရက်စွဲ - {{  mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}</p>
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
