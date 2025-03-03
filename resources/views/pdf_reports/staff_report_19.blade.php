<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 19</title>
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
            /* font-size: 13px; */
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
            /* padding: 8px; */
            text-align: left;
        }

        /* th {
            background-color: #f2f2f2;
        } */






        .container {
            width: 100%;
        }
        .section {
            margin-bottom: 20px;
        }
        /* .section-header {
            display: flex;
            /* align-items: center; 
            margin-bottom: 5px;
        } */
        .section-header label {
            margin-right: 10px;
        }
        /* .section-header h1 {
            font-weight: bold;
            /* font-size: 13px; 
        } */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            /* text-align: center; */
        }
        /* thead th {
            background-color: #f0f0f0;
        } */
        .text-left {
            text-align: left;
        }


/* 
        .container {
        width: 100%;
        margin-bottom: 20px;
    }

    .section-header {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 10px;
    }

    .section-header label {
        margin-right: 10px;
    }

    .section-header h1 {
        font-weight: bold;
        font-size: 1rem;
    }*/ 


     .table-container {
        width: 100%;
        border-radius: 10px;
    } 
    /* table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    th, td {
        padding: 7px;
        border: 1px solid black;
    } */

    /* th {
        background-color: #f5f5f5;
    } */

    /* .double-header th {
        border-bottom: none;
    }

    .double-header th:nth-child(1),
    .double-header th:nth-child(2) {
        border-bottom: 1px solid black;
    } */


    
    </style>
</head>
<body >
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
                                    <h1 style="color: black; font-weight: 600; font-size: 13px; margin: 0;">ကိုယ်ရေးမှတ်တမ်း</h1>
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border:none; text-align: center; padding: 0; width: 100%">
                                    <h1 style="color: black; font-weight: 600; font-size: 13px; margin: 0;">[နည်းဥပဒေ ၃၅ (ဇ) (၄)၊ ၄၇ (စ) (၄)]
                                    </h1>
                                </td>
                            </tr>
                        </table>
                      
                        <div style="overflow-x: auto;">
                            <table style="border: none; width: 100%; table-layout: auto; border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <td style="border: none; text-align: center; font-size: 18px">၁။</td>
                                        <td style="border: none; text-align: left; font-size: 18px;">အမည်</td>
                                        <td style="border: none; text-align: center; font-size: 18px;">-</td>
                                        <td style="border: none; text-align: left; font-size: 18px;">{{ $staff->name }}</td>
                                    </tr>
                                <tr >
                                    <td style="border: none; text-align:center;  font-size: 18px;">၂။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;" >နိုင်ငံသားစိစစ်ရေးအမှတ်</td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{ $staff->nrc_region_id->name.$staff->nrc_township_code->name.$staff->nrc_sign->name.$staff->nrc_code }}</td>
                                </tr>
                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၃။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">လူမျိုး/ ဘာသာ</td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{ $staff?->ethnic?->name }}/{{ $staff->religion?->name }}</td>
                                </tr>
                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၄။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">မွေးဖွားရာအရပ်</td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{ $staff->place_of_birth }}</td>
                                </tr>

                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၅။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">အဘအမည်</td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{ $staff->father_name }}</td>
                                </tr>
                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၆။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">မွေးဖွားသည့် ရက်၊ လ၊ ခုနှစ်</td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{ formatDMYmm($staff->dob) }}</td>
                                </tr>
                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၇။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">ကိုယ်တွင်ထင်ရှားသည့် အမှတ်အသား</td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{ $staff->prominent_mark }}</td>
                                </tr>
                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၈။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">လက်ရှိရာထူး

                                    </td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{$staff->current_rank->name}}</td>
                                </tr>
                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၉။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">လက်ရှိနေရပ်လိပ်စာ

                                    </td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">{{ $staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_township_or_town->name.'မြို့နယ်၊'.$staff->current_address_region->name.'။' }}</td>
                                </tr>

                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px;">၁၀။</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">အမြဲတမ်းနေရပ်လိပ်စာ

                                    </td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">
                                        {{ $staff->permanent_address_street.'၊'.$staff->permanent_address_ward.'၊'.$staff->permanent_address_township_or_town->name.'မြို့နယ်၊'.$staff->permanent_address_region->name.'။' }}
                                    </td>
                                </tr>
                                <tr >
                                    <td style="border: none; text-align:center; font-size: 18px; ">၁၁။</td>
                                    <td style="border: none; text-align:left; font-size: 18px; ">ပညာအရည်အချင်း

                                    </td>
                                    <td style="border: none; text-align:center; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; font-size: 18px;">
                                        @foreach ($staff->staff_educations as $education)
                                           {{$education->education?->name.','}}
                                        @endforeach
                                    </td>
                                </tr>

                                <tr >
                                    <td style="border: none; text-align:center; margin:0; font-size: 18px;">၁၂။</td>
                                    <td style="border: none; text-align:left; margin:0; font-size: 18px;">တတ်မြောက်သည့်အခြားဘာသာစကားနှင့်<br>တတ်ကျွမ်းသည့်အဆင့်

                                    </td>
                                    <td style="border: none; text-align:center; margin:0; font-size: 18px;">-</td>
                                    <td style="border: none; text-align:left; margin:0; font-size: 18px;">
                                        @foreach ($staff->staff_languages as $lang)
                                        <tr>
                                            <td>{{$lang->language}}</td>
                                            <td>{{$lang->rank}}</td>
                                        </tr>
                                        @endforeach
                                    </td>
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
                    {{-- <div class="container">
                        <div class="section-header">
                            <label for="">၁၂။ တတ်မြောက်သည့်အခြားဘာသာစကားနှင့်တတ်ကျွမ်းသည့်အဆင့်</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ဘာသာစကား</th>
                                        <th>တတ်ကျွမ်းသည့်အဆင့်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->staff_languages as $lang)
                                        <tr>
                                            <td>{{$lang->language}}</td>
                                            <td>{{$lang->rank}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}

                    <div class="container">
                        <div class="section-header" style="font-size:13px;">
                            <label for="" >၁၃။ တက်ရောက်ခဲ့သည့်သင်တန်းများ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align:center; font-size:13px;">ကျောင်း/တက္ကသိုလ်/သင်တန်း</th>
                                        <th style="text-align:center; font-size:13px;">မှ</th>
                                        <th style="text-align:center; font-size:13px;">ထိ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($staff->trainings->isNotEmpty())
                                    @foreach ($staff->trainings as $training)
                                        <tr>
                                            <td style="text-align:left; font-size:13px;">{{$training->training_type_id  == 32 ? $training->diploma_name :  $training->training_type->name}}</td>
                                            <td style="text-align:center; font-size:13px;">{{formatDMYmm($training->from_date)}}</td>
                                            <td style="text-align:center; font-size:13px;">{{formatDMYmm($training->to_date)}}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header" style="font-size:13px;">
                            <label for="">၁၄။ ထမ်းဆောင်ခဲ့သောတာဝန်များ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align:center; font-size:13px;">တာဝန်</th>
                                        <th style="text-align:center; font-size:13px;">ရုံး/ ဌာန/ အဖွဲ့အစည်း</th>
                                        <th style="text-align:center; font-size:13px;">နေ့ရက်မှ</th>
                                        <th style="text-align:center; font-size:13px;">နေ့ရက်ထိ</th>
                                        <th style="text-align:center; font-size:13px;">မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($staff->past_occupations->isNotEmpty())
                                    @foreach ($staff->past_occupations as $occupation)
                                    <tr>
                                        <td style="text-align:center; font-size:13px;">{{$occupation->rank->name}}</td>
                                        <td style="text-align:center; font-size:13px;">{{$occupation->department->name}}</td>
                                        <td style="text-align:center; font-size:13px;">{{formatDMYmm($occupation->from_date)}}</td>
                                        <td style="text-align:center; font-size:13px;">{{formatDMYmm($occupation->to_date)}}</td>
                                        <td style="text-align:center; font-size:13px;">{{$occupation->remark}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header" style="font-size:13px;">
                            <label for="">၁၅။ ပါဝင်ဆောင်ရွက်ဆဲနှင့် ဆောင်ရွက်ခဲ့သည် လူမှုရေးနှင့် အစိုးရမဟုတ်သော အဖွဲ့အစည်းများ၏ အမည်နှင့်တာဝန်များ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align:center; font-size:13px;">စဉ်</th>
                                        <th style="text-align:center; font-size:13px;">အဖွဲ့အစည်း</th>
                                        <th style="text-align:center; font-size:13px;">တာဝန်</th>
                                        <th style="text-align:center; font-size:13px;">မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($staff->past_occupations->isNotEmpty())
                                    @foreach ($staff->past_occupations as $index=>$occupation)
                                    <tr>
                                        <td style="text-align:center; font-size:13px;">{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                        <td style="text-align:center; font-size:13px;">{{$occupation->department->name}}</td>
                                        <td style="text-align:center; font-size:13px;">{{$occupation->remark}}</td>
                                        <td style="text-align:center; font-size:13px;">{{$occupation->remark}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header" style="font-size:13px;">
                            <label for="">၁၆။ ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်လက်မှတ်များ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 7%; border: 1px solid #000; font-size:13px;">စဉ်</th>
                                        <th style="text-align: center; width: 53%; border: 1px solid #000; font-size:13px;">ဆုတံဆိပ်အမျိုးအစား</th>
                                        <th style="text-align: center; width: 25%; border: 1px solid #000; font-size:13px;">ရက်၊ လ၊ နှစ်</th>
                                        <th style="text-align: center; width: 15%; border: 1px solid #000; font-size:13px;">မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($staff->awardings->isNotEmpty())
                                    @foreach ($staff->awardings as $index=>$awarding)
                                    <tr>
                                        <td style="text-align:center; font-size:13px;">{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                        <td style="text-align:center; font-size:13px;">{{$awarding->award_type->name .'/'. $awarding->award->name}}</td>
                                        <td style="text-align:center; font-size:13px;">{{formatDMYmm($awarding->order_date)}}</td>
                                        <td style="text-align:center; font-size:13px;">{{$awarding->remark}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                        <td style="padding: 13px;"></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header" style="font-size:13px;">
                            <label for="">၁၇။ အပြစ်ပေးခံရခြင်းများ</label>
                            <label for="">
                                @foreach ($staff->punishments as $punishment)
                                <tr>
                                    <td class="border border-black text-center p-2 font-size:13px;">{{$loop->index + 1}}</td>
                                    <td class="border border-black text-center p-2 font-size:13px;">{{$punishment->penalty_type->name}}</td>
                                    <td class="border border-black text-center p-2 font-size:13px;">{{$punishment->reason}}</td>
                                    <td class="border border-black text-center p-2 font-size:13px;">{{$punishment->from_date}}</td>
                                    <td class="border border-black text-center p-2 font-size:13px;">{{$punishment->to_date}}</td>
                              </tr>
                            @endforeach
                            </label>
                        </div>
                        {{-- <div class="table-container">
                            <table>
                                <thead>
                                    <tr class="double-header">
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
                        </div> --}}
                    </div>

                    <div style="margin-top: 16px;">
                        <table style="border: none;">
                            <tbody style="border: none;">
                                <tr style="border: none;">
                                    <td style="border: none; width: 5%; font-size:13px;">၁၈။</td>
                                    <td style="border: none; width: 35%; font-size:13px;">အခြားတင်ပြလိုသည့်အချက်များ</td>
                                    <td style="border: none; width: 5%; font-size:13px;">-</td>
                                    <td style="border: none; width: 55%; font-size:13px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="mb-4 pt-5 w-1/2 ml-auto">
                        <label for="name" class="text-right">(ဝန်ထမ်း၏ထိုးမြဲလက်မှတ်)</label>
                    </div> --}}

                    <table style="border: none; margin-left: auto; padding-top:10px; padding-bottom:3px;">
                        <tr>
                            <td style="text-align: right; border: none;">
                                <p style="margin: 0; font-size: 13px;">(ဝန်ထမ်း၏ထိုးမြဲလက်မှတ်)</p>
                            </td>
                        </tr>
                    </table>
                    
                    
                    

                    <div style="margin-bottom: 16px; font-size: 13px;">
                                    <p style="text-align:justify;  margin: 0; padding: 0;">
                                        ၁၉။အထက်ဖော်ပြပါဝန်ထမ်း၏ကိုယ်ရေးမှတ်တမ်းနှင့်ပတ်သက်၍မှန်ကန်စွာဖြည့်သွင်းရေးသားထားပါကြောင်းစိစစ်အတည် ပြုပါသည်။
                                    </p>
                                
                        <table style="width: 50%; border-collapse: collapse; margin-left: auto; border:none;">
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
                                <td style="font-size: 13px; border: none;">အဆင့်/ ရာထူး</td>
                                <td style="font-size: 13px; border: none;">၊</td>
                                <td style="font-size: 13px; border: none;">{{$staff->current_rank->name}}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;">ရုံး/ ဌာန</td>
                                <td style="font-size: 13px; border: none;">၊</td>
                                <td style="font-size: 13px; border: none;">{{$staff->current_department?->name}}</td>
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
        </div>
    </page>
</body>
</html>
