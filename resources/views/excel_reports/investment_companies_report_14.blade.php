{{-- <style type="text/css">
    page {
        background: white;
    }

    page[size="A4"] {
        width: 210mm;
        height: 297mm;
    }

    @media print {

        body,
        page {
            margin: 0;
            box-shadow: 0;
        }
    }

    body {
        font-family: 'pyidaungsu', sans-serif !important;
        font-size: 13px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    td {
        vertical-align: middle;
    }

    .bold-row {
        font-weight: bold;
    }
</style>
</head> --}}

<body>
    <div class="container">

        <div class="table-container">
            <table class="">
                <tr>
                    <th style="font-weight:bold;" colspan="38">
                        ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                    </th>
                </tr>
                <tr>
                    <th style="font-weight:bold;" colspan="38">
                        ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာနရှိ(ရုံးချုပ်)၏ ဖွဲ့စည်းပုံ၊ ခန့်အပ်၊
                        ပို/လို အင်အားစာရင်း
                    </th>
                </tr>
                <tr>
                    <th style="font-weight:bold;" colspan="38">
                        @php
                            use Carbon\Carbon;
                        @endphp
                        {{formatDMYmm(Carbon::now())}}
                    </th>
                </tr>
            </table>

            {{-- <table>
                <tr>
                    <th colspan="38" rowspan="2">
                        ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>
                        ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>

                    </th>
                </tr>
            </table> --}}

            <table>
                <thead>
                    <tr>
                        <th rowspan="2" style="font-weight:bold;">စဥ်</th>
                        <th rowspan="2" style="font-weight:bold;">ရာထူး</th>
                        <th colspan="3" style="font-weight:bold;">စီမံ</th>
                        <th colspan="3" style="font-weight:bold;">ရင်းနှီး(၁)</th>
                        <th colspan="3" style="font-weight:bold;">ရင်းနှီး(၂)</th>
                        <th colspan="3" style="font-weight:bold;">ရင်းနှီး(၃)</th>
                        <th colspan="3" style="font-weight:bold;">ရင်းနှီး(၄)</th>
                        <th colspan="3" style="font-weight:bold;">မူဝါဒ</th>
                        <th colspan="3" style="font-weight:bold;">ရင်းနှီးမြှင့်တင်</th>
                        <th colspan="3" style="font-weight:bold;">ရင်းနှီးကြီးကြပ်</th>
                        <th colspan="3" style="font-weight:bold;">စီမံကိန်း</th>
                        <th colspan="3" style="font-weight:bold;">ကုမ္ပဏီ</th>
                        <th colspan="3" style="font-weight:bold;">HR</th>
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
                                            <td>{{ en2mm($loop->index + 1) }}</td>
                                            <td>{{ $rank->name }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_si_man) }}</td>
                                            <td>{{ en2mm($count_si_man - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_yinn_1) }}</td>
                                            <td>{{ en2mm($count_yinn_1 - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_yinn_2) }}</td>
                                            <td>{{ en2mm($count_yinn_2 - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_yinn_3) }}</td>
                                            <td>{{ en2mm($count_yinn_3 - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_yinn_4) }}</td>
                                            <td>{{ en2mm($count_yinn_4 - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_mu_warda) }}</td>
                                            <td>{{ en2mm($count_mu_warda - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_yinn_mhyint_tin) }}</td>
                                            <td>{{ en2mm($count_yinn_mhyint_tin - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_yinn_kyee_kyat) }}</td>
                                            <td>{{ en2mm($count_yinn_kyee_kyat - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_si_man_kaine) }}</td>
                                            <td>{{ en2mm($count_si_man_kaine - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_company) }}</td>
                                            <td>{{ en2mm($count_company - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_hr) }}</td>
                                            <td>{{ en2mm($count_hr - $rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($rank->allowed_qty) }}</td>
                                            <td>{{ en2mm($count_total) }}</td>
                                            <td>{{ en2mm($count_total - $rank->allowed_qty) }}</td>
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
                        <td></td>
                        <td>စုစုပေါင်း</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_si_man) }}</td>
                        <td>{{ en2mm($total_si_man - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_yinn_1) }}</td>
                        <td>{{ en2mm($total_yinn_1 - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_yinn_2) }}</td>
                        <td>{{ en2mm($total_yinn_2 - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_yinn_3) }}</td>
                        <td>{{ en2mm($total_yinn_3 - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_yinn_4) }}</td>
                        <td>{{ en2mm($total_yinn_4 - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_mu_warda) }}</td>
                        <td>{{ en2mm($total_mu_warda - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_yinn_mhyint_tin) }}</td>
                        <td>{{ en2mm($total_yinn_mhyint_tin - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_yinn_kyee_kyat) }}</td>
                        <td>{{ en2mm($total_yinn_kyee_kyat - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_si_man_kaine) }}</td>
                        <td>{{ en2mm($total_si_man_kaine - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_company) }}</td>
                        <td>{{ en2mm($total_company - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_hr) }}</td>
                        <td>{{ en2mm($total_hr - $total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_allowed_qty) }}</td>
                        <td>{{ en2mm($total_all) }}</td>
                        <td>{{ en2mm($total_all - $total_allowed_qty) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>