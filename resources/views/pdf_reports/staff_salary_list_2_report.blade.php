<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Salary List3</title>
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
        h1, h2 {
            font-size: 14px;
            text-align:center;
            margin-bottom: 8px;
        }

        h1 {
            margin-bottom: 4px;
        }
        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
            margin: 0 auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 0.5rem;
            text-align: center;
        }

        th {
            font-weight: bold;
        }



    </style>
</head>
<body>
    <page size="A4">
        <h1>နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
            နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏
        </h1>
        <h2>လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့် အခြားချီးမြှင့်ငွေ/စရိတ်များ
            ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
        </h2>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">လစာနှုန်း</th>
                    <th rowspan="2">ရာထူးအဆင့်</th>
                    <th colspan="2">ဒီပလိုမာ</th>
                    <th colspan="2">Fellowship/Membership</th>
                    <th colspan="2">မဟာဘွဲ့</th>
                    <th colspan="2">စုစုပေါင်း</th>
                    <th colspan="2">ပါရဂူဘွဲ့</th>
                </tr>
                <tr>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>၁</td>
                    <td>၂</td>
                    <td>၃</td>
                    <td>၄</td>
                    <td>၅</td>
                    <td>၆</td>
                    <td>၇</td>
                    <td>၈</td>
                    <td>၉</td>
                    <td>၈</td>
                    <td>၉</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($high_staffs as $staff)
                    <tr>
                        <td>{{ en2mm($loop->index + 1) }}</td>
                        <td>{{ $staff->payscale->name }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>အရာထမ်းပေါင်း</td>
                    <td></td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                </tr>
                @foreach ($low_staffs as $staff)
                    <tr>
                        <td>{{ en2mm($loop->index + 1) }}</td>
                        <td>{{ $staff->payscale->name }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count()) }}</td>
                        <td>{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>အမှုထမ်းပေါင်း</td>
                    <td></td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>စုစုပေါင်း</td>
                    <td></td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())) }}</td>
                    <td>{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                </tr>
            </tbody>
        </table>


        <div style="margin-bottom: 16px; font-size: 13px;">
            <table width="100%" style="margin-bottom: 16px; border: none;">
                <tr style="border: none;">
                    <td style="border: none;">
                        <p style="margin: 0; font-size: 13px;">

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
                                <td style="font-size: 13px; border: none;">ရာထူး- </td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;"> ဆက်သွယ်ရန်ဖုန်း

                                    -</td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
        </div>

    </page>
</body>
</html>

