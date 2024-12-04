{{-- <!DOCTYPE html>
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
           font-family: 'pyidaungsu', sans-serif !important;
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
            font-weight: bold;
        }

        .text-left {
            text-align: left;
        }

        .float-right {
            float: right;
        }

        .mr-32 {
            margin-right: 128px;
        }

        .ml-10 {
            margin-left: 40px;
        }

        .my-2 {
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .w-1-5 {
            width: 20%;
        }

        .w-3-4 {
            width: 75%;
        }

        .text-center {
            text-align: center;
        }

        .border-collapse {
            border-collapse: collapse;
        }



    </style>
</head>
<body>
    <page size="A4"> --}}

        <table class="border-collapse">
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">အကြောင်းအရာ</th>
                    <th colspan="3">၃၁-၁၂-၂၀၂၃ထိ<br>အင်အား</th>
                    <th colspan="2">အသစ်ခန့်အပ်</th>
                    <th colspan="2">အခြားဌာနမှ<br>ရောက်ရှိ</th>
                    <th colspan="2">အခြားဌာနသို့<br>ပြောင်းရွေ့ခြင်း</th>
                    <th colspan="2">ပင်စင်ခံစားခြင်း</th>
                    <th colspan="2">နုတ်ထွက်ခြင်း</th>
                    <th colspan="2">ထုတ်ပယ်ခြင်း/<br>ထုတ်ပစ်ခြင်း</th>
                    <th colspan="2">ကွယ်လွန်ခြင်း</th>
                    <th colspan="3">၃၁-၃-၂၀၂၄ထိအင်အားစုစုပေါင်း</th>
                    <th rowspan="2">မှတ်ချက်</th>
                </tr>
                <tr>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ပေါင်း</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ရာ</th>
                    <th>မှု</th>
                    <th>ပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="2">၁</td>
                    <td>လုပ်သက်၁၀နှစ်အထက်</td>
                    <td>{{ en2mm($high_dlimit_staffs) }}</td>
                    <td>{{ en2mm($low_dlimit_staffs) }}</td>
                    <td>{{ en2mm($high_dlimit_staffs + $low_dlimit_staffs) }}</td>
                    <td>{{ en2mm($high_new_staffs) }}</td>
                    <td>{{ en2mm($low_new_staffs) }}</td>
                    <td>{{ en2mm($high_transfer_new_staffs) }}</td>
                    <td>{{ en2mm($low_transfer_new_staffs) }}</td>
                    <td>{{ en2mm($high_leave_staffs) }}</td>
                    <td>{{ en2mm($low_leave_staffs) }}</td>
                    <td>{{ en2mm($high_q->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($low_q->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($high_q->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($low_q->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($high_q->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($low_q->where('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($high_q->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($low_q->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($high_dlimit2_staffs) }}</td>
                    <td>{{ en2mm($low_dlimit2_staffs) }}</td>
                    <td>{{ en2mm($high_dlimit2_staffs + $low_dlimit2_staffs) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>လုပ်သက်၁၀နှစ်အောက်</td>
                    <td>{{ en2mm($high_dlimit_staffs2) }}</td>
                    <td>{{ en2mm($low_dlimit_staffs2) }}</td>
                    <td>{{ en2mm($high_dlimit_staffs2 + $low_dlimit_staffs2) }}</td>
                    <td>{{ en2mm($high_new_staffs2) }}</td>
                    <td>{{ en2mm($low_new_staffs2) }}</td>
                    <td>{{ en2mm($high_transfer_new_staffs2) }}</td>
                    <td>{{ en2mm($low_transfer_new_staffs2) }}</td>
                    <td>{{ en2mm($high_leave_staffs2) }}</td>
                    <td>{{ en2mm($low_leave_staffs2) }}</td>
                    <td>{{ en2mm($high_q2->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($low_q2->where('retire_type_id', 5)->count()) }}</td>
                    <td>{{ en2mm($high_q2->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($low_q2->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($high_q2->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($low_q2->where('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($high_q2->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($low_q2->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($high_dlimit2_staffs) }}</td>
                    <td>{{ en2mm($low_dlimit2_staffs) }}</td>
                    <td>{{ en2mm($high_dlimit2_staffs + $low_dlimit2_staffs) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>စုစုပေါင်း</td>
                    <td>{{ en2mm($high_dlimit_staffs + $high_dlimit_staffs2) }}</td>
                    <td>{{ en2mm($low_dlimit_staffs + $low_dlimit_staffs2) }}</td>
                    <td>{{ en2mm(($high_dlimit_staffs + $low_dlimit_staffs) + ($high_dlimit_staffs2 + $low_dlimit_staffs2)) }}</td>
                    <td>{{ en2mm($high_new_staffs + $high_new_staffs2) }}</td>
                    <td>{{ en2mm($low_new_staffs + $low_new_staffs2) }}</td>
                    <td>{{ en2mm($high_transfer_new_staffs + $high_transfer_new_staffs2) }}</td>
                    <td>{{ en2mm($low_transfer_new_staffs + $low_transfer_new_staffs2) }}</td>
                    <td>{{ en2mm($high_leave_staffs + $high_leave_staffs2) }}</td>
                    <td>{{ en2mm($low_leave_staffs + $low_leave_staffs2) }}</td>
                    <td>{{ en2mm(($high_q->where('retire_type_id', 5)->count()) + ($high_q2->where('retire_type_id', 5)->count())) }}</td>
                    <td>{{ en2mm(($low_q->where('retire_type_id', 5)->count()) + ($low_q2->where('retire_type_id', 5)->count())) }}</td>
                    <td>{{ en2mm($high_q->where('retire_type_id', 2)->count() + $high_q2->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($low_q->where('retire_type_id', 2)->count() + $low_q2->where('retire_type_id', 2)->count()) }}</td>
                    <td>{{ en2mm($high_q->whereIn('retire_type_id', [3, 4])->count() + $high_q2->whereIn('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($low_q->where('retire_type_id', [3, 4])->count() + $low_q2->where('retire_type_id', [3, 4])->count()) }}</td>
                    <td>{{ en2mm($high_q->where('retire_type_id', 1)->count() + $high_q2->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($low_q->where('retire_type_id', 1)->count() + $low_q2->where('retire_type_id', 1)->count()) }}</td>
                    <td>{{ en2mm($high_dlimit2_staffs + $high_dlimit2_staffs2) }}</td>
                    <td>{{ en2mm($low_dlimit2_staffs + $low_dlimit2_staffs2) }}</td>
                    <td>{{ en2mm(($high_dlimit2_staffs + $low_dlimit2_staffs) + ($high_dlimit2_staffs2 + $low_dlimit2_staffs2)) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        
            {{-- <p class="float-right mr-32">(လက်မှတ်)<br>တာဝန်ခံအရာရှိ</p>




    </body>
    </html> --}}
