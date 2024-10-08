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

        th[rowspan="2"] {
            vertical-align: middle;
        }

        th[colspan] {
            background-color: #f2f2f2;
        }

        td {
            text-align: right;
        }

        td.center, th.center {
            text-align: center;
        }

        td.note {
            text-align: left;
        }




    </style>
</head>
<body>
    <page size="A4">
        <table>
            <thead>
                <tr>
                    <th rowspan="2" class="center">စဥ်</th>
                    <th colspan="3" class="center">မူလအင်အား</th>
                    <th colspan="2" class="center">အသစ်ခန့်အပ်</th>
                    <th colspan="2" class="center">အခြားဌာနမှ<br>ရောက်ရှိ</th>
                    <th colspan="2" class="center">အခြားဌာနသို့<br>ပြေင်းရွေ့ခြင်း</th>
                    <th colspan="2" class="center">ပင်စင်ခံစားခြင်း</th>
                    <th colspan="2" class="center">နုတ်ထွက်ခြင်း</th>
                    <th colspan="2" class="center">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း</th>
                    <th colspan="2" class="center">ကွယ်လွန်ခြင်း</th>
                    <th colspan="3" class="center">၃၁-၃-၂၀၂၄ထိအင်အားစုစုပေါင်း</th>
                    <th rowspan="2" class="center">မှတ်ချက်</th>
                </tr>
                <tr>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ပေါင်း</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ရာ</th>
                    <th class="center">မှု</th>
                    <th class="center">ပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>၁</td>
                    <td>{{ en2mm($high_staff_query->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->count() + $low_staff_query->count()) }}</td>
                    <td>{{ en2mm($high_new_appointed_staffs) }}</td>
                    <td>{{ en2mm($low_new_appointed_staffs) }}</td>
                    <td>{{ en2mm($high_transferred_staffs) }}</td>
                    <td>{{ en2mm($low_transferred_staffs) }}</td>
                    <td></td>
                    <td></td>
                    <td>{{ en2mm($high_staff_query->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($high_staff_query->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($low_staff_query->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($d_limit_high_staffs) }}</td>
                    <td>{{ en2mm($d_limit_low_staffs) }}</td>
                    <td>{{ en2mm($d_limit_high_staffs + $d_limit_low_staffs) }}</td>
                    <td></td>
                </tr>
                {{-- <tr>
                    <td>၁</td>
                    <td class="border border-black text-right p-2">၂၄၄</td>
                    <td class="border border-black text-right p-2">၂၀၄</td>
                    <td class="border border-black text-right p-2">၄၄၈</td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2">၁၄</td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2">၁</td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2">၁</td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2">၁</td>
                    <td class="border border-black text-right p-2">၁</td>
                    <td class="border border-black text-right p-2">၇</td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2"></td>
                    <td class="border border-black text-right p-2">၂၄၃</td>
                    <td class="border border-black text-right p-2">၂၁၀</td>
                    <td class="border border-black text-right p-2">၄၅၃</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>၂၄၄</td>
                    <td>၂၀၄</td>
                    <td>၄၄၈</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>၁</td>
                    <td>၁</td>
                    <td>၇</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>၂၄၃</td>
                    <td>၂၁၀</td>
                    <td>၄၅၃</td>
                    <td></td>
                </tr> --}}
            </tbody>
        </table>

</body>
</html>
