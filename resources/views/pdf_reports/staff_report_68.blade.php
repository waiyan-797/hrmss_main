<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 68</title>
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
            margin-bottom: 1rem;
        }
        .header {
            margin-bottom: 0.5rem;
            display: flex;
            justify-content: flex-start;
            gap: 1rem;
        }
        .header label {
            font-weight: bold;
        }
        .title {
            font-weight: 600;
            font-size: 1rem;
        }
        .table-container {
            width: 100%;
            border-radius: 0.5rem;
        }
        table {
            width: 100%;
            text-align: center;
            margin-left: 2.25rem;
            border-collapse: collapse;
        }
        thead tr {
            background-color: #f0f0f0;
        }
        th, td {
            padding: 0.5rem;
            border: 1px solid black;
        }
        th {
            font-weight: bold;
        }
        tbody tr td {
            padding: 0.5rem;
        }



        .container-table {
            width: 100%;
            margin-bottom: 1rem;
        }

        .title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .table-container {
            width: 100%;
            border-radius: 0.5rem;
        }

        table {
            width: 100%;
            text-align: center;
            margin-left: 2.25rem;
            border-collapse: collapse;
        }

        td {
            padding: 0.5rem;
            border: 1px solid black;
        }

        .col-number {
            width: 3.5rem;
        }

        .col-label {
            width: 25rem;
        }

        .col-dash {
            width: 1.5rem;
        }

        .col-data {
            width: 25rem;
        }

        tbody {
            height: 2rem;
            padding: 0.5rem;
        }


        h1 {
            text-align: center;
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 20px;
        }

        h2 {
            font-weight: 600;
            font-size: 1rem;
            margin: 0;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
        }

        .section {
            width: 100%;
            margin-bottom: 20px;
        }

        .section-label {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            margin-left: 30px;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .table-header {
            background-color: #f0f0f0;
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
                                    <td style="border: none; width: 35%;">ဝန်ထမ်းအမှတ်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->staff_no }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၂။</td>
                                    <td style="border: none; width: 35%;">အမည်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->name }}</td>
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
                                    <td style="border: none;">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
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
                                    <td style="border: none;">{{ $staff->height_feet }}/{{ $staff->height_inch }}</td>
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
                                    <td style="border: none;">{{ $staff->gender->name}}</td>
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
                                    <td style="border: none;">ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
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
                                    <td style="border: none;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၂။</td>
                                    <td style="border: none;">ယခုနေရပ်လိပ်စာအပြည့်အစုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၃။</td>
                                    <td style="border: none;">အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->permanent_address_street.'/'.$staff->permanent_address_ward.'/'.$staff->permanent_address_region->name.'/'.$staff->permanent_address_township_or_town->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၄။</td>
                                    <td style="border: none;">ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ(တပ်မတော်သားဖြစ်က တပ်လိပ်စာဖော်ပြရန်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->previous_addresses }}</td>
                                </tr>
                            </tbody>
                        </table>
                               
                                <div style="margin-top: 16px;">
                                    <table style="border: none;">
                                        <tbody style="border: none;">
                                            <tr style="border: none;">
                                                <td style="border: none; width: 5%;">၂၅။</td>
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
                                <table style="border: none;">
                                    <tbody>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">အလုပ်အကိုင်
                                    </td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>

                                <tr>
                                    <td style="border: none;">၁။</td>
                                    <td style="border: none;">တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်
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
                                    <td style="border: none;">{{$staff->military_solider_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ခ)

                                    </td>
                                    <td style="border: none;">တပ်သို့ဝင်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->military_join_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဂ)
                                    </td>
                                    <td style="border: none;">ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->military_dsa_no }}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">(ဃ)
                                    </td>
                                    <td style="border: none;">ပြန်တမ်းဝင်ဖြစ်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->military_gazetted_date }}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">(င)
                                    </td>
                                    <td style="border: none;">တပ်ထွက်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->military_leave_date }}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">(စ)

                                    </td>
                                    <td style="border: none;">ထွက်သည့်အကြောင်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->military_leave_reason }}</td>
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
                                    <td style="border: none;">{{ $staff->military_brief_history_or_penalty}}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">(ဈ)
                                    </td>
                                    <td style="border: none;">အငြိမ်းစားလစာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_pension }}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">၂။
                                    </td>
                                    <td style="border: none;">ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်နိုင်ငံသားဟုတ်/မဟုတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_parents_citizen_when_staff_born  }}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">၃။
                                    </td>
                                    <td style="border: none;">ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->join_date }}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">၄။
                                    </td>
                                    <td style="border: none;">ဝန်ကြီးဌာန
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->ministry?->name}}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">၅။
                                    </td>
                                    <td style="border: none;">ဦးစီးဌာန
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
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
                                    <td style="border: none;">{{ $staff->current_rank_date }}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">၉။
                                    </td>
                                    <td style="border: none;">ပြောင်းရွေ့သည့်မှတ်ချက်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->transfer_remark}}</td>
                                </tr> 
                                <tr>
                                    <td style="border: none;">၁၀။
                                    </td>
                                    <td style="border: none;">တွဲဖက်အင်အား ဖြစ်လျှင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->side_department->name }}</td>
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
                                    <td style="border: none;">{{ $staff->is_newly_appointed }}</td>
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



                        <div class="container">
                            <div class="header">
                                <label>၁၄။ </label>
                                <h2 class="title">အလုပ်အကိုင်အတွက် ထောက်ခံသူများ</h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>ထောက်ခံသူ</th>
                                            <th>ဝန်ကြီးဌာန</th>
                                            <th>ဦးစီးဌာန</th>
                                            <th>ရာထူး</th>
                                            <th>အကြောင်းအရာ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->recommendations as $index => $recommendation)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $recommendation->recommend_by }}</td>
                                            <td>{{ $recommendation->ministry}}</td>
                                            <td>{{ $recommendation->department}}</td>
                                            <td>{{ $recommendation->rank}}</td>
                                            <td>{{ $recommendation->remark }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <div class="container">
                            <div class="header">
                                <label>၁၅။ </label>
                                <h2 class="title">ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်</h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ရာထူး/အဆင့်</th>
                                            <th>တပ်/ဌာန</th>
                                            <th>နေရာ</th>
                                            <th>မှ</th>
                                            <th>ထိ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->postings as $posting)
                                        <tr>
                                            <td>{{ $posting->rank->name ?? '-' }}</td>
                                            <td>{{ $posting->department->name ?? '-' }}</td>
                                            <td>{{ $posting->location ?? '-' }}</td>
                                            <td>{{ $posting->from_date}}</td>
                                            <td>{{ $posting->to_date }}</td>
                                        </tr>
                                    
                                    @endforeach
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
                                            <td class="col-data"> {{ $staff->father_name.'၊'.$staff->father_ethnic?->name.'၊'.$staff->father_religion?->name.'၊'.$staff->father_place_of_birth.'၊'.$staff->father_occupation }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td class="col-number">၂။</td>
                                            <td class="col-label">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</td>
                                            <td class="col-dash">-</td>
                                            <td class="col-data"> {{ $staff->father_address_street.'၊'.$staff->father_address_ward.'၊'.$staff->father_address_township_or_town?->name.'၊'.$staff->father_address_region?->name }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td class="col-number">၃။</td>
                                            <td class="col-label">အမိအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာ အလုပ်အကိုင်</td>
                                            <td class="col-dash">-</td>
                                            <td class="col-data">{{ $staff->mother_name.'၊'.$staff->mother_ethnic?->name.'၊'.$staff->mother_religion?->name.'၊'.$staff->mother_place_of_birth.'၊'.$staff->mother_occupation }}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td class="col-number">၄။</td>
                                            <td class="col-label">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</td>
                                            <td class="col-dash">-</td>
                                            <td class="col-data">{{ $staff->mother_address_street.'၊'.$staff->mother_address_ward.'၊'.$staff->mother_address_township_or_town?->name.'၊'.$staff->mother_address_region?->name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="container">
                            <div class="header">
                                <label>၅။
                                </label>
                                <h2 class="title">ညီအကိုမောင်နှမများ
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->siblings as $sibling)
                                        <tr>
                                            <td>{{ $sibling->name }}</td>
                                            <td>{{ $sibling->ethnic?->name}}၊{{ $sibling->religion?->name  }}</td>
                                            <td>{{ $sibling->place_of_birth }}</td>
                                            <td>{{ $sibling->occupation }}</td>
                                            <td>{{ $sibling->address }}</td>
                                            <td>{{ $sibling->relation->name ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="header">
                                <label>၆။
                                </label>
                                <h2 class="title">အဘ၏ညီအကိုမောင်နှမများ
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->fatherSiblings as $index => $sibling)
                                    <tr>
                                        <td>{{ $sibling->name }}</td>
                                        <td>
                                            {{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                        </td>
                                        <td>{{ $sibling->place_of_birth }}</td>
                                        <td>{{ $sibling->occupation }}</td>
                                        <td>{{ $sibling->address }}</td>
                                        <td>{{ $sibling->relation?->name }}</td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container">
                            <div class="header">
                                <label>၇။
                                </label>
                                <h2 class="title">အမိ၏ညီအကိုမောင်နှမများ
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->motherSiblings as $index => $sibling)
                                <tr>
                                    
                                    <td>{{ $sibling->name }}</td>
                                    <td>
                                        {{ $sibling->ethnic->name ?? '' }}၊{{ $sibling->religion->name ?? '' }}
                                    </td>
                                    <td>{{ $sibling->place_of_birth }}</td>
                                    <td>{{ $sibling->occupation }}</td>
                                    <td>{{ $sibling->address }}</td>
                                    <td>{{ $sibling->relation->name ?? '' }}</td>
                                </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container">
                            <div class="header">
                                <label>၈။
                                </label>
                                <h2 class="title">ဇနီး၊ခင်ပွန်း
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->spouses as $index => $spouse)
                                    <tr>
                                        
                                        <td>{{ $spouse->name }}</td>
                                        <td>
                                            {{ $spouse->ethnic->name }} / {{ $spouse->religion->name }}
                                        </td>
                                        <td>{{ $spouse->place_of_birth }}</td>
                                        <td>{{ $spouse->occupation }}</td>
                                        <td>{{ $spouse->address }}</td>
                                        <td>{{ $spouse->relation?->name }}</td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    
                        <div class="container">
                            <div class="header">
                                <label>၉။
                                </label>
                                <h2 class="title">သားသမီးများ
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->children as $index => $child)
                                        <tr>
                                            
                                            <td>{{ $child->name }}</td>
                                            <td>
                                                {{ $child->ethnic?->name }}/{{ $child->religion?->name }}
                                            </td>
                                            <td>{{ $child->place_of_birth }}</td>
                                            <td>{{ $child->occupation }}</td>
                                            <td>{{ $child->address }}</td>
                                            <td>{{ $child->relation?->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container">
                            <div class="header">
                                <label>၁၀။
                                </label>
                                <h2 class="title">ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->spouseSiblings as $index => $sibling)
                                    <tr>
                                        
                                        <td>{{ $sibling->name }}</td>
                                        <td>
                                            {{ $sibling->ethnic->name ?? '' }} / {{ $sibling->religion->name ?? '' }}
                                        </td>
                                        <td>{{ $sibling->place_of_birth }}</td>
                                        <td>{{ $sibling->occupation }}</td>
                                        <td>{{ $sibling->address }}</td>
                                        <td>{{ $sibling->relation->name ?? '' }}</td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container">
                            <div class="header">
                                <label>၁၁။
                                </label>
                                <h2 class="title">ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊ လူမျိုး၊ ဘာသာ၊ ဇာတိ၊ အလုပ်အကိုင်နှင့်နေရပ် လိပ်စာ
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->spouseFatherSiblings as $index => $sibling)
                                    <tr>
                                        
                                        <td>{{ $sibling->name }}</td>
                                        <td>
                                            {{ optional($sibling->ethnic)->name ?? ' - ' }}/{{ optional($sibling->religion)->name ?? ' - ' }}
                                        </td>
                                        <td>{{ $sibling->place_of_birth }}</td>
                                        <td>{{ $sibling->occupation }}</td>
                                        <td>{{ $sibling->address }}</td>
                                        <td>{{ optional($sibling->relation)->name ?? ' - ' }}</td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container">
                            <div class="header">
                                <label>၁၂။
                                </label>
                                <h2 class="title">ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊ လူမျိုး၊ ဘာသာ၊ ဇာတိ၊ အလုပ်အကိုင်နှင့်နေရပ် လိပ်စာ
                                </h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>လူမျိုး/ဘာသာ</th>
                                            <th>ဇာတိ</th>
                                            <th>အလုပ်အကိုင်</th>
                                            <th>နေရပ်လိပ်စာ</th>
                                            <th>တော်စပ်ပုံ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->spouseMotherSiblings as $index => $sibling)
                                    <tr>
                                        
                                        <td>{{ $sibling->name }}</td>
                                        <td>{{ $sibling->ethnic?->name }} / {{ $sibling->religion?->name }}</td>
                                        <td>{{ $sibling->place_of_birth }}</td>
                                        <td>{{ $sibling->occupation }}</td>
                                        <td>{{ $sibling->address }}</td>
                                        <td>{{ $sibling->relation?->name }}</td>
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
                                        <td style="border: none; width: 5%;">၁၃။</td>
                                        <td style="border: none; width: 35%;">မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ ညီအကိုမောင်နှမများ၊ သားသမီးများ နိုင်ငံရေးပါတီဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)
                                        </td>
                                        <td style="border: none; width: 5%;">-</td>
                                        <td style="border: none; width: 55%;">{{ $staff->family_in_politics}}</td>
                                    </tr>
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    <h1>ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်</h1>
    <div class="section">
        <div class="section-label">
            <label>၁။ </label>
            <h2>နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)</h2>
        </div>
        <div>
            <table>
                <thead>
                    <tr class="table-header">
                        <th>ရရှိခဲ့သော ဘွဲ့အမည်</th>
                        <th>ကျောင်းအမည်</th>
                        <th>မြို့</th>
                        <th>ခုနှစ်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff->schools as $school)
                                <tr>
                                    <td>{{ $school->education?->name }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    <td>{{ $school->town }}</td>
                                    <td>{{ $school->year }}</td>
                                </tr>
                           @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="section">
        <div class="section-label">
            <label>၂။ </label>
            <h2>တက်ရောက်ခဲ့သော သင်တန်းများ</h2>
        </div>
        <div>
            <table>
                <thead>
                    <tr class="table-header">
                        <th>သင်တန်းအမည်</th>
                        <th>သင်တန်းကာလ(မှ)</th>
                        <th>သင်တန်းကာလ(အထိ)</th>
                        <th>သင်တန်းနေရာ/ဒေသ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff->trainings as $training)
                    <tr>
                        <td>{{ $training->training_type->name }}</td>
                        <td>{{ $training->from_date }}</td>
                        <td>{{ $training->to_date }}</td>
                        <td>{{ $training->location }}/{{ $staff->training_location?->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="section">
        <div class="section-label">
            <label>၃။ </label>
            <h2>ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်များ</h2>
        </div>
        <div>
            <table>
                <thead>
                    <tr class="table-header">
                        <th>ဘွဲ့ထူး၊ ဂုဏ်ထူး တံဆိပ်အမည်</th>
                        <th>အမိန့်အမှတ်/ခုနှစ်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff->awardings as $awarding)
                                    <tr>
                                        <td>{{ $awarding->award_type->name ?? 'N/A' }}</td>
                                        <td>{{ $awarding->order_no }}/{{ $awarding->order_date }}</td>
                                    </tr>
                                
                                @endforeach
                               
                </tbody>
            </table>
        </div>
    </div>

    <table style="border: none;">
        <tbody>
            <tr>
                <td style="border: none; width: 5%;">၄။
                </td>
                <td style="border: none; width: 35%;">နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊ ခုံအမှတ်၊ ဘာသာရပ်အတိအကျဖော်ပြရန်
                </td>
                <td style="border: none; width: 5%;">-</td>
                <td style="border: none; width: 55%;">{{ $staff->last_school_name.'၊'.$staff->last_school_subject.'၊'.$staff->last_school_row_no.'၊'.$staff->last_school_major }}</td>
            </tr>
            <tr>
                <td style="border: none; width: 5%;">၅။
                </td>
                <td style="border: none; width: 35%;">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊ တာဝန်
                </td>
                <td style="border: none; width: 5%;">-</td>
                <td style="border: none; width: 55%;">{{ $staff->student_life_political_social }}</td>
            </tr>
            <tr>
                <td style="border: none;">၆။</td>
                <td style="border: none;">ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု

                </td>
                <td style="border: none;">-</td>
                <td style="border: none;">{{ $staff->habit }}</td>
            </tr>
           
        </tbody>
    </table>

   
    <div class="container">
        <div class="header">
            <label>၇။
            </label>
            <h2 class="title">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်
            </h2>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>အမည်</th>
                        <th>ဦးစီးဌာန</th>
                        <th>ဝန်ကြီးဌာန</th>
                        <th>မှ</th>
                        <th>ထိ</th>
                        <th>မှတ်ချက်
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff->postings as $posting)
                    <tr>
                        <td>{{ $posting->staff->name ?? '' }}</td>
                        <td>{{ $posting->department->name ?? '' }}</td>
                        <td>{{ $posting->ministry->name ?? '' }}</td>
                        <td>{{ $posting->from_date }}</td>
                        <td>{{ $posting->to_date}}</td>
                        <td>{{ $posting->remark }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <table style="border: none;">
        <tbody>
            <tr>
                <td style="border: none; width: 5%;">၈။
                </td>
                <td style="border: none; width: 35%;">တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြရန်
                </td>
                <td style="border: none; width: 5%;">-</td>
                <td style="border: none; width: 55%;">{{ $staff->revolution }}</td>
            </tr>
            <tr>
                <td style="border: none; width: 5%;">၉။
                </td>
                <td style="border: none; width: 35%;">အလုပ်အကိုင် ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိူးနှင့်လစာ
                </td>
                <td style="border: none; width: 5%;">-</td>
                <td style="border: none; width: 55%;">{{ $staff->transfer_reason_salary }}</td>
            </tr>
            <tr>
                <td style="border: none;">၁၀။
                </td>
                <td style="border: none;">အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊ မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ် အသင်း အဆင့်အတန်းနှင့်တာဝန်

                </td>
                <td style="border: none;">-</td>
                <td style="border: none;">{{ $staff->during_work_political_social }}</td>
            </tr>
            <tr>
                <td style="border: none;">၁၁။
                </td>
                <td style="border: none;">စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများရှိ/ မရှိ
                </td>
                <td style="border: none;">-</td>
                <td style="border: none;">{{ $staff->has_military_friend }}</td>
            </tr>
        </tbody>
    </table>

    <div class="container">
        <div class="header">
            <label>၁၂။
            </label>
            <h2 class="title">နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်
            </h2>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>သွားရောက်ခဲ့သည့်နိုင်ငံ</th>
                        <th>သွားရောက်ခဲ့သည့်အကြောင်း</th>
                        <th>တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန</th>
                        <th>သွား၊ ပြန်သည့်နေ့
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff->abroads as $abroad)
                    <tr>
                        <td>{{ $abroad->country->name ?? 'N/A' }}</td>
                        <td>{{ $abroad->particular }}</td>
                        <td>{{ $abroad->meet_with }}</td>
                        <td>
                            {{ $abroad->from_date  }} -
                            {{ $abroad->to_date  }}
                        </td>
                    </tr>
                
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <table style="border: none;">
        <tbody>
            <tr>
                <td style="border: none; width: 5%;">၁၃။
                </td>
                <td style="border: none; width: 35%;">မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက မည်သည့် အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ ရင်းနှီးသည်

                </td>
                <td style="border: none; width: 5%;">-</td>
                <td style="border: none; width: 55%;">{{ $staff->foreigner_friend_name.'၊'.$staff->foreigner_friend_occupation.'၊'.$staff->foreigner_friend_nationality?->name.'၊'.$staff->foreigner_friend_country?->name.'၊'.$staff->foreigner_friend_how_to_know }}</td>
            </tr>
            <tr>
                <td style="border: none; width: 5%;">၁၄။
                </td>
                <td style="border: none; width: 35%;">မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက်အရာရှိ/ မြို့နယ်/ ကျေးရွာ/ ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)
                </td>
                <td style="border: none; width: 5%;">-</td>
                <td style="border: none; width: 55%;">{{ $staff->recommended_by_military_person }}</td>
            </tr>
            
        </tbody>
    </table>

    <div class="container">
        <div class="header">
            <label>၁၅။
            </label>
            <h2 class="title">ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ
            </h2>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ပြစ်ဒဏ်</th>
                        <th>ပြစ်ဒဏ်ချမှတ်ခံရသည့်အကြောင်းအရင်း</th>
                        <th>မှ</th>
                        <th>ထိ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff->punishments as $punishment)
                    <tr>
                        <td>{{ $punishment->penalty_type->name ?? 'N/A' }}</td>
                        <td>{{ $punishment->reason }}</td>
                        <td>{{ $punishment->from_date }}</td>
                        <td>{{ $punishment->to_date }}</td>
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
                                                <td style="font-size: 13px; border: none;">ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်)
                                                    -</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်
                                                  
                                                    -</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အဆင့်/ရာထူး
                                                    - </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">အမည် -</td>
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
