<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 15</title>
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
            margin-bottom: 20px;
        }
        
        .header {
            display: flex;
            justify-content: start;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        h2 {
            font-weight: 600;
            font-size: 1rem;
        }
        
        .table-container {
            width: 100%;
            border-radius: 8px;
        }
        
        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            border: 1px solid black;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid black;
        }
        
        th {
            background-color: #f0f0f0;
        }



        h1, h2 {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .section {
            width: 100%;
            margin-bottom: 20px;
        }

        .label {
            display: flex;
            justify-content: start;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid black;
        }

        table th {
            background-color: #f0f0f0;
        }

        .address {
            word-wrap: break-word;
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
                                    <td style="border: none;">{{ $staff->gender_id}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄။</td>
                                    <td style="border: none;">Attandance ID(Figer Print ID)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅။</td>
                                    <td style="border: none;">GPMS ဝန်ထမ်းအမှတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->other_name }}</td>
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
                                    <td style="border: none;">{{ $staff->nrc }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၈။</td>
                                    <td style="border: none;">မွေးသက္ကရာဇ် (ရက်-လ-နှစ်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->dob }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၉။</td>
                                    <td style="border: none;">မွေးဖွားရာဇာတိနှင့်လိပ်စာအပြည့်အစုံ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->place_of_birth }}/
                                        {{ $staff->current_address_ward }}</td>
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
                                <tr>
                                    <td style="border: none;">၁၅။</td>
                                    <td style="border: none;">ပညာအရည်အချင်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၆။</td>
                                    <td style="border: none;">ဘွဲ့ရရှိခဲ့သည့်တက္ကသိုလ်/ကျောင်း

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၇။</td>
                                    <td style="border: none;">ဘွဲ့ရရှိခဲ့သည့် နိုင်ငံ


                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၈။</td>
                                    <td style="border: none;">ဘွဲ့ရရှိခဲ့သည့် ခုနှစ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၉။</td>
                                    <td style="border: none;">ကျန်းမာရေး အခြေအနေ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
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
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၂။</td>
                                    <td style="border: none;">လက်ရှိလစာနှုန်း
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၃။</td>
                                    <td style="border: none;">လက်ရှိလစာ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၄။</td>
                                    <td style="border: none;">အစိုးရဝန်ထမ်းစဖြစ်သော (ရက်-လ-နှစ်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၅။</td>
                                    <td style="border: none;">လက်ရှိဌာန၏အလုပ်ဝင်ရက်စွဲ (ရက်-လ-နှစ်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၆။</td>
                                    <td style="border: none;">လက်ရှိရာထူးရသည့်နေ့ (ရက်-လ-နှစ်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၇။</td>
                                    <td style="border: none;">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ (အပြည့်အစုံဖော်ပြရန်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၈။</td>
                                    <td style="border: none;">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂၉။</td>
                                    <td style="border: none;">ဆက်သွယ်နိုင်သောဖုန်းနံပါတ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၀။</td>
                                    <td style="border: none;">အိမ်ထောင်ရှိ/ မရှိ (ဥပမာ- လူပျို/အပျို၊ မုဆိုးဖို/မုဆိုးမ၊ တစ်ခုလပ်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၁။</td>
                                    <td style="border: none;">ဝင်ငွေခွန်သက်သာခွင့် ရှိ/ မရှိ (ရှိကဖော်ပြရန်)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
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
                                <tr>
                                    <td style="border: none;">၃၈။</td>
                                    <td style="border: none;">အလုပ်အကိုင်အတွက် ထောက်ခံသူများ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->recommend_by }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃၉။</td>
                                    <td style="border: none;">မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">
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
                                    <td style="border: none;"></td>
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
                                    <td style="border: none;"></td>
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
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၆။</td>
                                    <td style="border: none;">နောက်ဆုံးတာဝန်ထမ်းဆောင်ခဲ့သည့် တိုင်း၊ တပ်မ၊ တပ်ရင်း၊ တပ်ဖွဲ့
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
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
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၁၃။</td>
                                    <td style="border: none;">အကြောင်းအရာ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
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
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၂။
                                        </td>
                                    <td style="border: none;">  ပေါ်လစီအမှတ်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၃။
                                        </td>
                                    <td style="border: none;">ပရီမီယံ
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
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
                                        <tr>
                                            <td>၁။</td>
                                            <td>အ.ထ.က (၁) ဒဂုံ</td>
                                            <td>၁-၆-၂၀၁၀</td>
                                            <td>၁-၃-၂၀၁၅</td>
                                            <td>အထက်တန်း</td>
                                        </tr>
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
                                        <tr>
                                            <td>၁။</td>
                                            <td>အ.ထ.က (၁) ဒဂုံ</td>
                                            <td>၁-၆-၂၀၁၀</td>
                                            <td>၁-၃-၂၀၁၅</td>
                                            <td>အထက်တန်း</td>
                                            <td>၁။</td>
                                            <td>အ.ထ.က (၁) ဒဂုံ</td>
                                            <td>၁-၆-၂၀၁၀</td>
                                            <td>၁-၃-၂၀၁၅</td>
                                            <td>အထက်တန်း</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;">၄၂။
                                        ။</td>
                                    <td style="border: none; width: 35%;">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်
                                    </td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၃။</td>
                                    <td style="border: none;">ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး/ အနုပညာ/ ပညာရေး/ စက်မှုလက်မှု

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၄။</td>
                                    <td style="border: none;">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၅။</td>
                                    <td style="border: none;">တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၆။</td>
                                    <td style="border: none;">အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့် လစာ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၇။</td>
                                    <td style="border: none;">အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့် တာဝန်
                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၈။</td>
                                    <td style="border: none;">စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ/ မရှိ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၄၉။</td>
                                    <td style="border: none;">မိမိနှင့် ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသား ရှိ/ မရှိ၊ ရှိကမည်သည့်အလုပ်အကိုင်၊ လူမျိုး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ရင်းနှီးသည်

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅၀။</td>
                                    <td style="border: none;"> မိမိအားထောက်ခံသည့် (ကျောင်းဆရာ၊ ရပ်ကွက်လူကြီး၊ တပ်မတော်အရာရှိ)

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;">၅၁။</td>
                                    <td style="border: none;"> ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/ မရှိ

                                    </td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"></td>
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
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
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
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>{{$staff->name }}</td>
                    <td>{{ $staff->place_of_birth}}</td>
                    <td></td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td></td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td></td>
                    <td></td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td></td>
                    <td></td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                    <th>နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>ဗုဒ္ဓ</td>
                    <td>ရန်ကုန်</td>
                    <td></td>
                    <td></td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                    <td class="address">ျိါ်,ပကင,၆မာတျမိ.၆.ျ,ာိ၅၄,န..မ၆,တ၄</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                </tr>
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
                    <th>သွား‌ရောက်သည့်နိုင်ငံ	</th>
                 
                    <th>မှ<br>ရက်-လ-နှစ်</th>
                    <th>ထိ<br>ရက်-လ-နှစ်</th>
                    <th>သွား‌ရောက်သည့်အကြောင်းအရာ</th>
                    <th>ထောက်ပံ့သည့်နိုင်ငံ/ အဖွဲ့အစည်း
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td></td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>ဗမာ</td>
                    <td></td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                </tr>
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
                <tr>
                    <td>၁။ </td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                </tr>
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
                    <th>ပြစ်ဒဏ်	</th>
                    <th>မှ<br>ရက်-လ-နှစ်</th>
                    <th>ထိ<br>ရက်-လ-နှစ်</th>
                    <th>မှတ်ချက် </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>၁။ </td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    <td>သတင်းအချက်အလက်နှင့်နည်းပညာ</td>
                    
                </tr>
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
