

<body>
    <div class="container">

        <div class="table-container">
            <table class="">
                <tr>
                    <th style="font-weight:bold;" colspan="50">
                        ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                    </th>
                </tr>
                <tr>
                    <th style="font-weight:bold;" colspan="50">
                        တိုင်းဒေသကြီး/ပြည်နယ်ညွှန်ကြားရေးမှူးရုံးများ၏ ဖွဲ့စည်းပုံ၊ ခန့်အပ်၊ ပို/လို အင်အားစာရင်း
                    </th>
                </tr>
                <tr>
                    <th style="font-weight:bold;" colspan="50">
                        @php
                            use Carbon\Carbon;
                        @endphp
                        {{formatDMYmm(Carbon::now())}}
                    </th>
                </tr>
            </table>
            <table>
                <thead>
                    <tr>
                        <th rowspan="2" style="font-weight:bold;">စဥ်</th>
                        <th rowspan="2" style="font-weight:bold;">ရာထူး</th>
                        <th colspan="3" style="font-weight:bold;">ရန်ကုန်</th>
                        <th colspan="3" style="font-weight:bold;">နေပြည်တော်</th>
                        <th colspan="3" style="font-weight:bold;">မန္တလေးတိုင်း</th>
                        <th colspan="3" style="font-weight:bold;">ရှမ်းပြည်နယ်</th>
                        <th colspan="3" style="font-weight:bold;">မွန်ပြည်နယ်</th>
                        <th colspan="3" style="font-weight:bold;">ဧရာဝတီတိုင်း</th>
                        <th colspan="3" style="font-weight:bold;">စစ်ကိုင်းတိုင်း</th>
                        <th colspan="3" style="font-weight:bold;">တနင်္သာရီတိုင်း</th>
                        <th colspan="3" style="font-weight:bold;">ကရင်ပြည်နယ်</th>
                        <th colspan="3" style="font-weight:bold;">ပဲခူးတိုင်း</th>
                        <th colspan="3" style="font-weight:bold;">မကွေးတိုင်း</th>
                        <th colspan="3" style="font-weight:bold;">ကယားပြည်နယ်</th>
                        <th colspan="3" style="font-weight:bold;">ကချင်ပြည်နယ်</th>
                        <th colspan="3" style="font-weight:bold;">ရခိုင်ပြည်နယ်</th>
                        <th colspan="3" style="font-weight:bold;">ချင်းပြည်နယ်</th>
                        <th colspan="3" style="font-weight:bold;">စုစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                        <th style="font-weight:bold;">ဖွဲ့</th>
                        <th style="font-weight:bold;">ခန့်</th>
                        <th style="font-weight:bold;">ပို/လို</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_allowed_qty = 0;
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
                                        <tr>
                                            <td>{{ en2mm($loop->index + 1) }}</td>
                                            <td>{{ $rank->name }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_yangon) }}</td>
                                            <td>{{ en2mm($count_yangon - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_nay_pyi_thaw) }}</td>
                                            <td>{{ en2mm($count_nay_pyi_thaw - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_mandalay) }}</td>
                                            <td>{{ en2mm($count_mandalay - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_shan) }}</td>
                                            <td>{{ en2mm($count_shan - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_mon) }}</td>
                                            <td>{{ en2mm($count_mon - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_aya) }}</td>
                                            <td>{{ en2mm($count_aya - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_sagaing) }}</td>
                                            <td>{{ en2mm($count_sagaing - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_tanindaryi) }}</td>
                                            <td>{{ en2mm($count_tanindaryi - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($total_kayin) }}</td>
                                            <td>{{ en2mm($total_kayin - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_bago) }}</td>
                                            <td>{{ en2mm($count_bago - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_magway) }}</td>
                                            <td>{{ en2mm($count_magway - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_kayah) }}</td>
                                            <td>{{ en2mm($count_kayah - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_kachin) }}</td>
                                            <td>{{ en2mm($count_kachin - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_rakhine) }}</td>
                                            <td>{{ en2mm($count_rakhine - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_chin) }}</td>
                                            <td>{{ en2mm($count_chin - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_total) }}</td>
                                            <td>{{ en2mm($count_total - $rank->allowed_qty) }}</td>
                                        </tr>
                                        @php
                                            $total_allowed_qty += $rank->allowed_qty;
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
                        <td></td>
                        <td>စုစုပေါင်း</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_yangon) }}</td>
                        <td>{{ en2mm($total_yangon - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_nay_pyi_thaw) }}</td>
                        <td>{{ en2mm($total_nay_pyi_thaw - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_mandalay) }}</td>
                        <td>{{ en2mm($total_mandalay - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_shan) }}</td>
                        <td>{{ en2mm($total_shan - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_mon) }}</td>
                        <td>{{ en2mm($total_mon - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_aya) }}</td>
                        <td>{{ en2mm($total_aya - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_sagaing) }}</td>
                        <td>{{ en2mm($total_sagaing - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_tanindaryi) }}</td>
                        <td>{{ en2mm($total_tanindaryi - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_kayin) }}</td>
                        <td>{{ en2mm($total_kayin - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_bago) }}</td>
                        <td>{{ en2mm($total_bago - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_magway) }}</td>
                        <td>{{ en2mm($total_magway - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_kayah) }}</td>
                        <td>{{ en2mm($total_kayah - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_kachin) }}</td>
                        <td>{{ en2mm($total_kachin - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_rakhine) }}</td>
                        <td>{{ en2mm($total_rakhine - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_chin) }}</td>
                        <td>{{ en2mm($total_chin - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_all) }}</td>
                        <td>{{ en2mm($total_all - $total_allowed_qty) }}</td>
                    </tr>
                </tbody>
            </table>
</body>