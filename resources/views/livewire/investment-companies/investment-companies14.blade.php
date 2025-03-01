<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>
            <h1 class="font-semibold text-base mb-2 text-center">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="font-semibold text-base mb-2 text-center">ရင်နှီးမြှုပ်နှံမှုနှင့်
                ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာနရှိ(ရုံးချုပ်)၏ ဖွဲ့စည်းပုံ၊ခန့်အပ် ပို/လို အင်အားစာရင်း</h1>


            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th colspan="3" class="border border-black text-center p-2">စီမံ</th>
                        <th colspan="3" class="border border-black text-center p-2">ရင်းနှီး(၁)</th>
                        <th colspan="3" class="border border-black text-center p-2">ရင်းနှီး(၂)</th>
                        <th colspan="3" class="border border-black text-center p-2">ရင်းနှီး(၃)</th>
                        <th colspan="3" class="border border-black text-center p-2">ရင်းနှီး(၄)</th>
                        <th colspan="3" class="border border-black text-center p-2">မူဝါဒ</th>
                        <th colspan="3" class="border border-black text-center p-2">ရင်းနှီးမြှင့်တင်</th>
                        <th colspan="3" class="border border-black text-center p-2">ရင်းနှီးကြီးကြပ်</th>
                        <th colspan="3" class="border border-black text-center p-2">စီမံကိန်း</th>
                        <th colspan="3" class="border border-black text-center p-2">ကုမ္ပဏီ</th>
                        <th colspan="3" class="border border-black text-center p-2">HR</th>
                        <th colspan="3" class="border border-black text-center p-2">စုစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-left p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_allowed_qty = 0;
                        $total_si_man = 0;
                        $total_yinn_1 = 0;
                        $total_yinn_2 = 0;
                        $total_yinn_3 = 0;
                        $total_yinn_4 = 0;
                        $total_mu_warda = 0;
                        $total_yinn_mhyint_tin = 0;
                        $total_yinn_kyee_kyat = 0;
                        $total_si_man_kaine = 0;
                        $total_company = 0;
                        $total_hr = 0;
                        $total_all = 0;
                    @endphp
                    @foreach ($ranks as $rank)
                                        @php
                                            $count_si_man = $si_man->where('id', $rank->id)->count();
                                            $count_yinn_1 = $yinn_1->where('id', $rank->id)->count();
                                            $count_yinn_2 = $yinn_2->where('id', $rank->id)->count();
                                            $count_yinn_3 = $yinn_3->where('id', $rank->id)->count();
                                            $count_yinn_4 = $yinn_4->where('id', $rank->id)->count();
                                            $count_mu_warda = $mu_warda->where('id', $rank->id)->count();
                                            $count_yinn_mhyint_tin = $yinn_mhyint_tin->where('id', $rank->id)->count();
                                            $count_yinn_kyee_kyat = $yinn_kyee_kyat->where('id', $rank->id)->count();
                                            $count_si_man_kaine = $si_man_kaine->where('id', $rank->id)->count();
                                            $count_company = $company->where('id', $rank->id)->count();
                                            $count_hr = $hr->where('id', $rank->id)->count();
                                            $count_total = $total->where('id', $rank->id)->count();
                                        @endphp
                                        <tr>
                                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }}</td>
                                            <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_si_man) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_si_man - $rank->allowed_qty) }}
                                            </td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_1) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_1 - $rank->allowed_qty) }}
                                            </td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_2) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_2 - $rank->allowed_qty) }}
                                            </td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_3) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_3 - $rank->allowed_qty) }}
                                            </td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_4) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_4 - $rank->allowed_qty) }}
                                            </td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_mu_warda) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($count_mu_warda - $rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_mhyint_tin) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($count_yinn_mhyint_tin - $rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_yinn_kyee_kyat) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($count_yinn_kyee_kyat - $rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_si_man_kaine) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($count_si_man_kaine - $rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_company) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_company - $rank->allowed_qty) }}
                                            </td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_hr) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_hr - $rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($rank->allowed_qty) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_total) }}</td>
                                            <td class="border border-black text-center p-2">{{ en2mm($count_total - $rank->allowed_qty) }}
                                            </td>
                                        </tr>
                        @php
                            $total_allowed_qty += $rank->allowed_qty;
                            $total_si_man += $count_si_man;
                            $total_yinn_1 += $count_yinn_1;
                            $total_yinn_2 += $count_yinn_2;
                            $total_yinn_3 += $count_yinn_3;
                            $total_yinn_4 += $count_yinn_4;
                            $total_mu_warda += $count_mu_warda;
                            $total_yinn_mhyint_tin += $count_yinn_mhyint_tin;
                            $total_yinn_kyee_kyat += $count_yinn_kyee_kyat;
                            $total_si_man_kaine += $count_si_man_kaine;
                            $total_company += $count_company;
                            $total_hr += $count_hr;
                            $total_all += $count_total;
                        @endphp
                    @endforeach
                    <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_si_man) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_si_man - $total_allowed_qty) }}
                        </td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_1) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_1 - $total_allowed_qty ) }}
                        </td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_2 - $total_allowed_qty) }}
                        </td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_3) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_3 - $total_allowed_qty) }}
                        </td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_4) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_4 - $total_allowed_qty) }}
                        </td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_mu_warda) }}</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($total_mu_warda - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_mhyint_tin) }}</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($total_yinn_mhyint_tin - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yinn_kyee_kyat) }}</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($total_yinn_kyee_kyat - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_si_man_kaine) }}</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($total_si_man_kaine - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_company) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_company - $total_allowed_qty) }}
                        </td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_hr) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_hr - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_all) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_all - $total_allowed_qty) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>