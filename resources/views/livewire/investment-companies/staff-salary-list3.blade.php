<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="font-bold text-center text-sm mb-2">
                နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
                နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏</h1>
            <h2 class="font-bold text-center text-sm mb-2">လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့်
                အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
            </h2>

            <table class="md:w-full font-bold text-sm mb-4">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာနှုန်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူးအဆင့်</th>
                        <th colspan="2" class="border border-black text-center p-2">
                            အမြဲတမ်းအတွင်းဝန်<br>ချီးမြှင့်ငွေ</th>
                        <th colspan="2" class="border border-black text-center p-2">အခြားချီးမြှင့်ငွေ/စရိတ်</th>
                        <th colspan="2" class="border border-black text-center p-2">ရက္ခာစရိတ်</th>
                        <th colspan="2" class="border border-black text-center p-2">စုစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black text-center p-2">ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                        <th class="border border-black text-center p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black text-center p-2">ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                        <th class="border border-black text-center p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black text-center p-2">ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                        <th class="border border-black text-center p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black text-center p-2">ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payscales->where('staff_type_id', 1) as $payscale)
                        <tr>
                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }} </td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->name ?? 0) }}</td>
                            <td class="border border-black text-center p-2">{{en2mm($payscale->similiar_rank ?? 0) }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($payscale->staff_count_addition_education ?? 0) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->addition_education ?? 0) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->staff_count_addition ?? 0) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->addition ?? 0) }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($payscale->staff_count_addition_ration ?? 0) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->addition_ration ?? 0) }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($payscale->staff_count_addition_education ?? (0 + $payscale->staff_count_addition ?? (0 + $payscale->staff_count_addition_ration ?? 0))) }}
                            </td>
                            <td class="border border-black text-center p-2">

                                {{ en2mm($payscale->addition_education ?? (0 + $payscale->addition ?? (0 + $payscale->addition_ration ?? 0))) }}

                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                        <td class="border border-black text-center p-2">-</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_education)) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_education)) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_ration)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_education) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_education) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_ration)) }}

                        </td>
                    </tr>
                    @foreach ($payscales->where('staff_type_id', 2) as $payscale)
                        <tr>
                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }} </td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->name ?? 0 )}}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->similiar_rank ?? 0) }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($payscale->staff_count_addition_education ?? 0) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->addition_education ?? 0) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->staff_count_addition ?? 0) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->addition ?? 0) }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($payscale->staff_count_addition_ration ?? 0) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($payscale->addition_ration ?? 0) }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($payscale->staff_count_addition_education ?? (0 + $payscale->staff_count_addition ?? (0 + $payscale->staff_count_addition_ration ?? 0))) }}
                            </td>
                            <td class="border border-black text-center p-2">

                                {{ en2mm($payscale->addition_education ?? (0 + $payscale->addition ?? (0 + $payscale->addition_ration ?? 0))) }}

                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">အမှုထမ်းပေါင်း</td>
                        <td class="border border-black text-center p-2">-</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_education)) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_education)) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_ration)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_education) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_education) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_ration)) }}

                        </td>
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
