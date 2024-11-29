<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 53</title>
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
            margin-left: 16px;
        }

        .section {
            width: 100%;
            margin-bottom: 16px;
        }

        .section-title {
            margin-bottom: 8px;
            display: flex;
            justify-content: start;
            gap: 8px;
        }

        .table-container {
            width: 100%;
            border-radius: 8px;
        }

        .table {
            width: 100%;
            margin-left: 32px;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .thead-bg {
            background-color: #f0f0f0;
        }

        .text-center {
            text-align: center;
        }

        .p-8 {
            padding: 8px;
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
                                    <td style="border: none; width: 35%;">ငယ်အမည်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->nick_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၃။</td>
                                    <td style="border: none; width: 35%;">အခြားအမည်

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->other_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။</td>
                                    <td style="border: none;">အသက်(မွေးနေ့သက္ကရာဇ်)</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။</td>
                                    <td style="border: none;">လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->ethnic->name }}/{{ $staff->religion?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">အရပ်အမြင့်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->height_feet }}/{{ $staff->height_inch }}</td>
                                   
                                </tr>
                                <tr>
                                    <td style="border: none;">၇။</td>
                                    <td style="border: none;">ဆံပင်အရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->hair_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">မျက်စိအရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->eye_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၉။</td>
                                    <td style="border: none;">ထင်ရှားသည့်အမှတ်အသား

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->prominent_mark }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၀။</td>
                                    <td style="border: none;">အသားအရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->skin_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၁။</td>
                                    <td style="border: none;">ကိုယ်အလေးချိန်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->weight }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၂။</td>
                                    <td style="border: none;">မွေးဖွားရာဇာတိ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->place_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၃။</td>
                                    <td style="border: none;">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                                </tr>

                                <tr>
                                    <td style="border: none;">၁၄။</td>
                                    <td style="border: none;">ယခုနေရပ်လိပ်စာအပြည့်အစုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၅။</td>
                                    <td style="border: none;">အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->permanent_address_street.'/'.$staff->permanent_address_ward.'/'.$staff->permanent_address_region->name.'/'.$staff->permanent_address_township_or_town->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၆။</td>
                                    <td style="border: none;">ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ(တပ်မတော်သားဖြစ်က တပ်လိပ်စာ ဖော်ပြရန်မလိုပါ)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->previous_addresses }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၇။</td>
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
                                    <td style="border: none;">{{ $staff->military_solider_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ခ)
                                    </td>
                                    <td style="border: none;">တပ်သို့ဝင်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_join_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဂ)
                                    </td>
                                    <td style="border: none;">ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_dsa_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(ဃ)
                                    </td>
                                    <td style="border: none;">ပြန်တမ်းဝင်ဖြစ်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_gazetted_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">(င)
                                    </td>
                                    <td style="border: none;">တပ်ထွက်သည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_leave_date}}</td>
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
                                    <td style="border: none;">{{ $staff->military_pension }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၈။ 
                                    </td>
                                    <td style="border: none;">ပညာအရည်အချင်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"> @foreach ($staff->staff_educations as $education)
                                            {{$education->education->name.','}}
                                    @endforeach</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div class="section">
                            <div class="section-title">
                                <label>၁၈။ </label>
                                <h2 class="text-base">ပညာအရည်အချင်း</h2>
                            </div>
                            <div class="table-container">
                                <table class="table">
                                    <thead class="thead-bg">
                                        <tr>
                                            <th>Education Group</th>
                                            <th>Education Type</th>
                                            <th>Education</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff->staff_educations as $education)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$education->education_group->name}}</td>
                                            <td>{{$education->education_type->name}}</td>
                                            <td>{{$education->education->name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     --}}
                               
                                <table style="border: none;">
                                    <tbody>
                                <tr>
                                    <td style="border: none;">၁၉။
                                    </td>
                                    <td style="border: none;">အဘအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->father_name.'၊'.$staff->father_ethnic?->name.'၊'.$staff->father_religion?->name.'၊'.$staff->father_place_of_birth.'၊'.$staff->father_occupation }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၀။
                                    </td>
                                    <td style="border: none;">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->father_address_street.'၊'.$staff->father_address_ward.'၊'.$staff->father_address_township_or_town?->name.'၊'.$staff->father_address_region?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၁။
                                    </td>
                                    <td style="border: none;">အမိအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->mother_name.'၊'.$staff->mother_ethnic?->name.'၊'.$staff->mother_religion?->name.'၊'.$staff->mother_place_of_birth.'၊'.$staff->mother_occupation }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၂။
                                    </td>
                                    <td style="border: none;">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->mother_address_street.'၊'.$staff->mother_address_ward.'၊'.$staff->mother_address_township_or_town?->name.'၊'.$staff->mother_address_region?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၃။
                                    </td>
                                    <td style="border: none;">ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသားဟုတ်/ မဟုတ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_parents_citizen_when_staff_born }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၄။
                                    </td>
                                    <td style="border: none;">လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_rank->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၅။
                                    </td>
                                    <td style="border: none;">အလုပ်စတင်ဝင်ရောက်သည့်နေ့နှင့်လက်ရှိရာထူးရသည့်နေ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->join_date }}/{{ $staff->current_rank_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၆။
                                    </td>
                                    <td style="border: none;">လက်ရှိအလုပ်အကိုင်ရလာပုံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_newly_appointed }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၇။
                                    </td>
                                    <td style="border: none;">ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_direct_appointed }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၈။
                                    </td>
                                    <td style="border: none;">လစာဝင်ငွေ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->payscale?->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၉။
                                    </td>
                                    <td style="border: none;">ဌာန၊ နေရာ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊
                                        ရန်ကုန်မြို့။</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                     <div class="section">
                        <div class="section-title">
                            <label>၃၀။ </label>
                            <h2 class="text-base">အလုပ်အကိုင်အတွက် ထောက်ခံသူများ</h2>
                        </div>
                        <div class="table-container">
                            <table class="table">
                                <thead class="thead-bg">
                                    <tr>
                                        <th>စဥ်</th>
                                        <th>ထောက်ခံသူ</th>
                                        <th>ဝန်ကြီးဌာန</th>
                                        <th>ဦးစီးဌာန</th>
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
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၁။ </label>
                                    <h2 class="text-base">ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်</h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">စဥ်</th>
                                                <th rowspan="2">အဆင့်</th>
                                                <th colspan="2">ကာလ</th>
                                                <th rowspan="2">တပ်/ဌာန</th>
                                                <th rowspan="2">နေရာ</th>
                                            </tr>
                                            <tr>
                                                <th>မှ</th>
                                                <th>ထိ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staff->postings as $index => $posting)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $posting->rank->name ?? '' }}</td>
                                                <td>{{ $posting->from_date }}</td>
                                                <td>{{ $posting->to_date }}</td>
                                                <td>
                                                    {{ $posting->division->name ?? '' }} / {{ $posting->department->name ?? '' }}
                                                </td>
                                                <td>{{ $posting->location }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၂။ </label>
                                    <h2 class="text-base">ညီအကိုမောင်နှမများ</h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
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
                        
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၃။ </label>
                                    <h2 class="text-base">အဘ၏ညီအကိုမောင်နှမများ</h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>စဥ်</th>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach ($staff->fatherSiblings as $index => $sibling)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
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
                        
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၄။ </label>
                                    <h2 class="text-base">အမိ၏ညီအကိုမောင်နှမများ</h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>စဥ်</th>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach($staff->motherSiblings as $index => $sibling)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
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
                        
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၅။ </label>
                                    <h2 class="text-base">ခင်ပွန်း၊ ဇနီးသည်</h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>စဥ်</th>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($staff->spouses as $index => $spouse)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
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
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၆။ </label>
                                    <h2 class="text-base">သားသမီးများ
                                    </h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>စဥ်</th>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staff->children as $index => $child)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
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
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၇။ </label>
                                    <h2 class="text-base">ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ

                                    </h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>စဥ်</th>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($staff->spouseSiblings as $index => $sibling)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
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
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၈။ </label>
                                    <h2 class="text-base">ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ
                                    </h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>စဥ်</th>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($staff->spouseFatherSiblings as $index => $sibling)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
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
                            <div class="section">
                                <div class="section-title">
                                    <label>၃၉။ </label>
                                    <h2 class="text-base">ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ

                                    </h2>
                                </div>
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="thead-bg">
                                            <tr>
                                                <th>စဥ်</th>
                                                <th>အမည်</th>
                                                <th>လူမျိုး/ဘာသာ</th>
                                                <th>ဇာတိ</th>
                                                <th>အလုပ်အကိုင်</th>
                                                <th>နေရပ်လိပ်စာ</th>
                                                <th>တော်စပ်ပုံ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($staff->spouseMotherSiblings as $index => $sibling)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
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
                        </div>


                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၄၀။
                                    </td>
                                    <td style="border: none; width: 35%;">မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက မည်သည့် အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ ရင်းနှီးသည်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->family_in_politics }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၁။
                                    </td>
                                    <td style="border: none; width: 35%;">နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">@foreach($staff->schools as $school)
                                        {{ $school->school_name}}/{{ $school->year}}
                                        @endforeach</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၂။
                                    </td>
                                    <td style="border: none; width: 35%;">နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊ ခုံအမှတ်၊ ဘာသာရပ်အတိအကျဖော်ပြရန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->last_school_name }}၊
                                        {{ $staff->last_school_subject }}၊ {{ $staff->last_school_row_no }}၊
                                        {{ $staff->last_school_major }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၃။
                                    </td>
                                    <td style="border: none; width: 35%;">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊ တာဝန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->student_life_political_social }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၄။
                                    </td>
                                    <td style="border: none; width: 35%;">ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု

                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->habit }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၅။
                                    </td>
                                    <td style="border: none; width: 35%;">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->past_occupation}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၆။
                                    </td>
                                    <td style="border: none; width: 35%;">တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြပါ
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->revolution }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၇။
                                    </td>
                                    <td style="border: none; width: 35%;">အလုပ်အကိုင် ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိူးနှင့်လစာ
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->transfer_reason_salary }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၈။

                                    </td>
                                    <td style="border: none; width: 35%;">အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊ မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ် အဆင့်အတန်းနှင့်တာဝန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->during_work_political_social }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 5%;">၉။

                                    </td>
                                    <td style="border: none; width: 35%;">စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများရှိ/ မရှိ
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->has_military_friend}}</td>
                                </tr>
                            </table>
                     



                    <div class="container">
                        <div class="section">
                            <div class="section-title">
                                <label>၁၀။ </label>
                                <h2 class="text-base">နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်
                                </h2>
                            </div>
                            <div class="table-container">
                                <table class="table">
                                    <thead class="thead-bg">
                                        <tr>
                                            <th>စဥ်</th>
                                            <th>သွားရောက်ခဲ့သည့်နိုင်ငံ	</th>
                                            <th>သွားရောက်ခဲ့သည့်အကြောင်း</th>
                                            <th>တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန</th>
                                            <th>ကာလ(မှ-ထိ)
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->abroads as $index => $abroad)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $abroad->country->name ?? 'မရှိပါ' }}</td>
                                        <td>{{ $abroad->particular }}</td>
                                        <td>{{ $abroad->meet_with }}</td>
                                        <td>{{ $abroad->from_date }} - {{ $abroad->to_date }}</td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <table style="border: none;">
                        <tbody>
                            <tr>
                                <td style="border: none; width: 5%;">၁၁။</td>
                                <td style="border: none; width: 35%;">မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက မည်သည့် အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ ရင်းနှီးသည်
                                </td>
                                <td style="border: none; width: 5%;">-</td>
                                <td style="border: none; width: 55%;">{{ $staff->foreigner_friend_name.'၊'.$staff->foreigner_friend_occupation.'၊'.$staff->foreigner_friend_nationality?->name.'၊'.$staff->foreigner_friend_country?->name.'၊'.$staff->foreigner_friend_how_to_know }}</td>
                            </tr>
                            <tr>
                                <td style="border: none; width: 5%;">၁၂။</td>
                                <td style="border: none; width: 35%;">မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက်အရာရှိ/ မြို့နယ်/ ကျေးရွာ/ ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)
                                </td>
                                <td style="border: none; width: 5%;">-</td>
                                <td style="border: none; width: 55%;">{{ $staff->recommended_by_military_person }}</td>
                            </tr>
                            <tr>
                                <td style="border: none; width: 5%;">၁၃။</td>
                                <td style="border: none; width: 35%;">ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ
                                </td>
                                <td style="border: none; width: 5%;">-</td>
                                <td style="border: none; width: 55%;">{{en2mm($staff->punishments->count())}}</td>
                            </tr>
                        </table>
                        <div style="margin-bottom: 16px; font-size: 13px;">
                            <table width="100%" style="margin-bottom: 16px; border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <p style="margin: 0; font-size: 13px;">
                                            အထက်ပါဇယားကွက်များအတွင်း ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။
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
