<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="text-center text-sm mb-2">နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
                နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏</h1>
            <h2 class="font-bold text-center text-sm mb-4">လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့်
                အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
            </h2>

            <table class="md:w-full font-bold text-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာနှုန်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူးအဆင့်</th>
                        <th colspan="2" class="border border-black text-center p-2">ဦးရေ</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဘွဲ့အလိုက်<br>ချီးမြှင့်ငွေ</th>
                        <th rowspan="2" class="border border-black text-center p-2">အခြားချီးမြှင့်ငွေ/စရိတ်များ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဒေသစရိတ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာနှင့်စရိတ်ပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ခွင့်ပြု</th>
                        <th class="border border-black text-center p-2">ခန့်ပြီး</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">၂</td>
                        <td class="border border-black text-center p-2">၃</td>
                        <td class="border border-black text-center p-2">၄</td>
                        <td class="border border-black text-center p-2">၅</td>
                        <td class="border border-black text-center p-2">၆</td>
                        <td class="border border-black text-center p-2">၇</td>
                        <td class="border border-black text-center p-2">၈</td>
                        <td class="border border-black text-center p-2">၁၁</td>
                        <td class="border border-black text-center p-2">၁၂=၆+၇+၈+၉+၁၀+၁၁</td>
                    </tr>
                  





                     @php
    $firstPayscales = $first_payscales->filter(function ($payscale) {
        return $payscale->staff->count(); 
    });
@endphp

@foreach ($first_payscales as $payscale)
    @php
        $totalActualSalary = $payscale->staff->sum('actual_salary');
        $totalAdditionEducation = $payscale->staff->sum('addition_education');
        $totalAddition = $payscale->staff->sum('addition');
        $totalAdditionRation = $payscale->staff->sum('addition_ration');
    @endphp
    <tr>
        <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
        <td class="border border-black p-2">{{ $payscale->name }}</td>
        <td class="border border-black p-2">{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
        <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
        <td class="border border-black p-2">{{ en2mm($payscale->staff->count()) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalActualSalary) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalAdditionEducation) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalAddition) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalAdditionRation) }}</td>
    </tr>
@endforeach 





{{-- @php
$totalActualSalaryFirst = 0;
$totalAdditionEducation = 0;
$totalAddition = 0;
$totalAdditionRation = 0;
@endphp
@foreach ($first_payscales as $payscale)
<tr>
    <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
    <td class="border border-black p-2">{{ $payscale->name }}</td>
    <td class="border border-black p-2">{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
    <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
    <td class="border border-black p-2">{{ en2mm($payscale->staff->count()) }}
    </td>
   

    @php
        $staffSalaries = $salaries->filter(fn($salary) => $salary->staff_id === $staff->id);
        $totalActualSalaryFirst = $staffSalaries->sum('actual_salary');
        $totalAdditionEducationFirst = $staffSalaries->sum('addition_education');
        $totalAdditionFirst = $staffSalaries->sum('addition');
        $totalAdditionRationFirst=$staffSalaries->sum('addition_ration');
        
    @endphp

    <td class="border border-black p-2">
        {{ en2mm($totalActualSalaryFirst) }}
    </td>
    <td class="border border-black p-2">
        {{ en2mm($totalAdditionEducationFirst) }}
    </td>
    <td class="border border-black p-2">
        {{ en2mm($totalAdditionFirst) }}
    </td>
    <td class="border border-black p-2">
        {{ en2mm($totalAdditionRationFirst) }}
    </td>

    
</tr>
@endforeach --}}

                    {{-- @foreach ($first_payscales as $payscale)
                        <tr>
                            <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black p-2">{{ $payscale->name }}</td>
                            <td class="border border-black p-2">{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
                            <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
                            <td class="border border-black p-2">{{ en2mm($payscale->staff->count()) }}</td>
                            <td class="border border-black text-right p-2">
                                
                            </td>
                            <td class="border border-black text-right p-2">
                                
                            </td>
                            <td class="border border-black text-right p-2">
                               
                            </td>
                            <td class="border border-black text-right p-2">
                                
                            </td>
                            <td class="border border-black text-right p-2">
                        </tr>
                    @endforeach --}}


                    {{-- @foreach ($first_payscales as $payscale)
    @php
     
        $additionCount = $payscale->staff->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count();
        $additionSum = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));

        $additionRationCount = $payscale->staff->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count();
        $additionRationSum = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition_ration'));

        $totalCount = $payscale->staff->filter(fn($staff) => $staff->salaries->filter(fn($salary) =>
            $salary->addition !== null ||
            $salary->addition_ration !== null
        )->isNotEmpty())->count();

        $totalSum = $payscale->staff->sum(fn($staff) =>
            $staff->salaries->sum(fn($salary) =>
                ($salary->addition ?? 0) +
                ($salary->addition_ration ?? 0)
            )
        );
    @endphp
    <tr>
        <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
        <td class="border border-black p-2">{{ $payscale->name }}</td>
        <td class="border border-black p-2">{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
        <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
        <td class="border border-black p-2">{{ en2mm($payscale->staff->count()) }}</td>

        <td class="border border-black text-right p-2">{{ en2mm($additionCount) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionSum) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionRationCount) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionRationSum) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalCount) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalSum) }}</td>
    </tr>
@endforeach --}}
                    {{-- @foreach ($first_payscales as $payscale)
    @php
        
        $additionCount = $payscale->staff->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count();
        $additionSum = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));

        $additionRationCount = $payscale->staff->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count();
        $additionRationSum = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition_ration'));

        $totalCount = $payscale->staff->filter(fn($staff) => $staff->salaries->filter(fn($salary) =>
            $salary->addition !== null ||
            $salary->addition_ration !== null
        )->isNotEmpty())->count();

        $totalSum = $payscale->staff->sum(fn($staff) =>
            $staff->salaries->sum(fn($salary) =>
                ($salary->addition ?? 0) +
                ($salary->addition_ration ?? 0)
            )
        );
    @endphp
    <tr>
        <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
        <td class="border border-black p-2">{{ $payscale->name }}</td>
        <td class="border border-black p-2">{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
        <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
        <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>

        <td class="border border-black text-right p-2">{{ en2mm($additionCount) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionSum) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionRationCount) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionRationSum) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalCount) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($totalSum) }}</td>
    </tr>
@endforeach --}}
                    {{-- @foreach ($first_payscales as $payscale)
                        @php
                            $additionCount = $payscale->staff
                                ->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())
                                ->count();
                            $additionSum = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));

                            $additionRationCount = $payscale->staff
                                ->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())
                                ->count();
                            $additionRationSum = $payscale->staff->sum(
                                fn($staff) => $staff->salaries->sum('addition_ration'),
                            );

                            $totalCount = $payscale->staff
                                ->filter(
                                    fn($staff) => $staff->salaries
                                        ->filter(
                                            fn($salary) => $salary->addition !== null ||
                                                $salary->addition_ration !== null,
                                        )
                                        ->isNotEmpty(),
                                )
                                ->count();

                            $totalSum = $payscale->staff->sum(
                                fn($staff) => $staff->salaries->sum(
                                    fn($salary) => ($salary->addition ?? 0) + ($salary->addition_ration ?? 0),
                                ),
                            );
                        @endphp
                        <tr>
                            <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black p-2">{{ $payscale->name }}</td>
                            <td class="border border-black p-2">{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
                            <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
                            <td class="border border-black text-right p-2">{{ en2mm($additionCount) }}</td>
                            <td class="border border-black text-right p-2">{{ en2mm($additionSum) }}</td>
                            <td class="border border-black text-right p-2">{{ en2mm($additionRationCount) }}</td>
                            <td class="border border-black text-right p-2">{{ en2mm($additionRationSum) }}</td>
                            <td class="border border-black text-right p-2">{{ en2mm($totalCount) }}</td>
                            <td class="border border-black text-right p-2">{{ en2mm($totalSum) }}</td>
                        </tr>
                    @endforeach --}}




                    {{-- 
                    @php

                        $totalActualSalaryFirst = $first_payscales->sum(
                            fn($payscale) => $salaries[0]->actual_salary ?? 0,
                        );
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
                        <td class="border border-black p-2 font-semibold"></td>
                        <td class="border border-black p-2 font-semibold">{{ $first_payscales[0]->staff_type->name }}
                            စုစုပေါင်း</td>
                        <td class="border border-black p-2 font-semibold">-</td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalActualSalaryFirst) }}</td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalAdditionEducationFirst) }}</td>
                        <td class="border border-black text-right p-2 font-semibold">{{ en2mm($totalAdditionFirst) }}
                        </td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalAdditionRationFirst) }}</td>
                        <td class="border border-black text-right p-2 font-semibold">{{ en2mm($totalOverallFirst) }}
                        </td>
                    </tr> --}}
                    {{-- @php
                        $totalActualSalaryFirst = $first_payscales->sum(function ($payscale) {
                            return $payscale->staff->sum(function ($staff) {
                                return $staff->salaries->sum('actual_salary') ?? 0;
                            });
                        });

                        $totalAdditionEducationFirst = $first_payscales->sum(function ($payscale) {
                            return $payscale->staff->sum(function ($staff) {
                                return $staff->salaries->sum('addition_education') ?? 0;
                            });
                        });

                        $totalAdditionFirst = $first_payscales->sum(function ($payscale) {
                            return $payscale->staff->sum(function ($staff) {
                                return $staff->salaries->sum('addition') ?? 0;
                            });
                        });

                        $totalAdditionRationFirst = $first_payscales->sum(function ($payscale) {
                            return $payscale->staff->sum(function ($staff) {
                                return $staff->salaries->sum('addition_ration') ?? 0;
                            });
                        });

                        $totalOverallFirst =
                            $totalActualSalaryFirst +
                            $totalAdditionEducationFirst +
                            $totalAdditionFirst +
                            $totalAdditionRationFirst;
                    @endphp

                    <tr>
                        <td class="border border-black p-2 font-semibold"></td>
                        <td class="border border-black p-2 font-semibold">{{ $first_payscales[0]->staff_type->name }}
                            စုစုပေါင်း</td>
                        <td class="border border-black p-2 font-semibold">-</td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($first_payscales->sum('allowed_qty')) }}
                        </td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())) }}
                        </td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalActualSalaryFirst) }}
                        </td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalAdditionEducationFirst) }}
                        </td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalAdditionFirst) }}
                        </td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalAdditionRationFirst) }}
                        </td>
                        <td class="border border-black text-right p-2 font-semibold">
                            {{ en2mm($totalOverallFirst) }}
                        </td>
                    </tr> --}}
                 
                        
                            {{-- @foreach ($first_payscales as $payscale)
                                @php
                                    $additionCount = $payscale->staff->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count();
                                    $additionSum = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));
                    
                                    $additionRationCount = $payscale->staff->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count();
                                    $additionRationSum = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition_ration'));
                    
                                    $totalCount = $payscale->staff->filter(fn($staff) => $staff->salaries->filter(fn($salary) =>
                                        $salary->addition !== null ||
                                        $salary->addition_ration !== null
                                    )->isNotEmpty())->count();
                    
                                    $totalSum = $payscale->staff->sum(fn($staff) =>
                                        $staff->salaries->sum(fn($salary) =>
                                            ($salary->addition ?? 0) +
                                            ($salary->addition_ration ?? 0)
                                        )
                                    );
                                @endphp
                                <tr>
                                    <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                                    <td class="border border-black p-2">{{ $payscale->name }}</td>
                                    <td class="border border-black p-2">{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
                                    <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
                                    <td class="border border-black text-right p-2">{{ en2mm($additionCount) }}</td>
                                    <td class="border border-black text-right p-2">{{ en2mm($additionSum) }}</td>
                                    <td class="border border-black text-right p-2">{{ en2mm($additionRationCount) }}</td>
                                    <td class="border border-black text-right p-2">{{ en2mm($additionRationSum) }}</td>
                                    <td class="border border-black text-right p-2">{{ en2mm($totalCount) }}</td>
                                    <td class="border border-black text-right p-2">{{ en2mm($totalSum) }}</td>
                                </tr>
                            @endforeach
                         --}}
                         {{-- @php
    $totalActualSalary = 0;
    $totalAdditionEducation = 0;
    $totalAddition = 0;
    $totalAdditionRation = 0;
    $totalStaffCount = 0;
@endphp

@foreach ($first_payscales as $payscale)
    @php
       
        $actualSalarySum = $payscale->staff->sum('actual_salary');
        $additionEducationSum = $payscale->staff->sum('addition_education');
        $additionSum = $payscale->staff->sum('addition');
        $additionRationSum = $payscale->staff->sum('addition_ration');
        $staffCount = $payscale->staff->count();
        $totalActualSalary += $actualSalarySum;
        $totalAdditionEducation += $additionEducationSum;
        $totalAddition += $additionSum;
        $totalAdditionRation += $additionRationSum;
        $totalStaffCount += $staffCount;
    @endphp

    <tr>
        <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
        <td class="border border-black p-2">{{ $payscale->name }}</td>
        <td class="border border-black p-2">{{ $payscale->ranks[0]->name }} နှင့်အဆင့်တူ</td>
        <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
        <td class="border border-black p-2">{{ en2mm($payscale->staff->count())}}</td>
        <td class="border border-black text-right p-2">{{ en2mm($actualSalarySum) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionEducationSum) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionSum) }}</td>
        <td class="border border-black text-right p-2">{{ en2mm($additionRationSum) }}</td>
    </tr>
@endforeach


<tr>
    <td colspan="4" class="border border-black p-2 text-right font-bold">Total</td>
    <td class="border border-black p-2 font-bold">{{ en2mm($totalStaffCount) }}</td>
    <td class="border border-black text-right p-2 font-bold">{{ en2mm($totalActualSalary) }}</td>
    <td class="border border-black text-right p-2 font-bold">{{ en2mm($totalAdditionEducation) }}</td>
    <td class="border border-black text-right p-2 font-bold">{{ en2mm($totalAddition) }}</td>
    <td class="border border-black text-right p-2 font-bold">{{ en2mm($totalAdditionRation) }}</td>
</tr> --}}
@php
   
    $totalActualSalary = 0;
    $totalAdditionEducation = 0;
    $totalAddition = 0;
    $totalAdditionRation = 0;
    $totalStaffCount = 0;
@endphp






                    @foreach ($second_payscales as $payscale)
                        <tr>
                            <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black p-2">{{ $payscale->name }}</td>
                            <td class="border border-black p-2">{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
                            <td class="border border-black p-2">{{ en2mm($payscale->allowed_qty) }}</td>
                            <td class="border border-black p-2">{{ en2mm($payscale->staff->count()) }}</td>
                            <td class="border border-black text-right p-2">
                                {{ en2mm($salaries[0]->actual_salary ?? 0) }}</td>
                            <td class="border border-black text-right p-2">
                                {{ en2mm($salaries[0]->addition_education) }}</td>
                            <td class="border border-black text-right p-2">{{ en2mm($salaries[0]->addition) }}</td>
                            <td class="border border-black text-right p-2">
                                {{ en2mm($salaries[0]->addition_ration ?? 0) }}</td>
                            <td class="border border-black text-right p-2">
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
                        <td class="border border-black p-2 font-semibold"></td>
                        <td class="border border-black p-2 font-semibold">
                            {{ $second_payscales[0]->staff_type->name }}စုစုပေါင်း</td>
                        <td class="border border-black p-2 font-semibold">-</td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                        <td class="border border-black text-right p-2">{{ en2mm($totalActualSalarySecond) }}</td>
                        <td class="border border-black text-right p-2">{{ en2mm($totalAdditionEducationSecond) }}</td>
                        <td class="border border-black text-right p-2">{{ en2mm($totalAdditionSecond) }}</td>
                        <td class="border border-black text-right p-2">{{ en2mm($totalAdditionRationSecond) }}</td>
                        <td class="border border-black text-right p-2">{{ en2mm($totalOverallSecond) }}</td>
                    </tr>

                    {{-- <tr>
                        <td class="border border-black p-2 font-semibold"></td>
                        <td class="border border-black p-2 font-semibold">စုစုပေါင်း</td>
                        <td class="border border-black p-2 font-semibold">-</td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($first_payscales->sum('allowed_qty') + $second_payscales->sum('allowed_qty')) }}
                        </td>
                        <td class="border border-black p-2 font-semibold">
                            {{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count()) + $second_payscales->sum(fn($scale) => $scale->staff->count())) }}
                        </td>
                        <td class="border border-black text-right p-2">
                            {{ en2mm($totalActualSalarySecond + $totalActualSalaryFirst) }}</td>
                        <td class="border border-black text-right p-2">
                            {{ en2mm($totalAdditionEducationSecond + $totalAdditionEducationFirst) }}</td>
                        <td class="border border-black text-right p-2">
                            {{ en2mm($totalAdditionSecond + $totalAdditionFirst) }}</td>
                        <td class="border border-black text-right p-2">
                            {{ en2mm($totalAdditionRationSecond + $totalAdditionRationFirst) }}</td>
                        <td class="border border-black text-right p-2">
                            {{ en2mm($totalOverallSecond + $totalOverallFirst) }}</td>

                    </tr> --}}

                    <tr>
                        <td class="border border-black p-2 font-semibold"></td>
                        <td class="border border-black p-2 font-semibold">ထောက်ပံ့ကြေး</td>
                        <td class="border border-black p-2 font-semibold">-</td>
                        <td class="border border-black p-2 font-semibold"></td>
                        <td class="border border-black p-2 font-semibold"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                    </tr>

                </tbody>
            </table>
            <div class="mx-60 my-8">
                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">လက်မှတ်</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">အမည်</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">ရာထူး</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">ဆက်သွယ်ရန်ဖုန်း</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>
            </div>


        </div>
    </div>
</div>
