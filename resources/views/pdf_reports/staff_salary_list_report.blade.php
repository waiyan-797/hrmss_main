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
            display: block;
            margin: 0 auto;
            padding: 10mm;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }

        @media print {
            body,
            page {
                margin: 0;
                box-shadow: none;
            }
        }

        body {
            font-family: 'tharlon', sans-serif;
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
            နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏
        </h1>
        <h2>လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့် အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ် (၃၁-၅-၂၀၂၄)
        </h2>
        <table class="table-container">
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>လစာနှုန်း</th>
                    <th>ရာထူးအဆင့်</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်ပြီး</th>
                    <th>လစာ</th>
                    <th>ဘွဲ့အလိုက်<br>ချီးမြှင့်ငွေ</th>
                    <th>အခြားချီးမြှင့်ငွေ/စရိတ်များ</th>
                    <th>ဒေသစရိတ်</th>
                    <th>လစာနှင့်စရိတ်ပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalActualSalaryFirst = 0;
                    $totalAdditionEducationFirst = 0;
                    $totalAdditionFirst = 0;
                    $totalAdditionRationFirst = 0;
                    $totalOverallFirst = 0;
                @endphp

                @foreach ($first_payscales as $payscale)
                    @php
                        $totalActualSalary = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('actual_salary'));
                        $totalAdditionEducation = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition_education'));
                        $totalAddition = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));
                        $totalAdditionRation = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition_ration'));
                        $totalPayscale = $totalActualSalary + $totalAdditionEducation + $totalAddition + $totalAdditionRation;

                        $totalActualSalaryFirst += $totalActualSalary;
                        $totalAdditionEducationFirst += $totalAdditionEducation;
                        $totalAdditionFirst += $totalAddition;
                        $totalAdditionRationFirst += $totalAdditionRation;
                        $totalOverallFirst += $totalPayscale;
                    @endphp

                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $payscale->name }}</td>
                        <td>{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
                        <td>{{ en2mm($payscale->allowed_qty) }}</td>
                        <td>{{ en2mm($payscale->staff->count()) }}</td>
                        <td>{{ en2mm($totalActualSalary) }}</td>
                        <td>{{ en2mm($totalAdditionEducation) }}</td>
                        <td>{{ en2mm($totalAddition) }}</td>
                        <td>{{ en2mm($totalAdditionRation) }}</td>
                        <td>{{ en2mm($totalPayscale) }}</td>
                    </tr>
                @endforeach

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
                @php
                $totalActualSalarySecond = 0;
                $totalAdditionEducationSecond = 0;
                $totalAdditionSecond = 0;
                $totalAdditionRationSecond = 0;
                $totalOverallSecond = 0;
            @endphp

            @foreach ($second_payscales as $payscale)
                @php
                    $totalActualSalary = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('actual_salary'));
                    $totalAdditionEducation = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition_education'));
                    $totalAddition = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));
                    $totalAdditionRation = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition_ration'));
                    $totalPayscale = $totalActualSalary + $totalAdditionEducation + $totalAddition + $totalAdditionRation;

                    $totalActualSalarySecond += $totalActualSalary;
                    $totalAdditionEducationSecond += $totalAdditionEducation;
                    $totalAdditionSecond += $totalAddition;
                    $totalAdditionRationSecond += $totalAdditionRation;
                    $totalOverallSecond += $totalPayscale;
                @endphp

                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $payscale->name }}</td>
                    <td>{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
                    <td>{{ en2mm($payscale->allowed_qty) }}</td>
                    <td>{{ en2mm($payscale->staff->count()) }}</td>
                    <td>{{ en2mm($totalActualSalary) }}</td>
                    <td>{{ en2mm($totalAdditionEducation) }}</td>
                    <td>{{ en2mm($totalAddition) }}</td>
                    <td>{{ en2mm($totalAdditionRation) }}</td>
                    <td>{{ en2mm($totalPayscale) }}</td>
                </tr>
            @endforeach

            <tr>
                <td></td>
                <td>{{ $second_payscales[0]->staff_type->name }} စုစုပေါင်း</td>
                <td>-</td>
                <td>{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                <td>{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
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
                    <td>{{ en2mm($second_payscales->sum('allowed_qty') + $first_payscales->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count()) + $first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
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

        <div style="margin-top: 16px;">
            <table width="100%" style="border: none;">
                <tr>
                    <td width="150px" style="vertical-align: top; border: none;">
                        <table style="border: none; width: 100%;">
                            <tr><td style="font-size: 13px; border: none;">လက်မှတ် -</td></tr>
                            <tr><td style="font-size: 13px; border: none;">အမည် - </td></tr>
                            <tr><td style="font-size: 13px; border: none;">ရာထူး - </td></tr>
                            <tr><td style="font-size: 13px; border: none;">ဆက်သွယ်ရန်ဖုန်း -</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page>
</body>

</html>
