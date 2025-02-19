<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <br><br>
            <h1 class="font-semibold text-base mb-2 text-center">ရင်နှီးမြှုပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="font-semibold text-base mb-2 text-center">တိုင်းဒေသကြီး/ပြည်နယ်ဦးစီးမှူးရုံးများ၏ ဖွဲ့ခန့်ပိုလို အင်အားစာရင်း</h1>
           
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th colspan="3" class="border border-black text-center p-2">ရန်ကုန်</th>
                        <th colspan="3" class="border border-black text-center p-2">နေပြည်တော်</th>
                        <th colspan="3" class="border border-black text-center p-2">မန္တလေးတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">ရှမ်းပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">မွန်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ဧရာဝတီတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">စစ်ကိုင်းတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">တနင်္သာရီတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">ကရင်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ပဲခူးတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">မကွေးတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">ကယားပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ကချင်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ရခိုင်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ချင်းပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">စုစုပေါင်း
                        </th>
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
                        $_total_allowed_qty = 0;
                        $total_yangon = 0;
                        $total_nay_pyi_thaw = 0;
                        $total_mandalay = 0;
                        $total_shan = 0;
                        $total_mon = 0;
                        $total_aya = 0;
                        $total_sagaing = 0;
                        $total_tanindaryi = 0;
                        $total_kayin = 0;
                        $total_bago = 0;
                        $total_magway = 0;
                        $total_kayah = 0;
                        $total_kachin = 0;
                        $total_rakhine = 0;
                        $total_chin = 0;
                        $total_all = 0;
                        $total_allowed_quantity_by_rank = 0;
                    @endphp
                    @foreach ($ranks as $rank)
                        @php
                            $count_yangon = $yangon->where('id', $rank->id)->count();
                            $count_nay_pyi_thaw = $nay_pyi_thaw->where('id', $rank->id)->count();
                            $count_mandalay = $mandalay->where('id', $rank->id)->count();
                            $count_shan = $shan->where('id', $rank->id)->count();
                            $count_mon = $mon->where('id', $rank->id)->count();
                            $count_aya = $aya->where('id', $rank->id)->count();
                            $count_sagaing = $sagaing->where('id', $rank->id)->count();
                            $count_tanindaryi = $tanindaryi->where('id', $rank->id)->count();
                            $count_kayin = $kayin->where('id', $rank->id)->count();
                            $count_bago = $bago->where('id', $rank->id)->count();
                            $count_magway = $magway->where('id', $rank->id)->count();
                            $count_kayah = $kayah->where('id', $rank->id)->count();
                            $count_kachin = $kachin->where('id', $rank->id)->count();
                            $count_rakhine = $rakhine->where('id', $rank->id)->count();
                            $count_chin = $chin->where('id', $rank->id)->count();
                            $count_total = $total->where('id', $rank->id)->count();
                        @endphp
                        @php
                            $total_allowed_quantity_by_rank = $rank->allowed_qty * 15;
                        @endphp
                         <tr>
                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 23)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_yangon) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_yangon - $rank->allowed_qty ) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 26)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_nay_pyi_thaw) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_nay_pyi_thaw - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 20)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_mandalay) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_mandalay - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 24)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_shan) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_shan - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 21)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_mon) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_mon - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 25)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_aya) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_aya - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 16)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_sagaing) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_sagaing - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 17)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_tanindaryi) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_tanindaryi - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 14)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_kayin) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_kayin - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 18)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_bago) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_bago - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 19)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_magway) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_magway - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 13)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_kayah) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_kayah - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 12)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_kachin) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_kachin - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 22)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_rakhine) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_rakhine - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->ranks ? $rank->ranks->where('division_id', 15)->first()?->allowed_qty ?? $rank->allowed_qty : $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_chin) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_chin - $rank->allowed_qty) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($total_allowed_quantity_by_rank) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_total) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($count_total - $total_allowed_quantity_by_rank) }}</td>
                        </tr>
                        @php
                            $total_allowed_qty += $rank->allowed_qty;
                            $_total_allowed_qty += $total_allowed_quantity_by_rank;
                            $total_yangon += $count_yangon;
                            $total_nay_pyi_thaw += $count_nay_pyi_thaw;
                            $total_mandalay += $count_mandalay;
                            $total_shan += $count_shan;
                            $total_mon += $count_mon;
                            $total_aya += $count_aya;
                            $total_sagaing += $count_sagaing;
                            $total_tanindaryi += $count_tanindaryi;
                            $total_kayin += $count_kayin;
                            $total_bago += $count_bago;
                            $total_magway += $count_magway;
                            $total_kayah += $count_kayah;
                            $total_kachin += $count_kachin;
                            $total_rakhine += $count_rakhine;
                            $total_chin += $count_chin;
                            $total_all += $count_total;
                        @endphp
                    @endforeach
                    <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yangon) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_yangon - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_nay_pyi_thaw) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_nay_pyi_thaw - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_mandalay) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_mandalay - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_shan) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_shan - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_mon) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_mon - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_aya) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_aya - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_sagaing) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_sagaing - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_tanindaryi) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_tanindaryi - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_kayin) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_kayin - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_bago) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_bago - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_magway) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_magway - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_kayah) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_kayah - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_kachin) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_kachin - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_rakhine) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_rakhine - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_chin) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_chin - $total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($_total_allowed_qty) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_all) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_all - $_total_allowed_qty) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
