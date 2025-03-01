
    <div class="overflow-x-auto p-4">
        <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
         <h1 class="text-center text-black font-semibold text-base">၂၀၂၄ ခုနှစ်၊ဇန်နဝါရီ လ အတွက် ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာနမှ<br>ဒုတိယဦးစီးမှူး၊ဌာနခွဲစာရေး နှင့် စာရင်းကိုင်(၁/၂/၃)၊အကြီးတန်းစာရေး,ယာဉ်မောင်း(၄),<br>အငယ်တန်းစာရေးနှင့်ယာဉ်မောင်း(၅)များ၏လစာစာရင်း</h1> <br>
        <table class="table-auto w-full border-collapse border border-black">
            <thead>
                    <tr>
                        <th rowspan="2" class="border border-black p-2 text-center">ဌာနစုနှင့် အမှုထမ်း<br> အမည်</th>
                        <th rowspan="2" class="border border-black p-2 text-center">ရာထူးအမည်</th>
                        <th colspan="2" class="border border-black p-2 text-center">အလုပ်ခွင်<br>ကာလအတွက်<br>တောင်းခံသော<br>လစာ</th>
                        <th colspan="2" class="border border-black p-2 text-center">ခွင့်ကာလအတွက်<br>တောင်းခံသော<br>လစာ</th>
                        <th colspan="2" class="border border-black p-2 text-center">ဖြည့်စွက်စရိတ်</th>
                        <th colspan="2" class="border border-black p-2 text-center">၀၃.အောက်ရှိ<br>စရိတ်များ
                        </th>
                        <th colspan="2" class="border border-black p-2 text-center">ပုံသေ<br>ခရီးစရိတ်နှင့်<br>လစဥ်စရိတ်</th>
                        <th colspan="2" class="border border-black p-2 text-center">အပို<br>ထောက်ပံ့<br>ငွေ</th>
                        <th colspan="2" class="border border-black p-2 text-center">စုစုပေါင်း<br>တောင်းခံငွေ
                        </th>
                        <th colspan="2" class="border border-black p-2 text-center">ဖြတ်တောက်ငွေ<br>ဇယားအရ<br>စုစုပေါင်း</th>
                        <th colspan="2" class="border border-black p-2 text-center">အသားတင်<br>ပေးရန်ငွေ</th>
                        <th rowspan="2" class="border border-black p-2 text-center">မှတ်ချက်</th>
                        <th rowspan="2" class="border border-black p-2 text-center">တောင်းခံရရှိကြောင်း ဝန်ခံချက်</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>


                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-center p-2">ပြား</th>

                    </tr>
            </thead>
            <tbody>
                @php
                    $total_work_salary_kyat = 0;
                    $total_work_salary_pyar = 0;

                    $total_leave_salary_kyat = 0;
                    $total_leave_salary_pyar = 0;

                    $total_addition_kyat = 0;
                    $total_addition_pyar = 0;

                    $total_addition_ration_kyat = 0;
                    $total_addition_ration_pyar = 0;

                    $total_addition_education_kyat = 0;
                    $total_addition_education_pyar = 0;

                    $total_sum_kyat = 0;
                    $total_sum_pyar = 0;

                    $total_sum_deduction_kyat = 0;
                    $total_sum_deduction_pyar = 0;

                    $total_left_kyat = 0;
                    $total_left_pyar = 0;
                @endphp
                @foreach ($staffs as $staff)
                    @php
                        $current_salary_record = $staff->salaries->where('rank_id', $staff->current_rank_id)->first();
                        $current_salary = $current_salary_record ? $current_salary_record->actual_salary : 0;
                        $per_day_salary = $current_salary / 31;

                        $staff_leave_records = $leaves->where('staff_id', $staff->id);
                        $january_start = \Carbon\Carbon::createFromDate(date('Y'), 1, 1);
                        $january_end = \Carbon\Carbon::createFromDate(date('Y'), 1, 31);
                        $staff_leave_days = 0;
                        foreach ($staff_leave_records as $leave) {
                            $from_date = \Carbon\Carbon::parse($leave->from_date);
                            $to_date = \Carbon\Carbon::parse($leave->to_date);
                            $leave_start = $from_date->greaterThan($january_start) ? $from_date : $january_start;
                            $leave_end = $to_date->lessThan($january_end) ? $to_date : $january_end;
                            if ($leave_start->lessThanOrEqualTo($leave_end)) {
                                $staff_leave_days += $leave_start->diffInDays($leave_end) + 1;
                            }
                        }

                        //work salary
                        $work_salary = $per_day_salary * (31 - $staff_leave_days);
                        $work_salary_kyat = floor($work_salary);
                        $work_salary_pyar = round(($work_salary - $work_salary_kyat) * 100);

                        $total_work_salary_kyat += $work_salary_kyat;
                        $total_work_salary_pyar += $work_salary_pyar;

                        //leave salary
                        $leave_salary = $per_day_salary * $staff_leave_days;
                        $leave_salary_kyat = floor($leave_salary);
                        $leave_salary_pyar = round(($leave_salary - $leave_salary_kyat) * 100);

                        $total_leave_salary_kyat += $leave_salary_kyat;
                        $total_leave_salary_pyar += $leave_salary_pyar;

                        //addition
                        $addition = $current_salary_record ? $current_salary_record->addition : 0;
                        $addition_kyat = floor($addition);
                        $addition_pyar = round(($addition - $addition_kyat) * 100);

                        $total_addition_kyat += $addition_kyat;
                        $total_addition_pyar += $addition_pyar;

                        //addition_ration
                        $addition_ration = $current_salary_record ? $current_salary_record->addition_ration : 0;
                        $addition_ration_kyat = floor($addition_ration);
                        $addition_ration_pyar = round(($addition_ration - $addition_ration_kyat) * 100);

                        $total_addition_ration_kyat += $addition_ration_kyat;
                        $total_addition_ration_pyar += $addition_ration_pyar;

                        //addition_education
                        $addition_education = $current_salary_record ? $current_salary_record->addition_education : 0;
                        $addition_education_kyat = floor($addition_education);
                        $addition_education_pyar = round(($addition_education - $addition_education_kyat) * 100);

                        $total_addition_education_kyat += $addition_education_kyat;
                        $total_addition_education_pyar += $addition_education_pyar;

                        //total
                        $total_kyat = $work_salary_kyat + $leave_salary_kyat + $addition_kyat + $addition_ration_kyat + $addition_education_kyat;
                        $total_pyar = $work_salary_pyar + $leave_salary_pyar + $addition_pyar + $addition_ration_pyar + $addition_education_pyar;

                        $total_sum_kyat += $total_kyat;
                        $total_sum_pyar += $total_pyar;

                        //total_deduction
                        $total_deduction = ($current_salary_record ? $current_salary_record->deduction : 0) + ($current_salary_record ? $current_salary_record->deduction_insurance : 0) + ($current_salary_record ? $current_salary_record->deduction_tax : 0);
                        $total_deduction_kyat = floor($total_deduction);
                        $total_deduction_pyar = round(($total_deduction - $total_deduction_kyat) * 100);

                        $total_sum_deduction_kyat += $total_deduction_kyat;
                        $total_sum_deduction_pyar += $total_deduction_pyar;

                        //left
                        $left_kyat = $total_kyat - $total_deduction_kyat;
                        $left_pyar = $total_pyar - $total_deduction_pyar;

                        $total_left_kyat += $left_kyat;
                        $total_left_pyar += $left_pyar;
                    @endphp
                    <tr>
                        <td class="border border-black p-2 text-center">{{ $staff->name }}</td>
                        <td class="border border-black p-2 text-center">{{ $staff->currentRank->name }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($work_salary_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($work_salary_pyar) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($leave_salary_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($leave_salary_pyar) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($addition_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($addition_pyar) }}</td>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-center">{{ en2mm($addition_ration_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($addition_ration_pyar) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($addition_education_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($addition_education_pyar) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($total_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($total_pyar) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($total_deduction_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($total_deduction_pyar) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($left_kyat) }}</td>
                        <td class="border border-black p-2 text-center">{{ en2mm($left_pyar) }}</td>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-center"></td>
                    </tr>
                @endforeach
                <tr>
                    <td class="border border-black p-2 text-center">စုစုပေါင်း({{ en2mm($staffs->count()) }})ဦး</td>
                    <td class="border border-black p-2"></td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_work_salary_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_work_salary_pyar) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_leave_salary_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_leave_salary_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_addition_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_addition_pyar) }}</td>
                    <td class="border border-black p-2 text-center"></td>
                    <td class="border border-black p-2 text-center"></td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_addition_ration_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_addition_ration_pyar) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_addition_education_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_addition_education_pyar) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_sum_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_sum_pyar) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_sum_deduction_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_sum_deduction_pyar) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_left_kyat) }}</td>
                    <td class="border border-black p-2 text-center">{{ en2mm($total_left_pyar) }}</td>
                    <td class="border border-black p-2 text-center"></td>
                    <td class="border border-black p-2 text-center"></td>
                </tr>

            </tbody>
        </table>
    </div>
