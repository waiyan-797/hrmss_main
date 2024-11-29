<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Finance Salary List</title>
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
        .title {
            font-weight: bold;
            text-align: center;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: center;
        }

        td {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1 class="title">ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၄-၂၀၂၅ဘဏ္ဍာရေးနှစ်<br>ရန်ကုန် ရန်ကုန်ရုံးချုပ်ရှိဝန်ထမ်းများ၏ဧပြီလစာရင်း</h1>
    
    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>ရာထူး</th>
                <th>မှုရင်းလစာ</th>
                <th>နှစ်တိုး</th>
                <th>လစာပေးငွေ</th>
                <th>ခွင့်လစာ<br>ဖြတ်တောက်ငွေ</th>
                <th>လစာပေး‌ငွေ</th>
                <th>ဝင်ငွေခွန်</th>
                <th>အသက်<br>အာမခံကြေး</th>
                <th>၂လစာချေးငွေ<br>ဖြတ်တောက်ခြင်း</th>
                <th>လစာပေးငွေ</th>
                <th>အပိုထောက်ပံ့ငွေ</th>
                <th>လစာ+ထောက်ပံ့ငွေ</th>
                <th>လက်မှတ်</th>
                <th>မှတ်ချက်</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-right"></td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td class="text-right">12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
            </tr>
            <tr>
                <td class="text-right"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>(3+4)</td>
                <td></td>
                <td>(5-6)</td>
                <td></td>
                <td></td>
                <td></td>
                <td>(7-8-9-10)</td>
                <td class="text-right"></td>
                <td>(11+12)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                @php
                        $totalBaseSalaryHigh = 0;
                        $totalIncrementHigh = 0;
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
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->current_rank->name }}</td>
                            <td>{{ en2mm($staff->currentRank->payscale->min_salary) }}
                            </td>
                            <td>
                                {{ en2mm($staff->currentRank->payscale->increment * $staff->current_increment_time) }}
                            </td>
                            <td>
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time) }}
                            </td>

                            @php
                                $dateDifference = 0;
                            @endphp

                            @foreach ($leaves as $leave)
                                @if ($leave->leave_type_id === 1)
                                    @php
                                        $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                        $toDate = \Carbon\Carbon::parse($leave->to_date);
                                        $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                    @endphp
                                @endif
                            @endforeach

                            <td>
                                {{ en2mm(($staff->current_salary / 30) * $dateDifference) }}
                            </td>
                            <td>
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference) }}
                            </td>

                            @php
                                $staffSalaries = $salaries->filter(fn($salary) => $salary->staff_id === $staff->id);
                                $totalDeductionTaxHigh = $staffSalaries->sum('deduction_tax');
                                $totalDeductionInsuranceHigh = $staffSalaries->sum('deduction_insurance');
                                $totalDeductionHigh = $staffSalaries->sum('deduction');
                                $totalAdditionHigh = $staffSalaries->sum('addition');
                                $totalSalaryHigh += $staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxHigh - $totalDeductionInsuranceHigh - $totalDeductionHigh;
                            @endphp

                            <td>
                                {{ en2mm($totalDeductionTaxHigh) }}
                            </td>
                            <td>
                                {{ en2mm($totalDeductionInsuranceHigh) }}
                            </td>
                            <td>
                                {{ en2mm($totalDeductionHigh) }}
                            </td>
                            <td>
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxHigh - $totalDeductionInsuranceHigh - $totalDeductionHigh) }}
                            </td>

                            <td>
                                {{ en2mm($totalAdditionHigh) }}
                            </td>
                            <td>
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxHigh - $totalDeductionInsuranceHigh - $totalDeductionHigh + $totalAdditionHigh) }}
                            </td>

                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach

                    @foreach ($high_staffs as $staff)
                        @php
                            $baseSalary = $staff->currentRank->payscale->min_salary;
                            $increment = $staff->currentRank->payscale->increment * $staff->current_increment_time;
                            $currentSalary = $baseSalary + $increment;
                            $totalBaseSalaryHigh += $baseSalary;
                            $totalIncrementHigh += $increment;
                            $leaveDeduction = 0;
                            $dateDifference = 0;
                        @endphp

                        @foreach ($leaves as $leave)
                            @if ($leave->leave_type_id === 1)
                                @php
                                    $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                    $toDate = \Carbon\Carbon::parse($leave->to_date);
                                    $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                    $leaveDeduction = ($staff->current_salary / 30) * $dateDifference;
                                    $totalDeductionHigh += $leaveDeduction;
                                @endphp
                            @endif
                        @endforeach

                        @php
                            $netSalary = $currentSalary - $leaveDeduction;
                            $totalFinalSalaryHigh += $netSalary;
                        @endphp

                        @foreach ($salaries as $salary)
                            @if ($salary->staff_id === $staff->id)
                                @php
                                    $deductionTaxHigh += $salary->deduction_tax;
                                    $deductionInsuranceHigh += $salary->deduction_insurance;
                                    $deductionHigh += $salary->deduction;
                                    $additionHigh += $salary->addition;
                                    $totalSalaryAdditionHigh += $totalSalaryHigh + $additionHigh;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach

                    {{-- Totals for High Staff --}}
                    <tr class="font-bold">
                        <td></td>
                        <td>အရာထမ်းစုစုပေါင်း</td>
                        <td>{{ en2mm($high_staffs->count()) }}</td>
                        <td>{{ en2mm($totalBaseSalaryHigh) }}</td>
                        <td>{{ en2mm($totalIncrementHigh) }}</td>
                        <td>{{ en2mm($totalBaseSalaryHigh + $totalIncrementHigh) }}
                        </td>
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
                    $totalIncrementLow = 0;
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
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->current_rank->name }}</td>
                        <td>{{ en2mm($staff->currentRank->payscale->min_salary) }}
                        </td>
                        <td>
                            {{ en2mm($staff->currentRank->payscale->increment * $staff->current_increment_time) }}
                        </td>
                        <td>
                            {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time) }}
                        </td>

                        @php
                            $dateDifference = 0;
                        @endphp

                        @foreach ($leaves as $leave)
                            @if ($leave->leave_type_id === 1)
                                @php
                                    $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                    $toDate = \Carbon\Carbon::parse($leave->to_date);
                                    $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                @endphp
                            @endif
                        @endforeach

                        <td>
                            {{ en2mm(($staff->current_salary / 30) * $dateDifference) }}
                        </td>
                        <td>
                            {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference) }}
                        </td>

                        @php
                            $staffSalaries = $salaries->filter(fn($salary) => $salary->staff_id === $staff->id);
                            $totalDeductionTaxLow = $staffSalaries->sum('deduction_tax');
                            $totalDeductionInsuranceLow = $staffSalaries->sum('deduction_insurance');
                            $totalDeductionLow = $staffSalaries->sum('deduction');
                            $totalAdditionLow = $staffSalaries->sum('addition');
                            $totalSalaryLow += $staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxLow - $totalDeductionInsuranceLow - $totalDeductionLow;
                        @endphp

                        <td>
                            {{ en2mm($totalDeductionTaxLow) }}
                        </td>
                        <td>
                            {{ en2mm($totalDeductionInsuranceLow) }}
                        </td>
                        <td>
                            {{ en2mm($totalDeductionLow) }}
                        </td>
                        <td>
                            {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxLow - $totalDeductionInsuranceLow - $totalDeductionLow) }}
                        </td>

                        <td>
                            {{ en2mm($totalAdditionLow) }}
                        </td>
                        <td>
                            {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxLow - $totalDeductionInsuranceLow - $totalDeductionLow + $totalAdditionLow) }}
                        </td>

                        <td></td>
                        <td></td>
                    </tr>
                @endforeach

                @foreach ($low_staffs as $staff)
                    @php
                        $baseSalary = $staff->currentRank->payscale->min_salary;
                        $increment = $staff->currentRank->payscale->increment * $staff->current_increment_time;
                        $currentSalary = $baseSalary + $increment;
                        $totalBaseSalaryLow += $baseSalary;
                        $totalIncrementLow += $increment;
                        $leaveDeduction = 0;
                        $dateDifference = 0;
                    @endphp

                    @foreach ($leaves as $leave)
                        @if ($leave->leave_type_id === 1)
                            @php
                                $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                $toDate = \Carbon\Carbon::parse($leave->to_date);
                                $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                $leaveDeduction = ($staff->current_salary / 30) * $dateDifference;
                                $totalDeductionLow += $leaveDeduction;
                            @endphp
                        @endif
                    @endforeach

                    @php
                        $netSalary = $currentSalary - $leaveDeduction;
                        $totalFinalSalaryLow += $netSalary;
                    @endphp

                    @foreach ($salaries as $salary)
                        @if ($salary->staff_id === $staff->id)
                            @php
                                $deductionTaxLow += $salary->deduction_tax;
                                $deductionInsuranceLow += $salary->deduction_insurance;
                                $deductionLow += $salary->deduction;
                                $additionLow += $salary->addition;
                                $totalSalaryAdditionLow += $totalSalaryLow + $additionLow;
                            @endphp
                        @endif
                    @endforeach
                @endforeach

                
                <tr class="font-bold">
                    <td></td>
                    <td>အမှုထမ်းစုစုပေါင်း</td>
                    <td>{{ en2mm($low_staffs->count()) }}</td>
                    <td>{{ en2mm($totalBaseSalaryLow) }}</td>
                    <td>{{ en2mm($totalIncrementLow) }}</td>
                    <td>{{ en2mm($totalBaseSalaryLow + $totalIncrementLow) }}
                    </td>
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
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း(အရာထမ်း+အမှုထမ်း)</td>
                    <td>{{ en2mm($low_staffs->count()+$high_staffs->count()) }}</td>
                    <td>{{ en2mm($totalBaseSalaryLow+$totalBaseSalaryHigh) }}</td>
                    <td>{{ en2mm($totalIncrementLow+$totalIncrementHigh) }}</td>
                    <td>{{ en2mm($totalBaseSalaryLow + $totalIncrementLow+$totalBaseSalaryHigh + $totalIncrementHigh) }}
                    </td>
                    <td>{{ en2mm($totalDeductionLow+$totalDeductionHigh) }}</td>
                    <td>{{ en2mm($totalFinalSalaryLow+$totalFinalSalaryHigh) }}</td>
                    <td>{{ en2mm($deductionTaxLow+$deductionTaxHigh) }}</td>
                    <td>{{ en2mm($deductionInsuranceLow+$deductionInsuranceHigh) }}</td>
                    <td>{{ en2mm($deductionLow+$deductionHigh) }}</td>
                    <td>{{ en2mm($totalSalaryLow+$totalSalaryHigh) }}</td>
                    <td>{{ en2mm($additionLow+$additionHigh) }}</td>
                    <td>{{ en2mm($totalSalaryAdditionLow+$totalSalaryAdditionHigh) }}</td>
                    <td></td>
                    <td></td>
                </tr>

        </tbody>
    </table>

    </page>
</body>
</html>
