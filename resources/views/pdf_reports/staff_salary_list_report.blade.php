<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Salary List</title>
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
            font-size: 13px;
        }

        h1,
        h2 {
            font-size: 14px;
            text-align: center;
            margin-bottom: 8px;
        }

        h1 {
            margin-bottom: 4px;
        }

        .table-container {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            font-size: 12px;
            text-align: center;
        }

        .table-container th,
        .table-container td {
            border: 1px solid black;
            padding: 4px;
        }

        .table-container th {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <page size="A4">
        <h1>နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
            နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏</h1>
        <h2 class="font-bold">လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့်
            အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
        </h2>

        <table class="table-container">
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">လစာနှုန်း</th>
                    <th rowspan="2">ရာထူးအဆင့်</th>
                    <th colspan="2">ဦးရေ</th>
                    <th rowspan="2">လစာ</th>
                    <th rowspan="2">ဘွဲ့အလိုက်<br>ချီးမြှင့်ငွေ</th>
                    <th rowspan="2">အခြားချီးမြှင့်ငွေ/စရိတ်များ</th>
                    <th rowspan="2">ဒေသစရိတ်</th>
                    <th rowspan="2">လစာနှင့်စရိတ်ပေါင်း</th>
                </tr>
                <tr>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်ပြီး</th>
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
                    <td>၁၁</td>
                    <td>၁၂=၆+၇+၈+၉+၁၀+၁၁</td>
                </tr>
                @foreach ($first_payscales as $payscale)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $payscale->name }}</td>
                        <td>{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
                        <td>{{ en2mm($payscale->allowed_qty) }}</td>
                        <td>{{ en2mm($payscale->staff->count()) }}</td>
                        <td> {{ en2mm($salaries[0]->actual_salary ?? 0) }}</td>
                        <td>{{ en2mm($salaries[0]->addition_education) }}</td>
                        <td>{{ en2mm($salaries[0]->addition) }}</td>
                        <td>{{ en2mm($salaries[0]->addition_ration ?? 0) }}</td>
                        <td>
                            {{ en2mm($salaries[0]->actual_salary + $salaries[0]->addition_education + $salaries[0]->addition + $salaries[0]->addition_ration) }}
                        </td>

                    </tr>
                @endforeach

                @php

                    $totalActualSalaryFirst = $first_payscales->sum(fn($payscale) => $salaries[0]->actual_salary ?? 0);
                    $totalAdditionEducationFirst = $first_payscales->sum(
                        fn($payscale) => $salaries[0]->addition_education,
                    );
                    $totalAdditionFirst = $first_payscales->sum(fn($payscale) => $salaries[0]->addition);
                    $totalAdditionRationFirst = $first_payscales->sum(
                        fn($payscale) => $salaries[0]->addition_ration ?? 0,
                    );
                    $totalOverallFirst =
                        $totalActualSalaryFirst +
                        $totalAdditionEducationFirst +
                        $totalAdditionFirst +
                        $totalAdditionRationFirst;
                @endphp

                <tr>
                    <td></td>
                    <td>{{ $first_payscales[0]->staff_type->name }} စုစုပေါင်း</td>
                    <td>-</td>
                    <td>{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                    <td>{{ en2mm($totalActualSalaryFirst) }}</td>
                    <td>{{ en2mm($totalAdditionEducationFirst) }}</td>
                    <td>{{ en2mm($totalAdditionFirst) }}</td>
                    <td>{{ en2mm($totalAdditionRationFirst) }}</td>
                    <td>{{ en2mm($totalOverallFirst) }}</td>
                </tr>


                @foreach ($second_payscales as $payscale)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $payscale->name }}</td>
                        <td>{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
                        <td>{{ en2mm($payscale->allowed_qty) }}</td>
                        <td>{{ en2mm($payscale->staff->count()) }}</td>
                        <td> {{ en2mm($salaries[0]->actual_salary ?? 0) }}</td>
                        <td>{{ en2mm($salaries[0]->addition_education) }}</td>
                        <td>{{ en2mm($salaries[0]->addition) }}</td>
                        <td>{{ en2mm($salaries[0]->addition_ration ?? 0) }}</td>
                        <td>
                            {{ en2mm($salaries[0]->actual_salary + $salaries[0]->addition_education + $salaries[0]->addition + $salaries[0]->addition_ration) }}
                        </td>



                    </tr>
                @endforeach
                @php

                    $totalActualSalarySecond = $second_payscales->sum(
                        fn($payscale) => $salaries[0]->actual_salary ?? 0,
                    );
                    $totalAdditionEducationSecond = $second_payscales->sum(
                        fn($payscale) => $salaries[0]->addition_education,
                    );
                    $totalAdditionSecond = $second_payscales->sum(fn($payscale) => $salaries[0]->addition);
                    $totalAdditionRationSecond = $second_payscales->sum(
                        fn($payscale) => $salaries[0]->addition_ration ?? 0,
                    );
                    $totalOverallSecond =
                        $totalActualSalarySecond +
                        $totalAdditionEducationSecond +
                        $totalAdditionSecond +
                        $totalAdditionRationSecond;
                @endphp

                <tr>
                    <td></td>
                    <td>{{ $second_payscales[0]->staff_type->name }}စုစုပေါင်း</td>
                    <td>-</td>
                    <td>{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                    <td>{{ en2mm($totalActualSalarySecond) }}</td>
                    <td>{{ en2mm($totalAdditionEducationSecond) }}</td>
                    <td>{{ en2mm($totalAdditionSecond) }}</td>
                    <td>{{ en2mm($totalAdditionRationSecond) }}</td>
                    <td>{{ en2mm($totalOverallSecond) }}</td>
                </tr>

                <tr>
                    <td></td>
                    <td>စုစုပေါင်း</td>
                    <td>-</td>
                    <td>{{ en2mm($first_payscales->sum('allowed_qty') + $second_payscales->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count()) + $second_payscales->sum(fn($scale) => $scale->staff->count())) }}
                    </td>
                    <td>{{ en2mm($totalActualSalarySecond + $totalActualSalaryFirst) }}</td>
                    <td>{{ en2mm($totalAdditionEducationSecond + $totalAdditionEducationFirst) }}</td>
                    <td>{{ en2mm($totalAdditionSecond + $totalAdditionFirst) }}</td>
                    <td>{{ en2mm($totalAdditionRationSecond + $totalAdditionRationFirst) }}</td>
                    <td>{{ en2mm($totalOverallSecond + $totalOverallFirst) }}</td>

                </tr>

                <tr>
                    <td></td>
                    <td>ထောက်ပံ့ကြေး</td>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
