 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 15</title>
    <style type="text/css">
        page {
            background: white;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }

        @media print {
            body,
            page {
                margin: 0;
                box-shadow: 0;
            }
        }
        body {
            font-family: 'tharlon';
        }


        table {
            width: 100%;
            border-collapse: collapse;
           
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
        th,
        td {
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
                                    <img src="{{ $staff->staff_photo ? storage_path('app/upload/') . $staff->staff_photo : 'img/user.png' }}"
                                        alt="" style="width: 80px; height: 80px;">
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border:none; text-align: center; padding: 0; width: 100%">
                                    <h1 style="color: black; font-weight: 600; font-size: 13px; margin: 0;">
                                        ကိုယ်ရေးမှတ်တမ်း</h1>
                                </td>
                            </tr>
                        </table>
                        <div style="font-size: 20px; line-height: 1.5;">
                            <table style="border: none; width: 100%; font-size: 20px;">

                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၁။</td>
                                    <td style="border: none; width: 45%;">အမည်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 45%;">{{ $staff->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၂။</td>
                                    <td style="border: none; width: 45%;">အသက်(မွေးနေ့သက္ကရာဇ်)</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 45%;">{{ formatDMYmm($staff->dob) }}</td>
                                </tr>
                                 <tr>
                                    <td style="border: none; width: 5%;">၃။</td>
                                    <td style="border: none; width: 45%;">လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%; ">
                                        {{ $staff->ethnic_id ? $staff->ethnic->name : '-' }}/{{ $staff->religion_id ? $staff->religion->name : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%; ">၄။</td>
                                    <td style="border: none; width: 45%; ">အမျိုးသားမှတ်ပုံတင်အမှတ်</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%; ">
                                        {{ $staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%; ">၅။</td>
                                    <td style="border: none; width: 45%; ">အလုပ်အကိုင်နှင့် ဌာန</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%; ">
                                        {{ $staff->current_rank->name . '/' . $staff->current_department->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%; ">၆။</td>
                                    <td style="border: none; width: 45%; ">အမှုထမ်းသက်(ဝင်ရောက်သည့်နေ့စွဲ)</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%; ">{{ formatDMYmm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;  width: 5%;">၇။</td>
                                    <td style="border: none; width: 45%;">လက်ရှိနေရပ်လိပ်စာ</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 45%;">
                                        {{ $staff->current_address_street .
                                            '၊' .
                                            $staff->current_address_ward .
                                            '၊' .
                                            $staff->current_address_township_or_town->name .
                                            '၊' .
                                            $staff->current_address_region->name .
                                            '။' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၈။</td>
                                    <td style="border: none; width: 45%;">ပညာအရည်အချင်း</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 45%;">
                                        @foreach ($staff->staff_educations as $education)
                                            {{ $education->education->name . ',' }}
                                        @endforeach
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%; ">၉။</td>
                                    <td style="border: none; width: 45%; ">အဖအမည်</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%; ">{{ $staff->father_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%; ">၁၀။</td>
                                    <td style="border: none; width: 45%; ">အလုပ်အကိုင်</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%; ">{{ $staff->father_occupation }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%; ">၁၁။</td>
                                    <td style="border: none; width: 45%; ">အမိအမည်</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%;">{{ $staff->mother_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၁၂။</td>
                                    <td style="border: none; width: 45%;">အလုပ်အကိုင်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 45%;">{{ $staff->mother_occupation }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၁၃။</td>
                                    <td style="border: none; width: 45%; ">နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)</td>
                                    <td style="border: none; width: 5%; ">-</td>
                                    <td style="border: none; width: 45%; ">{{ en2mm($staff->abroads->count()) }}</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div style="margin-top: 16px;">
                        <table style="border: none;">
                            <tbody style="border: none;">
                                <tr style="border: none;">
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 45%;"></td>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 45%;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 16px;" >
                        <div class="table-wrapper" >
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: center; font-size:25px;">ကာလ</th>
                                        <th rowspan="2" style="text-align: center; font-size:25px;">နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နိုင်ငံ</th>
                                        <th rowspan="2" style="text-align: center;font-size:25px;">သွားရောက်သည့်ကိစ္စ</th>
                                        <th rowspan="2" style="text-align: center;font-size:25px;">သင်တန်းတက်<br>ခြင်းဖြစ်လျှင် <br>အကြိမ်မည်မျှဖြင့်<br>အောင်မြင်သည်</th>
                                        <th rowspan="2" style="text-align: center;font-size:25px;">မည်သည့်အစိုးရ<br>အဖွဲ့အစည်း<br>အထောက်အပံ့ဖြင့်<br>သွားရောက်သည်</th>
                                       
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; font-size:15px;">မှ</th>
                                        <th style="text-align: center; font-size:15px;">ထိ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $latestAbroads = $staff->abroads
                                        ? $staff->abroads->sortByDesc('to_date')->take(5)
                                        : [];
                                @endphp

                                @if ($latestAbroads->isNotEmpty())
                                    @foreach ($latestAbroads as $abroad)
                                        <tr>
                                            <td style="text-align: center;">{{ formatDMYmm($abroad->from_date) }}</td>
                                            <td style="text-align: center;">{{ formatDMYmm($abroad->to_date) }}</td>
                                            <td>{{ $abroad->country?->name }}</td>
                                            <td>{{ $abroad->particular }}</td>
                                            <td>{{ $abroad->training_success_count }}</td>
                                            <td>{{ $abroad->sponser }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align: center;">မရှိပါ</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="margin-top: 16px;">
                        <table style="border: none;">
                            <tbody style="border: none;">
                                <tr style="border: none;">
                                    <td style="border: none; width: 5%;">၁၄။</td>
                                    <td style="border: none; width: 45%;">ဇနီး/ခင်ပွန်း</td>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 45%;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 16px;">
                        <div class="table-wrapper" >
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center; font-size:15px;">အမည်(အခြားအမည်များရှိလျှင်လည်း ဖော်ပြရန်)</th>
                                        <th style="text-align: center; font-size:15px;">လူမျိုး/နိုင်ငံသား</th>
                                        <th style="text-align: center; font-size:15px;">အလုပ်အကိုင်နှင့်ဌာန</th>
                                        <th style="text-align: center; font-size:15px;">နေရပ်</th>
                                        <th style="text-align: center; font-size:15px;">မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($staff->spouses->isNotEmpty())
                                        @foreach ($staff->spouses as $spouse)
                                            <tr>
                                                <td>{{ $spouse->name }}</td>
                                                <td>{{ $spouse->ethnic->name . '/' . $spouse->religion->name }}</td>
                                                <td>{{ $spouse->occupation }}</td>
                                                <td>{{ $spouse->address }}</td>
                                                <td>{{ $spouse->remark }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" style="text-align: center;">မရှိပါ</td>
                                        </tr>
                                    @endif

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
                         <div style="display: flex; justify-content: flex-end;">
                            <table style="border: none; border-collapse: collapse; font-size:13px">
                              
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;"></td>
                                    <td style="border: none; width: 5%;">လက်မှတ်၊</td>
                                  
                                    <td style="border: none; width: 35%;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;"></td>
                                    <td style="border: none; width: 5%;">အမည်၊</td>
                                    <td style="border: none; width: 35%;">{{ $staff->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;"></td>
                                    <td style="border: none; width: 5%;">အဆင့်၊</td>
                                    <td style="border: none; width: 35%;">{{ $staff->current_rank->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;"></td>
                                    <td style="border: none; width: 5%;">တပ်/ ဌာန၊</td>
                                    <td style="border: none; width: 35%;">{{ $staff->current_department->name }}</td>
                                </tr>
                            </table>
                        </div>
                        

                        <table width="100%" style="border: none;">
                            <tr>
                                <td style="vertical-align: top; text-align: left; padding-right: 10px; border: none;">
                                    <p style="margin: 0; font-size: 13px;">ရက်စွဲ -
                                        {{ mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}
                                    </p>
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
