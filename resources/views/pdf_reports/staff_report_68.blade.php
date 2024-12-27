<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 68</title>
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
            font-family: 'tharlon', sans-serif !important;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
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

        .title {
            text-align: center;
            font-size: 13px;
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
                        <div style="font-size: 40px; line-height: 1.5;">
                        <table style=" font-size: 40px; width: 100%; border: none;" > 
                            <tbody>
                                <tr>
                                    <td style="border: none;">၁။</td>
                                    <td style="border: none; ">ကိုယ်ပိုင်အမှတ်
                                    </td>
                                    <td style="border: none; ">-</td>
                                    <td style="border: none; ">{{ $staff->staff_no }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂။</td>
                                    <td style="border: none; ">အမည်</td>
                                    <td style="border: none; ">-</td>
                                    <td style="border: none; ">{{ $staff->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။</td>
                                    <td style="border: none;">ငယ်အမည်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->nick_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။</td>
                                    <td style="border: none;">အခြားအမည်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->other_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။</td>
                                    <td style="border: none;">မွေးသက္ကရာဇ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        {{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-Y')) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">လူမျိုး
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->ethnic->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၇။</td>
                                    <td style="border: none;">ဘာသာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->religion?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">အရပ်အမြင့်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ en2mm($staff->height_feet).'ပေ'.en2mm($staff->height_inch).'လက်မ' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၉။</td>
                                    <td style="border: none;">ဆံပင်အရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->hair_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၀။</td>
                                    <td style="border: none;">မျက်စိအရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->eye_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၁။</td>
                                    <td style="border: none;">ထင်ရှားသည့်အမှတ်အသား
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->prominent_mark }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၂။</td>
                                    <td style="border: none;">အသားအရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->skin_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၃။</td>
                                    <td style="border: none;">ကိုယ်အလေးချိန်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->weight }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၄။</td>
                                    <td style="border: none;">မွေးဖွားရာဇာတိ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->place_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၅။</td>
                                    <td style="border: none;">ကျား/မ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->gender->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၆။</td>
                                    <td style="border: none;">သွေးအုပ်စု
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->blood_type->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၇။</td>
                                    <td style="border: none;">ဖုန်းနံပါတ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->phone }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၈။</td>
                                    <td style="border: none;">ရုံး
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        ရင်းနှီးမြှပ်နှံမှုနှင့်နှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၉။</td>
                                    <td style="border: none;">လက်ကိုင်ဖုန်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->mobile }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၀။</td>
                                    <td style="border: none;">အီး‌မေးလ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->email }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၁။</td>
                                    <td style="border: none;">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        {{ $staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၂။</td>
                                    <td style="border: none;">ယခုနေရပ်လိပ်စာအပြည့်အစုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        {{ $staff->current_address_street . '၊' . $staff->current_address_ward . '၊' . $staff->current_address_township_or_town->name.'၊'. $staff->current_address_region->name . '။'   }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၃။</td>
                                    <td style="border: none;">အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        {{ $staff->permanent_address_street . '၊' . $staff->permanent_address_ward . '၊' . $staff->permanent_address_township_or_town->name.'၊'.$staff->permanent_address_region->name . '။'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၄။</td>
                                    <td style="border: none;">
                                        ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ<br>(တပ်မတော်သားဖြစ်က
                                        တပ်လိပ်စာဖော်ပြရန်မလို)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->previous_addresses }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၅။</td>
                                    <td style="border: none;">ပညာအရည်အချင်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                        @foreach ($staff->staff_educations as $education)
                                            {{ $education->education->name . ',' }}
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">
                                    </td>
                                    <td style="border: none;"></td>
                                    <td style="border: none; font-weight: bold;">အလုပ်အကိုင်</td>
                                </tr>

                                <tr>
                                    <td style="border: none;">၁။</td>
                                    <td style="border: none;">တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/<br>တပ်မတော်သားဖြစ်လျှင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(က)
                                    </td>
                                    <td style="border: none;">ကိုယ်ပိုင်အမှတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_solider_no }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ခ)

                                    </td>
                                    <td style="border: none;">တပ်သို့ဝင်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ formatDMYmm($staff->military_join_date) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဂ)
                                    </td>
                                    <td style="border: none;">ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_dsa_no }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဃ)
                                    </td>
                                    <td style="border: none;">ပြန်တမ်းဝင်ဖြစ်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ formatDMYmm($staff->military_gazetted_date) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(င)
                                    </td>
                                    <td style="border: none;">တပ်ထွက်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ formatDMYmm($staff->military_leave_date) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(စ)

                                    </td>
                                    <td style="border: none;">ထွက်သည့်အကြောင်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_leave_reason }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဆ)
                                    </td>
                                    <td style="border: none;">အမှုထမ်းဆောင်ခဲ့သောတပ်များ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_served_army }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဇ)
                                    </td>
                                    <td style="border: none;">တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_brief_history_or_penalty }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဈ)
                                    </td>
                                    <td style="border: none;">အငြိမ်းစားလစာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ en2mm($staff->military_pension) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂။
                                    </td>
                                    <td style="border: none;">ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်<br>နိုင်ငံသားဟုတ်/မဟုတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_parents_citizen_when_staff_born ? 'ဟုတ်':'မဟုတ်' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။
                                    </td>
                                    <td style="border: none;">ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ formatDMYmm($staff->join_date) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။
                                    </td>
                                    <td style="border: none;">ဝန်ကြီးဌာန
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->ministry?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။
                                    </td>
                                    <td style="border: none;">ဦးစီးဌာန
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။
                                    </td>
                                    <td style="border: none;">လစာဝင်ငွေ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->payscale->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၇။
                                    </td>
                                    <td style="border: none;">လက်ရှိအလုပ်အကိုင်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_rank->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၈။
                                    </td>
                                    <td style="border: none;">လက်ရှိရာထူးရသည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ formatDMYmm($staff->current_rank_date) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၉။
                                    </td>
                                    <td style="border: none;">ပြောင်းရွေ့သည့်မှတ်ချက်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->transfer_remark }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၀။
                                    </td>
                                    <td style="border: none;">တွဲဖက်အင်အား ဖြစ်လျှင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->side_department?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၁။
                                    </td>
                                    <td style="border: none;">လစာနှင့် စရိတ်ကျခံမည့်ဌာန
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->salary_paid_by }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၂။
                                    </td>
                                    <td style="border: none;">လက်ရှိ အလုပ်အကိုင်ရလာပုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_direct_appointed }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၃။
                                    </td>
                                    <td style="border: none;">ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_direct_appointed }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%">၁၄။</td>
                                        <td style="border: none; width: 45%">အလုပ်အကိုင်အတွက် ထောက်ခံသူများ</td>
                                        <td style="border: none; width: 5%"></td>
                                        <td style="border: none; width: 45%"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper" style="font-size: 13px;">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ထောက်ခံသူ
                                            </th>
                                            <th style="text-align: center;">ဝန်ကြီးဌာန</th>
                                            <th style="text-align: center;">ဦးစီးဌာန</th>
                                            <th style="text-align: center;">ရာထူး</th>
                                            <th style="text-align: center;">အကြောင်းအရာ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->recommendations->isNotEmpty())
                                            @foreach ($staff->recommendations as $recommendation)
                                                <tr>
                                                    <td>{{ $recommendation->recommend_by }}</td>
                                                    <td>{{ $recommendation->ministry }}</td>
                                                    <td>{{ $recommendation->department }}</td>
                                                    <td>{{ $recommendation->rank }}
                                                    </td>
                                                    <td>{{ $recommendation->remark }}
                                                    </td>

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


                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%">၁၅။</td>
                                        <td style="border: none; width: 45%">ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်</td>
                                        <td style="border: none; width: 5%"></td>
                                        <td style="border: none; width: 45%"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ရာထူး/အဆင့်
                                            </th>
                                            <th style="text-align: center;">တပ်/ဌာန</th>
                                            <th style="text-align: center;">နေရာ</th>
                                            <th style="text-align: center;">မှ</th>
                                            <th style="text-align: center;">ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->postings->isNotEmpty())
                                            @foreach ($staff->postings as $posting)
                                                <tr>
                                                    <td>{{ $posting->rank->name ?? '-' }}</td>
                                                    <td>{{ $posting->department->name ?? '-' }}</td>
                                                    <td>{{ $posting->location ?? '-' }}</td>
                                                    <td>{{ formatDMYmm($posting->from_date) }}
                                                    </td>
                                                    <td>{{ formatDMYmm($posting->to_date) }}
                                                    </td>

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





                        <div class="container-table">
                            <h1 class="title">မိဘဆွေမျိုးများ</h1>
                            <div class="table-container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="col-number">၁။</td>
                                            <td class="col-label">အဘအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာ အလုပ်အကိုင်</td>
                                            <td class="col-dash">-</td>
                                            <td class="col-data">
                                                {{ $staff->father_name . '၊' . $staff->father_ethnic?->name . '၊' . $staff->father_religion?->name . '၊' . $staff->father_place_of_birth . '၊' . $staff->father_occupation }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td class="col-number">၂။</td>
                                            <td class="col-label">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</td>
                                            <td class="col-dash">-</td>
                                            <td class="col-data">
                                                {{ $staff->father_address_street . '၊' . $staff->father_address_ward . '၊' . $staff->father_address_township_or_town?->name . '၊' . $staff->father_address_region?->name }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td class="col-number">၃။</td>
                                            <td class="col-label">အမိအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာ အလုပ်အကိုင်</td>
                                            <td class="col-dash">-</td>
                                            <td class="col-data">
                                                {{ $staff->mother_name . '၊' . $staff->mother_ethnic?->name . '၊' . $staff->mother_religion?->name . '၊' . $staff->mother_place_of_birth . '၊' . $staff->mother_occupation }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td class="col-number">၄။</td>
                                            <td class="col-label">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</td>
                                            <td class="col-dash">-</td>
                                            <td class="col-data">
                                                {{ $staff->mother_address_street . '၊' . $staff->mother_address_ward . '၊' . $staff->mother_address_township_or_town?->name . '၊' . $staff->mother_address_region?->name }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%;">၅။</td>
                                        <td style="border: none; width: 35%;">ညီအကိုမောင်နှမများ</td>
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
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->siblings->isNotEmpty())
                                            @foreach ($staff->siblings as $sibling)
                                                <tr>
                                                    <td>{{ $sibling->name }}</td>
                                                    <td>{{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                                    </td>
                                                    <td>{{ $sibling->place_of_birth }}</td>
                                                    <td>{{ $sibling->occupation }}
                                                    </td>
                                                    <td>{{ $sibling->address }}
                                                    </td>
                                                    <td>{{ $sibling->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none; width: 5%;">၆။</td>
                                        <td style="border: none; width: 35%;">အဘ၏ညီအကိုမောင်နှမများ</td>
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
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->fatherSiblings->isNotEmpty())
                                            @foreach ($staff->fatherSiblings as $sibling)
                                                <tr>
                                                    <td>{{ $sibling->name }}</td>
                                                    <td>{{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                                    </td>
                                                    <td>{{ $sibling->place_of_birth }}</td>
                                                    <td>{{ $sibling->occupation }}
                                                    </td>
                                                    <td>{{ $sibling->address }}
                                                    </td>
                                                    <td>{{ $sibling->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none; width: 5%;">၇။</td>
                                        <td style="border: none; width: 35%;">အမိ၏ညီအကိုမောင်နှမများ</td>
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
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->motherSiblings->isNotEmpty())
                                            @foreach ($staff->motherSiblings as $sibling)
                                                <tr>
                                                    <td>{{ $sibling->name }}</td>
                                                    <td>{{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                                    </td>
                                                    <td>{{ $sibling->place_of_birth }}</td>
                                                    <td>{{ $sibling->occupation }}
                                                    </td>
                                                    <td>{{ $sibling->address }}
                                                    </td>
                                                    <td>{{ $sibling->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none; width: 5%;">၈။</td>
                                        <td style="border: none; width: 35%;">ဇနီး၊ခင်ပွန်း</td>
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
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->spouses->isNotEmpty())
                                            @foreach ($staff->spouses as $spouse)
                                                <tr>
                                                    <td>{{ $spouse->name }}</td>
                                                    <td>{{ $spouse->ethnic?->name }}၊{{ $spouse->religion?->name }}
                                                    </td>
                                                    <td>{{ $spouse->place_of_birth }}</td>
                                                    <td>{{ $spouse->occupation }}
                                                    </td>
                                                    <td>{{ $spouse->address }}
                                                    </td>
                                                    <td>{{ $spouse->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none; width: 5%;">၉။</td>
                                        <td style="border: none; width: 35%;">သားသမီးများ</td>
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
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->children->isNotEmpty())
                                            @foreach ($staff->children as $child)
                                                <tr>
                                                    <td>{{ $child->name }}</td>
                                                    <td>{{ $child->ethnic?->name }}၊{{ $child->religion?->name }}</td>
                                                    <td>{{ $child->place_of_birth }}</td>
                                                    <td>{{ $child->occupation }}
                                                    </td>
                                                    <td>{{ $child->address }}
                                                    </td>
                                                    <td>{{ $child->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none; width: 5%">၁၀။</td>
                                        <td style="border: none; width: 45% ">ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ</td>
                                        <td style="border: none; width: 5%"></td>
                                        <td style="border: none; width: 45%"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->spouseSiblings->isNotEmpty())
                                            @foreach ($staff->spouseSiblings as $sibling)
                                                <tr>
                                                    <td>{{ $sibling->name }}</td>
                                                    <td>{{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                                    </td>
                                                    <td>{{ $sibling->place_of_birth }}</td>
                                                    <td>{{ $sibling->occupation }}
                                                    </td>
                                                    <td>{{ $sibling->address }}
                                                    </td>
                                                    <td>{{ $sibling->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none; ">၁၁။</td>
                                        <td style="border: none; ">ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊
                                            လူမျိုး၊ ဘာသာ၊ ဇာတိ၊ အလုပ်အကိုင်နှင့်နေရပ် လိပ်စာ</td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->spouseFatherSiblings->isNotEmpty())
                                            @foreach ($staff->spouseFatherSiblings as $sibling)
                                                <tr>
                                                    <td>{{ $sibling->name }}</td>
                                                    <td>{{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                                    </td>
                                                    <td>{{ $sibling->place_of_birth }}</td>
                                                    <td>{{ $sibling->occupation }}
                                                    </td>
                                                    <td>{{ $sibling->address }}
                                                    </td>
                                                    <td>{{ $sibling->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none;">၁၂။</td>
                                        <td style="border: none; ">ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊
                                            လူမျိုး၊ ဘာသာ၊ ဇာတိ၊ အလုပ်အကိုင်နှင့်နေရပ် လိပ်စာ</td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">လူမျိုး/ဘာသာ</th>
                                            <th style="text-align: center;">ဇာတိ</th>
                                            <th style="text-align: center;">အလုပ်အကိုင်</th>
                                            <th style="text-align: center;">နေရပ်လိပ်စာ</th>
                                            <th style="text-align: center;">တော်စပ်ပုံ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->spouseMotherSiblings->isNotEmpty())
                                            @foreach ($staff->spouseMotherSiblings as $sibling)
                                                <tr>
                                                    <td>{{ $sibling->name }}</td>
                                                    <td>{{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                                    </td>
                                                    <td>{{ $sibling->place_of_birth }}</td>
                                                    <td>{{ $sibling->occupation }}
                                                    </td>
                                                    <td>{{ $sibling->address }}
                                                    </td>
                                                    <td>{{ $sibling->relation->name ?? '' }}
                                                    </td>

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
                                        <td style="border: none; width: 10%;">၁၃။</td>
                                        <td style="border: none; width: 35%;">
                                            မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ ညီအကိုမောင်နှမများ၊
                                            သားသမီးများ နိုင်ငံရေးပါတီဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက
                                            အသေးစိတ်ဖော်ပြရန်)
                                        </td>
                                        <td style="border: none; width: 5%;">-</td>
                                        <td style="border: none; width: 55%;">
                                            {{ $staff->family_in_politics ? 'ရှိ' : 'မရှိ' }}</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <h1 class="title">ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်</h1>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%;">၁။</td>
                                        <td style="border: none; width: 95%;">နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊
                                            သက္ကရာဇ်ဖော်ပြရန်)</td>
                                        <td style="border: none;"></td>
                                        <td style="border: none; "></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ရရှိခဲ့သော ဘွဲ့အမည်
                                            </th>
                                            <th style="text-align: center;">ကျောင်းအမည်</th>
                                            <th style="text-align: center;">မြို့</th>
                                            <th style="text-align: center;">ခုနှစ်</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->schools->isNotEmpty())
                                            @foreach ($staff->schools as $school)
                                                <tr>
                                                    <td>{{ $school->education?->name }}</td>
                                                    <td>{{ $school->school_name }}</td>
                                                    <td>{{ $school->town }}</td>
                                                    <td>{{ $school->year }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" style="text-align: center;">မရှိပါ</td>
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
                                        <td style="border: none; width: 5%;">၂။</td>
                                        <td style="border: none; width: 95%;">တက်ရောက်ခဲ့သော သင်တန်းများ</td>
                                        <td style="border: none; "></td>
                                        <td style="border: none;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">သင်တန်းအမည်
                                            </th>
                                            <th style="text-align: center;">သင်တန်းကာလ(မှ)</th>
                                            <th style="text-align: center;">သင်တန်းကာလ(အထိ)</th>
                                            <th style="text-align: center;">သင်တန်းနေရာ/ဒေသ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->trainings->isNotEmpty())
                                            @foreach ($staff->trainings as $training)
                                                <tr>
                                                    <td>{{ $training->training_type->name }}</td>
                                                    <td>{{ formatDMYmm($training->from_date) }}</td>
                                                    <td>{{ formatDMYmm($training->to_date) }}</td>
                                                    <td>{{ $training->location }}/{{ $staff->training_location?->name }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" style="text-align: center;">မရှိပါ</td>
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
                                        <td style="border: none; width: 5%;">၃။</td>
                                        <td style="border: none; width: 95%;">ချီးမြှင့်ခံရသည့်
                                            ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်များ</td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ဘွဲ့ထူး၊ ဂုဏ်ထူး တံဆိပ်အမည်
                                            </th>
                                            <th style="text-align: center;">အမိန့်အမှတ်/ခုနှစ်</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->awardings->isNotEmpty())
                                            @foreach ($staff->awardings as $awarding)
                                                <tr>
                                                    <td>{{ $awarding->award_type->name ?? '-' }}</td>
                                                    <td>{{ $awarding->order_no }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2" style="text-align: center;">မရှိပါ</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၄။
                                    </td>
                                    <td style="border: none; width: 35%;">နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊
                                        ခုံအမှတ်၊ ဘာသာရပ်အတိအကျဖော်ပြရန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">
                                        {{ $staff->last_school_name . '၊' . $staff->last_school_subject . '၊' . $staff->last_school_row_no . '၊' . $staff->last_school_major }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၅။
                                    </td>
                                    <td style="border: none; width: 35%;">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး
                                        ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊ တာဝန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->student_life_political_social }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၆။</td>
                                    <td style="border: none; width: 35%;">ဝါသနာပါပြီး၊
                                        လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊
                                        ပညာရေးစက်မှုလက်မှု

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->habit }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%;">၇။</td>
                                        <td style="border: none; width: 35%;">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်</td>
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
                                            <th style="text-align: center;">အမည်
                                            </th>
                                            <th style="text-align: center;">ဦးစီးဌာန</th>
                                            <th style="text-align: center;">ဝန်ကြီးဌာန</th>
                                            <th style="text-align: center;">မှ</th>
                                            <th style="text-align: center;">ထိ</th>
                                            <th style="text-align: center;">မှတ်ချက်</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->postings->isNotEmpty())
                                            @foreach ($staff->postings as $posting)
                                                <tr>
                                                    <td>{{ $posting->staff->name ?? '' }}</td>
                                                    <td>{{ $posting->department->name ?? '' }}</td>
                                                    <td>{{ $posting->ministry->name ?? '' }}</td>
                                                    <td>{{ formatDMYmm($posting->from_date) }}
                                                    </td>
                                                    <td>{{ formatDMYmm($posting->to_date) }}
                                                    </td>
                                                    <td>{{ $posting->remark }}
                                                    </td>

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


                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၈။
                                    </td>
                                    <td style="border: none; width: 35%;">
                                        တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင်
                                        နေခဲ့ဖူးလျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြရန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->revolution }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၉။
                                    </td>
                                    <td style="border: none; width: 35%;">အလုပ်အကိုင်
                                        ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိူးနှင့်လစာ
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->transfer_reason_salary }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၀။
                                    </td>
                                    <td style="border: none;">
                                        အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊ မြို့/ရွာရေး
                                        ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ် အသင်း အဆင့်အတန်းနှင့်တာဝန်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->during_work_political_social }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၁။
                                    </td>
                                    <td style="border: none;">စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင်
                                        ခင်မင်ရင်းနှီးသော မိတ်ဆွေများရှိ/ မရှိ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->has_military_friend ?'ရှိ':'မရှိ' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%;">၁၂။</td>
                                        <td style="border: none; width: 95%;">နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်</td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">သွားရောက်ခဲ့သည့်နိုင်ငံ
                                            </th>
                                            <th style="text-align: center;">သွားရောက်ခဲ့သည့်အကြောင်း</th>
                                            <th style="text-align: center;">တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊လူပုဂ္ဂိုလ်၊ဌာန</th>
                                            <th style="text-align: center;">သွား၊ ပြန်သည့်နေ့</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->abroads->isNotEmpty())
                                            @foreach ($staff->abroads as $abroad)
                                                <tr>
                                                    <td>{{ $abroad->country->name ?? '-' }}</td>
                                                    <td>{{ $abroad->particular }}</td>
                                                    <td>{{ $abroad->meet_with }}</td>
                                                    <td>{{ formatDMYmm($abroad->from_date) }} -
                                                        {{ formatDMYmm($abroad->to_date) }}
                                                    </td>
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

                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၁၃။
                                    </td>
                                    <td style="border: none; width: 35%;">မိမိနှင့်ခင်မင်ရင်းနှီးသော
                                        နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက မည်သည့် အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊
                                        မည်ကဲ့သို့ ရင်းနှီးသည်

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">
                                        {{ $staff->foreigner_friend_name . '၊' . $staff->foreigner_friend_occupation . '၊' . $staff->foreigner_friend_nationality?->name . '၊' . $staff->foreigner_friend_country?->name . '၊' . $staff->foreigner_friend_how_to_know }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၁၄။
                                    </td>
                                    <td style="border: none; width: 35%;">မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ်
                                        (စစ်ဘက်/နယ်ဘက်အရာရှိ/ မြို့နယ်/ ကျေးရွာ/ ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">
                                        {{ $staff->recommended_by_military_person }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <table style="border: none;">
                                <tbody style="border: none;">
                                    <tr style="border: none;">
                                        <td style="border: none; width: 5%;">၁၅။</td>
                                        <td style="border: none; width: 95%;">ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ</td>
                                        <td style="border: none;"></td>
                                        <td style="border: none;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 16px;">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ပြစ်ဒဏ်
                                            </th>
                                            <th style="text-align: center;">ပြစ်ဒဏ်ချမှတ်ခံရသည့်အကြောင်းအရင်း</th>
                                            <th style="text-align: center;">မှ</th>
                                            <th style="text-align: center;">ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($staff->punishments->isNotEmpty())
                                            @foreach ($staff->punishments as $punishment)
                                                <tr>
                                                    <td>{{ $punishment->penalty_type->name ?? '-' }}</td>
                                                    <td>{{ $punishment->reason }}</td>
                                                    <td>{{ formatDMYmm($punishment->from_date) }}
                                                    </td>
                                                    <td>{{ formatDMYmm($punishment->to_date) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" style="text-align: center;">မရှိပါ</td>
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
                                            အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား
                                            မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <div style="display: flex; justify-content: flex-end;">
                                <table style="border: none; border-collapse: collapse;">
                                  
                                    <tr>
                                        <td style="border: none; width: 5%;"></td>
                                        <td style="border: none; width: 35%;"></td>
                                        <td style="border: none; width: 5%;">လက်မှတ်၊</td>
                                      
                                        <td style="border: none; width: 35%;"></td>
                                    </tr>
                                    <tr>
                                        <td style="border: none; width: 5%;"></td>
                                        <td style="border: none; width: 35%;"></td>
                                        <td style="border: none; width: 5%;">ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်)၊</td>
                                      
                                        <td style="border: none; width: 35%;">{{ $staff->military_solider_no }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: none; width: 5%;"></td>
                                        <td style="border: none; width: 35%;"></td>
                                        <td style="border: none; width: 5%;">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်၊</td>
                                      
                                        <td style="border: none; width: 35%;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .  $staff->nrc_sign->name .  $staff->nrc_code }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: none; width: 5%;"></td>
                                        <td style="border: none; width: 35%;"></td>
                                        <td style="border: none; width: 5%;">အဆင့်/ရာထူး</td>
                                        <td style="border: none; width: 35%;">{{ $staff->current_rank->name }}</td>
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
