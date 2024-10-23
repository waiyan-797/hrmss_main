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
            font-family: 'tharlon';
            font-size: 13px;
        }
        .heading {
            font-weight: bold;
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .table-container {
            width: 100%;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            font-weight: bold;
        }
        .sub-heading {
            font-weight: bold;
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
        }



    </style>
</head>
<body>
    <page size="A4">
        <h1 class="heading">
            နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
            နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏
        </h1>
        <h2 class="sub-heading">
            လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့် အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>
            ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
        </h2>

        <div class="table-container">
            <table class="md:w-full font-bold text-sm mb-4">
                <thead>
                    <tr>
                        <th rowspan="2">စဥ်</th>
                        <th rowspan="2">လစာနှုန်း</th>
                        <th rowspan="2">ရာထူးအဆင့်</th>
                        <th colspan="2">
                            အမြဲတမ်းအတွင်းဝန်<br>ချီးမြှင့်ငွေ</th>
                        <th colspan="2">အခြားချီးမြှင့်ငွေ/စရိတ်</th>
                        <th colspan="2">ရက္ခာစရိတ်</th>
                        <th colspan="2">စုစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th>ဝန်ထမ်းဦးရေ</th>
                        <th>ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th>ဝန်ထမ်းဦးရေ</th>
                        <th>ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th>ဝန်ထမ်းဦးရေ</th>
                        <th>ဒေသစရိတ်နှုန်းထား</th>
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
                        <td>၁၀=၄+၆+၈</td>
                        <td>၁၁=၅+၇+၉</td>
                    </tr>

                    @foreach ($high_staffs as $staff)
                        @php
                            $additionEducationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_education')->isNotEmpty())->count();
                            $additionEducationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_education'));

                            $additionCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count();
                            $additionSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition'));

                            $additionRationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count();
                            $additionRationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_ration'));

                            $totalCount = $staff->staffs->filter(fn($staff) => $staff->salaries->filter(fn($salary) =>
                                $salary->addition_education !== null ||
                                $salary->addition !== null ||
                                $salary->addition_ration !== null
                            )->isNotEmpty())->count();

                            $totalSum = $staff->staffs->sum(fn($staff) =>
                                $staff->salaries->sum(fn($salary) =>
                                    ($salary->addition_education ?? 0) +
                                    ($salary->addition ?? 0) +
                                    ($salary->addition_ration ?? 0)
                                )
                            );
                        @endphp
                        <tr>
                            <td>{{ en2mm($loop->index + 1) }}</td>
                            <td>{{ $staff->payscale->name }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ en2mm($additionEducationCount) }}</td>
                            <td>{{ en2mm($additionEducationSum) }}</td>
                            <td>{{ en2mm($additionCount) }}</td>
                            <td>{{ en2mm($additionSum) }}</td>
                            <td>{{ en2mm($additionRationCount) }}</td>
                            <td>{{ en2mm($additionRationSum) }}</td>
                            <td>{{ en2mm($totalCount) }}</td>
                            <td>{{ en2mm($totalSum) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td>အရာထမ်းပေါင်း</td>
                        <td>-</td>
                        <td>
                            {{ en2mm($high_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_education')->count() : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($high_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_education') : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($high_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition')->count() : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($high_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition') : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($high_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_ration')->count() : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($high_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_ration') : 0)) }}
                        </td>
                        <td>{{ en2mm(
                            $high_staffs->sum(fn($staff) =>
                                $staff->staffs->sum(fn($staff) =>
                                    $staff->salaries->filter(fn($salary) =>
                                        $salary->addition_education !== null ||
                                        $salary->addition !== null ||
                                        $salary->addition_ration !== null
                                    )->count()
                                )
                            )
                        ) }}</td>
                        <td>{{ en2mm(
                            $high_staffs->sum(fn($staff) =>
                                $staff->staffs->sum(fn($staff) =>
                                    $staff->salaries->sum(fn($salary) =>
                                        ($salary->addition_education ?? 0) +
                                        ($salary->addition ?? 0) +
                                        ($salary->addition_ration ?? 0)
                                    )
                                )
                            )
                        ) }}</td>
                    </tr>
                    @foreach ($low_staffs as $staff)
                        @php
                            $additionEducationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_education')->isNotEmpty())->count();
                            $additionEducationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_education'));

                            $additionCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count();
                            $additionSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition'));

                            $additionRationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count();
                            $additionRationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_ration'));

                            $totalCount = $staff->staffs->filter(fn($staff) => $staff->salaries->filter(fn($salary) =>
                                $salary->addition_education !== null ||
                                $salary->addition !== null ||
                                $salary->addition_ration !== null
                            )->isNotEmpty())->count();

                            $totalSum = $staff->staffs->sum(fn($staff) =>
                                $staff->salaries->sum(fn($salary) =>
                                    ($salary->addition_education ?? 0) +
                                    ($salary->addition ?? 0) +
                                    ($salary->addition_ration ?? 0)
                                )
                            );
                        @endphp
                        <tr>
                            <td>{{ en2mm($loop->index + 1) }}</td>
                            <td>{{ $staff->payscale->name }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ en2mm($additionEducationCount) }}</td>
                            <td>{{ en2mm($additionEducationSum) }}</td>
                            <td>{{ en2mm($additionCount) }}</td>
                            <td>{{ en2mm($additionSum) }}</td>
                            <td>{{ en2mm($additionRationCount) }}</td>
                            <td>{{ en2mm($additionRationSum) }}</td>
                            <td>{{ en2mm($totalCount) }}</td>
                            <td>{{ en2mm($totalSum) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td>အမှုထမ်းပေါင်း</td>
                        <td>-</td>4
                        <td>
                            {{ en2mm($low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_education')->count() : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_education') : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition')->count() : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition') : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_ration')->count() : 0)) }}
                        </td>
                        <td>
                            {{ en2mm($low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_ration') : 0)) }}
                        </td>
                        <td>{{ en2mm(
                            $low_staffs->sum(fn($staff) =>
                                $staff->staffs->sum(fn($staff) =>
                                    $staff->salaries->filter(fn($salary) =>
                                        $salary->addition_education !== null ||
                                        $salary->addition !== null ||
                                        $salary->addition_ration !== null
                                    )->count()
                                )
                            )
                        ) }}</td>
                        <td>{{ en2mm(
                            $low_staffs->sum(fn($staff) =>
                                $staff->staffs->sum(fn($staff) =>
                                    $staff->salaries->sum(fn($salary) =>
                                        ($salary->addition_education ?? 0) +
                                        ($salary->addition ?? 0) +
                                        ($salary->addition_ration ?? 0)
                                    )
                                )
                            )
                        ) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>စုစုပေါင်း</td>
                        <td>-</td>
                        <td>{{ en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_education')->count() : 0)) }}</td>
                        <td>{{ en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_education') : 0)) }}</td>
                        <td>{{ en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition')->count() : 0)) }}</td>
                        <td>{{ en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition') : 0)) }}</td>
                        <td>{{ en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_ration')->count() : 0)) }}</td>
                        <td>{{ en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_ration') : 0)) }}</td>
                        <td>{{ en2mm(
                            $staffs->sum(fn($staff) =>
                                $staff->staffs->sum(fn($staff) =>
                                    $staff->salaries->filter(fn($salary) =>
                                        $salary->addition_education !== null ||
                                        $salary->addition !== null ||
                                        $salary->addition_ration !== null
                                    )->count()
                                )
                            )
                        ) }}</td>
                        <td>{{ en2mm(
                            $staffs->sum(fn($staff) =>
                                $staff->staffs->sum(fn($staff) =>
                                    $staff->salaries->sum(fn($salary) =>
                                        ($salary->addition_education ?? 0) +
                                        ($salary->addition ?? 0) +
                                        ($salary->addition_ration ?? 0)
                                    )
                                )
                            )
                        ) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


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

