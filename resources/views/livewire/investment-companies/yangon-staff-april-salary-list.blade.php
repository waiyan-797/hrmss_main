<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base">ရင်းနှီးမြှပ်နှံမှုနှင့်
                ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၄-၂၀၂၅ဘဏ္ဍာရေးနှစ်<br>ရန်ကုန်
                ရန်ကုန်ရုံးချုပ်ရှိဝန်ထမ်းများ၏ဧပြီလစာရင်း</h1>
            <table class="md:w-full">

                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">မှုရင်းလစာ</th>
                        <th class="border border-black text-left p-1">နှစ်တိုး</th>
                        <th class="border border-black text-left p-1">လစာပေးငွေ </th>
                        <th class="border border-black text-left p-1">ခွင့်လစာ<br>ဖြတ်တောက်ငွေ</th>
                        <th class="border border-black text-left p-1">လစာပေး‌ငွေ</th>
                        <th class="border border-black text-left p-1">ဝင်ငွေခွန်</th>
                        <th class="border border-black text-left p-1">အသက်<br>
                            အာမခံကြေး</th>
                        <th class="border border-black text-left p-1">၂လစာချေးငွေ<br>ဖြတ်တောက်ခြင်း</th>
                        <th class="border border-black text-left p-1">လစာပေးငွေ </th>
                        <th class="border border-black text-left p-1">အပိုထောက်ပံ့ငွေ</th>
                        <th class="border border-black text-left p-1">လစာ+ထောက်ပံ့ငွေ</th>
                        <th class="border border-black text-left p-1">လက်မှတ်</th>
                        <th class="border border-black text-left p-1">မှတ်ချက် </th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="border border-black text-right p-1"></td>
                        <td class="border border-black text-left p-1">1</td>
                        <td class="border border-black text-left p-1">2</td>
                        <td class="border border-black text-left p-1">3</td>
                        <td class="border border-black text-left p-1">4</td>
                        <td class="border border-black text-left p-1">5</td>
                        <td class="border border-black text-left p-1">6</td>
                        <td class="border border-black text-left p-1">7
                        </td>
                        <td class="border border-black text-left p-1">8
                        </td>
                        <td class="border border-black text-left p-1">9
                        </td>
                        <td class="border border-black text-left p-1">10
                        </td>
                        <td class="border border-black text-left p-1">11
                        </td>
                        <td class="border border-black text-right p-1">12</td>
                        <td class="border border-black text-left p-1">13</td>
                        <td class="border border-black text-left p-1">14</td>
                        <td class="border border-black text-left p-1">15</td>
                    </tr>
                    <tr>
                        <td class="border border-black text-right p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1">(3+4)</td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1">(5-6)
                        </td>
                        <td class="border border-black text-left p-1">
                        </td>
                        <td class="border border-black text-left p-1">
                        </td>
                        <td class="border border-black text-left p-1">
                        </td>
                        <td class="border border-black text-left p-1">(7-8-9-10)
                        </td>
                        <td class="border border-black text-right p-1"></td>
                        <td class="border border-black text-left p-1">(11+12)</td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                    </tr>
                    @php
                        // Initialize totals
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

                    @foreach ($high_staffs as $index => $staff)
                        @php
                            // Calculate base salary, increments, and current salary
                            $baseSalary = $staff->currentRank->payscale->min_salary;
                            $increment = $staff->currentRank->payscale->increment * $staff->current_increment_time;
                            $currentSalary = $baseSalary + $increment;
                            $totalBaseSalaryHigh += $baseSalary;
                            $totalIncrementHigh += $increment;

                            // Calculate leave deductions
                            $leaveDeduction = 0;
                            $dateDifference = 0;
                            foreach ($staff->leaves as $leave) {
                                if ($leave->leave_type_id === 5) {
                                    $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                    $toDate = \Carbon\Carbon::parse($leave->to_date);
                                    $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                    $leaveDeduction += ($staff->current_salary / 30) * $dateDifference;
                                }
                            }
                            $totalDeductionHigh += $leaveDeduction;
                            $netSalary = $currentSalary - $leaveDeduction;

                            // Calculate salary deductions and additions
                            $staffSalaries = $salaries->where('staff_id', $staff->id);
                            $deductionTax = $staffSalaries->sum('deduction_tax');
                            $deductionInsurance = $staffSalaries->sum('deduction_insurance');
                            $deductionOther = $staffSalaries->sum('deduction');
                            $addition = $staffSalaries->sum('addition');

                            // Update totals
                            $deductionTaxHigh += $deductionTax;
                            $deductionInsuranceHigh += $deductionInsurance;
                            $deductionHigh += $deductionOther;
                            $additionHigh += $addition;

                            // Final salary calculations
                            $finalSalary = $netSalary - $deductionTax - $deductionInsurance - $deductionOther;
                            $totalWithAddition = $finalSalary + $addition;
                            $totalFinalSalaryHigh += $netSalary;
                            $totalSalaryHigh += $finalSalary;
                            $totalSalaryAdditionHigh += $totalWithAddition;
                        @endphp

                        <tr>
                            <td class="border border-black p-2">{{ $index + 1 }}</td>
                            <td class="border border-black p-2">{{ $staff->name }}</td>
                            <td class="border border-black p-2">{{ $staff->current_rank->name ?? '' }}</td>
                            <td class="border border-black p-2">{{ en2mm($baseSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($increment) }}</td>
                            <td class="border border-black p-2">{{ en2mm($currentSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($leaveDeduction) }}</td>
                            <td class="border border-black p-2">{{ en2mm($netSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($deductionTax) }}</td>
                            <td class="border border-black p-2">{{ en2mm($deductionInsurance) }}</td>
                            <td class="border border-black p-2">{{ en2mm($deductionOther) }}</td>
                            <td class="border border-black p-2">{{ en2mm($finalSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($addition) }}</td>
                            <td class="border border-black p-2">{{ en2mm($totalWithAddition) }}</td>
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"></td>
                        </tr>
                    @endforeach

                    <tr class="font-bold">
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">အရာထမ်းစုစုပေါင်း</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->count()) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalBaseSalaryHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalIncrementHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalBaseSalaryHigh + $totalIncrementHigh) }}
                        </td>
                        <td class="border border-black p-2">{{ en2mm($totalDeductionHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalFinalSalaryHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($deductionTaxHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($deductionInsuranceHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($deductionHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalSalaryHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($additionHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalSalaryAdditionHigh) }}</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                    @php
                        // Initialize totals
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

                    @foreach ($low_staffs as $index => $staff)
                        @php
                         
                            $baseSalary = $staff->currentRank->payscale->min_salary;
                            $increment = $staff->currentRank->payscale->increment * $staff->current_increment_time;
                            $currentSalary = $baseSalary + $increment;
                            $totalBaseSalaryLow += $baseSalary;
                            $totalIncrementLow += $increment;

                          
                            $leaveDeduction = 0;
                            $dateDifference = 0;
                            foreach ($staff->leaves as $leave) {
                                if ($leave->leave_type_id === 5) {
                                    $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                    $toDate = \Carbon\Carbon::parse($leave->to_date);
                                    $dateDifference = $fromDate->diffInDays($toDate) + 1;
                                    $leaveDeduction += ($staff->current_salary / 30) * $dateDifference;
                                }
                            }
                            $totalDeductionLow += $leaveDeduction;
                            $netSalary = $currentSalary - $leaveDeduction;

                            // Calculate salary deductions and additions
                            $staffSalaries = $salaries->where('staff_id', $staff->id);
                            $deductionTax = $staffSalaries->sum('deduction_tax');
                            $deductionInsurance = $staffSalaries->sum('deduction_insurance');
                            $deductionOther = $staffSalaries->sum('deduction');
                            $addition = $staffSalaries->sum('addition');

                            // Update totals
                            $deductionTaxLow += $deductionTax;
                            $deductionInsuranceLow += $deductionInsurance;
                            $deductionLow += $deductionOther;
                            $additionLow += $addition;

                            // Final salary calculations
                            $finalSalary = $netSalary - $deductionTax - $deductionInsurance - $deductionOther;
                            $totalWithAddition = $finalSalary + $addition;
                            $totalFinalSalaryLow += $netSalary;
                            $totalSalaryLow += $finalSalary;
                            $totalSalaryAdditionLow += $totalWithAddition;
                        @endphp

                        <tr>
                            <td class="border border-black p-2">{{ $index + 1 }}</td>
                            <td class="border border-black p-2">{{ $staff->name }}</td>
                            <td class="border border-black p-2">{{ $staff->current_rank->name ?? '' }}</td>
                            <td class="border border-black p-2">{{ en2mm($baseSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($increment) }}</td>
                            <td class="border border-black p-2">{{ en2mm($currentSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($leaveDeduction) }}</td>
                            <td class="border border-black p-2">{{ en2mm($netSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($deductionTax) }}</td>
                            <td class="border border-black p-2">{{ en2mm($deductionInsurance) }}</td>
                            <td class="border border-black p-2">{{ en2mm($deductionOther) }}</td>
                            <td class="border border-black p-2">{{ en2mm($finalSalary) }}</td>
                            <td class="border border-black p-2">{{ en2mm($addition) }}</td>
                            <td class="border border-black p-2">{{ en2mm($totalWithAddition) }}</td>
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"></td>
                        </tr>
                    @endforeach

                    <tr class="font-bold">
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">အမှုထမ်းစုစုပေါင်း</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->count()) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalBaseSalaryLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalIncrementLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalBaseSalaryLow + $totalIncrementLow) }}
                        </td>
                        <td class="border border-black p-2">{{ en2mm($totalDeductionLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalFinalSalaryLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($deductionTaxLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($deductionInsuranceLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($deductionLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalSalaryLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($additionLow) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalSalaryAdditionLow) }}</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>



                    <tr class="font-bold">
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">စုစုပေါင်း(အရာထမ်း+အမှုထမ်း)</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->count() + $high_staffs->count()) }}
                        </td>
                        <td class="border border-black p-2">{{ en2mm($totalBaseSalaryLow + $totalBaseSalaryHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalIncrementLow + $totalIncrementHigh) }}</td>
                        <td class="border border-black p-2">
                            {{ en2mm($totalBaseSalaryLow + $totalIncrementLow + $totalBaseSalaryHigh + $totalIncrementHigh) }}
                        </td>
                        <td class="border border-black p-2">{{ en2mm($totalDeductionLow + $totalDeductionHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalFinalSalaryLow + $totalFinalSalaryHigh) }}
                        </td>
                        <td class="border border-black p-2">{{ en2mm($deductionTaxLow + $deductionTaxHigh) }}</td>
                        <td class="border border-black p-2">
                            {{ en2mm($deductionInsuranceLow + $deductionInsuranceHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($deductionLow + $deductionHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($totalSalaryLow + $totalSalaryHigh) }}</td>
                        <td class="border border-black p-2">{{ en2mm($additionLow + $additionHigh) }}</td>
                        <td class="border border-black p-2">
                            {{ en2mm($totalSalaryAdditionLow + $totalSalaryAdditionHigh) }}</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
