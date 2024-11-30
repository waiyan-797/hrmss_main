<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>English Effective Negotations</title>
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
        h1 {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            margin-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            font-weight: bold;
        }
        .bold {
            font-weight: bold;
        }



    </style>
</head>
<body>
    <page size="A4">
        <h1>၂၀၂၃ ခုနှစ်၊ သြဂုတ်လ ၂၁ရက်နေ့မှ စက်တင်ဘာလ ၁ရက်နေ့အထိ E-Learning စနစ်ဖြင့် ဖွင့်လှစ်မည့်<br>"English for Effective Negotiations" သင်တန်းတက်ရောက်ရန်အတွက် အဆိုပြုသင်တန်းသား အမည်စာရင်း</h1>
        <table>
            <thead>
                <tr class="bold">
                    <th>စဥ်</th>
                    <th>အမည် (မြန်မာ/<br>အင်္ဂလိပ်)၊<br>Email၊ ဖုန်း</th>
                    <th>ရာထူး/ဌာန</th>
                    <th>ပညာအရည်အချင်း (ပြည်ပဘွဲ့/ဒီပလိုမာများ နိုင်ငံ/ခုနှစ် ဖော်ပြရန်)</th>
                    <th>အသက်(ရက်/လ/နှစ်)(မွေးသက္ကရာဇ်)</th>
                    <th>စုစုပေါင်းဝန်ထမ်းလုပ်သက်(ရက်၊လ၊နှစ်)</th>
                    <th>တာဝန်ယူဆောင်ရွက်နေသည့်လုပ်ငန်းနယ်ပယ်</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $staff->name. ', ' .$staff->email. ', ' .$staff->phone }}</td>
                        <td>{{ $staff->current_rank->name. ', ' .$staff->current_department->name }}</td>
                        <td>
                            @foreach ($staff->staff_educations as $edu)
                                <div>
                                    <span>{{ $edu->education_group->name }}</span> -
                                    <span>{{ $edu->education_type->name }}</span>,
                                    <span>{{ $edu->education->name }}</span>
                                </div>
                            @endforeach
                        </td>
                        <td>{{ en2mm(Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
                        <td>
                            @php
                                $currentDate = Carbon\Carbon::now();
                                $rankDate = Carbon\Carbon::parse($staff->current_rank_date);
                                $diff = $rankDate->diff($currentDate);
                            @endphp
                            {{ $diff->y == 0 ? '' : en2mm($diff->y) .' နှစ်'}} {{ $diff->m == 0 ? '' : en2mm($diff->m) .' လ' }} {{ $diff->d == 0 ? '' : en2mm($diff->d) .' ရက်' }}
                        </td>
                        <td>{{ $staff->current_division->name }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </page>
</body>
</html>
