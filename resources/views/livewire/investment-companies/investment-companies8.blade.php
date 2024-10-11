<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>ဌာနအလိုက်
                    နေပြည်တော်သို့ပြောင်းရွေ့ရောက်ရှိအင်အားစာရင်း</h1>
                <h2 class="font-semibold text-base mb-2 text-center">၂၀၂၄ ခုနှစ်၊ ဇွန်လ</h2>
                <div class="w-full rounded-lg">                  
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="3" class="border border-black text-center p-2">စဥ်</th>
                                <th rowspan="3" class="border border-black text-center p-2">ဌာန</th>
                                <th colspan="8" class="border border-black text-center p-2">အိမ်ထောင်သည်</th>
                                <th colspan="2" class="border border-black text-center p-2">အရာရှိ</th>
                                <th rowspan="3" class="border border-black text-center p-2">
                                    အမှုထမ်း<br>အိမ်ထောင်<br>သည်များ</th>
                                <th colspan="2" class="border border-black text-center p-2">အမှုထမ်း</th>
                                <th rowspan="3" class="border border-black text-center p-2">စုစုပေါင်း</th>
                            </tr>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">ဝန်ကြီး</th>
                                <th rowspan="2" class="border border-black text-center p-2">ဒု-ဝန်ကြီး</th>
                                <th rowspan="2" class="border border-black text-center p-2">ညွှန်ချုပ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">ဒု-ညွှန်ချုပ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">ညွှန်မှူး</th>
                                <th rowspan="2" class="border border-black text-center p-2">ဒု-ညွှန်မှူး</th>
                                <th rowspan="2" class="border border-black text-center p-2">လ/ထ ညွှန်မှူး</th>
                                <th rowspan="2" class="border border-black text-center p-2">ဦးစီးအရာရှိ</th>
                                <th colspan="2" class="border border-black text-center p-2">ပျို</th>
                                <th colspan="2" class="border border-black text-center p-2">ပျို</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="border border-black text-center p-2">၁</td>
                                <td class="border border-black text-center p-2">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 1)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 2)?->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 3)?->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 4)?->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 5)?->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 6)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNotNull('spouse_name')->count())) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2">-</td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 1)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 2)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 3)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 4)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 5)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm(($first_ranks->where('id', 6)->first())?->staffs->whereNotNull('spouse_name')->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNotNull('spouse_name')->count())) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 1)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->whereNull('spouse_name')->where('gender_id', 2)->count())) }}
                                </td>
                                <td class="border border-black text-center p-2">{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
