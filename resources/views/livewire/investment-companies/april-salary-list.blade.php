<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-sm mb-2">
                ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၃-၂၀၂၄ခုဘဏ္ဍာရေးနှစ်</h1>
            <h2 class="font-bold text-center text-sm mb-2">ရန်ကုန်ရုံးချုပ်ရှိဝန်ထမ်းများ၏ဧပြီလစာရင်း
                <br><br>
                <table class="md:w-full font-bold text-sm mb-4">
                    <thead>
                        <tr>
                            <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                            <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                            <th rowspan="2" class="border border-black text-center p-2">ဌာန</th>
                            <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                            <th rowspan="2" class="border border-black text-center p-2">မူရင်းလစာ</th>
                            <th rowspan="2" class="border border-black text-center p-2">ခွင့်လစာ<br>တောက်ဖြတ်ငွေ</th>
                            <th rowspan="2" class="border border-black text-center p-2">လစာပေးငွေ</th>
                            <th rowspan="2" class="border border-black text-center p-2">ဝင်ငွေခွန်</th>
                            <th rowspan="2" class="border border-black text-center p-2">အသက်အာမခံကြေး</th>
                            <th rowspan="2" class="border border-black text-center p-2">ဖြတ်တောက်ငွေ</th>

                            <th rowspan="2" class="border border-black text-center p-2">လစာ‌ပေးငွေ</th>
                            <th rowspan="2" class="border border-black text-center p-2">အပိုထောက်ပံ့ငွေ</th>
                            <th rowspan="2" class="border border-black text-center p-2">ထောက်ပံ့ငွေ+လစာ</th>
                            <th rowspan="2" class="border border-black text-center p-2">လက်မှတ်</th>
                            <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>

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
                                    if ($leave->leave_type_id === 5) {
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
                                <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                                <td class="border border-black p-2">{{ $staff->name }}</td>
                                <td class="border border-black p-2">{{ $staff->current_division->nick_name }}</td>
                                <td class="border border-black p-2">{{ $staff->current_rank->name }}</td>
                                <td class="border border-black p-2">{{ en2mm($baseSalary) }}
                                </td>
                                <td class="border border-black p-2">
                                    {{ en2mm($leaveDeduction) }}
                                </td>
                                <td class="border border-black p-2">
                                    {{ en2mm($netSalary) }}
                                </td>
                                <td class="border border-black p-2">{{ en2mm($deductionTax) }}</td>
                                <td class="border border-black p-2">{{ en2mm($deductionInsurance) }}</td>
                                <td class="border border-black p-2">{{ en2mm($deductionOther) }}</td>
                                

                                <td class="border border-black p-2">{{ en2mm($finalSalary) }}</td>
                                <td class="border border-black p-2">{{ en2mm($addition) }}

                                </td>

                                <td class="border border-black p-2">{{ en2mm($totalWithAddition) }}</td>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2"></td>
                            </tr>
                        @endforeach



                        {{-- Totals for High Staff --}}
                        <tr class="font-bold">
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2">အရာထမ်းစုစုပေါင်း</td>
                            <td class="border border-black p-2">-</td>
                            <td class="border border-black p-2">{{ en2mm($high_staffs->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($totalBaseSalaryHigh) }}</td>
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
                                    if ($leave->leave_type_id === 5) {
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
                                <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                                <td class="border border-black p-2">{{ $staff->name }}</td>
                                <td class="border border-black p-2">{{ $staff->current_division->nick_name }}</td>
                                <td class="border border-black p-2">{{ $staff->current_rank->name }}</td>
                                <td class="border border-black p-2">{{ en2mm($baseSalary) }}
                                </td>
                                <td class="border border-black p-2">
                                    {{ en2mm($leaveDeduction) }}
                                </td>
                                <td class="border border-black p-2">
                                    {{ en2mm($netSalary) }}
                                </td>
                                <td class="border border-black p-2">{{ en2mm($deductionTax) }}</td>
                                <td class="border border-black p-2">{{ en2mm($deductionInsurance) }}</td>
                                <td class="border border-black p-2">{{ en2mm($deductionOther) }}</td>
                                

                                <td class="border border-black p-2">{{ en2mm($finalSalary) }}</td>
                                <td class="border border-black p-2">{{ en2mm($addition) }}

                                </td>

                                <td class="border border-black p-2">{{ en2mm($totalWithAddition) }}</td>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2"></td>
                            </tr>
                        @endforeach



                        {{-- Totals for High Staff --}}
                        <tr class="font-bold">
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2">အမှုထမ်းစုစုပေါင်း</td>
                            <td class="border border-black p-2">-</td>
                            <td class="border border-black p-2">{{ en2mm($low_staffs->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($totalBaseSalaryLow) }}</td>
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
                    </tbody>
                </table>
        </div>
    </div>
</div>
