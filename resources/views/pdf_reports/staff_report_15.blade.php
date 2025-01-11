 {{-- <!DOCTYPE html>
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
                                         {{ collect([$staff->current_address_street ?? null, $staff->current_address_ward ?? null, $staff->current_address_township_or_town->name ?? null, $staff->current_address_region->name ?? null])->filter()->implode('၊') }} 
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၈။</td>
                                    <td style="border: none; width: 45%;">ပညာအရည်အချင်း</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 45%;">
                                        @foreach ($staff->staff_educations as $education)
                                        {{ collect([$education->education->name ])->filter()->implode('၊') }}
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
                                        <th colspan="2" style="text-align: center; ">ကာလ</th>
                                        <th rowspan="2" style="text-align: center; ">နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နိုင်ငံ</th>
                                        <th rowspan="2" style="text-align: center;">သွားရောက်သည့်ကိစ္စ</th>
                                        <th rowspan="2" style="text-align: center;">သင်တန်းတက်<br>ခြင်းဖြစ်လျှင် <br>အကြိမ်မည်မျှဖြင့်<br>အောင်မြင်သည်</th>
                                        <th rowspan="2" style="text-align: center;">မည်သည့်အစိုးရ<br>အဖွဲ့အစည်း<br>အထောက်အပံ့ဖြင့်<br>သွားရောက်သည်</th>
                                       
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">မှ</th>
                                        <th style="text-align: center; ">ထိ</th>
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
                                    <td style="border: none; width: 35%;">ဇနီး/ခင်ပွန်း</td>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 55%;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 16px;">
                        <div class="table-wrapper" >
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center; ">အမည်(အခြားအမည်များရှိလျှင်လည်း ဖော်ပြရန်)</th>
                                        <th style="text-align: center; ">လူမျိုး/နိုင်ငံသား</th>
                                        <th style="text-align: center; ">အလုပ်အကိုင်နှင့်ဌာန</th>
                                        <th style="text-align: center; ">နေရပ်</th>
                                        <th style="text-align: center; ">မှတ်ချက်</th>
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
                                  
                                    <td style="border: none; width: 55%;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;"></td>
                                    <td style="border: none; width: 5%;">အမည်၊</td>
                                    <td style="border: none; width: 55%;">{{ $staff->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;"></td>
                                    <td style="border: none; width: 5%;">အဆင့်၊</td>
                                    <td style="border: none; width: 55%;">{{ $staff->current_rank->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;"></td>
                                    <td style="border: none; width: 5%;">တပ်/ ဌာန၊</td>
                                    <td style="border: none; width: 55%;">{{ $staff->current_department->name }}</td>
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
</html>   --}}


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Staff Report 15</title>
     <style>
         body {
             font-family: 'tharlon', sans-serif;
             margin: 0;
             padding: 0;
         }

         table {
             width: 100%;
             border-collapse: collapse;
             margin-top: 20px;
             font-size: 20px;
             border: none;

         }

         th,
         td {
             padding: 8px;
             border: 1px solid #ccc;
             font-size: 20px;
             border: none;
         }

         th {
             text-align: left;
             font-size: 20px;
             border: none;
         }

         td {

             font-size: 20px;
             border: none;
         }

         .header {
             text-align: center;
             font-weight: bold;
             margin-bottom: 20px;
         }

         .photo {
             width: 80px;
             height: 80px;
             float: right;
             margin-left: 20px;
         }



         .table-container {
             width: 100%;
             margin-bottom: 13px;
             font-size: 20;
         }

         .table-wapper {
             width: 100%;
             border-collapse: collapse;
         }

         .thead {
             border: 1px solid black;
             padding: 8px;
             text-align: center;
             font-size: 20px;
             font-weight: bold;
         }

         .th {
             background-color: #f4f4f4;
         }

         .flex-container {
             display: flex;
             justify-content: flex-start;
             align-items: center;
             gap: 12px;
             margin-bottom: 8px;
         }

         .rounded {
             border-radius: 8px;
         }

         .bg-light {
             background-color: #f4f4f4;
         }

         .text-bold {
             font-weight: bold;
             font-size: 15px;
         }
     </style>
 </head>

 <body>
    <div style="text-align: center; font-size: 13px; margin-top: 10px;">ကိုယ်ရေးမှတ်တမ်း</div>
<table>
    <tr style="border: none;">
        <td style="border:none; text-align: right; padding: 0; width: 100%; display: flex; align-items: flex-start; justify-content: flex-end;">
            <img src="{{ $staff->staff_photo ? storage_path('app/upload/') . $staff->staff_photo : 'img/user.png' }}"
                alt="" style="width: 80px; height: 80px; margin-top: 10px;">
        </td>
    </tr>
</table>

    
     <table>
         <tr>
             <th style="width: 5%;">၁။</th>
             <td style="width: 45%;"><strong>အမည်</strong> </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;"> {{ $staff->name }}</td>
         </tr>
         <tr>
             <th style="width: 5%;">၂။</th>
             <td style="width: 45%;"><strong>အသက်(မွေးနေ့သက္ကရာဇ်)</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;"> {{ formatDMYmm($staff->dob) }}</td>
         </tr>

         <tr>
             <th style="width: 5%;">၃။</th>
             <td style="width: 45%;"><strong>လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">
                 {{ collect([$staff->ethnic_id ? $staff->ethnic->name : '-', $staff->religion_id ? $staff->religion->name : '-'])->filter()->implode('၊') }}
             </td>
         </tr>

         <tr>
             <th style="width: 5%;">၄။</th>
             <td style="width: 45%;"><strong>အမျိုးသားမှတ်ပုံတင်အမှတ်</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">
                 {{ collect([$staff->nrc_region_id->name, $staff->nrc_township_code->name, $staff->nrc_sign->name, en2mm($staff->nrc_code)])->filter()->implode('၊') }}
             </td>
         </tr>
         <tr>
             <th style="width: 5%;">၅။</th>
             <td style="width: 45%;"><strong>အလုပ်အကိုင်နှင့် ဌာန</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">
                 {{ collect([$staff->current_rank?->name, $staff->current_department?->name])->filter()->implode('၊') }}
             </td>
         </tr>
         <tr>
             <th style="width: 5%;">၆။</th>
             <td style="width: 45%;"><strong>အမှုထမ်းသက်<br>(ဝင်ရောက်သည့်နေ့စွဲ)</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;"> {{ formatDMYmm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
         </tr>
         <tr>
             <th style="width: 5%;">၇။</th>
             <td style="width: 45%;"><strong>လက်ရှိနေရပ်</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">
                 {{ implode('၊', [$staff->current_address_street, $staff->current_address_ward, $staff->current_address_township_or_town->name, $staff->current_address_region->name]); }}
             </td>
         </tr>
         <tr>
             <th style="width: 5%;">၈။</th>
             <td style="width: 45%;"><strong>ပညာအရည်အချင်း</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">
                 @foreach ($staff->staff_educations as $education)
                     {{ collect([$education->education->name])->filter()->implode('၊') }}
                 @endforeach
             </td>
         </tr>
         <tr>
             <th style="width: 5%;">၉။</th>
             <td style="width: 45%;"><strong>အဖအမည်</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;"> {{ $staff->father_name }}</td>
         </tr>
         <tr>
             <th style="width: 5%;">၁၀။</th>
             <td style="width: 45%;"><strong>အလုပ်အကိုင်</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;"> {{ $staff->father_occupation }}</td>
         </tr>
         <tr>
             <th style="width: 5%;">၁၁။</th>
             <td style="width: 45%;"><strong>အမိအမည်</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">{{ $staff->mother_name }}</td>
         </tr>
         <tr>
             <th style="width: 5%;">၁၂။</th>
             <td style="width: 45%;"><strong>အလုပ်အကိုင်</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">{{ $staff->mother_occupation }}</td>
         </tr>
         <tr>
             <th style="width: 5%;">၁၃။</th>
             <td style="width: 45%;"><strong>နိုင်ငံခြားသွားရောက်ဖူးခြင်း
                     ရှိ/မရှိ(အကြိမ်အရေအတွက်)</strong>
             </td>
             <th style="width: 5%;">-</th>
             <td style="width: 45%;">{{ en2mm($staff->abroads->count()) }}</td>
         </tr>
     </table>
     <div class="table-container">
        <div class="flex-container">
            <h2 class="font-bold"></h2>
        </div>
        <div class="rounded">
            <table class="table-wrapper">
                <thead>
                    <tr class="bg-light">
                        <th class="thead" colspan="2" style="line-height: 2;">ကာလ</th>
                        <th rowspan="2" class="thead" style="line-height: 2;">နောက်ဆုံးသွား<br>ရောက်ခဲ့သည့်<br>(၅)နိုင်ငံ</th>
                        <th rowspan="2" class="thead" style="line-height: 2;">သွားရောက်သည့်<br>ကိစ္စ</th>
                        <th rowspan="2" class="thead" style="line-height: 2;">
                            သင်တန်းတက်<br>ခြင်းဖြစ်လျှင်<br>အကြိမ်မည်မျှဖြင့်<br>အောင်မြင်သည်
                        </th>
                        <th rowspan="2" class="thead" style="line-height: 2;">
                            မည်သည့်အစိုးရ<br>အဖွဲ့အစည်း<br>အထောက်အပံ့ဖြင့်<br>သွားရောက်သည်
                        </th>
                    </tr>
                    <tr>
                        <th class="thead" style="text-align: center; line-height:2;">မှ</th>
                        <th class="thead" style="text-align: center; line-height:2;">ထိ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $latestAbroads = $staff->abroads ? $staff->abroads->sortByDesc('to_date')->take(5) : [];
                    @endphp
    
                    @if ($latestAbroads->isNotEmpty())
                        @foreach ($latestAbroads as $abroad)
                            <tr>
                                <td class="thead" style="text-align: center; line-height: 2;">{{ formatDMYmm($abroad->from_date) }}</td>
                                <td class="thead" style="text-align: center; line-height: 2;">{{ formatDMYmm($abroad->to_date) }}</td>
                                <td class="thead" style="line-height: 2;">{{ $abroad->country?->name }}</td>
                                <td class="thead" style="line-height: 2;">{{ $abroad->particular }}</td>
                                <td class="thead" style="line-height: 2;">{{ $abroad->training_success_count }}</td>
                                <td class="thead" style="line-height: 2;">{{ $abroad->sponser }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="thead" colspan="6" style="text-align: center; line-height: 2;">မရှိပါ</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
     <div class="table-container">
         <div class="flex-container">
             <h2 class="text-bold">၁၄။ဇနီး/ခင်ပွန်း</h2>
         </div>
         <div class="rounded">
             <table class="table-wapper">
                 <thead>
                     <tr class="bg-light">
                         <th class="thead" style="line-height: 2;">အမည်(အခြားအမည်များရှိလျှင်လည်းဖော်ပြရန်)</th>
                         <th class="thead" style="line-height: 2;">လူမျိုး/နိုင်ငံသား</th>
                         <th class="thead" style="line-height: 2;">အလုပ်အကိုင်နှင့်ဌာန</th>
                         <th class="thead" style="line-height: 2;">နေရပ်</th>
                         <th class="thead" style="line-height: 2;">မှတ်ချက်</th>
                     </tr>
                 </thead>
                 <tbody>

                     @if ($staff->spouses->isNotEmpty())
                         @foreach ($staff->spouses as $spouse)
                             <tr>
                                 <td class="thead" style="line-height: 2;">{{ $spouse->name }}</td>
                                 <td class="thead" style="line-height: 2;">{{ $spouse->ethnic->name . '/' . $spouse->religion->name }}</td>
                                 <td class="thead" style="line-height: 2;">{{ $spouse->occupation }}</td>
                                 <td class="thead" style="line-height: 2;">{{ $spouse->address }}</td>
                                 <td class="thead" style="line-height: 2;">{{ $spouse->remark }}</td>
                             </tr>
                         @endforeach
                     @else
                         <tr>
                             <td class="thead" colspan="5" style="text-align: center; line-height: 2;">မရှိပါ</td>
                         </tr>
                     @endif
                 </tbody>
             </table>
         </div>
     </div>

         <div style="margin-bottom: 16px; font-size: 14px;">
            <p style=" text-align:justify;  margin: 0; padding: 0;">၁၅။ အထက်ပါ အချက်အလက်များကို မှန်ကန်သည့်အတိုင်းဖြည့်သွင်းရေးသားပါကြောင်း ကိုယ်တိုင် လက်မှန်ရေးထိုးပါသည်။</p>
            <br>
                        <table style=" width: 50%; border-collapse: collapse; margin-left: auto; border:none;">
                            <tr>
                                <td style="font-size: 14px; border: none;">လက်မှတ် </td>
                                <td style="font-size: 14px; border: none;">၊</td>
                                <td style="font-size: 14px; border: none; "></td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; border: none;">အမည်</td>
                                <td style="font-size: 14px; border: none;">၊</td>
                                <td style="font-size: 14px; border: none;">{{$staff->name}}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; border: none;">အဆင့်</td>
                                <td style="font-size: 14px; border: none;">၊</td>
                                <td style="font-size: 14px; border: none;">{{$staff->current_rank->name}}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; border: none;">တပ်/ ဌာန</td>
                                <td style="font-size: 14px; border: none;">၊</td>
                                <td style="font-size: 14px; border: none;">{{ $staff->current_department->name }}</td>
                            </tr>
                      </table>
                    
                    <table style="border:none;">
                    <tr>
                    <td style=" text-align: start;  border: none;">
                        <p style="margin: 0; font-size: 14px;">ရက်စွဲ - {{  mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}</p>
                    </td>
                </tr>
            </table>
        </div>

     </div>

 </body>

 </html>
