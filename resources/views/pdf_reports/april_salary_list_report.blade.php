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
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        th {
            font-weight: bold;
        }

        .header-row {
            background-color: #f0f0f0;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <page size="A4">
        <h1 class="title">ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၃-၂၀၂၄ခုဘဏ္ဍာရေးနှစ်</h1>
        <h2 class="title">ရန်ကုန်ရုံးချုပ်ရှိဝန်ထမ်းများ၏ဧပြီလစာရင်း</h2>

        <table>
            <thead>
                <tr>
                    <th>စဉ်</th>
                    <th>အမည်</th>
                    <th>ဌာန</th>
                    <th>ရာထူး</th>
                    <th>မူရင်းလစာ</th>
                    <th>ခွင့်လစာ<br>တောက်ဖြတ်ငွေ</th>
                    <th>လစာပေးငွေ</th>
                    <th>ဝင်ငွေခွန်</th>
                    <th>အသက်အာမခံကြေး</th>
                    <th></th>
                    <th>လစာ‌ပေးငွေ</th>
                    <th>အပိုထောက်ပံ့ငွေ</th>
                    <th>ထောက်ပံ့ငွေ+လစာ</th>
                    <th>လက်မှတ်</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                @php
                            $totalBaseSalaryHigh = 0;
                            $totalDeductionHigh = 0;
                            $totalFinalSalaryHigh = 0;
                            $deductionTaxHigh = 0;
                            $deductionInsuranceHigh = 0;
                            $deductionHigh = 0;
                            $totalSalaryHigh = 0;
                            $additionHigh = 0;
                            $totalSalaryAdditionHigh = 0;
                        @endphp
                        @foreach ($high_staffs as $staff)
                            @php
                                $baseSalary = $staff->currentRank->payscale->min_salary;
                                $totalBaseSalaryHigh += $baseSalary;

                                $leaveDeduction = 0;
                                $dateDifference = 0;
                                foreach ($staff->leaves as $leave) {
                                    if ($leave->leave_type_id === 1) {
                                        $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                        $toDate = \Carbon\Carbon::parse($leave->to_date);
                                        $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                        $leaveDeduction = ($staff->current_salary / 30) * $dateDifference;
                                    }
                                }
                                $totalDeductionHigh += $leaveDeduction;
                                $netSalary = $baseSalary - $leaveDeduction;

                                $staffSalaries = $salaries->where('staff_id', $staff->id);
                                $deductionTax = $staffSalaries->sum('deduction_tax');
                                $deductionInsurance = $staffSalaries->sum('deduction_insurance');
                                $deductionOther = $staffSalaries->sum('deduction');
                                $addition = $staffSalaries->sum('addition');

                                $deductionTaxHigh += $deductionTax;
                                $deductionInsuranceHigh += $deductionInsurance;
                                $deductionHigh += $deductionOther;
                                $additionHigh += $addition;

                                $finalSalary = $netSalary - $deductionTax - $deductionInsurance - $deductionOther;
                                $totalWithAddition = $finalSalary + $addition;
                                $totalFinalSalaryHigh += $netSalary;
                                $totalSalaryHigh += $finalSalary;
                                $totalSalaryAdditionHigh += $totalWithAddition;

                            @endphp


                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->current_division->nick_name }}</td>
                                <td>{{ $staff->current_rank->name }}</td>
                                <td>{{ en2mm($baseSalary) }}
                                </td>
                                <td>
                                    {{ en2mm($leaveDeduction) }}
                                </td>
                                <td>
                                    {{ en2mm($netSalary) }}
                                </td>
                                <td>{{ en2mm($deductionTax) }}</td>
                                <td>{{ en2mm($deductionInsurance) }}</td>
                                <td>{{ en2mm($deductionOther) }}</td>
                                

                                <td>{{ en2mm($finalSalary) }}</td>
                                <td>{{ en2mm($addition) }}

                                </td>

                                <td>{{ en2mm($totalWithAddition) }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach



                        {{-- Totals for High Staff --}}
                        <tr class="font-bold">
                            <td></td>
                            <td>အရာထမ်းစုစုပေါင်း</td>
                            <td>-</td>
                            <td>{{ en2mm($high_staffs->count()) }}</td>
                            <td>{{ en2mm($totalBaseSalaryHigh) }}</td>
                            <td>{{ en2mm($totalDeductionHigh) }}</td>
                            <td>{{ en2mm($totalFinalSalaryHigh) }}</td>
                            <td>{{ en2mm($deductionTaxHigh) }}</td>
                            <td>{{ en2mm($deductionInsuranceHigh) }}</td>
                            <td>{{ en2mm($deductionHigh) }}</td>

                            <td>{{ en2mm($totalSalaryHigh) }}</td>
                            <td>{{ en2mm($additionHigh) }}</td>
                            <td>{{ en2mm($totalSalaryAdditionHigh) }}</td>
                            <td></td>
                            <td></td>
                        </tr>

                        @php
                            $totalBaseSalaryLow = 0;
                            $totalDeductionLow = 0;
                            $totalFinalSalaryLow = 0;
                            $deductionTaxLow = 0;
                            $deductionInsuranceLow = 0;
                            $deductionLow = 0;
                            $totalSalaryLow = 0;
                            $additionLow = 0;
                            $totalSalaryAdditionLow = 0;
                        @endphp
                        @foreach ($low_staffs as $staff)
                            @php
                                $baseSalary = $staff->currentRank->payscale->min_salary;
                                $totalBaseSalaryLow += $baseSalary;

                                $leaveDeduction = 0;
                                $dateDifference = 0;
                                foreach ($staff->leaves as $leave) {
                                    if ($leave->leave_type_id === 1) {
                                        $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                        $toDate = \Carbon\Carbon::parse($leave->to_date);
                                        $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                        $leaveDeduction = ($staff->current_salary / 30) * $dateDifference;
                                    }
                                }
                                $totalDeductionLow += $leaveDeduction;
                                $netSalary = $baseSalary - $leaveDeduction;

                                $staffSalaries = $salaries->where('staff_id', $staff->id);
                                $deductionTax = $staffSalaries->sum('deduction_tax');
                                $deductionInsurance = $staffSalaries->sum('deduction_insurance');
                                $deductionOther = $staffSalaries->sum('deduction');
                                $addition = $staffSalaries->sum('addition');

                                $deductionTaxLow += $deductionTax;
                                $deductionInsuranceLow += $deductionInsurance;
                                $deductionLow += $deductionOther;
                                $additionLow += $addition;

                                $finalSalary = $netSalary - $deductionTax - $deductionInsurance - $deductionOther;
                                $totalWithAddition = $finalSalary + $addition;
                                $totalFinalSalaryLow += $netSalary;
                                $totalSalaryLow += $finalSalary;
                                $totalSalaryAdditionLow += $totalWithAddition;

                            @endphp


                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->current_division->nick_name }}</td>
                                <td>{{ $staff->current_rank->name }}</td>
                                <td>{{ en2mm($baseSalary) }}
                                </td>
                                <td>
                                    {{ en2mm($leaveDeduction) }}
                                </td>
                                <td>
                                    {{ en2mm($netSalary) }}
                                </td>
                                <td>{{ en2mm($deductionTax) }}</td>
                                <td>{{ en2mm($deductionInsurance) }}</td>
                                <td>{{ en2mm($deductionOther) }}</td>
                                

                                <td>{{ en2mm($finalSalary) }}</td>
                                <td>{{ en2mm($addition) }}

                                </td>

                                <td>{{ en2mm($totalWithAddition) }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach



                        {{-- Totals for High Staff --}}
                        <tr class="font-bold">
                            <td></td>
                            <td>အမှုထမ်းစုစုပေါင်း</td>
                            <td>-</td>
                            <td>{{ en2mm($low_staffs->count()) }}</td>
                            <td>{{ en2mm($totalBaseSalaryLow) }}</td>
                            <td>{{ en2mm($totalDeductionLow) }}</td>
                            <td>{{ en2mm($totalFinalSalaryLow) }}</td>
                            <td>{{ en2mm($deductionTaxLow) }}</td>
                            <td>{{ en2mm($deductionInsuranceLow) }}</td>
                            <td>{{ en2mm($deductionLow) }}</td>

                            <td>{{ en2mm($totalSalaryLow) }}</td>
                            <td>{{ en2mm($additionLow) }}</td>
                            <td>{{ en2mm($totalSalaryAdditionLow) }}</td>
                            <td></td>
                            <td></td>
                        </tr>
            </tbody>
        </table>
    </page>
</body>

</html>
