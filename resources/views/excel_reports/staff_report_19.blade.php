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
    }

    .table-container {
        width: 100%;
        border-radius: 10px;
    }

    table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border: 1px solid black;
    }

    th {
        background-color: #f5f5f5;
    }

    .double-header th {
        border-bottom: none;
    }

    .double-header th:nth-child(1),
    .double-header th:nth-child(2) {
        border-bottom: 1px solid black;
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
                            <tr style="border: none;">
                                <td style="border:none; text-align: center; padding: 0; width: 100%">
                                    <h1 style="color: black; font-weight: 600; font-size: 14px; margin: 0;">[နည်းဥပဒေ ၃၅ (ဇ) (၄)၊ ၄၇ (စ) (၄)]
                                    </h1>
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
                                    <td style="border: none; width: 35%;">နိုင်ငံသားစိစစ်ရေးအမှတ်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၃။</td>
                                    <td style="border: none; width: 35%;">လူမျိုး/ ဘာသာ</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff?->ethnic?->name }}/{{ $staff->religion?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၄။</td>
                                    <td style="border: none; width: 35%;">မွေးဖွားရာအရပ်

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->place_of_birth }}</td>
                                </tr>

                                <tr>
                                    <td style="border: none; width: 5%;">၅။</td>
                                    <td style="border: none; width: 35%;">အဘအမည်

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->father_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၆။</td>
                                    <td style="border: none; width: 35%;">မွေးဖွားသည့် ရက်၊ လ၊ ခုနှစ်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၇။</td>
                                    <td style="border: none; width: 35%;">ကိုယ်တွင်ထင်ရှားသည့် အမှတ်အသား
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->prominent_mark }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၈။</td>
                                    <td style="border: none; width: 35%;">လက်ရှိရာထူး

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{$staff->current_rank->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၉။</td>
                                    <td style="border: none; width: 35%;">လက်ရှိနေရပ်လိပ်စာ

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name }}</td>
                                </tr>

                                <tr>
                                    <td style="border: none; width: 5%;">၁၀။</td>
                                    <td style="border: none; width: 35%;">အမြဲတမ်းနေရပ်လိပ်စာ

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">
                                        {{ $staff->permanent_address_street.'/'.$staff->permanent_address_ward.'/'.$staff->permanent_address_region->name.'/'.$staff->permanent_address_township_or_town->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၁၁။</td>
                                    <td style="border: none; width: 35%;">ပညာအရည်အချင်း

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">
                                        @foreach ($staff->staff_educations as $education)
                                           {{$education->education->name.','}}
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
                    <div class="container">
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
                    </div>

                    <div class="container">
                        <div class="section-header">
                            <label for="">၁၃။ တက်ရောက်ခဲ့သည့်သင်တန်းများ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ကျောင်း/တက္ကသိုလ်/သင်တန်း</th>
                                        <th>မှ</th>
                                        <th>ထိ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->trainings as $training)
                                        <tr>
                                            <td>{{$training->training_type->name}}</td>
                                            <td>{{$training->from_date}}</td>
                                            <td>{{$training->to_date}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header">
                            <label for="">၁၄။ ထမ်းဆောင်ခဲ့သောတာဝန်များ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>တာဝန်</th>
                                        <th>ရုံး/ ဌာန/ အဖွဲ့အစည်း</th>
                                        <th>နေ့ရက်မှ</th>
                                        <th>နေ့ရက်ထိ</th>
                                        <th>မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->past_occupations as $occupation)
                                    <tr>
                                        <td>{{$occupation->rank->name}}</td>
                                        <td>{{$occupation->department->name}}</td>
                                        <td>{{$occupation->from_date}}</td>
                                        <td>{{$occupation->to_date}}</td>
                                        <td>{{$occupation->remark}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header">
                            <label for="">၁၅။ ပါဝင်ဆောင်ရွက်ဆဲနှင့် ဆောင်ရွက်ခဲ့သည် လူမှုရေးနှင့် အစိုးရမဟုတ်သော အဖွဲ့အစည်းများ၏ အမည်နှင့်တာဝန်များ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>စဥ်</th>
                                        <th>အဖွဲ့အစည်း</th>
                                        <th>တာဝန်</th>
                                        <th>မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->past_occupations as $occupation)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$occupation->department->name}}</td>
                                        <td>{{$occupation->remark}}</td>
                                        <td>{{$occupation->remark}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header">
                            <label for="">၁၆။ ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်လက်မှတ်များ</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>စဥ်</th>
                                        <th>ဆုတံဆိပ်အမျိုးအစား</th>
                                        <th>ရက်၊ လ၊ နှစ်</th>
                                        <th>မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff->awardings as $awarding)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$awarding->award_type->name .'/'. $awarding->award->name}}</td>
                                        <td>{{$awarding->order_date}}</td>
                                        <td>{{$awarding->remark}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header">
                            <label for="">၁၇။ အပြစ်ပေးခံရခြင်းများ</label>
                        </div>
                        <div class="table-container">
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
                        </div>
                    </div>

                    <div style="margin-top: 16px;">
                        <table style="border: none;">
                            <tbody style="border: none;">
                                <tr style="border: none;">
                                    <td style="border: none; width: 5%;">၁၈။</td>
                                    <td style="border: none; width: 35%;">အခြားတင်ပြလိုသည့်အချက်များ</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-bottom: 16px; font-size: 13px;">
                        <table width="100%" style="margin-bottom: 16px; border: none;">
                            <tr style="border: none;">
                                <td style="border: none;">
                                    <p style="margin: 0; font-size: 13px;">
                                        ၁၉။ အထက်ဖော်ပြပါ ဝန်ထမ်း၏ ကိုယ်ရေးမှတ်တမ်းနှင့်ပတ်သတ်၍ မှန်ကန်စွာဖြည့်သွင်းရေးသားထားပါကြောင်းစိစစ်အတည်ပြုပါသည်
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
                                            <td style="font-size: 13px; border: none;">အဆင့် - </td>
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
