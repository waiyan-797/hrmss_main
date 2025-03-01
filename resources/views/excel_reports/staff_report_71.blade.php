<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 71</title>
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
        .container {
        width: 100%;
        margin-bottom: 20px;
    }

    .header {
        display: flex;
        justify-content: start;
        margin-bottom: 10px;
        gap: 10px;
    }

    .header h1 {
        font-weight: 600;
        font-size: 16px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 0 auto;
    }

    th, td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }

    th {
        font-weight: bold;
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
                                    <h1 style="color: black; font-weight: 600; font-size: 14px; margin: 0;">HR Software အတွက်ဝန်ထမ်းများ၏ကိုယ်ရေးမှတ်တမ်းရေးသွင်းခြင်းပုံစံ
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
                                    <td style="border: none;">၂။</td>
                                    <td style="border: none;">ငယ်အမည်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->nick_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။</td>
                                    <td style="border: none;">ကျား/ မ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->gender->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။</td>
                                    <td style="border: none;">Attandance ID(Figer Print ID)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->attendid}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။</td>
                                    <td style="border: none;">GPMS ဝန်ထမ်းအမှတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->gpms_staff_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">လူမျိုး/ကိုးကွယ်သည့်ဘာသာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->ethnics ? $staff->ethnic->name : '-' }}/
                                        {{ $staff->religions ? $staff->religion->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၇။</td>
                                    <td style="border: none;">အမျိုးသားမှတ်ပုံတင်အမှတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">မွေးသက္ကရာဇ် (ရက်-လ-နှစ်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၉။</td>
                                    <td style="border: none;">မွေးဖွားရာဇာတိနှင့်လိပ်စာအပြည့်အစုံ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->place_of_birth.','.$staff->current_address_ward .','.$staff->current_address_street.','.$staff->current_address_township_or_town->name .','.$staff->current_address_region->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၀။</td>
                                    <td style="border: none;">ကိုယ်တွင်ထင်ရှားသောအမှတ်အသား


                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->prominent_mark }}</td>
                                </tr>

                                <tr>
                                    <td style="border: none;">၁၁။</td>
                                    <td style="border: none;">အရပ်အမြင့် (ပေ-လက်မ)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->height_feet }}-{{ $staff->height_inch }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၂။</td>
                                    <td style="border: none;">မျက်စေ့အရောင်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->eye_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၃။</td>
                                    <td style="border: none;">ဆံပင်အရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->hair_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၄။</td>
                                    <td style="border: none;">သွေးအုပ်စု

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->blood_type ? $staff->blood_type->name : '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                                
                                <div class="container">
                                    <div class="header">
                                        <label for="">၁၅။ </label>
                                        <h1>ပညာအရည်အချင်း</h1>
                                    </div>
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
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $education->education_group->name }}</td>
                                                    <td>{{ $education->education_type->name }}</td>
                                                    <td>{{ $education->education->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="container">
                                    <div class="header">
                                        <label for="">၁၆။ </label>
                                        <h1>ဘွဲ့ရရှိခဲ့သည့်တက္ကသိုလ်/ကျောင်း</h1>
                                    </div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>စဉ်</th>
                                                <th>ဘွဲ့ရရှိခဲ့သည့်တက္ကသိုလ်/ကျောင်း</th>
                                                <th>ဘွဲ့ရရှိခဲ့သည့် နိုင်ငံ</th>
                                                <th>ဘွဲ့ရရှိခဲ့သည့် ခုနှစ်</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($staff->schools as $index => $school)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $school->school_name }}</td>
                                                    <td>{{ $school->country->name ?? '-' }}</td>
                                                    <td>{{ $school->year }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <table style="border: none;">
                                    <tbody>
                                <tr>
                                    <td style="border: none;">၁၉။</td>
                                    <td style="border: none;">ကျန်းမာရေး အခြေအနေ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->health_condition}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၀။</td>
                                    <td style="border: none;">ဝါသနာပါသောအားကစား
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->habit }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၁။</td>
                                    <td style="border: none;">လက်ရှိရာထူးအမျိုးအစား

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_rank->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၂။</td>
                                    <td style="border: none;">လက်ရှိလစာနှုန်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->payscale?->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၃။</td>
                                    <td style="border: none;">လက်ရှိလစာ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_salary}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၄။</td>
                                    <td style="border: none;">အစိုးရဝန်ထမ်းစဖြစ်သော (ရက်-လ-နှစ်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->government_staff_started_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၅။</td>
                                    <td style="border: none;">လက်ရှိဌာန၏အလုပ်ဝင်ရက်စွဲ (ရက်-လ-နှစ်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->join_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၆။</td>
                                    <td style="border: none;">လက်ရှိရာထူးရသည့်နေ့ (ရက်-လ-နှစ်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_rank_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၇။</td>
                                    <td style="border: none;">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ (အပြည့်အစုံဖော်ပြရန်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_address_street.','.$staff->current_address_ward.','.$staff->current_address_township_or_town->name.','.$staff->current_address_region->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၈။</td>
                                    <td style="border: none;">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->permanent_address_street.','.$staff->permanent_address_ward.','.$staff->permanent_address_township_or_town->name.','.$staff->permanent_address_region->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၉။</td>
                                    <td style="border: none;">ဆက်သွယ်နိုင်သောဖုန်းနံပါတ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->phone}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၀။</td>
                                    <td style="border: none;">အိမ်ထောင်ရှိ/ မရှိ (ဥပမာ- လူပျို/အပျို၊ မုဆိုးဖို/မုဆိုးမ၊ တစ်ခုလပ်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->marital_statuses?->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၁။</td>
                                    <td style="border: none;">ဝင်ငွေခွန်သက်သာခွင့် ရှိ/ မရှိ (ရှိကဖော်ပြရန်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->tax_exception}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၂။</td>
                                    <td style="border: none;">အခြားအမည်များ (ရှိလျှင်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->other_name }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၃။</td>
                                    <td style="border: none;">အသားအရောင်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->skin_color }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၄။</td>
                                    <td style="border: none;">ကိုယ်အလေးချိန်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->weight}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၅။</td>
                                    <td style="border: none;">ယခင်နေခဲ့ဖူးသောဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ (တပ်မတော်သားဖြစ်ကတပ်လိပ်စာဖော်ပြရန်မလို)


                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->previous_address }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၆။</td>
                                    <td style="border: none;">ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်နိုင်ငံသားဟုတ်/မဟုတ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->is_parents_citizen_when_staff_born }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၇။</td>
                                    <td style="border: none;">လက်ရှိအလုပ်အကိုင်ရလာပုံ (ပြိုင်အရွေးခံ(သို့)တိုက်ရိုက်ခန့်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->form_of_appointment }}/
                                        {{ $staff->is_direct_appointed }}</td>
                                </tr>
                                    </tbody>
                                </table>
                               
                                <div class="container">
                                    <div class="header">
                                        <label for="">၃၈။ </label>
                                        <h1>အလုပ်အကိုင်အတွက် ထောက်ခံသူများ</h1>
                                    </div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>စဉ်</th>
                                                <th>ထောက်ခံသူ</th>
                                                <th>ဝန်ကြီးဌာန</th>
                                                <th>ဦးစီးဌာန</th>
                                                <th>ရာထူး</th>
                                                <th>အကြောင်းအရာ
                                                </th>
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
                                <table style="border: none;">
                                    <tbody>
                                <tr>
                                    <td style="border: none;">၃၉။</td>
                                    <td style="border: none;">မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->family_in_politics}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">(တပ်မတော်တွင်တာဝန်မထမ်းဆောင်ခဲ့ဖူးပါကဖြည့်စွက်ရန်မလို)
                                        တပ်မတော်တွင်တာဝန်ထမ်းဆောင်ခဲ့ဖူးပါက
                                        
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁။</td>
                                    <td style="border: none;">ပြန်တမ်းဝင်အမှတ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_gazetted_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂။</td>
                                    <td style="border: none;">ဗိုလ်သင်တန်းအမှတ်စဥ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_dsa_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။</td>
                                    <td style="border: none;">စစ်မှုထမ်း‌ဟောင်းအဖွဲ့ဝင်အမှတ်နှင့်ရက်စွဲ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->veteran_no}}/{{ $staff->veteran_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။</td>
                                    <td style="border: none;">ကိုယ်ပိုင်အမှတ်
                                     </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{$staff->military_solider_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။</td>
                                    <td style="border: none;">အဆင့်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_rank?->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">နောက်ဆုံးတာဝန်ထမ်းဆောင်ခဲ့သည့် တိုင်း၊ တပ်မ၊ တပ်ရင်း၊ တပ်ဖွဲ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->last_serve_army}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၇။</td>
                                    <td style="border: none;">တပ်သို့ဝင်သည့်နေ့ (ရက်-လ-နှစ်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_join_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">ပြန်တမ်းဝင်ဖြစ်သည့်နေ့ (ရက်-လ-နှစ်)


                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_gazetted_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၉။</td>
                                    <td style="border: none;">အမှုထမ်းဆောင်ခဲ့သောတပ်များ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_served_army}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၀။</td>
                                    <td style="border: none;">တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_brief_history_or_penalty}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၁။</td>
                                    <td style="border: none;">အငြိမ်းစားလစာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_pension}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၂။</td>
                                    <td style="border: none;">ရက်စွဲ (ရက်-လ-နှစ်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->military_gazetted_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၃။</td>
                                    <td style="border: none;">အကြောင်းအရာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->transfer_remark}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">အသက်အာမခံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁။
                                        
                                        </td>
                                    <td style="border: none;"> အဆိုပြုလွှာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->life_insurance_proposal}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂။
                                        </td>
                                    <td style="border: none;">  ပေါ်လစီအမှတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->life_insurance_policy_no}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။
                                        </td>
                                    <td style="border: none;">ပရီမီယံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->life_insurance_premium}}</td>
                                </tr>

                            </tbody>
                        </table>
                      
                        <div class="container">
                            <div class="header">
                                <label>၄၀။ </label>
                                <h2>တက်ရောက်ခဲ့သောကျောင်းများ(မူလတန်း/အလယ်တန်း/အထက်တန်း)</h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>စဥ်</th>
                                            <th>ကျောင်းအမည်</th>
                                            <th>မှ (ရက်-လ-နှစ်)</th>
                                            <th>ထိ (ရက်-လ-နှစ်)</th>
                                            <th>အောင်မြင်ခဲ့သည့်အတန်း</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->schools as $index => $school)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $school->school_name }}</td>
                                            <td>{{ $school->from_date}}</td>
                                            <td>{{ $school->to_date}}</td>
                                            <td>{{ $school->education->name ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <div class="container">
                            <div class="header">
                                <label>၄၁။ </label>
                                <h2>ဘွဲ့ရရှိခဲ့သောတက္ကသိုလ်များ</h2>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>စဥ်</th>
                                            <th>တက္ကသိုလ်အမည်</th>
                                            <th>တက္ကသိုလ်တည်နေရာ</th>
                                            <th>အတန်း</th>
                                            <th>ခုံအမှတ်</th>
                                            <th>အထူးပြုဘာသာရပ်</th>
                                            <th>စတင်တက်ရောက်သော ရက်၊လ၊နှစ်</th>
                                            <th>ပြီးစီးသော ရက်၊လ၊နှစ်</th>
                                            <th>ဘွဲ့အမည်</th>
                                            <th>ဘွဲ့ရရှိခုနှစ်</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staff->schools as $index => $school)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $school->school_name }}</td>
                                            <td>{{ $school->town }}</td>
                                            <td>{{ $school->semester ?? '-' }}</td>
                                            <td>{{ $school->roll_no ?? '-' }}</td>
                                            <td>{{ $school->major ?? '-' }}</td>
                                            <td>{{ $school->from_date }}</td>
                                            <td>{{ $school->to_date }}</td>
                                            <td>{{ $school->education->name ?? '-' }}</td>
                                            <td>{{ $school->year }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၄၂။
                                        </td>
                                    <td style="border: none; width: 35%;">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->student_life_political_social}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၃။</td>
                                    <td style="border: none;">ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး/ အနုပညာ/ ပညာရေး/ စက်မှုလက်မှု

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->habit}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၄။</td>
                                    <td style="border: none;">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->past_occupation}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၅။</td>
                                    <td style="border: none;">တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->revolution}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၆။</td>
                                    <td style="border: none;">အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့် လစာ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->transfer_reason_salary}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၇။</td>
                                    <td style="border: none;">အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့် တာဝန်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->during_work_political_social}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၈။</td>
                                    <td style="border: none;">စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ/ မရှိ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->has_military_friend}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၉။</td>
                                    <td style="border: none;">မိမိနှင့် ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသား ရှိ/ မရှိ၊ ရှိကမည်သည့်အလုပ်အကိုင်၊ လူမျိုး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ရင်းနှီးသည်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->foreigner_friend_name.'၊'.$staff->foreigner_friend_occupation.'၊'.$staff->foreigner_friend_nationality?->name.'၊'.$staff->foreigner_friend_country?->name.'၊'.$staff->foreigner_friend_how_to_know }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅၀။</td>
                                    <td style="border: none;"> မိမိအားထောက်ခံသည့် (ကျောင်းဆရာ၊ ရပ်ကွက်လူကြီး၊ တပ်မတော်အရာရှိ)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">@foreach ($staff->recommendations  as $recommendation)
                                        {{ $recommendation->recommend_by }}၊{{ $recommendation->ministry}}၊
                                             {{ $recommendation->department}}
                                     @endforeach</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅၁။</td>
                                    <td style="border: none;"> ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/ မရှိ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{en2mm($staff->punishments->count())}}</td>
                                </tr>
                            </table>


                            <h1>မိသားစုအချက်အလက်များ</h1>

    <!-- Father's Information -->
    <div class="section">
        <div class="label">
            <label>၅၂။ </label>
            <h2>ဖခင်</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>အမည်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>ဇာတိ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $staff->father_name}}</td>
                    <td>{{ $staff->father_ethnic?->name}}</td>
                    <td>{{ $staff->father_religion?->name}}</td>
                    <td>{{ $staff->father_place_of_birth}}</td>
                    <td>{{ $staff->father_occupation}}</td>
                    <td class="address">{{ $staff->father_address_street.'၊'.$staff->father_address_ward.'၊'.$staff->father_address_township_or_town?->name.'၊'.$staff->father_address_region?->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Mother's Information -->
    <div class="section">
        <div class="label">
            <label>၅၃။ </label>
            <h2>မိခင်</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>အမည်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>ဇာတိ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $staff->mother_name}}</td>
                    <td>{{ $staff->mother_ethnic?->name}}</td>
                    <td>{{ $staff->mother_religion?->name}}</td>
                    <td>{{ $staff->mother_place_of_birth}}</td>
                    <td>{{ $staff->mother_occupation}}</td>
                    <td class="address">{{ $staff->mother_address_street.'၊'.$staff->mother_address_ward.'၊'.$staff->mother_address_township_or_town?->name.'၊'.$staff->mother_address_region?->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Parent's Siblings -->
    <div class="section">
        <div class="label">
            <label>၅၄။ </label>
            <h2>မိဘ၏ညီအစ်ကိုမောင်နှမများ</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>အမည်</th>
                    <th>တော်စပ်ပုံ</th>
                    <th>ကျား/မ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                    <th>ဇာတိ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->siblings as $sibling)
                                    <tr>
                                        <td>{{ $sibling->name }}</td>
                                        <td>{{ $sibling->relation?->name ?? '-' }}</td>
                                        <td>{{ $sibling->gender?->name ?? '-' }}</td>
                                        <td>{{ $sibling->occupation }}</td>
                                        <td>{{ $sibling->ethnic?->name ?? '-' }}</td>
                                        <td>{{ $sibling->religion?->name ?? '-' }}</td>
                                        <td>{{ $sibling->address }}</td>
                                        <td>{{ $sibling->place_of_birth }}</td>
                                    </tr>
                                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Father's Siblings -->
    <div class="section">
        <div class="label">
            <label>၅၅။ </label>
            <h2>ဖခင်၏ညီအစ်ကိုမောင်နှမများ</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>တော်စပ်ပုံ</th>
                    <th>ကျား/မ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                    <th>ဇာတိ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->fatherSiblings as $index => $sibling)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sibling->name }}</td>
                    <td>{{ $sibling->relation->name ?? 'N/A' }}</td>
                    <td>{{ $sibling->gender->name ?? 'N/A' }}</td>
                    <td>{{ $sibling->occupation }}</td>
                    <td>{{ $sibling->ethnic->name ?? 'N/A' }}</td>
                    <td>{{ $sibling->religion->name ?? 'N/A' }}</td>
                    <td>{{ $sibling->address }}</td>
                    <td>{{ $sibling->place_of_birth }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mother's Siblings -->
    <div class="section">
        <div class="label">
            <label>၅၆။ </label>
            <h2>မိခင်၏ညီအစ်ကိုမောင်နှမများ</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>တော်စပ်ပုံ</th>
                    <th>ကျား/မ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                    <th>ဇာတိ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->motherSiblings as $index => $sibling)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sibling->name }}</td>
                    <td>{{ $sibling->relation->name ?? '' }}</td>
                    <td>{{ $sibling->gender->name ?? '' }}</td>
                    <td>{{ $sibling->occupation }}</td>
                    <td>{{ $sibling->ethnic->name ?? '' }}</td>
                    <td>{{ $sibling->religion->name ?? '' }}</td>
                    <td>{{ $sibling->address }}</td>
                    <td>{{ $sibling->place_of_birth }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="section">
        <div class="label">
            <label>၅၇။ </label>
            <h2>ခင်ပွန်း/ ဇနီးအမည်
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ဇာတိ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($staff->spouses as $index => $spouse)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $spouse->name }}</td>
                    <td>{{ $spouse->place_of_birth }}</td>
                    <td>{{ $spouse->occupation }}</td>
                    <td>{{ $spouse->ethnic->name ?? '-' }}</td>
                    <td>{{ $spouse->religion->name ?? '-' }}</td>
                    <td>{{ $spouse->address }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၅၈။ </label>
            <h2>သား/ သမီး
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ကျား/မ</th>
                    <th>ဇာတိ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($staff->children as $index => $child)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $child->name }}</td>
                                        <td>{{ $child->gender->name ?? '-' }}</td>
                                        <td>{{ $child->place_of_birth }}</td>
                                        <td>{{ $child->occupation }}</td>
                                        <td>{{ $child->ethnic->name ?? '-' }}</td>
                                        <td>{{ $child->religion->name ?? '-' }}</td>
                                        <td>{{ $child->address }}</td>
                                    </tr>
                                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၅၉။ </label>
            <h2>ခင်ပွန်း/ ဇနီး၏ညီအစ်ကိုမောင်နှမများ

            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ကျား/မ</th>
                    <th>ဇာတိ</th>
                    <th>တော်စပ်ပုံ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($staff->spouseSiblings as $index => $sibling)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sibling->name }}</td>
                    <td>{{ $sibling->gender->name ?? '-' }}</td>
                    <td>{{ $sibling->place_of_birth }}</td>
                    <td>{{ $sibling->relation->name ?? '-' }}</td>
                    <td>{{ $sibling->occupation }}</td>
                    <td>{{ $sibling->ethnic->name ?? '-' }}</td>
                    <td>{{ $sibling->religion->name ?? '-' }}</td>
                    <td>{{ $sibling->address }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="section">
        <div class="label">
            <label>၆၀။ </label>
            <h2>ခင်ပွန်း/ ဇနီး၏ဖခင်
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>အမည်</th>
                    <th>ဇာတိ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $staff->spouse_father_name}}</td>
                    <td>{{ $staff->spouse_father_place_of_birth}}</td>
                    <td>{{ $staff->spouse_father_occupation}}</td>
                    <td>{{ $staff->spouse_father_ethnic?->name}}</td>
                    <td>{{ $staff->spouse_father_religion?->name}}</td>
                    <td class="address">{{ $staff->spouse_father_address_street.','.$staff->spouse_father_address_ward.','.$staff->spouse_father_address_township_or_town?->name.','.$staff->spouse_father_address_region?->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="section">
        <div class="label">
            <label>၆၁။ </label>
            <h2>ခင်ပွန်း/ ဇနီးဖခင်၏ညီအစ်ကိုမောင်နှမများ

            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>တော်စပ်ပုံ</th>
                    <th>ကျား/မ</th>
                    <th>ဇာတိ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->spouseFatherSiblings as $index => $sibling)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sibling->name }}</td>
                    <td>{{ $sibling->relation->name ?? '-' }}</td>
                    <td>{{ $sibling->place_of_birth }}</td>
                    <td>{{ $sibling->gender->name ?? '-' }}</td>
                    <td>{{ $sibling->occupation }}</td>
                    <td>{{ $sibling->ethnic->name ?? '-' }}</td>
                    <td>{{ $sibling->religion->name ?? '-' }}</td>
                    <td>{{ $sibling->address }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၆၂။ </label>
            <h2>ခင်ပွန်း/ ဇနီး၏မိခင်
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>အမည်</th>
                    <th>ဇာတိ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $staff->spouse_mother_name}}</td>
                    <td>{{ $staff->spouse_mother_place_of_birth}}</td>
                    <td>{{ $staff->spouse_mother_occupation}}</td>
                    <td>{{ $staff->spouse_mother_ethnic?->name}}</td>
                    <td>{{ $staff->spouse_mother_religion?->name}}</td>
                    <td class="address">{{ $staff->spouse_mother_address_street.'၊'.$staff->spouse_mother_address_ward.'၊'.$staff->spouse_mother_address_township_or_town?->name.'၊'.$staff->spouse_mother_address_region?->name}}</td>
                   
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၆၃။ </label>
            <h2>ခင်ပွန်း/ ဇနီး၏မိခင်၏ညီအစ်ကိုမောင်နှမများ
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>တော်စပ်ပုံ</th>
                    <th>ဇာတိ</th>
                    <th>ကျား/မ</th>
                    <th>အလုပ်အကိုင်</th>
                    <th>လူမျိုး</th>
                    <th>ဘာသာ</th>
                    <th>နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->spouseMotherSiblings as $index => $sibling)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $sibling->name }}</td>
                                        <td>{{ $sibling->relation->name ?? 'N/A' }}</td>
                                        <td>{{ $sibling->place_of_birth }}</td>
                                        <td>{{ $sibling->gender->name ?? 'N/A' }}</td>
                                        <td>{{ $sibling->occupation }}</td>
                                        <td>{{ $sibling->ethnic->name ?? 'N/A' }}</td>
                                        <td>{{ $sibling->religion->name ?? 'N/A' }}</td>
                                        <td>{{ $sibling->address }}</td>
                                    </tr>
                                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၆၄။ </label>
            <h2>ရရှိခဲ့သော Diploma/Certificateနှင့် တက်ရောက်ထားသောသင်တန်းများ

            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>Diploma/Certificate အမည်</th>
                    <th>ကျောင်း/တက္ကသိုလ်/သင်တန်းအမည်</th>
                    <th>မှ<br>ရက်-လ-နှစ်</th>
                    <th>ထိ<br>ရက်-လ-နှစ်</th>
                    <th>သင်တန်းကြေး</th>
                    <th>Training
                        Type(local/foreign)</th>
                    <th>မှတ်ချက်</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($staff->trainings as $index => $training)
                                <tr>
                                    <td>{{ $index + 1 }}.</td>
                                    <td>{{ $training->diploma_name }}</td>
                                    <td>{{ $training->trainingType->name ?? 'N/A' }}</td>
                                    <td>{{ $training->from_date }}</td>
                                    <td>{{ $training->to_date }}</td>
                                    <td>{{ $training->fees }}</td>
                                    <td>{{ $training->trainingLocation->name ?? 'N/A' }}</td>
                                    <td>{{ $training->remark }}</td>
                                </tr>
                                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၆၅။ </label>
            <h2>ရရှိခဲ့သောဆုတံဆိပ်များ
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ဆုတံဆိပ်အမျိူးအစား</th>
                    <th>ရက်-လ-နှစ်</th>
                    <th>အမိန့်စာအမှတ်နှင့်အမှတ်စဥ်
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($staff->awards as $index => $award)
                <tr>
                    <td>{{ $index + 1 }}။ </td>
                    <td>{{ $award->awardType->name ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($award->order_date)->format('d-m-Y') }}</td>
                    <td>{{ $award->order_no }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="section">
        <div class="label">
            <label>၆၆။ </label>
            <h2>နိုင်ငံခြားခရီးစဥ်များ
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>သွား‌ရောက်သည့်နိုင်ငံ</th>
                    <th>မှ<br>ရက်-လ-နှစ်</th>
                    <th>ထိ<br>ရက်-လ-နှစ်</th>
                    <th>သွား‌ရောက်သည့်အကြောင်းအရာ</th>
                    <th>ထောက်ပံ့သည့်နိုင်ငံ/ အဖွဲ့အစည်း
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($staff->abroads as $index => $abroad)
                                <tr>
                                    <td>{{ $index + 1 }}။ </td>
                                    <td>{{ $abroad->country->name ?? 'N/A' }}</td>
                                    <td>{{ $abroad->from_date }}</td>
                                    <td>{{ $abroad->to_date }}</td>
                                    <td>{{ $abroad->particular }}</td>
                                    <td>{{ $abroad->sponser }}</td>
                                </tr>
                                @endforeach
            </tbody>
        </table>
    </div>


    <div class="section">
        <div class="label">
            <label>၆၇။ </label>
            <h2>ယခင်လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ဌာနအမည် (ဝန်ကြီးဌာန၊ ဦးစီးဌာန) အပြည့်အစုံဖော်ပြရန်</th>
                    <th>ရာထူး</th>
                    <th>မှ<br>ရက်-လ-နှစ်</th>
                    <th>ထိ<br>ရက်-လ-နှစ်</th>
                    <th>လစာစကေး	</th>
                    <th>မှတ်ချက် </th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->postings as $index => $posting)
                                <tr>
                                    <td>{{ $index + 1 }}။ </td>
                                    <td>{{ $posting->department->name ?? '-' }}</td>
                                    <td>{{ $posting->rank->name ?? '-' }}</td>
                                    <td>{{ $posting->from_date }}</td>
                                    <td>{{ $posting->to_date }}</td>
                                    <td>{{ $posting->rank->payscale->name ?? '-' }}</td>
                                    <td>{{ $posting->remark ?? '-' }}</td>
                                </tr>
                                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၆၈။ </label>
            <h2>လူမှုရေးလုပ်ဆောင်ချက်
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အသင်းအဖွဲ့အမည်နှင့်လုပ်ဆောင်မှုများ	</th>
                    <th>မှ<br>ရက်-လ-နှစ်</th>
                    <th>ထိ<br>ရက်-လ-နှစ်</th>
                    <th>မှတ်ချက် </th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->socialActivities as $index => $activity)
                                    <tr>
                                        <td>{{ $index + 1 }}။</td>
                                        <td>{{ $activity->particular }}</td>
                                        <td>{{ $activity->from_date }}</td>
                                        <td>{{ $activity->to_date}}</td>
                                        <td>{{ $activity->remark }}</td>
                                    </tr>
                                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၆၉။ </label>
            <h2>
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ဘာသာစကား</th>
                    <th>အရေး</th>
                    <th>အဖတ်</th>
                    <th>အပြော</th>
                    <th>မှတ်ချက် </th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->staff_languages as $index => $language)
                <tr>
                    <td>{{ $index + 1 }}။</td>
                    <td>{{ $language->language->name ?? 'N/A' }}</td>
                    <td>{{ $language->writing ?? 'N/A' }}</td>
                    <td>{{ $language->reading ?? 'N/A' }}</td>
                    <td>{{ $language->speaking ?? 'N/A' }}</td>
                    <td>{{ $language->remark ?? 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="label">
            <label>၇၀။ </label>
            <h2>
            </h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ပြစ်ဒဏ်	</th>
                    <th>မှ<br>ရက်-လ-နှစ်</th>
                    <th>ထိ<br>ရက်-လ-နှစ်</th>
                    <th>မှတ်ချက် </th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff->punishments as $index => $punishment)
                <tr>
                    <td>{{ $index + 1 }}။</td>
                    <td>{{ $punishment->penaltyType?->name ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($punishment->from_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($punishment->to_date)->format('d/m/Y') }}</td>
                    <td>{{ $punishment->reason }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

                        <div style="margin-bottom: 16px; font-size: 13px;">
                            <table width="100%" style="margin-bottom: 16px; border: none;">
                                <tr style="border: none;">
                                    <td style="border: none;">
                                        <p style="margin: 0; font-size: 13px;">
                                            ၇၁။

              အထက်ပါအချက်အလက်များမှန်ကန်ကြောင်းလက်မှတ်ရေးထိုးပါသည်။


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
                                                <td style="font-size: 13px; border: none;">အမည် - {{ auth()->user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;">ရာထူး- {{ auth()->user()->role->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px; border: none;"> ဌာန -</td>
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
