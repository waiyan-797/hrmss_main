
    <style type="text/css">
        /* page{
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
        } */

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        h1 {
            font-weight: bold;
            text-align: center;
            font-size: 1.25em;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        .font-bold {
            font-weight: bold;
        }
    </style>
        <h1>
            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
            ဝန်ထမ်းအင်အားစာရင်းအချုပ်
        </h1>

        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ရာထူးအမည်</th>
                    <th>ကျား</th>
                    <th>မ</th>
                    <th>စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($first_ranks as $rank)
                    <tr>
                        <td>{{ en2mm($loop->index + 1) }}</td>
                        <td>{{ $rank->name }}</td>
                        <td>{{ en2mm($rank->staffs->where('gender_id', 1)->count()) }}</td>
                        <td>{{ en2mm($rank->staffs->where('gender_id', 2)->count()) }}</td>
                        <td>{{ en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()) }}</td>
                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း အရာထမ်း</td>
                    <td>
                        {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                </tr>
                @foreach ($second_ranks as $rank)
                    <tr>
                        <td>{{ en2mm($loop->index + 1) }}</td>
                        <td>{{ $rank->name }}</td>
                        <td>{{ en2mm($rank->staffs->where('gender_id', 1)->count()) }}</td>
                        <td>{{ en2mm($rank->staffs->where('gender_id', 2)->count()) }}</td>
                        <td>{{ en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()) }}</td>
                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း အမှုထမ်း</td>
                    <td>
                        {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                </tr>
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း အရာထမ်း အမှုထမ်း</td>
                    <td>
                        {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                </tr>
                <tr>
                    <td>၁</td>
                    <td>နေ့စား</td>
                    <td>
                        {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                </tr>
                <tr class="font-bold">
                    <td></td>
                    <td>စုစုပေါင်း ဝန်ထမ်းဦးရေ</td>
                    <td>
                        {{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                    <td>
                        {{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                    </td>
                </tr>
            </tbody>
        </table>

