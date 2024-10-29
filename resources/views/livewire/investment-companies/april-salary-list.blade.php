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
                            <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black p-2">{{ $staff->name }}</td>
                            <td class="border border-black p-2">{{ $staff->current_division->nick_name }}</td>
                            <td class="border border-black p-2">{{ $staff->current_rank->name }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->currentRank->payscale->min_salary) }}
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

                            <td class="border border-black p-2">
                                {{ en2mm(($staff->current_salary / 30) * $dateDifference) }}
                            </td>
                            <td class="border border-black p-2">
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

                            <td class="border border-black p-2">
                                {{ en2mm($totalDeductionTaxHigh) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($totalDeductionInsuranceHigh) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($totalDeductionHigh) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxHigh - $totalDeductionInsuranceHigh - $totalDeductionHigh) }}
                            </td>

                            <td class="border border-black p-2">
                                {{ en2mm($totalAdditionHigh) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxHigh - $totalDeductionInsuranceHigh - $totalDeductionHigh + $totalAdditionHigh) }}
                            </td>

                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"></td>
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
                            <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black p-2">{{ $staff->name }}</td>
                            <td class="border border-black p-2">{{ $staff->current_division->nick_name }}</td>
                            <td class="border border-black p-2">{{ $staff->current_rank->name }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->currentRank->payscale->min_salary) }}
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

                            <td class="border border-black p-2">
                                {{ en2mm(($staff->current_salary / 30) * $dateDifference) }}
                            </td>
                            <td class="border border-black p-2">
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

                            <td class="border border-black p-2">
                                {{ en2mm($totalDeductionTaxLow) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($totalDeductionInsuranceLow) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($totalDeductionLow) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxLow - $totalDeductionInsuranceLow - $totalDeductionLow) }}
                            </td>

                            <td class="border border-black p-2">
                                {{ en2mm($totalAdditionLow) }}
                            </td>
                            <td class="border border-black p-2">
                                {{ en2mm($staff->currentRank->payscale->min_salary + $staff->currentRank->payscale->increment * $staff->current_increment_time - ($staff->current_salary / 30) * $dateDifference - $totalDeductionTaxLow - $totalDeductionInsuranceLow - $totalDeductionLow + $totalAdditionLow) }}
                            </td>

                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"></td>
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
