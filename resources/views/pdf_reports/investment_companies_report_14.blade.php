<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type="text/css">
        page{
            background: white;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }

        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        }

        body {
            font-family: 'tharlon';
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
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
</head>
<body>
    <page size="A4">
        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">ရာထူး</th>
                    <th colspan="3">စီမံ</th>
                    <th colspan="3">ရင်းနှီး(၁)</th>
                    <th colspan="3">ရင်းနှီး(၂)</th>
                    <th colspan="3">ရင်းနှီး(၃)</th>
                    <th colspan="3">ရင်းနှီး(၄)</th>
                    <th colspan="3">မူဝါဒ</th>
                    <th colspan="3">ရင်းနှီးမြှင့်တင်</th>
                    <th colspan="3">ရင်းနှီးကြီးကြပ်</th>
                    <th colspan="3">စီမံကိန်း</th>
                    <th colspan="3">ကုမ္ပဏီ</th>
                    <th colspan="3">HR</th>
                    <th colspan="3">စုစုပေါင်း</th>
                </tr>
                <tr>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
                    <th>ဖွဲ့</th>
                    <th>ခန့်</th>
                    <th>ပို/လို</th>
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
                        <td>{{ en2mm($rank->allowed_qty - $count_si_man) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_yinn_1) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_yinn_1) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_yinn_2) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_yinn_2) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_yinn_3) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_yinn_3) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_yinn_4) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_yinn_4) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_mu_warda) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_mu_warda) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_yinn_mhyint_tin) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_yinn_mhyint_tin) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_yinn_kyee_kyat) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_yinn_kyee_kyat) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_si_man_kaine) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_si_man_kaine) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_company) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_company) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_hr) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_hr) }}</td>
                        <td>{{ en2mm($rank->allowed_qty) }}</td>
                        <td>{{ en2mm($count_total) }}</td>
                        <td>{{ en2mm($rank->allowed_qty - $count_total) }}</td>
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
                    <td>{{ en2mm($total_allowed_qty - $total_si_man) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_yinn_1) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_yinn_1) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_yinn_2) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_yinn_2) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_yinn_3) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_yinn_3) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_yinn_4) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_yinn_4) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_mu_warda) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_mu_warda) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_yinn_mhyint_tin) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_yinn_mhyint_tin) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_yinn_kyee_kyat) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_yinn_kyee_kyat) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_si_man_kaine) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_si_man_kaine) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_company) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_company) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_hr) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_hr) }}</td>
                    <td>{{ en2mm($total_allowed_qty) }}</td>
                    <td>{{ en2mm($total_all) }}</td>
                    <td>{{ en2mm($total_allowed_qty - $total_all) }}</td>
                </tr>
            </tbody>
        </table>
</body>
</html>
