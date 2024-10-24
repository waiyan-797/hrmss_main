<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 15</title>
    <style type="text/css">
        page{
            background: white;s
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
                                    <td style="border: none;">{{ $staff->dob }}</td>
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
                                    <td style="border: none;">အလုပ်အကိုင်နှင့် ဌာန</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->current_rank->name .'/'. $staff->current_department->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">အမှုထမ်းသက်(ဝင်ရောက်သည့်နေ့စွဲ)</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y'))}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၇။</td>
                                    <td style="border: none;">လက်ရှိနေရပ်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%;">၈။</td>
                                        <td style="border: none; width: 35%;">ပညာအရည်အချင်း</td>
                                        <td style="border: none; width: 5%;"></td>
                                        <td style="border: none; width: 55%;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
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
                        </div>
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
                                        <th rowspan="2">စဉ်</th>
                                        <th colspan="2">ကာလ</th>
                                        <th rowspan="2">နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နှိင်ငံ</th>
                                        <th rowspan="2">သွားရောက်သည့်ကိစ္စ</th>
                                        <th rowspan="2">သင်တန်းတက်ခြင်းဖြစ်လျှင် အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်</th>
                                        <th rowspan="2">မည်သည့်အစိုးရအဖွဲ့အစည်းအထောက်အပံ့ဖြင့်သွားရောက်သည်</th>
                                    </tr>
                                    <tr>
                                        <th>မှ</th>
                                        <th>ထိ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->abroads as $abroad)
                                        <tr>
                                            <td style="text-align: center;">{{$loop->index + 1}}</td>
                                            <td style="text-align: center;">{{$abroad->from_date}}</td>
                                            <td style="text-align: center;">{{$abroad->to_date}}</td>
                                            <td>{{$abroad->country->name}}</td>
                                            <td>{{$abroad->particular}}</td>
                                            <td>{{$abroad->training_success_count}}</td>
                                            <td>{{$abroad->sponser}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
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
                                            <th>အလုပ်အကိုင်နှင့်ဌာန</th>
                                            <th>နေရပ်</th>
                                            <th>မှတ်ချက်</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->spouses as $spouse)
                                            <tr>
                                                <td>{{$spouse->name}}</td>
                                                <td>{{$spouse->ethnic->name .'/'. $spouse->religion->name}}</td>
                                                <td>{{$spouse->occupation}}</td>
                                                <td>{{$spouse->address}}</td>
                                                <td>{{$spouse->remark}}</td>
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
                                            ၁၅။ အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား
                                            မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။
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
                                                <td style="font-size: 13px; border: none;">အမည် -</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အဆင့် -</td>
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
